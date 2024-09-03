@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="{{ route('admin.catalog') }}"><i class="fa fa-list"></i> Каталог</a></li>
        @foreach($catalog->getParents(false, true) as $parent)
            <li><a href="{{ route('admin.catalog.products', [$parent->id]) }}">{{ $parent->name }}</a></li>
        @endforeach
        <li class="active">{{ $catalog->id ? $catalog->name : 'Новый раздел' }}</li>

    </ol>
@stop

@section('page_name')
    <h1>Каталог
        <small>{{ $catalog->id ? $catalog->name : 'Новый раздел' }}</small>
    </h1>
@stop

<form action="{{ route('admin.catalog.catalogSave') }}" onsubmit="return catalogSave(this, event)">
    <input type="hidden" name="id" value="{{ $catalog->id }}">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="{{ isset($tab) ? '' : 'active' }}"><a href="#tab_1" data-toggle="tab">Параметры</a></li>
            <li><a href="#tab_2" data-toggle="tab">Тексты</a></li>
            <li><a href="#tab_gallery" data-toggle="tab">Изображения</a></li>

            @if($catalog->id)
                <li class="pull-right">
                    <a href="{{ $catalog->url }}" target="_blank">Посмотреть</a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane {{ isset($tab) ? '' : 'active' }}" id="tab_1">

                {!! Form::groupText('name', $catalog->name, 'Название') !!}
                {!! Form::groupText('h1', $catalog->h1, 'H1') !!}
                {!! Form::groupText('alias', $catalog->alias, 'Alias') !!}
                {!! Form::groupSelect('parent_id', ['0' => '---корень---'] + $catalogs->pluck('name', 'id')->all(),
                    $catalog->parent_id, 'Родительский раздел') !!}
                {!! Form::groupText('title', $catalog->title, 'Title') !!}
                {!! Form::groupText('keywords', $catalog->keywords, 'keywords') !!}
                {!! Form::groupText('description', $catalog->description, 'description') !!}
                {!! Form::groupText('og_title', $catalog->og_title, 'OpenGraph title') !!}
                {!! Form::groupText('og_description', $catalog->og_description, 'OpenGraph description') !!}

                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <span class="box-title">Шаблон автооптимизации для товаров (см. Настройки)</span>
                    </div>
                    <div class="box-body">
                        {!! Form::groupText('product_title_template', $catalog->product_title_template, 'Шаблон title:  '.$catalog->getDefaultTitleTemplate()) !!}
                        {!! Form::groupText('product_description_template', $catalog->product_description_template, 'Шаблон description: '.$catalog->getDefaultDescriptionTemplate()) !!}

                        {!! Form::groupRichtext('product_announce_template', $catalog->product_announce_template, 'Шаблон анонса') !!}
                        {!! Form::groupRichtext('product_text_template', $catalog->product_text_template, 'Шаблон текста') !!}
                    </div>
                    <div class="box-footer">
                        Коды замены:
                        <ul>
                            <li>{name} - название товара</li>
                            <li>{h1} - H1 товара</li>
                            <li>{lower_name} - название товара в нижнем регистре</li>
                            <li>{price} - поле товара - Цена</li>
                        </ul>
                    </div>
                </div>

                {!! Form::hidden('published', 0) !!}
                {!! Form::groupCheckbox('published', 1, $catalog->published, 'Показывать раздел') !!}
                @if ($catalog->parent_id == 0)
                    {!! Form::hidden('on_main', 0) !!}
                    {!! Form::groupCheckbox('on_main', 1, $catalog->on_main, 'Показывать на главной странице') !!}
                @endif

                <div class="row">
                    <div class="form-group col-xs-6" style="display: flex; column-gap: 30px;">
                        <div class="catalog-image">
                            <label for="catalog-image">Изображение раздела {{ $catalog->parent_id == 1 ? '(424x670)' : null }}</label>
                            <input id="catalog-image" type="file" name="image"
                                   accept=".png,.jpg,.jpeg"
                                   onchange="return catalogImageAttache(this, event)">
                            <div id="catalog-image-block">
                                @if ($catalog->image)
                                    <img class="img-polaroid"
                                         src="{{ $catalog->thumb(1) }}" height="100"
                                         data-image="{{ $catalog->image_src }}"
                                         onclick="return popupImage($(this).data('image'))" alt="">
                                    <a class="images_del"
                                       href="{{ route('admin.catalog.catalogImageDel', [$catalog->id]) }}"
                                       onclick="return catalogImageDel(this)">
                                        <span class="glyphicon glyphicon-trash text-red"></span>
                                    </a>
                                @else
                                    <p class="text-yellow">Изображение не загружено.</p>
                                @endif
                            </div>
                        </div>
                    </div>

{{--                    пока не нужно--}}
{{--                    <div class="form-group col-xs-6" style="display: flex; column-gap: 30px;">--}}
{{--                        <div class="catalog-icon">--}}
{{--                            <label for="catalog-icon">Иконка меню svg (32x32)</label>--}}
{{--                            <input id="catalog-icon" type="file" name="icon"--}}
{{--                                   accept=".svg"--}}
{{--                                   onchange="return catalogIconAttache(this, event)">--}}
{{--                            <div id="catalog-icon-block">--}}
{{--                                @if ($catalog->icon)--}}
{{--                                    <img class="img-polaroid"--}}
{{--                                         src="{{ $catalog->icon_src }}" width="50"--}}
{{--                                         data-image="{{ $catalog->icon_src }}"--}}
{{--                                         onclick="return popupImage($(this).data('image'))" alt="icon">--}}
{{--                                    <a class="images_del"--}}
{{--                                       href="{{ route('admin.catalog.catalogIconDel', [$catalog->id]) }}"--}}
{{--                                       onclick="return catalogIconDel(this)">--}}
{{--                                        <span class="glyphicon glyphicon-trash text-red"></span>--}}
{{--                                    </a>--}}
{{--                                @else--}}
{{--                                    <p class="text-yellow">Иконка не загружена.</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="tab-pane" id="tab_2">
                {!! Form::groupRichtext('text', $catalog->text, 'Основной текст') !!}
            </div>

            <div class="tab-pane" id="tab_gallery">
                @if ($catalog->id)
                    <div class="form-group">
                        <label class="btn btn-success">
                            <input id="offer_imag_upload" type="file" multiple
                                   data-url="{{ route('admin.catalog.catalogGalleryImageUpload', $catalog->id) }}"
                                   style="display:none;" onchange="catalogGalleryImageUpload(this, event)">
                            Загрузить изображения
                        </label>
                    </div>

                    <div class="images_list">
                        @foreach ($catalog->images as $image)
                            @include('admin::catalog.catalog_gallery_image', ['image' => $image])
                        @endforeach
                    </div>
                @else
                    <p class="text-yellow">Изображения можно будет загрузить после сохранения товара!</p>
                @endif
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(".images_list").sortable({
        update: function (event, ui) {
            var url = "{{ route('admin.catalog.catalogGalleryImageOrder') }}";
            var data = {};
            data.sorted = $('.images_list').sortable("toArray", {attribute: 'data-id'});
            sendAjax(url, data);
        },
    }).disableSelection();
</script>
