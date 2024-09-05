<div class="box box-solid">
    <div class="box-header"><h3 class="box-title">Категории</h3></div>
    <div class="box-body">
        <form action="{{ route('admin.prices') }}" method="get">
            <div class="form-horizontal">
                <div class="input-group">
                    <select name="id" onchange="this.form.submit()" class="form-control">
                        @foreach ($sections as $item)
                            <option value="{{ $item->id }}"
                                    {!! Request::get('id') == $item->id? 'selected': '' !!}
                            >{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="box-footer">
        <form action="{{ route('admin.prices.save') }}" class="js-create" onsubmit="return sectionCreate(this)" style="display:none;">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="name" value="" placeholder="Название раздела...">
                <span class="input-group-btn">
                    <button class="btn btn-success btn-flat" type="submit">Создать</button>
                </span>
            </div>
        </form>
        <a href="#" onclick="return sectionCreateShow(this)" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"> создать раздел</i></a>
        @if(Request::get('id') > 0)
            <form action="{{ route('admin.prices.save') }}" class="js-edit"  onsubmit="return sectionSave(this)" style="display:none;">
                <input type="hidden" name="id" value="{{ $section->id }}">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="name"
                           value="{{ $section->name }}" placeholder="Название группы...">
                    <spaWn class="input-group-btn">
                        <button class="btn btn-success btn-flat" type="submit">
                            <span class="glyphicon glyphicon-ok"></span></button>
                    </spaWn>
                </div>
            </form>
            <a href="#" onclick="return sectionEdit(this)" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"> редактировать раздел</i></a>
            <a href="#" data-url="{{ route('admin.prices.del', [$section->id]) }}"
               onclick="return sectionDelete(this)"  class="btn btn-sm btn-danger">
                <i class="fa fa-trash-o"></i> Удалить раздел</a>
        @endif
    </div>
</div>