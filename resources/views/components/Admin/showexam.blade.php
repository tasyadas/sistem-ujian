@extends('layouts.master')

@section('title','admin')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h3 class="panel-title">Exam List</h3>
        </div>
        <div class="panel-body">
            <table id="datatable" style="width:100%">
                <tbody>
                    @for ($i = 0; $i < count($model); $i++)
                        <tr>{{$model->soal}}</tr>
                        <li>{{$model->A}}</li>
                        <li>{{$model->B}}</li>
                        <li>{{$model->C}}</li>
                        <li>{{$model->D}}</li>
                        <li>{{$model->E}}</li>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>    
@endsection