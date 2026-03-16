@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
    <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage FAQ</li>
            </ol>
        </div>
        <div class="add-back ml-auto mr-2">
            <a href="{{ route('admin.manage-faq.create') }}" class="btn text-dark">
                <i class="fa fa-plus"></i> Add FAQ
            </a>
        </div>
    </div>

    <div class="content-wrapper pb-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width:35%">Question</th>
                <th>Answer</th>
                <th style="width:90px">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($faqs as $faq)
                <tr>
                    <td>{{ $faq->question }}</td>
                    <td>{!! Str::limit(strip_tags($faq->answer), 120) !!}</td>
                    <td>
                        <a href="{{ route('admin.manage-faq.edit',$faq->id) }}" class="text-dark mr-2">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:void(0)" class="text-danger" onclick="deleteFaq({{ $faq->id }})">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">No FAQ found</td></tr>
            @endforelse
            </tbody>
        </table>

        {{ $faqs->links() }}
    </div>
</div>
</div>

@include('admin.footer')

<script>
function deleteFaq(id) {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/manage-faq') }}/" + id,
                type: "DELETE",
                dataType: "json",
                success: function(res) {
                    Swal.fire('Deleted!', res.message, 'success');
                    setTimeout(() => location.reload(), 1000);
                }
            });
        }
    });
}
</script>
