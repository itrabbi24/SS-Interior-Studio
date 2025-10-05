@extends('admin-panel.shared.layout')

@section('title', 'Team Management - SS Interior')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Team Management</h4>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-info" id="toggleView">
                            <i class="fas fa-sitemap me-1"></i> Switch to Hierarchy View
                        </button>
                        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Add Team Member
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-3 col-6">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center p-3">
                                    <h4 class="mb-1">{{ $teams->count() }}</h4>
                                    <small>Total Members</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center p-3">
                                    <h4 class="mb-1">{{ $teams->where('is_active', true)->count() }}</h4>
                                    <small>Active</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card bg-warning text-white">
                                <div class="card-body text-center p-3">
                                    <h4 class="mb-1">{{ $teams->where('is_active', false)->count() }}</h4>
                                    <small>Inactive</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center p-3">
                                    <h4 class="mb-1">{{ count($positionLevels) }}</h4>
                                    <small>Position Levels</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table View -->
                    <div id="tableView">
                        <div class="table-responsive">
                            <table class="table table-hover" id="teamTable">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50">Order</th>
                                        <th width="80">Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Position Level</th>
                                        <th width="100">Status</th>
                                        <th width="120">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    @foreach($teams as $member)
                                        <tr data-id="{{ $member->id }}" class="{{ $member->is_active ? '' : 'table-warning' }}">
                                            <td>
                                                <div class="drag-handle" style="cursor: move;" title="Drag to reorder">
                                                    <i class="fas fa-bars text-muted"></i>
                                                    <span class="ms-2 badge bg-secondary">{{ $member->order }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                @if($member->image)
                                                    <img src="{{ asset('public/images/' . $member->image) }}" 
                                                         alt="{{ $member->name }}" 
                                                         class="rounded-circle border" 
                                                         width="50" 
                                                         height="50" 
                                                         style="object-fit: cover;">
                                                @else
                                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                                         style="width: 50px; height: 50px;">
                                                        <i class="fas fa-user text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <strong class="d-block">{{ $member->name }}</strong>
                                                    @if($member->qualifications)
                                                        @php
                                                            // Handle both array and JSON string
                                                            $qualifications = is_array($member->qualifications) 
                                                                ? $member->qualifications 
                                                                : json_decode($member->qualifications, true);
                                                        @endphp
                                                        @if(is_array($qualifications) && count($qualifications) > 0)
                                                            <small class="text-muted">
                                                                {{ implode(', ', array_slice($qualifications, 0, 2)) }}
                                                            </small>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $member->designation }}</td>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ $positionLevels[$member->position_level] ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" 
                                                           class="form-check-input status-toggle" 
                                                           data-id="{{ $member->id }}"
                                                           data-url="{{ route('admin.team.toggle-status', $member->id) }}"
                                                           {{ $member->is_active ? 'checked' : '' }}>
                                                    <label class="form-check-label small">
                                                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('admin.team.edit', $member->id) }}" 
                                                       class="btn btn-outline-primary" 
                                                       title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" 
                                                            class="btn btn-outline-danger delete-member" 
                                                            data-id="{{ $member->id }}"
                                                            data-name="{{ $member->name }}"
                                                            data-url="{{ route('admin.team.destroy', $member->id) }}"
                                                            title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Hierarchy View -->
                    <div id="hierarchyView" style="display: none;">
                        <div class="team-hierarchy-admin">
                            @foreach($positionLevels as $levelKey => $levelTitle)
                                @php
                                    $levelMembers = $teams->where('position_level', $levelKey)->where('is_active', true)->sortBy('order');
                                @endphp
                                @if($levelMembers->count() > 0)
                                    <div class="team-level-admin mb-5">
                                        <div class="level-header-admin">
                                            <h4 class="level-title-admin">
                                                <i class="fas fa-layer-group me-2"></i>
                                                {{ $levelTitle }}
                                                <span class="badge bg-primary ms-2">
                                                    {{ $levelMembers->count() }}
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="level-members-admin" data-level="{{ $levelKey }}">
                                            @foreach($levelMembers as $member)
                                                <div class="team-member-admin" data-id="{{ $member->id }}">
                                                    <div class="member-card-admin">
                                                        <div class="member-image-admin">
                                                            @if($member->image)
                                                                <img src="{{ asset('public/images/' . $member->image) }}" 
                                                                     alt="{{ $member->name }}">
                                                            @else
                                                                <div class="no-image-admin">
                                                                    <i class="fas fa-user"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="member-info-admin">
                                                            <h6 class="member-name-admin">{{ $member->name }}</h6>
                                                            <p class="member-designation-admin">{{ $member->designation }}</p>
                                                            @if($member->qualifications)
                                                                @php
                                                                    // Handle both array and JSON string
                                                                    $qualifications = is_array($member->qualifications) 
                                                                        ? $member->qualifications 
                                                                        : json_decode($member->qualifications, true);
                                                                @endphp
                                                                @if(is_array($qualifications) && count($qualifications) > 0)
                                                                    <div class="member-qualifications-admin">
                                                                        @foreach(array_slice($qualifications, 0, 2) as $qualification)
                                                                            <span class="qualification-badge">{{ $qualification }}</span>
                                                                        @endforeach
                                                                        @if(count($qualifications) > 2)
                                                                            <span class="qualification-badge">+{{ count($qualifications) - 2 }} more</span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="member-actions-admin">
                                                            <span class="order-badge">{{ $member->order }}</span>
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.team.edit', $member->id) }}" 
                                                                   class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="deleteMemberName"></strong>?</p>
                <p class="text-danger">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
/* Table View Styles */
.drag-handle:hover { color: #bb9a65; cursor: grab; }
.drag-handle:active { cursor: grabbing; }
.table tbody tr { cursor: move; transition: all 0.2s ease; }
.table tbody tr:hover { background-color: #f8f9fa; }
.table tbody tr.sortable-ghost { opacity: 0.4; background-color: #e9ecef; }
.badge { font-size: 0.7em; }
.table-warning { background-color: rgba(255,193,7,0.05); }

/* Hierarchy View Styles */
.team-hierarchy-admin { margin: 20px 0; }
.team-level-admin { border: 1px solid #e9ecef; border-radius: 10px; overflow: hidden; }
.level-header-admin { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 15px 20px; }
.level-title-admin { color: white; margin: 0; font-size: 1.2rem; display: flex; align-items: center; }
.level-members-admin { 
    display: grid; 
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
    gap: 15px; 
    padding: 20px;
    min-height: 100px;
}
.team-member-admin { transition: all 0.3s ease; }
.member-card-admin {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
    transition: all 0.3s ease;
    cursor: move;
}
.member-card-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-color: #bb9a65;
}
.member-image-admin {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
    border: 2px solid #e9ecef;
}
.member-image-admin img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.no-image-admin {
    width: 100%;
    height: 100%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
}
.member-info-admin { flex: 1; }
.member-name-admin { 
    margin: 0 0 5px 0; 
    font-weight: 600;
    color: #333;
}
.member-designation-admin {
    margin: 0 0 8px 0;
    color: #bb9a65;
    font-weight: 500;
    font-size: 0.9rem;
}
.member-qualifications-admin {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
}
.qualification-badge {
    background: #f8f9fa;
    color: #6c757d;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.75rem;
    border: 1px solid #e9ecef;
}
.member-actions-admin {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}
.order-badge {
    background: #6c757d;
    color: white;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Sortable Styles */
.level-members-admin.sortable-ghost { background-color: #f8f9fa; }
.team-member-admin.sortable-ghost { opacity: 0.4; }
.team-member-admin.sortable-chosen { transform: rotate(5deg); }

/* Responsive */
@media (max-width: 768px) {
    .level-members-admin { grid-template-columns: 1fr; }
    .member-card-admin { flex-direction: column; text-align: center; }
    .member-actions-admin { flex-direction: row; justify-content: center; }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
$(document).ready(function() {
    let currentView = 'table';
    
    // Toggle between table and hierarchy view
    $('#toggleView').click(function() {
        if (currentView === 'table') {
            $('#tableView').hide();
            $('#hierarchyView').show();
            $(this).html('<i class="fas fa-table me-1"></i> Switch to Table View');
            currentView = 'hierarchy';
            initializeHierarchySortable();
        } else {
            $('#hierarchyView').hide();
            $('#tableView').show();
            $(this).html('<i class="fas fa-sitemap me-1"></i> Switch to Hierarchy View');
            currentView = 'table';
        }
    });

    // Initialize table sortable
    const tableSortable = new Sortable(document.getElementById('sortable'), {
        handle: '.drag-handle',
        ghostClass: 'sortable-ghost',
        animation: 150,
        onEnd: function(evt) {
            updateOrder('table');
        }
    });

    // Initialize hierarchy sortable
    function initializeHierarchySortable() {
        document.querySelectorAll('.level-members-admin').forEach(container => {
            new Sortable(container, {
                group: 'hierarchy',
                animation: 150,
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                onEnd: function(evt) {
                    updateOrder('hierarchy');
                    
                    // If moved to different level, update position level
                    const memberId = evt.item.dataset.id;
                    const newLevel = evt.to.dataset.level;
                    const oldLevel = evt.from.dataset.level;
                    
                    if (newLevel !== oldLevel) {
                        updateMemberLevel(memberId, newLevel);
                    }
                }
            });
        });
    }

    // Update order function
    function updateOrder(viewType) {
        let items = [];
        
        if (viewType === 'table') {
            $('#sortable tr').each(function(index) {
                items.push({
                    id: $(this).data('id'),
                    position: index + 1
                });
            });
        } else {
            // For hierarchy view, update order within each level
            document.querySelectorAll('.level-members-admin').forEach(container => {
                const level = container.dataset.level;
                container.querySelectorAll('.team-member-admin').forEach((item, index) => {
                    items.push({
                        id: item.dataset.id,
                        position: index + 1,
                        position_level: level
                    });
                });
            });
        }

        $.ajax({
            url: "{{ route('admin.team.reorder') }}",
            type: 'POST',
            data: { 
                order: items, 
                _token: '{{ csrf_token() }}',
                view_type: viewType
            },
            success: function(response) {
                if (response.success) {
                    // Update order numbers
                    if (viewType === 'table') {
                        $('#sortable tr').each(function(index) {
                            $(this).find('.drag-handle .badge').text(index + 1);
                        });
                    } else {
                        document.querySelectorAll('.level-members-admin').forEach(container => {
                            container.querySelectorAll('.team-member-admin').forEach((item, index) => {
                                item.querySelector('.order-badge').textContent = index + 1;
                            });
                        });
                    }
                    toastr.success('Order updated successfully');
                }
            },
            error: function() {
                toastr.error('Error updating order');
                location.reload();
            }
        });
    }

    // Update member level
function updateMemberLevel(memberId, newLevel) {
    $.ajax({
        url: "{{ url('admin/team') }}/" + memberId + "/update-level",
        type: 'POST',
        data: {
            position_level: newLevel,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                toastr.success('Team member level updated');
                // Refresh the page to show updated hierarchy
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        },
        error: function() {
            toastr.error('Error updating level');
            location.reload();
        }
    });
}


    // Status toggle
    $('.status-toggle').change(function() {
        const url = $(this).data('url');
        const checkbox = $(this);
        const isActive = checkbox.is(':checked');
        const row = checkbox.closest('tr');

        $.ajax({
            url: url,
            type: 'POST',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (isActive) {
                    row?.removeClass('table-warning');
                    checkbox.next('label').text('Active');
                } else {
                    row?.addClass('table-warning');
                    checkbox.next('label').text('Inactive');
                }
                toastr.success('Status updated successfully');
            },
            error: function() {
                checkbox.prop('checked', !isActive);
                toastr.error('Error updating status');
            }
        });
    });

    // Delete confirmation
    $('.delete-member').click(function() {
        const memberId = $(this).data('id');
        const memberName = $(this).data('name');
        const deleteUrl = $(this).data('url');

        $('#deleteMemberName').text(memberName);
        $('#deleteForm').attr('action', deleteUrl);
        $('#deleteModal').modal('show');
    });

    // Toastr configuration
    if (typeof toastr !== 'undefined') {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 5000
        };
    }
});
</script>
@endpush