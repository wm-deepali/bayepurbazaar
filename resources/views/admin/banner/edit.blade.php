@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Banner Content</li>
    </ol>
  </div>
</div>

<div class="card" style="margin:1rem;">
  <div class="card-body">
    <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group mb-2">
        <label>Heading</label>
        <input type="text" class="form-control" name="heading" value="{{ $banner->heading }}">
      </div>

      <div class="form-group mb-2">
        <label>Short Description</label>
        <textarea class="form-control" rows="4" name="short_description">{{ $banner->short_description }}</textarea>
      </div>

      <div class="form-group mb-2">
        <label>Button Text</label>
        <input type="text" class="form-control" name="button_text" value="{{ $banner->button_text }}">
      </div>

      <div class="form-group mb-2">
        <label>Button Link</label>
        <input type="text" class="form-control" name="button_link" value="{{ $banner->button_link }}">
      </div>

      <!-- @foreach(['main_image'=>'Main Image','side_image1'=>'Side Image 1','side_image2'=>'Side Image 2'] as $field=>$label)
      <div class="form-group mb-3">
        <label>{{ $label }}</label><br>
        @if($banner->$field)
          <img src="{{ asset('storage/'.$banner->$field) }}" height="60" class="mb-2"><br>
        @endif
        <input type="file" name="{{ $field }}_file" class="form-control">
      </div>
      @endforeach -->

      <button class="btn btn-primary mt-3">Save Banner</button>
    </form>
  </div>
</div>

</div>
</div>

@include('admin.footer')
