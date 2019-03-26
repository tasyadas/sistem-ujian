{!! Form::model($model, [
    'route' => $model->exists ? ['cluster.soal.store', $model->id] : 'cluster.soal.create',
    'method' => $model->exists ? 'POST' : 'GET',
    'files' => true
]) !!}
    <div class="form-group">
        <label for="" class="control-label">Cluster</label>
        {!! Form::text('cluster', null, ['class' => 'form-control', 'id' => 'cluster']) !!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">File .xlsx</label>
        {!! Form::file('files', ['id' => 'files']) !!}
    </div>
    {{-- {!! Form::submit('Import',['class' => 'btn btn-primary', 'id' => 'btn-save-import']) !!} --}}
{!! Form::close() !!}