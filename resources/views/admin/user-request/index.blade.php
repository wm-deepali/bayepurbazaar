@include('admin.top-header')
<div class="main-section">
@include('admin.header')
<div class="app-content content container-fluid">
<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
<div class="breadcrumb-wrapper">
<ol class="breadcrumb bg-transparent mb-0">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Manage User Request</li>
</ol>
</div>

<div class="add-back ml-auto mr-2">

<a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>
</div>
</div>
<div class="content-wrapper">
<div class="table-responsive">
<table class="table table-striped table-bordered" id="for_all">
<thead>
<th>Date &amp; Time</th> 
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Country</th> 
<th>No Of Person</th>
<th>No Of Childs</th>
<th>Travel Date</th>
<th>Stay Duration</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@if (isset($finddata) && count($finddata) > 0)
@foreach ($finddata as $getData)
<tr>
<td>{{ $getData->created_at }}</td>
<td>{{ $getData->full_name }}</td>
<td>{{ $getData->email }}</td>
<td>{{ $getData->mobile_number }}</td>
<td>{{ $getData->country }}</td>
<td>{{ $getData->noofPerson }}</td>
<td>{{ $getData->noofChilds }}</td>
<td>{{ $getData->travelDate }}</td>
<td>{{ $getData->stayDuration }}</td>
<td class="text-truncate">
<a href="javascript:void(0)" onclick="deleteConfirmation({{ $getData->id }})" title="Delete" class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>

</td>
</tr>
@endforeach
@endif
</tbody>
</table>

<div class="float-right">
        <!-- Pagination -->
        {{ $finddata->links() }}
</div>
</div>

</div>
</div>
<div id="offer-modal" class="modal fade" role="dialog">
</div>
</div>
@include('admin.footer')
<script>
function deleteConfirmation(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ URL::to('admin/delete-user-request/${id}') }}`,
                    type: "DELETE",
                    dataType: "json",
                    success: function(result) {
                        if (result.success) {
                            Swal.fire(
                                'Deleted!',
                                'success'
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 400);
                        } else {
                            Swal.fire(result.msgText);
                        }
                    }
                });

            }
        })
    };
</script>


