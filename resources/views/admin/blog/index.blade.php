@include('admin.top-header')
<div class="main-section">
@include('admin.header')
<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb bg-transparent mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Blogs</li>
            <li class="breadcrumb-item active">Manage Blogs</li>
        </ol>
    </div>
    <div class="add-back ml-auto mr-2">
        <a href="{{ route('admin.manage-blog.create') }}" class="btn text-dark"><i class="fa fa-plus"></i> Add</a>
        <a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>
    </div>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered" id="for_all">
<thead>
<tr>
    <th>Date</th>
    <th>Title</th>
    <th>Thumbnail</th>
    <th>Banner</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@if(isset($blogs) && count($blogs) > 0)
@foreach($blogs as $blog)
<tr>
    <td>{{ $blog->created_at->format('d M, Y') }}</td>
    <td>{{ $blog->title }}</td>
    <td>
        @if($blog->thumbnail_image)
            <img src="{{ asset('storage/'.$blog->thumbnail_image) }}" style="height:50px;">
        @else NA @endif
    </td>
    <td>
        @if($blog->banner_image)
            <img src="{{ asset('storage/'.$blog->banner_image) }}" style="height:50px;">
        @else NA @endif
    </td>
    <td>
        <a href="{{ route('admin.manage-blog.edit',$blog->id) }}" class="text-dark mr-2" title="Edit">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="javascript:void(0)" class="text-danger" onclick="deleteConfirmation({{ $blog->id }})" title="Delete">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
@endforeach
@endif
</tbody>
</table>
<div class="float-right">{{ $blogs->links() }}</div>
</div>

</div>
</div>

@include('admin.footer')

<script>
function deleteConfirmation(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Delete this blog?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/manage-blog') }}/" + id,
                type: "DELETE",
                dataType: "json",
                success: function(res) {

                    if(res.success){
                        Swal.fire({
                            title: 'Deleted!',
                            text: res.message ?? 'Blog has been deleted.',
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
