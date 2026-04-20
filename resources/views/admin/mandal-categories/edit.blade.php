@include('admin.top-header')

<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">

<div class="breadcrumbs-top mb-3">
<h5>Edit Mandal Category</h5>
</div>

<div class="card">
<div class="card-body">

<form method="POST" action="{{ route('admin.mandal-categories.update',$category->id) }}">
@csrf
@method('PUT')

<div class="form-group">
<label>Category Name</label>
<input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
</div>

<div class="form-group mt-3">
<input type="checkbox" name="status" {{ $category->status ? 'checked':'' }}> Active
</div>

<button class="btn btn-success mt-3">Update</button>

</form>

</div>
</div>

</div>
</div>

@include('admin.footer')