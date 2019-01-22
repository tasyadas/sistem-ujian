<form action="/cluster/soal/store/{{$model->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Cluster</span>
        </div>
    <input type="text" class="form-control" name="cluster" autocomplete="off" value="{{$model->cluster}}">
    </div>
    <div class="input-group mb-3">
        <label>File .xlsx</label>
        <input type="file" class="form-control-file" id="file" name="files">
    </div>
    <button type="submit" class="btn btn-primary text-right">Import</button>
</form>