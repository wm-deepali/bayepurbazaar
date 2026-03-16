@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">

    <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact Us Inquiries</li>
            </ol>
        </div>
        <div class="add-back ml-auto mr-2">
            <a href="javascript:history.go(-1)" class="btn text-dark">
                <i class="fa-solid fa-rotate-left"></i> Go Back
            </a>
        </div>
    </div>

    <div class="content-wrapper pb-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="for_all">
                <thead>
                    <tr>
                        <th width="160px">Date</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th width="350px">Message</th>
                        <th width="70px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inq)
                        <tr>
                            <td>{{ $inq->created_at->format('d M Y h:i A') }}</td>
                            <td>{{ $inq->name }}</td>
                            <td>{{ $inq->phone }}</td>
                            <td>{{ $inq->email }}</td>
                            <td>{{ Str::limit($inq->message, 80) }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                   onclick="deleteInquiry({{ $inq->id }})"
                                   class="text-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No inquiries found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="float-right">
            {{ $inquiries->links() }}
        </div>
    </div>

</div>
</div>

@include('admin.footer')

<script>
function deleteInquiry(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Delete this inquiry?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/contact-inquiries') }}/" + id,
                type: "DELETE",
                dataType: "json",
                success: function(res) {
                    if (res.success) {
                        Swal.fire('Deleted!', res.message, 'success');
                        setTimeout(() => { location.reload(); }, 600);
                    } else {
                        Swal.fire('Error!', res.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Oops!', 'Server error', 'error');
                }
            });
        }
    });
}
</script>
