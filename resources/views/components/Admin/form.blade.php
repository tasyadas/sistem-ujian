{!! Form::model($model, [
    'route' => $model->exists ? ['cluster.update', $model->id] : 'cluster.store',
    'method' => $model->exists ? 'POST' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Cluster</label>
        {!! Form::text('cluster', null, ['class' => 'form-control', 'id' => 'cluster']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Location</label>
        {!! Form::text('lokasi', null, ['class' => 'form-control', 'id' => 'lokasi']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Assessor Name</label>
        {!! Form::text('asesor_name', null, ['class' => 'form-control', 'id' => 'asesor_name']) !!}
    </div>

{!! Form::close() !!}