@extends('admin-panel.shared.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Blogs</h4>
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Blog</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="blogs-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Publish Date</th>
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

    var table = $('#blogs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('blogs.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false},
            {data: 'title', name: 'title'},
            {data: 'category_name', name: 'category.name'},
            {data: 'status', name: 'is_published', orderable: false, searchable: false},
            {data: 'publish_date', name: 'publish_date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure want to delete this blog?')) {
            $.ajax({
                url: "{{ route('blogs.index') }}/" + id,
                type: 'DELETE',
                success: function(response) {
                    table.ajax.reload();
                    toastr.success(response.success);
                },
                error: function() { toastr.error('Failed to delete blog.'); }
            });
        }
    });

    $(document).on('click', '.toggle-publish', function() {
        var id = $(this).data('id');
        $.post("{{ url('blogs') }}/" + id + "/toggle-publish", function(response) {
            table.ajax.reload();
            toastr.success(response.success);
        }).fail(function() { toastr.error('Failed to update blog status.'); });
    });
});
</script>
@endpush
