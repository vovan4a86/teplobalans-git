<table class="table">
    <tbody class="setting-items-list ui-sortable" style="">
    @foreach($catalog->items as $item)
        <tr style="">
            <td width="40" align="center" style="vertical-align:middle;">
                <span class="glyphicon glyphicon-sort handle ui-sortable-handle" style="cursor:pointer;"></span>
            </td>
            <td>
                <dl class="dl-horizontal s-dl">
                    <dt>Заголовок</dt>
                    <dd>
                        <input type="text" class="form-control"
                               name="setting[17][title][]"
                               value="{{ $item->title }}"
                               placeholder="Заголовок">
                    </dd>
                    <dt>Элементы списка</dt>
                    <dd>
                        <input type="text" class="form-control"
                               name="setting[17][subtitle][]"
                               value="{{ $item->list }}"
                               placeholder="Элементы списка">
                    </dd>
                    <dt>Изображение</dt>
                    <dd>
                        <div class="s-file-field">
                            <label class="btn btn-success btn-xs">Загрузить файл
                                <input type="file" name="setting[17][image][]"
                                       onchange="settingAttacheFile(this, event)" style="display:none;">
                            </label>
                            <input class="s-file-field-value" type="hidden"
                                   name="setting[17][image][]" value="setting_17_66d75482c7e74.jpg">
                            <div class="s-file-item">
                                <span class="images_item">
                                    <img class="img-polaroid" src="/uploads/settings/setting_17_66d75482c7e74.jpg"
                                         style="cursor:pointer;" onclick="popupImage($(this).attr('src'))">
                                    <a class="images_del" href="#" onclick="settingsFileDel(this, event)">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                </span>
                            </div>
                        </div>
                    </dd>
                </dl>
            </td>
            <td width="40" align="center" style="vertical-align:middle;">
                <a class="glyphicon glyphicon-trash" href="#" style="color:red;" title="Удалить" onclick="return settingsListItemDel(this)"></a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr style="display:none;">
        <td width="40" align="center" style="vertical-align:middle;">
            <span class="glyphicon glyphicon-sort handle" style="cursor:pointer;"></span>
        </td>
        <td>
            <dl class="dl-horizontal s-dl">
                <dt>Заголовок</dt>
                <dd>
                    <input type="text" class="form-control"
                           name="setting[17][title][]"
                           value=""
                           placeholder="Заголовок">
                </dd>
                <dt>Элементы списка</dt>
                <dd>
                    <input type="text" class="form-control"
                           name="setting[17][subtitle][]"
                           value=""
                           placeholder="Элементы списка">
                </dd>
                <dt>Изображение</dt>
                <dd>
                    <div class="s-file-field">
                        <label class="btn btn-success btn-xs">Загрузить файл
                            <input type="file" name="setting[17][image][]"
                                   onchange="catalogItemAttacheFile(this, event)" style="display:none;">
                        </label>
                        <input class="s-file-field-value" type="hidden" name="setting[17][image][]" value="setting_17_66d75482c7e74.jpg">
{{--                        <div class="s-file-item">--}}
{{--                            <span class="images_item">--}}
{{--                                <img class="img-polaroid" src=""--}}
{{--                                     style="cursor:pointer;" onclick="popupImage($(this).attr('src'))">--}}
{{--                                <a class="images_del" href="#" onclick="settingsFileDel(this, event)">--}}
{{--                                    <span class="glyphicon glyphicon-trash"></span></a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
                    </div>
                </dd>
            </dl>
        </td>
        <td width="40" align="center" style="vertical-align:middle;">
            <a class="glyphicon glyphicon-trash" href="#" style="color:red;"
               title="Удалить" onclick="return settingsListItemDel(this)"></a>
        </td>
    </tr>
    <tr>
        <td colspan="3"><a class="btn-link" href="#" onclick="return addCatalogItem(this)">Добавить</a></td>
    </tr>
    </tfoot>
</table>