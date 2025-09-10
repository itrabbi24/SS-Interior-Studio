@extends('admin-panel.shared.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Projects</h4>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="projects-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Client</th>
                                <th>Project Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    var table = $('#projects-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('projects.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'category_name', name: 'category.name'},
            {data: 'client', name: 'client'},
            {data: 'project_date', name: 'project_date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure want to delete this project?')) {
            $.ajax({
                url: "{{ route('projects.index') }}/" + id,
                type: 'DELETE',
                success: function(response) {
                    table.ajax.reload();
                    toastr.success(response.success);
                },
                error: function() { toastr.error('Failed to delete project.'); }
            });
        }
    });
});
</script>
@endpush