@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<style>
    .input-none input {
        visibility: hidden;
        height: 1px !important;
    }
    .row.input-none i {
        width: 100%;
        background: #c4c4c4;
        padding: 20px;
        border-radius: 20px;
        text-align: center;
        color: #fff;
        cursor: pointer;
    }
    .input-none .filelabel {
        width: 100%;
        cursor: pointer;
    }
</style>

<div class="app-content content container-fluid">
    <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.manage-blog.index') }}" class="text-decoration-none">Blogs</a></li>
                <li class="breadcrumb-item">Add Blog</li>
            </ol>
        </div>
        <div class="add-back ml-auto mr-2">
            <a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>
        </div>
    </div>

   <div class="card" style="margin: 1rem;">
        <div class="card-body content-wrapper">
        <form class="product-details-information" action="{{ route('admin.manage-blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="product-detail-main">

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="label-control label">Thumbnail Image <span class="required">*</span></label>
                        <input type="file" class="form-control" name="thumbnail_image">
                        @error('thumbnail_image')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="label-control label">Banner Image</label>
                        <input type="file" class="form-control" name="banner_image">
                        @error('banner_image')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control label">Short Description (Optional)</label>
                        <textarea class="form-control" name="short_description" rows="3"></textarea>
                        @error('short_description')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control label">Detail Content <span class="required">*</span></label>
                        <textarea class="form-control" name="detail_content" id="editor" cols="30" rows="10"></textarea>
                        @error('detail_content')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="wdinput submit-btn-detail">
                    <input type="submit" value="Submit" class="form-control bg-secondary text-white">
                </div>

            </div>
        </form>
     </div>
    </div>
</div>

@include('admin.footer')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor", {
        filebrowserUploadUrl: "{{ route('admin.editor-image-upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form',
    });
</script>
</body>
</html>
