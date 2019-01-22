<div id="ExamModal" @yield('data-parent') data-parent="#accordion" class="collapse show">
        <div class="card-body" id="accordion1" @section('id', 'accordion1')>
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Soal List
                      <a data-toggle="collapse" data-target="#ExamCreate" aria-expanded="true" aria-controls="ExamCreate" class="btn btn-success pull-right modal-show" style="margin-top: -8px;"><i class="icon-plus"></i> Create</a>
                  </h3>
                </div>
                <div class="panel-body">
                    <table id="datatable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cluster</th>
                                <th>Assessor Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                              
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Cluster</th>
                              <th>Assessor Name</th>
                              <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
                    
            @push('scripts')
                <script>
                    $('#datatable').DataTable({
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('cluster.view') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'id'},
                            {data: 'cluster', name: 'cluster'},
                            {data: 'asesor_name', name: 'asesor_name'},
                            {data: 'action', name: 'action'}
                        ]
                    });
                </script>
            @endpush
        </div>
    </div>