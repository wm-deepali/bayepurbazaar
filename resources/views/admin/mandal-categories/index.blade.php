@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Manage Mandal Categories
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.mandal-categories.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Category
                </a>
            </div>

        </div>


        <div class="content-wrapper pb-4">
            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Manage Mandal Categories</strong>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $cat)
                                <tr id="row{{ $cat->id }}">
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>

                                    <td>
                                        @if($cat->status)
                                            <span class="badge bg-primary">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.mandal-categories.edit', $cat->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Edit
                                        </a>

                                        <button onclick="deleteCategory({{ $cat->id }})" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
</div>

@include('admin.footer')

<script>
    function deleteCategory(id) {
        if (confirm('Delete this category?')) {
            $.ajax({
                url: "{{ url('admin/mandal-categories') }}/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function (res) {
                    alert(res.message);
                    $("#row" + id).remove();
                }
            });
        }
    }
</script>