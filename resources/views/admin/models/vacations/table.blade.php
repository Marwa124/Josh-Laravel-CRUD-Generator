<table class="table table-bordered table-hover" id="vacations-table">
    <thead class="thead-light">
     <tr>
        <th>Name</th>
        <th>Item</th>
        <th>X</th>
        <th>Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($vacations as $vacation)
        <tr>
            <td>{!! $vacation->name !!}</td>
            <td>{!! $vacation->item !!}</td>
            <td>{!! $vacation->x !!}</td>
            <td>
                 <a href="{{ route('admin.models.vacations.show', $vacation->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view vacation"></i>
                 </a>
                 <a href="{{ route('admin.models.vacations.edit', $vacation->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit vacation"></i>
                 </a>
                 <a href="{{ route('admin.models.vacations.confirm-delete', $vacation->id) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete vacation"></i>
                 </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@section('footer_scripts')
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
@stop
