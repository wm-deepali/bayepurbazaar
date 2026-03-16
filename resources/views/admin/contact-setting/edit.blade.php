@include('admin.top-header')
<div class="main-section">
    @include('admin.header')

    <div class="app-content content container-fluid">
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contact Settings</li>
                </ol>
            </div>
        </div>

        <div class="card" style="margin: 1rem;">
            <div class="card-body content-wrapper">
                <form action="{{ route('admin.contact.setting.update') }}" method="POST">
                    @csrf
                    
                    <h5>Contact Info</h5>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}">
                    </div>

                    <div class="form-group">
                        <label>Phone Description</label>
                        <textarea class="form-control" rows="2"
                            name="phone_description">{{ $contact->phone_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $contact->email }}">
                    </div>

                    <div class="form-group">
                        <label>Email Description</label>
                        <textarea class="form-control" rows="2"
                            name="email_description">{{ $contact->email_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $contact->address }}">
                    </div>

                    <div class="form-group">
                        <label>Address Description</label>
                        <textarea class="form-control" rows="2"
                            name="address_description">{{ $contact->address_description }}</textarea>
                    </div>

                    <hr>
                    <h5>Social Links</h5>

                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="{{ $contact->facebook }}">
                    </div>

                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{ $contact->instagram }}">
                    </div>

                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" class="form-control" name="twitter" value="{{ $contact->twitter }}">
                    </div>

                    <hr>
                    <h5>Map</h5>

                    <div class="form-group">
                        <label>Google Map Embed</label>
                        <textarea class="form-control" rows="3" name="map_embed">{{ $contact->map_embed }}</textarea>
                    </div>

                    <button class="btn bg-secondary text-white">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')