@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Counters</li>
    </ol>
  </div>
</div>

<div class="card" style="margin: 1rem;">
  <div class="card-body">
    <form action="{{ route('admin.counters.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      @php
        $total = 3; // total counter slots
      @endphp

      @for($i=1; $i <= $total; $i++)
        @php
          $counter = $counters[$i-1] ?? null;
        @endphp

        <div class="border rounded p-3 mb-3">
          <h5 class="mb-3">Counter {{ $i }}</h5>

          {{-- Hidden ID if existing --}}
          @if($counter)
            <input type="hidden" name="counter[{{ $i }}][id]" value="{{ $counter->id }}">
          @endif

          {{-- Icon Image --}}
          <div class="form-group mb-2">
            <label>Icon Image</label><br>
            @if($counter && $counter->icon_image)
              <img src="{{ asset('storage/' . $counter->icon_image) }}" style="height:60px" class="mb-2"><br>
            @endif
            <input type="file" name="counter[{{ $i }}][icon_image_file]" class="form-control">
          </div>

          {{-- Number Count --}}
          <div class="form-group mb-2">
            <label>Count Number</label>
            <input type="number" class="form-control"
              name="counter[{{ $i }}][count]"
              value="{{ $counter->count ?? '' }}"
            >
          </div>

          {{-- Text --}}
          <div class="form-group">
            <label>Text</label>
            <input type="text" class="form-control"
              name="counter[{{ $i }}][text]"
              value="{{ $counter->text ?? '' }}"
            >
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
