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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialise DataTable only once
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

    // Delete handler
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete this project?')) {
            $.ajax({
                url: "{{ url('projects') }}/" + id,   // RESTful destroy route
                type: 'DELETE',
                data: {_token: $('meta[name="csrf-token"]').attr('content')},
                success: function(response) {
                    if (response.success) {
                        table.ajax.reload(null, false); // reload without resetting pagination
                        toastr.success(response.success);
                    } else {
                        toastr.error(response.message ?? 'Something went wrong.');
                    }
                },
                error: function(xhr) {
                    var errorMessage = 'Failed to delete project.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    toastr.error(errorMessage);
                }
            });
        }
    });
});
</script>
@endpush
