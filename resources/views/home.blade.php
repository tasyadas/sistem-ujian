@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">                
                    @component('components.User.main')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
