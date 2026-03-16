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
                <li class="breadcrumb-item active">Edit Disease / Treatment</li>
            </ol>
        </div>
    </div>

    <div class="card" style="margin: 1rem;">
        <div class="card-body content-wrapper">
        <form action="{{ route('admin.manage-disease.update', $disease->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="product-detail-main">

                <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name',$disease->name) }}">
                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label>Short Description (Optional)</label>
                    <textarea class="form-control" name="short_description" rows="3">{{ old('short_description',$disease->short_description) }}</textarea>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Thumbnail Image</label>
                        <input type="file" class="form-control" name="thumbnail_image">
                        @if($disease->thumbnail_image)
                            <img src="{{ asset('storage/'.$disease->thumbnail_image) }}" height="80" class="preview-img">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label>Banner Image</label>
                        <input type="file" class="form-control" name="banner_image">
                        @if($disease->banner_image)
                            <img src="{{ asset('storage/'.$disease->banner_image) }}" height="80" class="preview-img">
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label>Detail Content (Optional)</label>
                    <textarea class="form-control" name="detail_content" id="editor" rows="6">{{ old('detail_content',$disease->detail_content) }}</textarea>
                </div>

                <hr>
                <h5 class="mb-2">SEO Section</h5>

                <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title',$disease->meta_title) }}">
                </div>

                <div class="form-group">
                    <label>Meta Keywords</label>
                    <textarea class="form-control" name="meta_keyword" rows="2">{{ old('meta_keyword',$disease->meta_keyword) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3">{{ old('meta_description',$disease->meta_description) }}</textarea>
                </div>

                <button class="btn bg-secondary text-white">Update</button>

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
