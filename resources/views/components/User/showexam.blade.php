<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Exam List</h3>
    </div>
    <div class="panel-body">
        @for ($i = 0; $i < count($model); $i++)            
        <form action="/jawaban/store/{{$model[$i]->cluster_id}}" method="post" enctype="multipart/form-data"> 
        @csrf
            <table id="datatable" style="width:100%">
            <tbody>           
                <tr>{{$i+1}}. </tr>
                <tr>{{$model[$i]->soal}}</tr>
                <ol type="A" style="">
                    <li> {{$model[$i]->A}}</li>
                    <li> {{$model[$i]->B}}</li>
                    <li> {{$model[$i]->C}}</li>
                    <li> {{$model[$i]->D}}</li>
                    <li> {{$model[$i]->E}}</li>
                </ol>
            <input list="browsers" name="jawaban[{{$model[$i]->id}}]" autocomplete="off">
            <datalist id="browsers">
                <option value="A">
                <option value="B">
                <option value="C">
                <option value="D">
                <option value="E">
            </datalist>
            @endfor
                <br>
                <br>
                <button type="submit" class="btn btn-primary text-right" id="modal-btn-save-jwb">Done</button>
        </form>
        </tbody>
        </table>
    </div>
</div>