@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<style>
    .form-group { margin-bottom: 18px; }
    .product-detail-main { padding-bottom: 70px; }
    .preview-img { margin-top:8px; border-radius:4px; }
</style>

<div class="app-content content container-fluid">
    <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.manage-disease.index') }}">Disease</a></li>
                <li class="breadcrumb-item active">Add Disease / Treatment</li>
            </ol>
        </div>
    </div>

   <div class="card" style="margin: 1rem;">
        <div class="card-body content-wrapper">
        <form action="{{ route('admin.manage-disease.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="product-detail-main">

                <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter disease name">
                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label>Short Description (Optional)</label>
                    <textarea class="form-control" name="short_description" rows="3"></textarea>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Thumbnail Image</label>
                        <input type="file" class="form-control" name="thumbnail_image">
                    </div>

                    <div class="col-md-6">
                        <label>Banner Image</label>
                        <input type="file" class="form-control" name="banner_image">
                    </div>
                </div>

                <div class="form-group">
                    <label>Detail Content (Optional)</label>
                    <textarea class="form-control" name="detail_content" id="editor" rows="6"></textarea>
                </div>

                <hr>
                <h5 class="mb-2">SEO Section</h5>

                <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title">
                </div>

                <div class="form-group">
                    <label>Meta Keywords</label>
                    <textarea class="form-control" name="meta_keyword" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3"></textarea>
                </div>

                <button class="btn bg-secondary text-white">Submit</button>

            </div>
        </form>
    </div>
</div>
</div>

@include('admin.footer')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor");
</script>
