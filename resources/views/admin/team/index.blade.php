@include('admin.top-header')
<div class="main-section">
@include('admin.header')
<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb bg-transparent mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Team</li>
            <li class="breadcrumb-item active">Manage Team</li>
        </ol>
    </div>
    <div class="add-back ml-auto mr-2">
        <a href="{{ route('admin.manage-team.create') }}" class="btn text-dark"><i class="fa fa-plus"></i> Add</a>
        <a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>
    </div>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered" id="for_all">
<thead>
<tr>
    <th>Date</th>
    <th>Name</th>
    <th>Designation</th>
    <th>Image</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@if(isset($teams) && count($teams) > 0)
@foreach($teams as $team)
<tr>
    <td>{{ $team->created_at->format('d M, Y') }}</td>
    <td>{{ $team->name }}</td>
    <td>{{ $team->designation }}</td>
    <td>
        @if($team->image)
            <img src="{{ asset('storage/'.$team->image) }}" style="height:50px;">
        @else NA @endif
    </td>
    <td>
        <a href="{{ route('admin.manage-team.edit',$team->id) }}" class="text-dark mr-2" title="Edit">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="javascript:void(0)" class="text-danger" onclick="deleteConfirmation({{ $team->id }})" title="Delete">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
@endforeach
@endif
</tbody>
</table>
<div class="float-right">{{ $teams->links() }}</div>
</div>

</div>
</div>

@include('admin.footer')

<script>
function deleteConfirmation(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Delete this team member?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/manage-team') }}/" + id,
                type: "DELETE",
                dataType: "json",
                success: function(res) {

                    if(res.success){
                        Swal.fire({
                            title: 'Deleted!',
                            text: res.message ?? 'Member has been deleted.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }else{
                        Swal.fire('Error!', res.message ?? 'Something went wrong', 'error');
                    }

                },
                error: function() {
                    Swal.fire('Error!', 'Request failed', 'error');
                }
            });
        }
    });
}
</script>
