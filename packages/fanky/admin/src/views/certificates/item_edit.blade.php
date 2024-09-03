<form action="{{ route('admin.certificates.imageDataSave', [$item->id]) }}"
      onsubmit="certificateDataSave(this, event)" style="width:600px;">
    <label for="gallery-doc">Название</label>
    <input id="gallery-doc" class="form-control" type="text" name="name" value="{{ $item->name }}">
    <button class="btn btn-primary" style="margin-top: 20px;" type="submit">Сохранить</button>
</form>
