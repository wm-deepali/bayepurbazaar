@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Appointment Section</li>
    </ol>
  </div>
</div>

<div class="card" style="margin:1rem;">
  <div class="card-body">
    <form action="{{ route('admin.appointment.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <label>Title</label>
      <input type="text" name="title" class="form-control mb-2"
       value="{{ $section->title ?? '' }}">

      <label>Image</label><br>
      @if($section && $section->image)
        <img src="{{ asset('storage/'.$section->image) }}" style="height:70px">
      @endif
      <input type="file" class="form-control mb-3" name="image_file">

      <label>Description 1</label>
      <textarea class="form-control mb-2" name="short_description_1">{{ $section->short_description_1 ?? '' }}</textarea>

      <label>Location</label>
      <input type="text" name="location" class="form-control mb-2"
       value="{{ $section->location ?? '' }}">

      <label>Email</label>
      <input type="text" name="email" class="form-control mb-2"
       value="{{ $section->email ?? '' }}">

      <label>Description 2</label>
      <textarea class="form-control mb-4" name="short_description_2">{{ $section->short_description_2 ?? '' }}</textarea>

      <h5>Steps</h5>

      @foreach($section->steps ?? [] as $step)
      <div class="border rounded p-2 mb-2">
        <input type="text" class="form-control mb-2"
          name="steps[{{ $step->id }}][title]"
          value="{{ $step->title }}">

        <textarea class="form-control mb-2"
          name="steps[{{ $step->id }}][description]">{{ $step->description }}</textarea>

        <button type="button" class="btn btn-danger btn-sm" onclick="deleteStep({{ $step->id }})">
          <i class="fa fa-trash"></i>
        </button>
      </div>
      @endforeach

      <h5 class="mt-3">Add New Steps</h5>

      <div id="new-steps"></div>
      <button type="button" id="addStep" class="btn btn-secondary mt-2">
        <i class="fa fa-plus"></i> Add Step
      </button>

      <button class="btn btn-primary mt-3 float-right">Save</button>

    </form>
  </div>
</div>

</div></div>

@include('admin.footer')

<script>
let stepIndex = 0;
document.getElementById('addStep').addEventListener('click',function(){
  let html = `
    <div class="border rounded p-2 mb-2">
      <input type="text" class="form-control mb-2" name="new_steps[${stepIndex}][title]" placeholder="Step Title">
      <textarea class="form-control mb-2" name="new_steps[${stepIndex}][description]" placeholder="Step Description"></textarea>
    </div>`;
  document.getElementById('new-steps').insertAdjacentHTML('beforeend',html);
  stepIndex++;
});

function deleteStep(id){
  Swal.fire({
    title:'Delete Step?',
    icon:'warning',
    showCancelButton:true,
    confirmButtonText:'Delete'
  }).then(res=>{
    if(res.isConfirmed){
      $.ajax({
        url:'/admin/appointment-step/'+id,
        type:'DELETE',
        data:{ _token:"{{ csrf_token() }}" },
        success:function(){
          Swal.fire('Deleted!','','success')
          setTimeout(()=>location.reload(),800)
        }
      })
    }
  })
}
</script>
