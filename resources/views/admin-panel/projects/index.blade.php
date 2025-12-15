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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="projects-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Client</th>
                                    <th>Project Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTables will populate this automatically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#projects-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('projects.index') }}",
            type: 'GET',
            error: function(xhr, error, thrown) {
                console.error('DataTables error:', error);
                console.error('Response:', xhr.responseText);
                toastr.error('Failed to load projects data.');
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'category_name', name: 'category_name', orderable: false},
            {data: 'client', name: 'client'},
            {
                data: 'project_date', 
                name: 'project_date',
                render: function(data) {
                    if (typeof moment === 'function' && data) {
                        return moment(data).format('DD/MM/YYYY');
                    }
                    return data ? data.split(' ')[0] : '-';
                }
            },
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false,
                className: 'text-center'
            },
        ],
        order: [[0, 'desc']],
        language: {
            emptyTable: "No projects found",
            info: "Showing _START_ to _END_ of _TOTAL_ projects",
            infoEmpty: "Showing 0 to 0 of 0 projects",
            infoFiltered: "(filtered from _MAX_ total projects)",
            lengthMenu: "Show _MENU_ projects",
            loadingRecords: "Loading...",
            processing: '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> Processing...',
            search: "Search:",
            zeroRecords: "No matching projects found"
        }
    });

    // Delete handler
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var deleteUrl = "{{ route('projects.destroy', ':id') }}".replace(':id', id);

        if (confirm('Are you sure you want to delete this project? This action cannot be undone.')) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        table.draw(false);
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message || 'Something went wrong.');
                    }
                },
                error: function(xhr, status, error) {
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
