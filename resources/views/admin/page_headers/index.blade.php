@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
    <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Page Headings</li>
            </ol>
        </div>
        {{-- REMOVE CREATE BUTTON --}}
        {{-- <div class="add-back ml-auto mr-2"></div> --}}
    </div>

    <div class="content-wrapper pb-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width:18%">Page</th>
                <th style="width:30%">Title</th>
                <th>Subtitle</th>
                <th style="width:90px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($headers as $header)
                <tr>
                    <td>{{ ucfirst($header->page) }}</td>
                    <td>{{ $header->title }}</td>
                    <td>{!! Str::limit(strip_tags($header->subtitle), 130) !!}</td>
                    <td>
                        <a href="{{ route('admin.page-headers.edit',$header->id) }}" class="text-dark">
                            <i class="fa fa-pencil"></i>
                        </a>
                        {{-- DELETE REMOVED --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@include('admin.footer')
