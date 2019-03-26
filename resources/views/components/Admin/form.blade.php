{!! Form::model($model, [
    'route' =>'cluster.store',
    'method' => 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Cluster Name</label>
        {!! Form::text('cluster', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Location</label>
        {!! Form::text('lokasi', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Assessor Name</label>
        {!! Form::text('asesor_name', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
    </div>

{!! Form::close() !!}