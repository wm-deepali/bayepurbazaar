@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Introduction</li>
    </ol>
  </div>
</div>

<div class="card" style="margin: 1rem;">
  <div class="card-body">
    <form method="POST" action="{{ route('admin.intro.update') }}" enctype="multipart/form-data">
      @csrf

      {{-- Title --}}
      <label>Title</label>
      <input type="text" class="form-control mb-2" name="title" value="{{ $intro->title ?? '' }}">

      {{-- Image --}}
      <label>Image</label><br>
      @if($intro && $intro->image)
        <img src="{{ asset('storage/'.$intro->image) }}" style="height:70px" class="mb-2"><br>
      @endif
      <input type="file" class="form-control mb-3" name="image_file">

      {{-- Short Desc 1 --}}
      <label>Description 1</label>
      <textarea class="form-control mb-2" name="short_description_1">{{ $intro->short_description_1 ?? '' }}</textarea>

      {{-- Short Desc 2 --}}
      <label>Description 2</label>
      <textarea class="form-control mb-3" name="short_description_2">{{ $intro->short_description_2 ?? '' }}</textarea>

      {{-- Features --}}
{{-- Features --}}
<label>Features</label>

<div id="feature-wrapper">
    @foreach($intro?->features ?? [] as $index => $feat)
        <div class="d-flex mb-2 feature-row">
            <input type="text" class="form-control"
                name="features[]"
                value="{{ $feat->name }}"
                placeholder="Feature {{ $index+1 }}">

            <button type="button" class="btn btn-danger ml-2 remove-btn">X</button>
        </div>
    @endforeach

    {{-- empty first input if none exist --}}
    @if(($intro?->features ?? collect())->count() == 0)
        <div class="d-flex mb-2 feature-row">
            <input type="text" class="form-control"
                name="features[]"
                placeholder="Feature 1">

            <button type="button" class="btn btn-danger ml-2 remove-btn">X</button>
        </div>
    @endif
</div>

<button type="button" id="add-feature" class="btn btn-secondary btn-sm mt-2">
    + Add More Feature
</button>

      <button class="btn btn-primary mt-2">Save</button>

    </form>
  </div>
</div>

</div>
</div>

<script>
document.getElementById('add-feature').addEventListener('click', function() {
    let wrapper = document.getElementById('feature-wrapper');
    let index = wrapper.querySelectorAll('.feature-row').length + 1;

    let html = `
        <div class="d-flex mb-2 feature-row">
            <input type="text" class="form-control"
                name="features[]"
                placeholder="Feature ${index}">
            <button type="button" class="btn btn-danger ml-2 remove-btn">X</button>
        </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', html);
});

// Delete feature row on click
document.addEventListener('click', function(e) {
    if(e.target.classList.contains('remove-btn')){
        e.target.closest('.feature-row').remove();
    }
});
</script>

@include('admin.footer')
