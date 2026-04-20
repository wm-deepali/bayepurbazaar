@include('admin.top-header')

<style>
/* ============== FAQ Mobile & Tablet Cards ============== */
.admin-faq-mobile .admin-faq-card {
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    transition: all 0.3s ease;
    background: white;
    width:96%;
    margin:auto;
    margin-bottom:15px;
    height: 100%;
}

.admin-faq-mobile .admin-faq-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.admin-faq-card-inner {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.admin-faq-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

/* Top accent line */
.admin-faq-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #eab308, #f59e0b);
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
                        Manage FAQ
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add FAQ
                </a>
            </div>

        </div>


       <div class="content-wrapper pb-4">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- Header -->
        <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Manage FAQs</h5>
            <a href="{{ route('admin.faqs.create') }}" 
               class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fa fa-plus me-2"></i> Add New FAQ
            </a>
        </div>

        <!-- Desktop Table View -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #f8fafc, #f1f5f9);">
                    <tr>
                        <th width="60" class="ps-4">ID</th>
                        <th>Question</th>
                        <th width="130">Show on Home</th>
                        <th width="130">Status</th>
                        <th width="150" class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faqs as $faq)
                        <tr id="row{{ $faq->id }}">
                            <td class="ps-4 fw-medium">{{ $faq->id }}</td>
                            <td>
                                <strong class="text-dark">{{ $faq->question }}</strong>
                            </td>
                            <td>
                                @if($faq->show_home)
                                    <span class="badge bg-success rounded-pill px-3 py-2">Yes</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">No</span>
                                @endif
                            </td>
                            <td>
                                @if($faq->status)
                                    <span class="badge bg-primary rounded-pill px-3 py-2">Active</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" 
                                   class="btn btn-sm btn-outline-primary me-2 rounded-pill">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button onclick="deleteFaq({{ $faq->id }})" 
                                        class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No FAQ Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ==================== MOBILE + TABLET CARD VIEW ==================== -->
        <div class="d-lg-none px-3 py-4 admin-faq-mobile">
            <div class="row g-4">
                @forelse($faqs as $faq)
                   
                        <div class="admin-faq-card h-100" id="row{{ $faq->id }}">
                            <div class="admin-faq-card-inner">

                                <div class="admin-faq-content p-4">
                                    
                                    <!-- ID and Badges -->
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span class="badge bg-light text-dark px-3 py-1">#{{ $faq->id }}</span>
                                        
                                        <div class="d-flex gap-2">
                                            @if($faq->show_home)
                                                <span class="badge bg-success rounded-pill px-3 py-1">Home</span>
                                            @endif
                                            @if($faq->status)
                                                <span class="badge bg-primary rounded-pill px-3 py-1">Active</span>
                                            @else
                                                <span class="badge bg-danger rounded-pill px-3 py-1">Inactive</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Question -->
                                    <h6 class="fw-bold text-dark mb-4">{{ $faq->question }}</h6>

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2 mt-auto" style="gap:15px;">
                                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" 
                                           class="btn btn-outline-primary flex-fill rounded-pill py-2">
                                            <i class="fa fa-pencil me-2"></i> Edit
                                        </a>
                                        <button onclick="deleteFaq({{ $faq->id }})" 
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
                            <i class="fa fa-question-circle fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No FAQ Found</p>
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

    function deleteFaq(id) {
        Swal.fire({
            title: 'Delete FAQ?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/faqs') }}/" + id,

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