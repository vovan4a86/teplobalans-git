<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Fanky\Admin\Models\City;
use Fanky\Admin\Models\Feedback;
use Fanky\Admin\Models\Order as Order;
use Fanky\Admin\Models\Page;
use Fanky\Admin\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mail;

use Cart;
use Settings;
use SiteHelper;
use Validator;

class AjaxController extends Controller
{
    private $fromMail = 'info@novozmk.ru';
    private $fromName = 'Novozmk';

    //РАБОТА С КОРЗИНОЙ
    public function postAddToCart(Request $request): array
    {
        $id = $request->get('id');
        $count = $request->get('count');

        $product = Product::find($id);
        if ($product) {
            $product_item['id'] = $product->id;
            $product_item['name'] = $product->name;
            $product_item['price'] = $product->price;
            $product_item['count'] = $count;
            $product_item['url'] = $product->url;
            $product_item['active'] = true;
            $product_item['article'] = $product->article;

            $product_image = $product->images()->first();
            if ($product_image) {
                $product_item['image'] = $product_image->thumb(1, $product->catalog->slug);
            }
//            else {
//                $image = Catalog::whereId($product->catalog_id)->first()->image;
//                if ($image) {
//                    $product_item['image'] = Catalog::UPLOAD_URL . $image;
//                } else {
//                    $product_item['image'] = Product::NO_IMAGE;
//                }
//            }

            Cart::add($product_item);
        }

        $header_cart = view('blocks.header_cart')->render();

        return [
            'success' => true,
            'header_cart' => $header_cart,
        ];
    }

    public function postEditCartProduct(Request $request): array
    {
        $id = $request->get('id');
        $count = $request->get('count', 1);
        /** @var Product $product */
        $product = Product::find($id);
        if ($product) {
            $product_item['image'] = $product->showAnyImage();
            $product_item = $product->toArray();
            $product_item['count_per_tonn'] = $count;
            $product_item['url'] = $product->url;

            Cart::add($product_item);
        }

        $popup = view('blocks.cart_popup', $product_item)->render();

        return ['cart_popup' => $popup];
    }

    public function postUpdateToCart(Request $request): array
    {
        $id = $request->get('id');
        $count = $request->get('count');

        Cart::updateCount($id, $count);
        $total_count = Cart::count();
        $total_sum = Cart::sum();
        $summary = view('cart.summary', compact('total_count', 'total_sum'))
            ->render();

        return [
            'success' => true,
            'summary' => $summary
        ];
    }

    public function postRemoveFromCart(Request $request): array
    {
        $id = $request->get('id');
        Cart::deleteItem($id);
        $cart = Cart::all();

        $header_cart = view('blocks.header_cart')->render();
        $del_cart_item = view('cart.table_row_del', ['item' => $cart[$id]])->render();
        $cart_total = view('cart.cart_total')->render();

        return [
            'success' => true,
            'header_cart' => $header_cart,
            'del_cart_item' => $del_cart_item,
            'cart_total' => $cart_total
        ];
    }

    public function postRestoreFromCart(Request $request): array
    {
        $id = $request->get('id');
        Cart::restoreItem($id);
        $cart = Cart::all();

        $header_cart = view('blocks.header_cart')->render();
        $restore_cart_item = view('cart.table_row', ['item' => $cart[$id]])->render();
        $cart_total = view('cart.cart_total')->render();

        return [
            'success' => true,
            'header_cart' => $header_cart,
            'restore_cart_item' => $restore_cart_item,
            'cart_total' => $cart_total
        ];
    }

    public function postUpdateCount(Request $request): array
    {
        $id = $request->get('id');
        $count = $request->get('count');

        Cart::updateCount($id, $count);
        $cart = Cart::all();

        $row_summary = view('cart.table_row_summary', ['item' => $cart[$id]])
            ->render();

        $cart_total = view('cart.cart_total')->render();

        return [
            'success' => true,
            'row_summary' => $row_summary,
            'cart_total' => $cart_total
        ];
    }

    public function postPurgeCart(): array
    {
        Cart::purge();
        $total = view('cart.table_row_total')->render();
        $header_cart = view('blocks.header_cart')->render();
        return [
            'success' => true,
            'total' => $total,
            'header_cart' => $header_cart
        ];
    }

    //Отправить запрос = ОФОРМЛЕНИЕ ЗАКАЗА
    public function postMakeOrder(Request $request): array
    {
        $data = $request->only(['name', 'phone', 'email', 'message']);
        $file = $request->file('file');
        $details = $request->file('details');

        $valid = Validator::make(
            $data,
            [
                'email' => 'required',
            ],
            [
                'email.required' => 'Не заполнено поле email',
            ]
        );

        if ($valid->fails()) {
            return ['errors' => $valid->messages()];
        } else {
            if ($file) {
                $file_name = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path(Order::UPLOAD_URL), $file_name);
                $data['file'] = $file_name;
            }
            if ($details) {
                $file_name = md5(uniqid(rand(), true)) . '.' . $details->getClientOriginalExtension();
                copy($details, public_path(Order::UPLOAD_URL) . $file_name);
                $data['details'] = $file_name;
            }

            $order = Order::create($data);

            //обновляем покупателя
            $customer = Customer::whereEmail($data['email'])->first();
            if (!$customer) {
                $customer = Customer::create(
                    [
                        'name' => $data['name'] ,
                        'email' => $data['email'],
                        'phone' => $data['phone']
                    ]
                );
            } else {
                if ($data['name']) $customer->update(['name' => $data['name']]);
                if ($data['phone']) $customer->update(['phone' => $data['phone']]);
            }

            if ($details) {
                if ($customer->details) {
                    if (is_file(public_path(Customer::UPLOAD_URL . $customer->details))) {
                        unlink(public_path(Customer::UPLOAD_URL . $customer->details));
                    }
                }
                $file_name = md5(uniqid(rand(), true)) . '.' . $details->getClientOriginalExtension();
                $details->move(public_path(Customer::UPLOAD_URL), $file_name);
                $customer->update(['details' => $file_name]);
            }

            $items = Cart::all();

            foreach ($items as $item) {
                $order->products()->attach(
                    $item['id'],
                    [
                        'count' => $item['count'],
                        'price' => $item['price'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
            }

            $order_items = $order->products;
            $all_count = 0;
            $all_sum = 0;
            foreach ($order_items as $item) {
                $all_sum += $item->pivot->price;
                $all_count += $item->pivot->count;
            }
            $order->update(['total_sum' => $all_sum]);

            Mail::send(
                'mail.new_order_table',
                [
                    'order' => $order,
                    'items' => $order_items,
                    'all_count' => $all_count,
                    'all_sum' => $all_sum
                ],
                function ($message) use ($order) {
                    $title = $order->id . ' | Заявка | Армасети';
                    $message->from($this->fromMail, $this->fromName)
                        ->to(Settings::get('feedback_email'))
                        ->subject($title);
                }
            );

            Cart::purge();

            return ['success' => true, 'redirect' => route('order-success')];
        }
    }

    //Изготовление по чертежам
    public function postSendDrawingRequest(Request $request): array
    {
        $data = $request->only(['name', 'phone', 'text']);
        $file = $request->file('file');

        $valid = Validator::make(
            $data,
            [
                'name' => 'required',
                'phone' => 'required',
            ],
            [
                'name.required' => 'Не указано ваше имя',
                'phone.required' => 'Не указан телефон',
            ]
        );

        if ($valid->fails()) {
            return ['errors' => $valid->messages()];
        } else {
            if ($file) {
                $file_name = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path(Feedback::UPLOAD_URL), $file_name);
                $data['file'] = '<a target="_blanc" href=\'' . Feedback::UPLOAD_URL . $file_name . '\'>' . $file_name . '</a>';
            }

            $feedback_data = [
                'type' => 1,
                'data' => $data
            ];

            $feedback = Feedback::create($feedback_data);
            Mail::send(
                'mail.feedback',
                ['feedback' => $feedback],
                function ($message) use ($feedback) {
                    $title = $feedback->id . ' | Изготовление по чертежам | Novozmk';
                    $message->from($this->fromMail, $this->fromName)
                        ->to(Settings::get('feedback_email'))
                        ->subject($title);
                }
            );

            return ['success' => true, 'redirect' => route('order-success')];
        }
    }

    //Консультация
    public function postSendConsultation(Request $request): array
    {
        $data = $request->only(['name', 'phone']);
        $file = $request->file('file');

        $valid = Validator::make(
            $data,
            [
                'name' => 'required',
                'phone' => 'required',
            ],
            [
                'name.required' => 'Не указано ваше имя',
                'phone.required' => 'Не указан телефон',
            ]
        );

        if ($valid->fails()) {
            return ['errors' => $valid->messages()];
        } else {
            if ($file) {
                $file_name = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path(Feedback::UPLOAD_URL), $file_name);
                $data['file'] = '<a target="_blanc" href=\'' . Feedback::UPLOAD_URL . $file_name . '\'>' . $file_name . '</a>';
            }

            $feedback_data = [
                'type' => 2,
                'data' => $data
            ];

            $feedback = Feedback::create($feedback_data);
            Mail::send(
                'mail.feedback',
                ['feedback' => $feedback],
                function ($message) use ($feedback) {
                    $title = $feedback->id . ' | Консультация | Novozmk';
                    $message->from($this->fromMail, $this->fromName)
                        ->to(Settings::get('feedback_email'))
                        ->subject($title);
                }
            );


            return ['success' => true];
        }
    }

    //Отправить заявку
    public function postSendProductRequest(Request $request): array
    {
        $data = $request->only(['product', 'name', 'phone', 'text']);
        $file = $request->file('file');

        $valid = Validator::make(
            $data,
            [
                'product' => 'required',
                'name' => 'required',
                'phone' => 'required',
            ],
            [
                'product.required' => 'Не указан товар',
                'name.required' => 'Не указано ваше имя',
                'phone.required' => 'Не указан телефон',
            ]
        );

        if ($valid->fails()) {
            return ['errors' => $valid->messages()];
        } else {
            if ($file) {
                $file_name = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path(Feedback::UPLOAD_URL), $file_name);
                $data['file'] = '<a target="_blanc" href=\'' . Feedback::UPLOAD_URL . $file_name . '\'>' . $file_name . '</a>';
            }

            $feedback_data = [
                'type' => 3,
                'data' => $data
            ];

            $feedback = Feedback::create($feedback_data);
            Mail::send(
                'mail.feedback',
                ['feedback' => $feedback],
                function ($message) use ($feedback) {
                    $title = $feedback->id . ' | Заявка с сайта | Novozmk';
                    $message->from($this->fromMail, $this->fromName)
                        ->to(Settings::get('feedback_email'))
                        ->subject($title);
                }
            );


            return ['success' => true];
        }
    }

    //Смена города
    public function postChangeCity($id)
    {
        $current_url = request()->get('currentUrl');
        $city = City::find($id);
        $redirect = route('main');

        if($current_url !== '/') {
            $regionAlias = false;

            foreach (Page::$regionAliases as $alias) {;
                if (strpos($current_url, $alias) > 0) {
                    $regionAlias = true;
                    break;
                }
            }

            if(!$regionAlias) {
                $path = explode('/', $current_url);
                $city_aliases = City::pluck('alias')->all();

                if(in_array($path[0], $city_aliases)) {
                    if($city) {
                        $path[0] = $city->alias;
                    } else {
                        array_shift($path);
                    }
                } else {
                    if($city) {
                        array_unshift($path, $city->alias);
                    }
                }
                $url = '/' . implode('/', $path);
                $redirect = url($url);
            }
        }

        if(!$id) {
            session(['city_alias' => null]);
        } else {
            session(['city_alias' => $city->alias]);
        }

        return ['success' => true, 'redirect' => $redirect];
    }
}
