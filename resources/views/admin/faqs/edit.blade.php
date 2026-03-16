@include('admin.top-header')
<div class="main-section">
    @include('admin.header')

    <style>
        .form-group {
            margin-bottom: 18px;
        }

        .product-detail-main {
            padding-bottom: 70px;
        }
    </style>

    <div class="app-content content container-fluid">
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.manage-faq.index') }}">FAQ</a></li>
                    <li class="breadcrumb-item active">Edit FAQ</li>
                </ol>
            </div>
        </div>
        <div class="card" style="margin: 1rem;">
            <div class="card-body content-wrapper">
                <form action="{{ route('admin.manage-faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="product-detail-main">

                        <div class="form-group">
                            <label>Question <span class="required">*</span></label>
                            <input type="text" class="form-control" name="question"
                                value="{{ old('question', $faq->question) }}">
                            @error('question')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Answer <span class="required">*</span></label>
                            <textarea class="form-control" name="answer"
                                rows="6">{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button class="btn bg-secondary text-white">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')