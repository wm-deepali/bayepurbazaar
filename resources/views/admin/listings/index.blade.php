@include('admin.top-header')

<style>
/* ============== Listing Mobile Card ============== */
.admin-listing-mobile .admin-listing-card {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
    background: white;
    height: 100%;
    /*margin-bottom:15px;*/
}

.admin-listing-mobile .admin-listing-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
}

.admin-listing-card-inner {
    position: relative;
}

.admin-listing-image {
    height: 200px;
    overflow: hidden;
    background: #f8fafc;
}

.admin-listing-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.admin-listing-logo {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 55px;
    height: 55px;
    border-radius: 12px;
    overflow: hidden;
    border: 3px solid white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    background: white;
}

.admin-listing-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 4px;
}

.admin-listing-content {
    background: white;
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
                        Manage Listings
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.listings.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Listing
                </a>
            </div>

        </div>


        <div class="content-wrapper pb-4">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- Header -->
        <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Manage Listings</h5>
            <a href="{{ route('admin.listings.create') }}" 
               class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fa fa-plus me-2"></i> Add New Listing
            </a>
        </div>

        <!-- Desktop Table View -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #f8fafc, #f1f5f9);">
                    <tr>
                        <th width="60" class="ps-4">ID</th>
                        <th width="80">Image</th>
                        <th width="80">Logo</th>
                        <th>Business</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Mobile</th>
                        <th width="130">Status</th>
                        <th width="150" class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($listings as $listing)
                        <tr id="row{{ $listing->id }}">
                            <td class="ps-4 fw-medium">{{ $listing->id }}</td>
                            <td>
                                <img src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('images/no-image.png') }}" 
                                     width="50" height="50" 
                                     style="object-fit:cover;border-radius:6px;" alt="">
                            </td>
                            <td>
                                <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" 
                                     width="50" height="50" 
                                     style="object-fit:contain;border-radius:6px;background:#fff;padding:3px;" alt="">
                            </td>
                            <td><strong>{{ $listing->business_name }}</strong></td>
                            <td>{{ $listing->location->location ?? '-' }}</td>
                            <td>{{ $listing->category->name ?? '-' }}</td>
                            <td>{{ $listing->mobile }}</td>
                            <td>
                                @if($listing->status)
                                    <span class="badge bg-primary rounded-pill px-3 py-2">Active</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.listings.edit', $listing->id) }}" 
                                   class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button onclick="deleteListing({{ $listing->id }})" 
                                        class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">No Listings Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ==================== MOBILE + TABLET CARD VIEW ==================== -->
        <div class="d-lg-none px-3 py-4 admin-listing-mobile">
            <div class="row g-4">
                @forelse($listings as $listing)
                    <div class="col-12 col-md-6 mb-3">   <!-- 1 on mobile, 2 on tablet -->
                        <div class="admin-listing-card h-100 " id="row{{ $listing->id }}">
                            <div class="admin-listing-card-inner ">

                                <!-- Full Width Image -->
                                <div class="admin-listing-image">
                                    <img src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('images/no-image.png') }}" 
                                         class="img-fluid" 
                                         alt="{{ $listing->business_name }}">
                                </div>

                                <!-- Logo on top of image (optional small badge) -->
                                <div class="admin-listing-logo">
                                    <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" 
                                         alt="Logo">
                                </div>

                                <!-- Content -->
                                <div class="admin-listing-content p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span class="badge bg-light text-dark">#{{ $listing->id }}</span>
                                        @if($listing->status)
                                            <span class="badge bg-primary rounded-pill px-3 py-1">Active</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-3 py-1">Inactive</span>
                                        @endif
                                    </div>

                                    <h5 class="fw-bold text-dark mb-2">{{ $listing->business_name }}</h5>

                                    <div class="row g-2 text-muted small mb-3">
                                        <div class="col-6">
                                            <strong>Location:</strong><br>
                                            {{ $listing->location->location ?? '-' }}
                                        </div>
                                        <div class="col-6">
                                            <strong>Category:</strong><br>
                                            {{ $listing->category->name ?? '-' }}
                                        </div>
                                        <div class="col-12 mt-2">
                                            <strong>Mobile:</strong> {{ $listing->mobile }}
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2" style="gap:15px;">
                                        <a href="{{ route('admin.listings.edit', $listing->id) }}" 
                                           class="btn btn-outline-primary flex-fill rounded-pill py-2">
                                            <i class="fa fa-pencil me-2"></i> Edit
                                        </a>
                                        <button onclick="deleteListing({{ $listing->id }})" 
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
                            <i class="fa fa-store fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No Listings Found</p>
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

    function deleteListing(id) {
        Swal.fire({
            title: 'Delete Listing?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/listings') }}/" + id,

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