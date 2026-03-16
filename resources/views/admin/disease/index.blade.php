@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
    <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Disease & Treatments</li>
            </ol>
        </div>
        <div class="add-back ml-auto mr-2">
            <a href="{{ route('admin.manage-disease.create') }}" class="btn text-dark">
                <i class="fa fa-plus"></i> Add
            </a>
        </div>
    </div>

    <div class="content-wrapper pb-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Short Description</th>
                <th width="100px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($diseases as $disease)
                <tr>
                    <td>{{ $disease->name }}</td>
                    <td>{{ Str::limit($disease->short_description,70) }}</td>
                    <td>
                        <a href="{{ route('admin.manage-disease.edit',$disease->id) }}" class="text-dark mr-2"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" class="text-danger" onclick="del({{ $disease->id }})"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $diseases->links() }}
    </div>
</div>
</div>

@include('admin.footer')

<script>
function del(id){
 Swal.fire({
     title:'Are you sure?',
     icon:'warning',
     showCancelButton:true
 }).then(r=>{
     if(r.isConfirmed){
         $.ajax({
             url:"{{ url('admin/manage-disease') }}/" + id,
             type:"DELETE",
             dataType:"json",
             success:(res)=>{
                 Swal.fire('Deleted!',res.message,'success');
                 setTimeout(()=>location.reload(),1000);
             }
         })
     }
 })
}
</script>
