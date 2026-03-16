@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Testimonials</li>
    </ol>
  </div>
  <div class="add-back ml-auto mr-2">
    <a href="javascript:history.go(-1)" class="btn text-dark">
      <i class="fa-solid fa-rotate-left"></i> Go Back
    </a>
  </div>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered" id="for_all">
<thead>
<tr>
  <th>Name</th>
  <th>Designation</th>
  <th>Rating</th>
  <th>Image</th>
  <th>Action</th>
</tr>
</thead>
<tbody>

@forelse($testimonials as $testimony)
<tr>
  <td>{{ $testimony->name }}</td>
  <td>{{ $testimony->designation ?? '—' }}</td>

  {{-- ⭐ Rating Stars --}}
  <td>
      @for($i=1; $i <= $testimony->rating; $i++)
        <i class="fas fa-star text-warning"></i>
      @endfor
      @for($j=$testimony->rating+1; $j<=5; $j++)
        <i class="far fa-star text-warning"></i>
      @endfor
  </td>

  <td>
    @if($testimony->image)
      <img src="{{ asset('storage/'.$testimony->image) }}" style="height:50px;">
    @else
      NA
    @endif
  </td>

  <td>
    <a href="javascript:void(0)" class="text-danger" onclick="deleteTestimonial({{ $testimony->id }})">
      <i class="fa fa-trash"></i>
    </a>
  </td>
</tr>
@empty
<tr><td colspan="5" class="text-center">No Testimonials Found</td></tr>
@endforelse

</tbody>
</table>

<div class="float-right">{{ $testimonials->links() }}</div>
</div>

</div>
</div>

@include('admin.footer')

<script>
function deleteTestimonial(id){
    Swal.fire({
        title: 'Delete?',
        text: "Remove this testimonial?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url: "{{ url('admin/manage-testimonials') }}/" + id,
                type: "DELETE",
                data: {_token: "{{ csrf_token() }}"},
                success: function(res){
                    Swal.fire('Deleted!', res.message, 'success');
                    setTimeout(()=>location.reload(), 1000);
                }
            })
        }
    })
}
</script>
