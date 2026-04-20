@include('admin.top-header')

<style>
    /* ============== Mandal Member Mobile Card ============== */
    .admin-member-mobile .admin-member-card {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        background: white;
        height: 100%;
    }

    .admin-member-mobile .admin-member-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .admin-member-card-inner {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .admin-member-header {
        background: #f8fafc;
    }

    .admin-member-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
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
                        Manage Mandal Members
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.mandal-members.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Member
                </a>
            </div>

        </div>


        <div class="content-wrapper pb-4">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- Header -->
                <!-- Header -->
                <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-dark">Manage Mandal Members</h5>

                    <div class="d-flex gap-2">

                        {{-- ✅ BULK IMPORT BUTTON --}}
                        <button class="btn btn-success rounded-pill px-4 shadow-sm" data-toggle="modal"
                            data-target="#importModal">
                            <i class="fa fa-upload me-2"></i> Bulk Import
                        </button>

                        <a href="{{ route('admin.mandal-members.create') }}"
                            class="btn btn-primary rounded-pill px-4 shadow-sm">
                            <i class="fa fa-plus me-2"></i> Add New Member
                        </a>

                    </div>
                </div>

                <!-- Desktop Table View -->
                <div class="table-responsive d-none d-lg-block">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background: linear-gradient(90deg, #f8fafc, #f1f5f9);">
                            <tr>
                                <th width="60" class="ps-4">ID</th>
                                <th width="80">Photo</th>
                                <th>Mandal</th>
                                <th>Member Name</th>
                                <th>Designation</th>
                                <th>Mobile</th>
                                <th>Location</th>
                                <th>Since</th>
                                <th width="130">Status</th>
                                <th width="150" class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $member)
                                <tr id="row{{ $member->id }}">
                                    <td class="ps-4 fw-medium">{{ $member->id }}</td>
                                    <td>
                                        @if($member->photo)
                                            <img src="{{ asset('storage/' . $member->photo) }}"
                                                style="width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid #f1f5f9;"
                                                alt="">
                                        @else
                                            <img src="https://via.placeholder.com/48"
                                                style="width:48px;height:48px;border-radius:50%;" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $member->mandal->name ?? '-' }}</td>
                                    <td>
                                        <strong>{{ $member->name }}</strong>
                                        @if($member->whatsapp)
                                            <br>
                                            <a href="https://wa.me/91{{ $member->whatsapp }}" target="_blank"
                                                class="text-success small">
                                                <i class="fa fa-whatsapp"></i> WhatsApp
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $member->designation }}</td>
                                    <td>{{ $member->mobile }}</td>
                                    <td>{{ $member->location ?? '-' }}</td>
                                    <td>{{ $member->since ?? '-' }}</td>
                                    <td>
                                        @if($member->status)
                                            <span class="badge bg-primary rounded-pill px-3 py-2">Active</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.mandal-members.edit', $member->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button onclick="deleteMember({{ $member->id }})"
                                            class="btn btn-sm btn-outline-danger rounded-pill">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5 text-muted">No Members Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- ==================== MOBILE + TABLET CARD VIEW ==================== -->
                <div class="d-lg-none px-3 py-4 admin-member-mobile">
                    <div class="row g-4">
                        @forelse($members as $member)
                            <div class="col-12 col-md-6 mb-3">
                                <div class="admin-member-card h-100" id="row{{ $member->id }}">
                                    <div class="admin-member-card-inner">

                                        <!-- Photo + Basic Info -->
                                        <div class="admin-member-header p-4 pb-0">
                                            <div class="d-flex align-items-center gap-3" style="gap:15px;">
                                                <!-- Photo -->
                                                <div class="flex-shrink-0">
                                                    @if($member->photo)
                                                        <img src="{{ asset('storage/' . $member->photo) }}"
                                                            style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid #f1f5f9;"
                                                            alt="{{ $member->name }}">
                                                    @else
                                                        <img src="https://via.placeholder.com/80"
                                                            style="width:80px;height:80px;border-radius:50%;border:3px solid #f1f5f9;"
                                                            alt="">
                                                    @endif
                                                </div>

                                                <!-- Name & Mandal -->
                                                <div class="flex-grow-1">
                                                    <h5 class="fw-bold text-dark mb-1">{{ $member->name }}</h5>
                                                    <p class="text-muted mb-0 small">
                                                        {{ $member->mandal->name ?? 'No Mandal' }}</p>
                                                </div>

                                                <!-- Status -->
                                                <div>
                                                    @if($member->status)
                                                        <span class="badge bg-primary rounded-pill px-3 py-1">Active</span>
                                                    @else
                                                        <span class="badge bg-danger rounded-pill px-3 py-1">Inactive</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Details -->
                                        <div class="admin-member-content p-4 pt-3">
                                            <div class="row g-3 text-muted small">
                                                <div class="col-6">
                                                    <strong>Designation</strong><br>
                                                    {{ $member->designation ?? '-' }}
                                                </div>
                                                <div class="col-6">
                                                    <strong>Mobile</strong><br>
                                                    {{ $member->mobile }}
                                                </div>
                                                <div class="col-6">
                                                    <strong>Location</strong><br>
                                                    {{ $member->location ?? '-' }}
                                                </div>
                                                <div class="col-6">
                                                    <strong>Since</strong><br>
                                                    {{ $member->since ?? '-' }}
                                                </div>
                                            </div>

                                            <!-- WhatsApp -->
                                            @if($member->whatsapp)
                                                <div class="mt-3">
                                                    <a href="https://wa.me/91{{ $member->whatsapp }}" target="_blank"
                                                        class="text-success small d-inline-flex align-items-center gap-1">
                                                        <i class="fa fa-whatsapp fa-lg"></i>
                                                        WhatsApp: {{ $member->whatsapp }}
                                                    </a>
                                                </div>
                                            @endif

                                            <!-- Action Buttons -->
                                            <div class="d-flex gap-2 mt-4" style="gap:15px;">
                                                <a href="{{ route('admin.mandal-members.edit', $member->id) }}"
                                                    class="btn btn-outline-primary flex-fill rounded-pill py-2">
                                                    <i class="fa fa-pencil me-2"></i> Edit
                                                </a>
                                                <button onclick="deleteMember({{ $member->id }})"
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
                                    <i class="fa fa-users fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">No Members Found</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


<!-- Import Modal -->
<div class="modal fade" id="importModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Import Mandal Members</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="{{ route('admin.mandal-members.import') }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    {{-- ✅ Download Sample --}}
                    <div class="mb-3">
                        <a href="{{ route('admin.mandal-members.sample') }}" class="btn btn-outline-primary">
                            <i class="fa fa-download"></i> Download Sample File
                        </a>
                    </div>

                    {{-- Upload --}}
                    <div class="form-group">
                        <label>Select Excel File *</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>

                    {{-- Instructions --}}
                    <div class="alert alert-info mt-3">
                        <strong>Important Instructions:</strong>
                        <ul class="mb-0 mt-2">
                            <li>Do not change column order</li>
                            <li>Use correct IDs for category, mandal, state, city</li>
                            <li>Mobile number should be unique</li>
                        </ul>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Upload & Import</button>
                </div>

            </form>

        </div>
    </div>
</div>

@include('admin.footer')


<script>

    function deleteMember(id) {
        Swal.fire({
            title: 'Delete Member?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/mandal-members') }}/" + id,

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