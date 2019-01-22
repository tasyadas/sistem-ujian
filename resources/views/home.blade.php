@if(Auth::guard('web')->check())
    
    @extends('layouts.master')

    @section('title','Home')

    @section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Cluster List</h3>
        </div>
        <div class="panel-body">
            <table id="datatable" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cluster</th>
                        <th>Location</th>
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
                    <th>Location</th>
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
                ajax: "{{ route('user.cluster.view') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'cluster', name: 'cluster'},
                    {data: 'lokasi', name: 'lokasi'},
                    {data: 'asesor_name', name: 'asesor_name'},
                    {data: 'action', name: 'action'}
                ]
            });
        </script>
    @endpush
    @endsection
@endif