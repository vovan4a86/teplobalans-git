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
    private $fromMail = 'info@teplobalans.ru';
    private $fromName = 'Теплобаланс';

    //Вопрос специалисту
    public function postSendRequest(Request $request): array
    {
        $data = $request->only(['name', 'phone', 'text']);

        $valid = Validator::make(
            $data,
            [
                'name' => 'required',
                'phone' => 'required',
                'text' => 'required',
            ],
            [
                'name.required' => 'Не указано ваше имя',
                'phone.required' => 'Не указан телефон',
                'text.required' => 'Не указан текст',
            ]
        );

        if ($valid->fails()) {
            return ['errors' => $valid->messages()];
        } else {
            $feedback_data = [
                'type' => 1,
                'data' => $data
            ];

            $feedback = Feedback::create($feedback_data);
            Mail::send(
                'mail.feedback',
                ['feedback' => $feedback],
                function ($message) use ($feedback) {
                    $title = $feedback->id . ' | Заявка с сайта | Теплобаланс';
                    $message->from($this->fromMail, $this->fromName)
                        ->to(Settings::get('feedback_email'))
                        ->subject($title);
                }
            );


            return ['success' => true];
        }
    }

    //Интересная вакансия?
    public function postSendVacancy(Request $request): array
    {
        $data = $request->only(['job', 'name', 'phone', 'text']);
        $file = $request->file('file');

        $valid = Validator::make(
            $data,
            [
                'name' => 'required',
                'phone' => 'required',
                'text' => 'required'
            ],
            [
                'name.required' => 'Не указано ваше имя',
                'phone.required' => 'Не указан телефон',
                'text.required' => 'Не указан телефон'
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
                    $title = $feedback->id . ' | Интересная вакансия? | Теплобаланс';
                    $message->from($this->fromMail, $this->fromName)
                        ->to(Settings::get('feedback_email'))
                        ->subject($title);
                }
            );


            return ['success' => true];
        }
    }

    //Расскажите о проекте
    public function postSendProject(Request $request): array
    {
        $data = $request->only(['name', 'phone', 'text']);
        $file = $request->file('file');

        $valid = Validator::make(
            $data,
            [
                'name' => 'required',
                'phone' => 'required',
                'text' => 'required'
            ],
            [
                'name.required' => 'Не указано ваше имя',
                'phone.required' => 'Не указан телефон',
                'text.required' => 'Не указан телефон'
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
                    $title = $feedback->id . ' | Расскажите о проекте | Теплобаланс';
                    $message->from($this->fromMail, $this->fromName)
                        ->to(Settings::get('feedback_email'))
                        ->subject($title);
                }
            );


            return ['success' => true];
        }
    }
}
