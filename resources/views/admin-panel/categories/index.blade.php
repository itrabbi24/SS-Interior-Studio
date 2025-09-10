@extends('admin-panel.shared.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Categories</h4>
                    <button id="addCategoryBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        Add Category
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="categoryTableBody">
                            @foreach($categories as $category)
                                <tr id="row-{{ $category->id }}">
                                    <td>{{ $category->id }}</td>
                                    <td class="cat-name">{{ $category->name }}</td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-info edit-btn"
                                            data-id="{{ $category->id }}"
                                            data-name="{{ e($category->name) }}"
                                        >Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $category->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm">
                @csrf
                <input type="hidden" name="id" id="category_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="name" required>
                        <span class="text-danger" id="nameError"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveCategoryBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



@push('scripts')
<script>
$(function () {
    var categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));

    // Open "Add" Modal
    $('#addCategoryBtn').click(function () {
        $('#categoryForm')[0].reset();
        $('#category_id').val('');
        $('#nameError').text('');
        $('#categoryModalLabel').text('Add Category');
    });

    // Open "Edit" Modal
    $(document).on('click', '.edit-btn', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');

        $('#category_id').val(id);
        $('#category_name').val(name);
        $('#nameError').text('');
        $('#categoryModalLabel').text('Edit Category');
        categoryModal.show();
    });

    // Save Category (Add / Update)
    $('#categoryForm').submit(function (e) {
        e.preventDefault();
        var id = $('#category_id').val();
        var url = id ? "{{ url('categories') }}/" + id : "{{ route('categories.store') }}";
        var method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: $(this).serialize(),
            success: function (res) {
                var name = $('#category_name').val();
                if (id) {
                    // Update existing row
                    $('#row-' + id + ' .cat-name').text(name);
                    $('#row-' + id + ' .edit-btn').data('name', name);
                    toastr.success('Category updated successfully!');
                } else {
                    // Append new row
                    var newId = res.id || Date.now(); // use backend ID if returned
                    var newRow = `<tr id="row-${newId}">
                                    <td>${newId}</td>
                                    <td class="cat-name">${$('<div>').text(name).html()}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info edit-btn" data-id="${newId}" data-name="${$('<div>').text(name).html()}">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-id="${newId}">Delete</button>
                                    </td>
                                </tr>`;
                    $('#categoryTableBody').prepend(newRow);
                    toastr.success('Category created successfully!');
                }
                categoryModal.hide();

                // Reload page after 3 seconds
                setTimeout(() => { location.reload(); }, 3000);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $('#nameError').text(errors.name ? errors.name[0] : '');
                } else {
                    toastr.error('Something went wrong.');
                }
            }
        });
    });

    // Delete Category with SweetAlert2 confirmation
    $(document).on('click', '.delete-btn', function () {
        var id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete the category!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('categories') }}/" + id,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function () {
                        $('#row-' + id).remove();
                        toastr.success('Category deleted successfully!');
                        // Reload page after 3 seconds
                        setTimeout(() => { location.reload(); }, 3000);
                    },
                    error: function () {
                        toastr.error('Failed to delete category.');
                    }
                });
            }
        });
    });
});
</script>
@endpush
