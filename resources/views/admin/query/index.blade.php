@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Query Section</li>
    </ol>
  </div>
</div>

<div class="card" style="margin:1rem;">
  <div class="card-body">
    <form method="POST" action="{{ route('admin.query.update') }}">
      @csrf

      {{-- TITLE --}}
      <label class="mt-2">Title</label>
      <input type="text" class="form-control mb-2"
             name="title"
             value="{{ $query->title ?? '' }}"
             placeholder="Enter main title">

      {{-- SHORT DESCRIPTION --}}
      <label>Short Description</label>
      <textarea name="short_description"
                class="form-control"
                rows="4"
                placeholder="Write a brief description">{{ $query->short_description ?? '' }}</textarea>

      <button class="btn btn-primary mt-3">Save</button>

    </form>
  </div>
</div>

</div>
</div>

@include('admin.footer')
