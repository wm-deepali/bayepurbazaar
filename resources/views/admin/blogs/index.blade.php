@include('admin.top-header')

<style>
/* ============== Blog Mobile Card ============== */
.admin-blog-mobile .admin-blog-card {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
    background: white;
    height: 100%;
}

.admin-blog-mobile .admin-blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
}

.admin-blog-card-inner {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.admin-blog-image {
    height: 180px;
    overflow: hidden;
    background: #f8fafc;
}

.admin-blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image-placeholder {
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f1f5f9;
    color: #94a3b8;
    font-size: 2.5rem;
}

.admin-blog-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

/* Title text limit */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
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
                        Manage Blogs
                    </li>

                </ol>
            </div>

            <!--<div class="ml-auto mr-2">-->
            <!--    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">-->
            <!--        <i class="fa fa-plus"></i> Add Blog-->
            <!--    </a>-->
            <!--</div>-->

        </div>


        <div class="content-wrapper pb-4">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- Header -->
        <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Manage Blogs</h5>
            <a href="{{ route('admin.blogs.create') }}" 
               class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fa fa-plus me-2"></i> Add New Blog
            </a>
        </div>

        <!-- Desktop Table View -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #f8fafc, #f1f5f9);">
                    <tr>
                        <th width="60" class="ps-4">ID</th>
                        <th width="120">Image</th>
                        <th>Title</th>
                        <th width="130">Show on Home</th>
                        <th width="130">Status</th>
                        <th width="150" class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr id="row{{ $blog->id }}">
                            <td class="ps-4 fw-medium">{{ $blog->id }}</td>
                            <td>
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" 
                                         width="70" height="50" 
                                         style="object-fit:cover;border-radius:8px;" alt="">
                                @else
                                    <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td>
                                <strong class="text-dark">{{ $blog->title }}</strong>
                            </td>
                            <td>
                                @if($blog->show_home)
                                    <span class="badge bg-success rounded-pill px-3 py-2">Yes</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">No</span>
                                @endif
                            </td>
                            <td>
                                @if($blog->status)
                                    <span class="badge bg-primary rounded-pill px-3 py-2">Active</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" 
                                   class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button onclick="deleteBlog({{ $blog->id }})" 
                                        class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">No Blogs Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ==================== MOBILE + TABLET CARD VIEW ==================== -->
        <div class="d-lg-none px-3 py-4 admin-blog-mobile">
            <div class="row g-4">
                @forelse($blogs as $blog)
                    <div class="col-12 col-md-6">
                        <div class="admin-blog-card h-100" id="row{{ $blog->id }}">
                            <div class="admin-blog-card-inner">

                                <!-- Blog Image -->
                                <div class="admin-blog-image">
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" 
                                             class="img-fluid" 
                                             alt="{{ $blog->title }}">
                                    @else
                                        <div class="no-image-placeholder">
                                            <i class="fa fa-image"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="admin-blog-content p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span class="badge bg-light text-dark">#{{ $blog->id }}</span>
                                        
                                        <div class="d-flex gap-2">
                                            @if($blog->show_home)
                                                <span class="badge bg-success rounded-pill px-3 py-1">Home</span>
                                            @endif
                                            @if($blog->status)
                                                <span class="badge bg-primary rounded-pill px-3 py-1">Active</span>
                                            @else
                                                <span class="badge bg-danger rounded-pill px-3 py-1">Inactive</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <h6 class="fw-bold text-dark mb-4 line-clamp-2">{{ $blog->title }}</h6>

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2 mt-auto" style="gap:15px;">
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" 
                                           class="btn btn-outline-primary flex-fill rounded-pill py-2">
                                            <i class="fa fa-pencil me-2"></i> Edit
                                        </a>
                                        <button onclick="deleteBlog({{ $blog->id }})" 
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
                            <i class="fa fa-newspaper fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No Blogs Found</p>
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

    function deleteBlog(id) {
        Swal.fire({
            title: 'Delete Blog?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/blogs') }}/" + id,

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