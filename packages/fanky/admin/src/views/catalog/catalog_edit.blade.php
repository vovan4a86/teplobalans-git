@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="{{ route('admin.catalog') }}"><i class="fa fa-list"></i> Услуги</a></li>
        @foreach($catalog->getParents(false, true) as $parent)
            <li><a href="{{ route('admin.catalog.products', [$parent->id]) }}">{{ $parent->name }}</a></li>
        @endforeach
        <li class="active">{{ $catalog->id ? $catalog->name : 'Новая услуга' }}</li>

    </ol>
@stop

@section('page_name')
    <h1>Каталог
        <small>{{ $catalog->id ? $catalog->name : 'Новая услуга' }}</small>
    </h1>
@stop

<form action="{{ route('admin.catalog.catalogSave') }}" onsubmit="return catalogSave(this, event)">
    <input type="hidden" name="id" value="{{ $catalog->id }}">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="{{ isset($tab) ? '' : 'active' }}"><a href="#tab_1" data-toggle="tab">Параметры</a></li>
            <li><a href="#tab_text" data-toggle="tab">Текст</a></li>
            <li><a href="#tab_tech" data-toggle="tab">Тех.обслуживание</a></li>
            <li><a href="#tab_file" data-toggle="tab">Договор</a></li>

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
                {!! Form::groupText('announce', $catalog->announce, 'Анонс') !!}
                {!! Form::groupText('announce_footer', $catalog->announce_footer, 'Футер анонса') !!}

                <div class="catalog-image">
                    <label for="catalog-image">Изображение раздела</label>
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

                {!! Form::groupText('alias', $catalog->alias, 'Alias') !!}
                {!! Form::groupText('title', $catalog->title, 'Title') !!}
                {!! Form::groupText('keywords', $catalog->keywords, 'keywords') !!}
                {!! Form::groupText('description', $catalog->description, 'description') !!}
                {!! Form::groupText('og_title', $catalog->og_title, 'OpenGraph title') !!}
                {!! Form::groupText('og_description', $catalog->og_description, 'OpenGraph description') !!}

                {!! Form::hidden('published', 0) !!}
                {!! Form::groupCheckbox('published', 1, $catalog->published, 'Показывать услугу') !!}
                {!! Form::hidden('on_main', 0) !!}
                {!! Form::groupCheckbox('on_main', 1, $catalog->on_main, 'Показывать на главной') !!}

            </div>

            <div class="tab-pane" id="tab_text">
                {!! Form::groupTextarea('text_title', $catalog->text_title, 'Заголовок основного текста') !!}
                {!! Form::groupRichtext('text', $catalog->text, 'Основной текст') !!}
            </div>

            <div class="tab-pane" id="tab_tech">
                {!! Form::groupText('tech_title', $catalog->tech_title, 'Заголовок') !!}
                {!! Form::groupText('tech_text', $catalog->tech_text, 'Текст') !!}

                <label>Загрузить иконки карточек (50x50)</label>
                @if ($catalog->id)
                    <div class="form-group">
                        <label class="btn btn-success">
                            <input id="offer_imag_upload" type="file" multiple
                                   data-url="{{ route('admin.catalog.catalogItemsUpload', $catalog->id) }}"
                                   style="display:none;" onchange="catalogItemsUpload(this, event)">
                            Загрузить изображения
                        </label>
                    </div>

                    <div class="images_list">
                        @foreach ($catalog->items as $item)
                            @include('admin::catalog.catalog_item')
                        @endforeach
                    </div>
                @else
                    <p class="text-yellow">Сначала сохраните услугу.</p>
                @endif

                <hr>
                <label>Большая карточка</label>
                {!! Form::groupText('tech_card_title', $catalog->tech_card_title, 'Заголовок') !!}
                {!! Form::groupRichtext('tech_card_text', $catalog->tech_card_text, 'Текст') !!}
                <div class="catalog-image">
                    <label for="tech_card_image">Изображение (660x390)</label>
                    <input id="tech_card_image" type="file" name="tech_card_image"
                           accept=".png,.jpg,.jpeg" onchange="return techCardImageAttache(this, event)">
                    <div id="tech-card-block">
                        @if ($catalog->tech_card_image)
                            <img class="img-polaroid"
                                 src="{{ \Fanky\Admin\Models\Catalog::UPLOAD_URL . $catalog->tech_card_image }}"
                                 height="100"
                                 data-image="{{ \Fanky\Admin\Models\Catalog::UPLOAD_URL . $catalog->tech_card_image }}"
                                 onclick="return popupImage($(this).data('image'))" alt="image">
                            <a class="images_del"
                               href="{{ route('admin.catalog.techCardImageDelete', [$catalog->id]) }}"
                               onclick="return techCardImageDel(this)">
                                <span class="glyphicon glyphicon-trash text-red"></span>
                            </a>
                        @else
                            <p class="text-yellow">Изображение не загружено.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab_file">
                <div class="catalog-file">
                    <label for="catalog-file">Файл договора</label>
                    <input id="catalog-file" type="file" name="file"
                           accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" onchange="return catalogFileAttach(this, event)">
                    <div id="file-block">
                        @if ($catalog->file)
                            <a href="{{ \Fanky\Admin\Models\Catalog::UPLOAD_URL . $catalog->file }}"
                               target="_blank" title="Открыть в новом окне">
                                <img class="img-polaroid"
                                     src="{{ \Fanky\Admin\Models\Catalog::FILE_IMAGE }}" height="100"
                                     data-image="{{ \Fanky\Admin\Models\Catalog::FILE_IMAGE }}" alt="image">
                            </a>
                            <a class="images_del"
                               href="{{ route('admin.catalog.catalogFileDelete', [$catalog->id]) }}"
                               onclick="return catalogFileDelete(this)">
                                <span class="glyphicon glyphicon-trash text-red"></span>
                            </a>
                        @else
                            <p class="text-yellow">Изображение не загружено.</p>
                        @endif
                    </div>
                </div>
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
            var url = "{{ route('admin.catalog.catalogItemOrder') }}";
            var data = {};
            data.sorted = $('.images_list').sortable("toArray", {attribute: 'data-id'});
            sendAjax(url, data);
        },
    }).disableSelection();
</script>
