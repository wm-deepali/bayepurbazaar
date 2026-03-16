@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb bg-transparent mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Appointment Inquiries</li>
        </ol>
    </div>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
<tr>
    <th>Date</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Service</th>
    <th>Visit Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@if(isset($appointments) && count($appointments) > 0)
@foreach($appointments as $a)
<tr>
    <td>{{ $a->created_at->format('d M, Y') }}</td>
    <td>{{ $a->name }}</td>
    <td>{{ $a->phone }}</td>
    <td>{{ $a->email }}</td>
    <td>{{ $a->disease->name }}</td>
    <td>{{ $a->date }}</td>
    <td>
        <a href="javascript:void(0)" class="text-danger" onclick="deleteAppointment({{ $a->id }})">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
@endforeach
@endif
</tbody>
</table>

<div class="float-right">{{ $appointments->links() }}</div>

</div>
</div>
</div>

@include('admin.footer')

<script>
function deleteAppointment(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Delete this appointment?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "{{ url('admin/appointment-inquiry') }}/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function(res) {
                    Swal.fire('Deleted!', res.message, 'success');
                    setTimeout(() => location.reload(), 1000);
                },
                error: function() {
                    Swal.fire('Error!', 'Could not delete', 'error');
                }
            });

        }
    });
}
</script>
