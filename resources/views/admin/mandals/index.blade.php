@include('admin.top-header')

<style>
    /* ============== Mandal Mobile & Tablet Cards ============== */
    .admin-mandal-mobile .admin-mandal-card {
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
        background: white;
        width: 96%;
        height: 100%;
        margin: auto;
        margin-bottom: 15px;
    }

    .admin-mandal-mobile .admin-mandal-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .admin-mandal-card-inner {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .admin-mandal-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    /* Top glossy accent line */
    .admin-mandal-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4f46e5, #7c3aed);
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
                        Manage Mandals
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.mandals.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Mandal
                </a>
            </div>

        </div>


        <div class="content-wrapper pb-4">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- Header -->
                <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-dark">Manage Mandals</h5>
                    <a href="{{ route('admin.mandals.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                        <i class="fa fa-plus me-2"></i> Add New Mandal
                    </a>
                </div>

                <!-- Desktop Table View -->
                <div class="table-responsive d-none d-lg-block">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background: linear-gradient(90deg, #f8fafc, #f1f5f9);">
                            <tr>
                                <th width="60" class="ps-4">ID</th>\
                                <th>Mandal Name</th>
                                <th>Mandal Category</th>
                                <th>Slug</th>
                                <th width="130">Status</th>
                                <th width="140" class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mandals as $mandal)
                                <tr id="row{{ $mandal->id }}">
                                    <td class="ps-4 fw-medium">{{ $mandal->id }}</td>
                                    <td>
                                        <strong class="text-dark">{{ $mandal->name }}</strong>
                                    </td>
                                    <td>
                                        {{ $mandal->category->name ?? '-' }}
                                    </td>
                                    <td class="text-muted small font-monospace">{{ $mandal->slug }}</td>
                                    <td>
                                        @if($mandal->status)
                                            <span class="badge bg-primary rounded-pill px-3 py-2">Active</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.mandals.edit', $mandal->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button onclick="deleteMandal({{ $mandal->id }})"
                                            class="btn btn-sm btn-outline-danger rounded-pill">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        No Mandals Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- ==================== MOBILE + TABLET CARD VIEW ==================== -->
                <div class="d-lg-none px-3 py-4 admin-mandal-mobile">
                    <div class="row g-4">
                        @forelse($mandals as $mandal)

                            <div class="admin-mandal-card h-100" id="row{{ $mandal->id }}">
                                <div class="admin-mandal-card-inner">

                                    <div class="admin-mandal-content p-4">

                                        <!-- ID and Status -->
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <span class="badge bg-light text-dark px-3 py-1">#{{ $mandal->id }}</span>
                                            @if($mandal->status)
                                                <span class="badge bg-primary rounded-pill px-3 py-1">Active</span>
                                            @else
                                                <span class="badge bg-danger rounded-pill px-3 py-1">Inactive</span>
                                            @endif
                                        </div>

                                        <!-- Mandal Name -->
                                        <h5 class="fw-bold text-dark mb-2">{{ $mandal->name }}</h5>

                                        <!-- Slug -->
                                        <div class="mb-4">
                                            <small class="text-muted">Slug</small>
                                            <p class="text-muted small mb-0 font-monospace">{{ $mandal->slug }}</p>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex gap-2 mt-auto" style="gap:15px;">
                                            <a href="{{ route('admin.mandals.edit', $mandal->id) }}"
                                                class="btn btn-outline-primary flex-fill rounded-pill py-2">
                                                <i class="fa fa-pencil me-2"></i> Edit
                                            </a>
                                            <button onclick="deleteMandal({{ $mandal->id }})"
                                                class="btn btn-outline-danger flex-fill rounded-pill py-2">
                                                <i class="fa fa-trash me-2"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <i class="fa fa-map-marker fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">No Mandals Found</p>
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

    function deleteMandal(id) {
        Swal.fire({
            title: 'Delete Mandal?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/mandals') }}/" + id,

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