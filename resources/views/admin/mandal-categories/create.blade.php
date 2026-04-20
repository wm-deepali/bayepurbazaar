@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top mb-3">
            <h5>Add Mandal Category</h5>
        </div>

        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('admin.mandal-categories.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <input type="checkbox" name="status" checked> Active
                    </div>

                    <button class="btn btn-success mt-3">Save</button>

                </form>

            </div>
        </div>

    </div>
</div>

@include('admin.footer')