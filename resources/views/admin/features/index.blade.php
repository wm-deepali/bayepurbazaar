@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Features</li>
    </ol>
  </div>
</div>

<div class="card" style="margin: 1rem;">
  <div class="card-body">
    <form action="{{ route('admin.features.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      @php 
        // Always create 3 blocks even if DB is empty
        $total = 3;
      @endphp

      @for ($i = 1; $i <= $total; $i++)
        @php
          $feature = $features[$i-1] ?? null;
        @endphp

      <div class="border rounded p-3 mb-3">
        <h5 class="mb-3">Feature {{ $i }}</h5>

        {{-- Hidden ID if existing --}}
        @if($feature)
          <input type="hidden" name="feature[{{ $i }}][id]" value="{{ $feature->id }}">
        @endif

        {{-- Icon Image --}}
        <div class="form-group mb-2">
          <label>Icon Image</label><br>
          @if($feature && $feature->icon_image)
            <img src="{{ asset('storage/' . $feature->icon_image) }}" style="height:60px" class="mb-2"><br>
          @endif
          <input type="file" name="feature[{{ $i }}][icon_image_file]" class="form-control">
        </div>

        {{-- Heading --}}
        <div class="form-group mb-2">
          <label>Heading</label>
          <input type="text" class="form-control"
            name="feature[{{ $i }}][heading]"
            value="{{ $feature->heading ?? '' }}">
        </div>

        {{-- Short Content --}}
        <div class="form-group">
          <label>Short Content</label>
          <textarea class="form-control" rows="2"
            name="feature[{{ $i }}][short_content]">{{ $feature->short_content ?? '' }}</textarea>
        </div>

      </div>
      @endfor

      <button type="submit" class="btn btn-primary mt-2">Save Changes</button>
    </form>
  </div>
</div>

</div>
</div>

@include('admin.footer')
