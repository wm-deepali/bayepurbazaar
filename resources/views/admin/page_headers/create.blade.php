@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<style>
    .form-group { margin-bottom: 18px; }
    .product-detail-main { padding-bottom: 70px; }
</style>

<div class="app-content content container-fluid">
    <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.page-headers.index') }}">Page Headings</a></li>
                <li class="breadcrumb-item active">Add Page Heading</li>
            </ol>
        </div>
    </div>

    <div class="card" style="margin: 1rem;">
        <div class="card-body content-wrapper">
        <form action="{{ route('admin.page-headers.store') }}" method="POST">
        @csrf
            <div class="product-detail-main">

                <div class="form-group">
                    <label>Page Name <span class="required">*</span></label>
                    <select name="page" class="form-control" required>
                        <option value="">Select Page</option>
                        @foreach($pages as $page)
                            <option value="{{ $page }}">{{ ucfirst($page) }}</option>
                        @endforeach
                    </select>
                    @error('page')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label>Heading Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Page heading title" required>
                    @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label>Sub Title <span class="required">*</span></label>
                    <textarea name="subtitle" class="form-control" rows="4" placeholder="Write short description" required></textarea>
                    @error('subtitle')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <button class="btn bg-secondary text-white">Submit</button>

            </div>
        </form>
    </div>
    </div>
</div>

@include('admin.footer')
