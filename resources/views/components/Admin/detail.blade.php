<table class="table table-hover">
    <tr>
        <th>Cluster</th>
        <th>Assessor Name</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    <tr>
        <td>{{ $model->cluster }}</td>
        <td>{{ $model->asesor_name }}</td>
        <td>{{ $model->created_at }}</td>
        <td>{{ $model->updated_at }}</td>
    </tr>
</table>