@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage About Us</li>
    </ol>
  </div>
</div>

{{-- ================= HEALING SECTION ================= --}}
<div class="card mb-4" style="margin:1rem;">
  <div class="card-header"><h4>Healing Section</h4></div>

  <div class="card-body">
    <form method="POST" action="{{ route('admin.healing.update') }}">
      @csrf

      {{-- TITLE --}}
      <label>Healing Title</label>
      <input type="text" name="title" class="form-control mb-2"
        value="{{ $healing->title ?? '' }}">

      {{-- DESCRIPTION --}}
      <label>Healing Description</label>
      <textarea name="description" class="form-control mb-3" rows="2">{{ $healing->description ?? '' }}</textarea>

      <h5>Healing Features</h5>

      {{-- EXISTING --}}
      @forelse($healingFeatures as $item)
        <div class="d-flex mb-2">
          <input type="text" name="items[{{ $item->id }}][name]"
            class="form-control" value="{{ $item->name }}">
          <button type="button" class="btn btn-danger ml-2"
            onclick="deleteHealing({{ $item->id }})">
            <i class="fa fa-trash"></i>
          </button>
        </div>
      @empty
        <p>No features added</p>
      @endforelse

      {{-- ADD NEW --}}
      <div id="newHealing"></div>
      <button type="button" class="btn btn-secondary btn-sm mb-2" id="addHealingBtn">
        <i class="fa fa-plus"></i> Add Feature
      </button>

      <button class="btn btn-primary float-right">Save Healing</button>
    </form>
  </div>
</div>


{{-- ================= TREATMENT SECTION ================= --}}
<div class="card" style="margin:1rem;">
  <div class="card-header"><h4>Treatment Section</h4></div>

  <div class="card-body">
    <form method="POST" action="{{ route('admin.treatment.update') }}" enctype="multipart/form-data">
      @csrf

      {{-- TITLE --}}
      <label>Treatment Title</label>
      <input type="text" name="title" class="form-control mb-2"
        value="{{ $treatment->title ?? '' }}">

      {{-- DESCRIPTION --}}
      <label>Description</label>
      <textarea name="description" class="form-control mb-3" rows="2">{{ $treatment->description ?? '' }}</textarea>

      <div class="row">
        <div class="col-md-6">
          {{-- MISSION --}}
          <label>Mission Title</label>
          <input type="text" name="mission_title" class="form-control mb-2"
            value="{{ $treatment->mission_title ?? '' }}">

          <label>Mission Description</label>
          <textarea name="mission_description" class="form-control mb-3" rows="2">{{ $treatment->mission_description ?? '' }}</textarea>
        </div>

        <div class="col-md-6">
          {{-- VISION --}}
          <label>Vision Title</label>
          <input type="text" name="vision_title" class="form-control mb-2"
            value="{{ $treatment->vision_title ?? '' }}">

          <label>Vision Description</label>
          <textarea name="vision_description" class="form-control mb-3" rows="2">{{ $treatment->vision_description ?? '' }}</textarea>
        </div>
      </div>

      {{-- IMAGE --}}
      <label>Image</label><br>
      @if($treatment && $treatment->image)
        <img src="{{ asset('storage/'.$treatment->image) }}" style="height:80px" class="mb-2"><br>
      @endif
      <input type="file" class="form-control mb-3" name="image_file">

      <button class="btn btn-primary float-right">Save Treatment</button>
    </form>
  </div>
</div>

</div>
</div>

@include('admin.footer')

<script>
let i = 0;

// Add healing feature
document.querySelector('#addHealingBtn').addEventListener('click', function() {
  let html = `
    <div class="d-flex mb-2">
      <input type="text" name="new_items[${i}][name]" class="form-control" placeholder="Feature Name">
    </div>`;
  document.querySelector('#newHealing').insertAdjacentHTML('beforeend', html);
  i++;
});

// Delete healing feature
function deleteHealing(id){
  Swal.fire({
    title:'Delete?',
    text:'Delete this feature?',
    icon:'warning',
    showCancelButton:true,
    confirmButtonText:'Delete'
  }).then((res)=>{
    if(res.isConfirmed){
      $.ajax({
        url:"{{ url('admin/healing/feature/delete') }}/"+id,
        type:"DELETE",
        data:{_token:"{{ csrf_token() }}"},
        success:function(){
          Swal.fire('Deleted!','','success')
          setTimeout(()=>location.reload(),800)
        }
      })
    }
  })
}
</script>
