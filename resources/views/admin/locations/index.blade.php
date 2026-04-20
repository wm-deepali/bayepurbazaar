@include('admin.top-header')

<style>
    .location-card {
        transition: all 0.3s ease;
    }
    
    .location-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
    }

    .table th, .table td {
        vertical-align: middle;
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
                    Manage Locations
                </li>
            </ol>
        </div>

        <!--<div class="ml-auto mr-2">-->
        <!--    <a href="{{ route('admin.locations.create') }}" class="btn btn-primary">-->
        <!--        <i class="fa fa-plus"></i> Add Location-->
        <!--    </a>-->
        <!--</div>-->

    </div>


   <div class="content-wrapper pb-4">
    <div class="card border-0 shadow-sm rounded-4">
        
        <!-- Card Header -->
        <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Manage Locations</h5>
            <a href="{{ route('admin.locations.create') }}" class="btn btn-sm btn-primary rounded-pill px-4">
                <i class="fa fa-plus me-2"></i> Add New
            </a>
        </div>

        <!-- Desktop Table View -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: #f8fafc;">
                    <tr>
                        <th width="60">ID</th>
                        <th>Location</th>
                        <th width="120">Popular</th>
                        <th width="120">Default</th>
                        <th width="140" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($locations as $location)
                        <tr id="row{{ $location->id }}">
                            <td class="fw-medium">{{ $location->id }}</td>
                            <td>
                                <strong>{{ $location->location }}</strong>
                            </td>
                            <td>
                                @if($location->is_popular)
                                    <span class="badge bg-success rounded-pill px-3 py-2">Popular</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">No</span>
                                @endif
                            </td>
                            <td>
                                @if($location->is_default)
                                    <span class="badge bg-primary rounded-pill px-3 py-2">Default</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.locations.edit', $location->id) }}" 
                                   class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button onclick="deleteLocation({{ $location->id }})" 
                                        class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                No Locations Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile & Tablet Card View -->
        <div class="d-lg-none p-3">
            @forelse($locations as $location)
                <div class="card border shadow-sm mb-3 rounded-3 location-card" id="row{{ $location->id }}">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-light text-dark px-3 py-1">#{{ $location->id }}</span>
                            </div>
                            <div class="text-end">
                                @if($location->is_popular)
                                    <span class="badge bg-success rounded-pill px-3 py-1">Popular</span>
                                @endif
                                @if($location->is_default)
                                    <span class="badge bg-primary rounded-pill px-3 py-1 ms-1">Default</span>
                                @endif
                            </div>
                        </div>

                        <h6 class="fw-bold text-dark mb-3">{{ $location->location }}</h6>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 justify-content-end mt-4" style="gap:20px;">
                            <a href="{{ route('admin.locations.edit', $location->id) }}" 
                               class="btn btn-sm btn-outline-primary flex-fill text-center">
                                <i class="fa fa-pencil me-2"></i> Edit
                            </a>
                            <button onclick="deleteLocation({{ $location->id }})" 
                                    class="btn btn-sm btn-outline-danger flex-fill text-center">
                                <i class="fa fa-trash me-2"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa fa-map-marker fa-3x text-muted mb-3"></i>
                    <p class="text-muted mb-0">No Locations Found</p>
                </div>
            @endforelse
        </div>

    </div>
</div>

</div>

</div>

@include('admin.footer')


<script>

function deleteLocation(id)
{
    Swal.fire({
        title: 'Delete Location?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete'
    })
    .then((result) => {

        if (result.isConfirmed)
        {

            $.ajax({

                url: "{{ url('admin/locations') }}/" + id,

                type: "DELETE",

                data: {
                    _token: "{{ csrf_token() }}"
                },

                success: function(res)
                {
                    Swal.fire(
                        'Deleted!',
                        res.message,
                        'success'
                    );

                    $("#row"+id).fadeOut(400,function(){
                        $(this).remove();
                    });
                }

            });

        }

    });
}

</script>