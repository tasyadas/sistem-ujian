<div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title">Exam List</h3>
    </div>
    <div class="panel-body">
        <table id="datatable" style="width:100%">
            <tbody>
                @for ($i = 0; $i < count($model); $i++)
                    <tr>{{$i+1}}. </tr>
                    <tr>{{$model[$i]->soal}}</tr>
                    <ul>
                        <li type="radio">{{$model[$i]->A}}</li>
                        <li>{{$model[$i]->B}}</li>
                        <li>{{$model[$i]->C}}</li>
                        <li>{{$model[$i]->D}}</li>
                        <li>{{$model[$i]->E}}</li>
                    </ul>
                    {{-- <a href="{{ $url_edit }}" class="modal-show edit" title="Edit {{ $model->cluster }}"><i class="icon-pencil text-inverse"></i></a> | Edit --}}
                @endfor
            </tbody>
        </table>
    </div>
</div>