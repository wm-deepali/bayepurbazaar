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
                <li class="breadcrumb-item"><a href="{{ route('admin.manage-team.index') }}" class="text-decoration-none">Team</a></li>
                <li class="breadcrumb-item">Add Team Member</li>
            </ol>
        </div>
        <div class="add-back ml-auto mr-2">
            <a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>
        </div>
    </div>

   <div class="card" style="margin: 1rem;">
        <div class="card-body content-wrapper">
        <form class="product-details-information" action="{{ route('admin.manage-team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="product-detail-main">

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control label">Member Name <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control label">Designation <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ old('designation') }}">
                        @error('designation')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control label">Short Content</label>
                        <textarea class="form-control" name="short_content" rows="3">{{ old('short_content') }}</textarea>
                        @error('short_content')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="label-control label">Image <span class="required">*</span></label>
                        <input type="file" class="form-control" name="image">
                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
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
