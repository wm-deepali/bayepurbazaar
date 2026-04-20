@include('admin.top-header')

<style>
/* ============== Custom Mobile Category Card ============== */
.admin-category-mobile .admin-category-card {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
    background: white;
}

.admin-category-mobile .admin-category-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.admin-category-card-inner {
    display: flex;
    flex-direction: column;
}

.admin-category-image {
    height: 200px;
    overflow: hidden;
    background: #f8fafc;
}

.admin-category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image-placeholder {
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f1f5f9;
    color: #94a3b8;
    font-size: 2.5rem;
}

.admin-category-content {
    background: white;
}

/* Extra glossy touch */
.admin-category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3b82f6, #8b5cf6);
    opacity: 0.9;
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
                        Manage Categories
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Category
                </a>
            </div>

        </div>


        <div class="content-wrapper pb-4">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- Header -->
        <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Manage Categories</h5>
            <a href="{{ route('admin.categories.create') }}" 
               class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fa fa-plus me-2"></i> Add New Category
            </a>
        </div>

        <!-- Desktop Table -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #f8fafc, #f1f5f9);">
                    <tr>
                        <th width="60" class="ps-4">ID</th>
                        <th width="90">Image</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th width="110">Popular</th>
                        <th width="110">Header</th>
                        <th width="110">Footer</th>
                        <th width="110">Status</th>
                        <th width="140" class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr id="row{{ $category->id }}">
                            <td class="ps-4 fw-medium">{{ $category->id }}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" 
                                         width="48" height="48" 
                                         class="rounded-3 shadow-sm object-fit-cover"
                                         style="border: 2px solid #f1f5f9;">
                                @else
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" 
                                         style="width:48px;height:48px;">
                                        <i class="fa fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td><strong>{{ $category->name }}</strong></td>
                            <td class="text-muted small font-monospace">{{ $category->slug }}</td>
                            <td>
                                @if($category->is_popular)
                                    <span class="badge bg-success rounded-pill px-3 py-2">Popular</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">No</span>
                                @endif
                            </td>
                            <td>
                                @if($category->show_header)
                                    <span class="badge bg-success rounded-pill px-3 py-2">Yes</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">No</span>
                                @endif
                            </td>
                            <td>
                                @if($category->show_footer)
                                    <span class="badge bg-success rounded-pill px-3 py-2">Yes</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">No</span>
                                @endif
                            </td>
                            <td>
                                @if($category->status)
                                    <span class="badge bg-primary rounded-pill px-3 py-2">Active</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                   class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button onclick="deleteCategory({{ $category->id }})" 
                                        class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">No Categories Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ==================== MOBILE CARD VIEW ==================== -->
        <div class="d-lg-none px-3 py-4 admin-category-mobile">
            @forelse($categories as $category)
                <div class="admin-category-card mb-4" id="row{{ $category->id }}">
                    <div class="admin-category-card-inner">

                        <!-- Image Full Width -->
                        <div class="admin-category-image">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     class="img-fluid" 
                                     alt="{{ $category->name }}">
                            @else
                                <div class="no-image-placeholder">
                                    <i class="fa fa-image"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="admin-category-content p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-light text-dark">#{{ $category->id }}</span>
                            </div>

                            <h5 class="fw-bold text-dark mb-1">{{ $category->name }}</h5>
                            <p class="text-muted small mb-3 font-monospace">{{ $category->slug }}</p>

                            <!-- Badges -->
                            <div class="d-flex flex-wrap gap-2 mb-4" style="gap:15px;">
                                @if($category->is_popular)
                                    <span class="badge bg-success rounded-pill px-3 py-1">Popular</span>
                                @endif
                                @if($category->show_header)
                                    <span class="badge bg-info rounded-pill px-3 py-1">Header</span>
                                @endif
                                @if($category->show_footer)
                                    <span class="badge bg-info rounded-pill px-3 py-1">Footer</span>
                                @endif
                                @if($category->status)
                                    <span class="badge bg-primary rounded-pill px-3 py-1">Active</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-3 py-1">Inactive</span>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2" style="gap:15px;">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                   class="btn btn-outline-primary flex-fill rounded-pill py-2">
                                    <i class="fa fa-pencil me-2"></i> Edit
                                </a>
                                <button onclick="deleteCategory({{ $category->id }})" 
                                        class="btn btn-outline-danger flex-fill rounded-pill py-2">
                                    <i class="fa fa-trash me-2"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa fa-tags fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No Categories Found</p>
                </div>
            @endforelse
        </div>

    </div>
</div>

    </div>

</div>

@include('admin.footer')


<script>

    function deleteCategory(id) {
        Swal.fire({
            title: 'Delete Category?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/categories') }}/" + id,

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