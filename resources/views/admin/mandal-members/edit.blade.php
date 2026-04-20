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

<li class="breadcrumb-item">
<a href="{{ route('admin.mandal-members.index') }}">Manage Mandal Members</a>
</li>

<li class="breadcrumb-item active">
Edit Member
</li>

</ol>
</div>
</div>

<div class="content-wrapper pb-4">
<div class="card shadow-sm">

<div class="card-header">
<strong>Edit Mandal Member</strong>
</div>

<div class="card-body">

<form id="memberForm" method="POST"
action="{{ route('admin.mandal-members.update',$member->id) }}"
enctype="multipart/form-data">

@csrf
@method('PUT')

{{-- CATEGORY --}}
<div class="form-group">
<label>Mandal Category *</label>
<select name="mandal_category_id" id="category" class="form-control" required>
<option value="">Select Category</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}"
{{ $member->mandal_category_id == $cat->id ? 'selected':'' }}>
{{ $cat->name }}
</option>
@endforeach
</select>
</div>

{{-- MANDAL --}}
<div class="form-group mt-3">
<label>Mandal *</label>
<select name="mandal_id" id="mandal" class="form-control" required>
@foreach($mandals as $mandal)
<option value="{{ $mandal->id }}"
{{ $member->mandal_id == $mandal->id ? 'selected':'' }}>
{{ $mandal->name }}
</option>
@endforeach
</select>
</div>

{{-- PHOTO --}}
<div class="form-group mt-3">
<label>Member Photo</label>

@if($member->photo)
<div class="mb-2">
<img src="{{ asset('storage/'.$member->photo) }}"
style="width:70px;height:70px;border-radius:50%;object-fit:cover;">
</div>
@endif

<input type="file" name="photo" class="form-control">
</div>

{{-- NAME --}}
<div class="form-group mt-3">
<label>Member Name *</label>
<input type="text" name="name" class="form-control"
value="{{ $member->name }}" required>
</div>

{{-- NEW --}}
<div class="form-group mt-3">
<label>Father Name</label>
<input type="text" name="father_name" class="form-control"
value="{{ $member->father_name }}">
</div>

<div class="form-group mt-3">
<label>Gender</label>
<select name="gender" class="form-control">
<option value="">Select</option>
<option value="Male" {{ $member->gender=='Male'?'selected':'' }}>Male</option>
<option value="Female" {{ $member->gender=='Female'?'selected':'' }}>Female</option>
</select>
</div>

{{-- OLD --}}
<div class="form-group mt-3">
<label>Designation</label>
<input type="text" name="designation" class="form-control"
value="{{ $member->designation }}">
</div>

<div class="form-group mt-3">
<label>Location</label>
<input type="text" name="location" class="form-control"
value="{{ $member->location }}">
</div>

<div class="form-group mt-3">
<label>Member Since</label>
<input type="text" name="since" class="form-control"
value="{{ $member->since }}">
</div>

<div class="form-group mt-3">
<label>Mobile *</label>
<input type="text" name="mobile" class="form-control"
value="{{ $member->mobile }}" required>
</div>

<div class="form-group mt-3">
<label>WhatsApp</label>
<input type="text" name="whatsapp" class="form-control"
value="{{ $member->whatsapp }}">
</div>

{{-- NEW --}}
<div class="form-group mt-3">
<label>Code</label>
<input type="text" name="code" class="form-control"
value="{{ $member->code }}">
</div>

<div class="form-group mt-3">
<label>Address</label>
<textarea name="address" class="form-control">{{ $member->address }}</textarea>
</div>

<div class="form-group mt-3">
<label>Experience</label>
<textarea name="experience" class="form-control">{{ $member->experience }}</textarea>
</div>

<div class="form-group mt-3">
<label>Suggestion</label>
<textarea name="suggestion" class="form-control">{{ $member->suggestion }}</textarea>
</div>

{{-- STATE --}}
<div class="form-group mt-3">
<label>State</label>
<select name="state_id" id="state" class="form-control">
<option value="">Select State</option>
@foreach($states as $state)
<option value="{{ $state->id }}"
{{ $member->state_id == $state->id ? 'selected':'' }}>
{{ $state->name }}
</option>
@endforeach
</select>
</div>

{{-- CITY --}}
<div class="form-group mt-3">
<label>City</label>
<select name="city_id" id="city" class="form-control">
<option value="">Select City</option>
@foreach($cities as $city)
<option value="{{ $city->id }}"
{{ $member->city_id == $city->id ? 'selected':'' }}>
{{ $city->name }}
</option>
@endforeach
</select>
</div>

<div class="form-group mt-3">
<label>Pin Code</label>
<input type="text" name="pin_code" class="form-control"
value="{{ $member->pin_code }}">
</div>

  <div class="form-group mt-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $member->email }}">
                        </div>
{{-- RELATION --}}
<div class="form-group mt-3">
<label>Relation With Bayepur</label>
<select name="relation" class="form-control">
<option value="">Select</option>
<option value="native" {{ $member->relation == 'native' ? 'selected':'' }}>मैं बयेपुर का मूल निवासी हूँ</option>
<option value="resident" {{ $member->relation == 'resident' ? 'selected':'' }}>मैं अभी बयेपुर में रहता हूँ</option>
<option value="nri" {{ $member->relation == 'nri' ? 'selected':'' }}>मैं बाहर रहता हूँ</option>
<option value="wellwisher" {{ $member->relation == 'wellwisher' ? 'selected':'' }}>मैं शुभचिंतक हूँ</option>
</select>
</div>

{{-- CONTRIBUTION --}}
@php
$contributions = $member->contribution ? explode(',', $member->contribution) : [];
@endphp

<div class="form-group mt-3">
<label>Contribution</label>
<div class="row">

@foreach([
'mandal'=>'मंडल में शामिल होना',
'digital_help'=>'दुकानदारों की डिजिटल मदद',
'problem_solving'=>'गाँव की समस्याओं का समाधान',
'volunteer'=>'वॉलंटियर / सोशल वर्क',
'other'=>'अन्य तरीके से योगदान'
] as $key => $label)

<div class="col-md-6 mb-2">
<label class="d-flex align-items-center gap-2 border rounded p-2">
<input type="checkbox" name="contribution[]" value="{{ $key }}"
{{ in_array($key,$contributions)?'checked':'' }}>
<span>{{ $label }}</span>
</label>
</div>

@endforeach

</div>
</div>

{{-- MESSAGE --}}
<div class="form-group mt-3">
<label>Member Message</label>
<textarea name="message" class="form-control" rows="4">
{{ $member->message }}
</textarea>
</div>

{{-- STATUS --}}
<div class="form-group mt-3">
<div class="custom-control custom-checkbox">
<input type="checkbox" name="status" id="status"
class="custom-control-input"
{{ $member->status ? 'checked':'' }}>
<label class="custom-control-label" for="status">Active</label>
</div>
</div>

<div class="mt-4">
<button type="submit" id="saveBtn" class="btn btn-success">
Update Member
</button>

<a href="{{ route('admin.mandal-members.index') }}" class="btn btn-secondary">
Cancel
</a>
</div>

</form>

</div>
</div>
</div>

</div>
</div>

@include('admin.footer')

<script>

// category → mandal
$('#category').change(function(){
let id = $(this).val();
$.get('/get-mandals/'+id,function(data){
$('#mandal').html('<option value="">Select Mandal</option>');
data.forEach(item=>{
$('#mandal').append(`<option value="${item.id}">${item.name}</option>`);
});
});
});

// state → city
$('#state').change(function(){
let id = $(this).val();
$.get('/get-cities/'+id,function(data){
$('#city').html('<option value="">Select City</option>');
data.forEach(item=>{
$('#city').append(`<option value="${item.id}">${item.name}</option>`);
});
});
});

// submit loader
document.getElementById('memberForm').addEventListener('submit',function(){
let btn=document.getElementById('saveBtn');
btn.disabled=true;
btn.innerHTML='Updating...';
});

</script>