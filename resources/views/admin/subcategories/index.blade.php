@include('admin.top-header')

<style>
/* ============== Sub Category Mobile & Tablet Cards ============== */
.admin-subcategory-mobile .admin-subcategory-card {
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    transition: all 0.3s ease;
    background: white;
    height: 100%;
}

.admin-subcategory-mobile .admin-subcategory-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.admin-subcategory-card-inner {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.admin-subcategory-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

/* Top accent line */
.admin-subcategory-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #6366f1, #a855f7);
}
</style>

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Manage Sub Categories
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Sub Category
                </a>
            </div>

        </div>


      <div class="content-wrapper pb-4">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- Header -->
        <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Manage Sub Categories</h5>
            <a href="{{ route('admin.subcategories.create') }}" 
               class="btn btn-primary rounded-pill px-4 shadow-sm" style="white-space:nowrap;">
                <i class="fa fa-plus me-2"></i> Sub Category
            </a>
        </div>

        <!-- Desktop Table View -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #f8fafc, #f1f5f9);">
                    <tr>
                        <th width="60" class="ps-4">ID</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Slug</th>
                        <th width="130">Status</th>
                        <th width="140" class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subcategories as $sub)
                        <tr id="row{{ $sub->id }}">
                            <td class="ps-4 fw-medium">{{ $sub->id }}</td>
                            <td>{{ $sub->category->name ?? '-' }}</td>
                            <td>
                                <strong class="text-dark">{{ $sub->name }}</strong>
                            </td>
                            <td class="text-muted small font-monospace">{{ $sub->slug }}</td>
                            <td>
                                @if($sub->status)
                                    <span class="badge bg-primary rounded-pill px-3 py-2">Active</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.subcategories.edit', $sub->id) }}" 
                                   class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button onclick="deleteSubCategory({{ $sub->id }})" 
                                        class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                No Sub Categories Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile + Tablet Card View -->
        <div class="d-lg-none px-3 py-4 admin-subcategory-mobile">
            <div class="row g-4 ">
                @forelse($subcategories as $sub)
                    <div class="col-12 col-md-6">   <!-- 1 card on mobile, 2 cards on tablet -->
                        <div class="admin-subcategory-card h-100  mt-3" id="row{{ $sub->id }}">
                            <div class="admin-subcategory-card-inner">

                                <!-- Content Area -->
                                <div class="admin-subcategory-content p-4">
                                    
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span class="badge bg-light text-dark px-3 py-1">#{{ $sub->id }}</span>
                                        @if($sub->status)
                                            <span class="badge bg-primary rounded-pill px-3 py-1 text-white">Active</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-3 py-1 text-white">Inactive</span>
                                        @endif
                                    </div>

                                    <h5 class="fw-bold text-dark mb-2">{{ $sub->name }}</h5>
                                    
                                    <div class="mb-4">
                                        <small class="text-muted">Parent Category</small>
                                        <p class="mb-0 fw-medium">{{ $sub->category->name ?? 'Not Assigned' }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <small class="text-muted">Slug</small>
                                        <p class="text-muted small mb-0 font-monospace">{{ $sub->slug }}</p>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2 mt-auto" style="gap:15px;">
                                        <a href="{{ route('admin.subcategories.edit', $sub->id) }}" 
                                           class="btn btn-outline-primary flex-fill rounded-pill py-2">
                                            <i class="fa fa-pencil me-2"></i> Edit
                                        </a>
                                        <button onclick="deleteSubCategory({{ $sub->id }})" 
                                                class="btn btn-outline-danger flex-fill rounded-pill py-2">
                                            <i class="fa fa-trash me-2"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fa fa-layer-group fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No Sub Categories Found</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

    </div>

</div>

@include('admin.footer')


<script>

    function deleteSubCategory(id) {
        Swal.fire({
            title: 'Delete Sub Category?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/subcategories') }}/" + id,

                        type: "DELETE",

                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function (res) {

                            Swal.fire('Deleted!', res.message, 'success');

                            $("#row" + id).fadeOut(400, function () {
                                $(this).remove();
                            });

                        }

                    });

                }

            });

    }

</script>