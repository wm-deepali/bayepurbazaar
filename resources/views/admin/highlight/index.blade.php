@include('admin.top-header')
<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb bg-transparent mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Highlight</li>
    </ol>
  </div>
</div>

<div class="card" style="margin:1rem;">
  <div class="card-body">
    <form method="POST" action="{{ route('admin.highlight.update') }}" enctype="multipart/form-data">
      @csrf

      {{-- TITLE --}}
      <label class="mt-2">Title</label>
      <input type="text" class="form-control mb-2" name="title"
        value="{{ $highlight->title ?? '' }}">

      {{-- IMAGE --}}
      <label>Highlight Image</label><br>
      @if($highlight && $highlight->image)
        <img src="{{ asset('storage/'.$highlight->image) }}" style="height:80px" class="mb-2"><br>
      @endif
      <input type="file" class="form-control mb-3" name="image_file">

      {{-- SHORT DESCRIPTION --}}
      <label>Short Description</label>
      <textarea class="form-control mb-4" rows="3" name="short_description">{{ $highlight->short_description ?? '' }}</textarea>


      {{-- EXISTING ITEMS --}}
      <h5>Existing Highlight Features</h5>
      <div id="existing-items">
        @forelse($highlight->items as $item)
          <div class="border rounded p-2 mb-2 position-relative">
            <small class="text-muted">Feature #{{ $loop->iteration }}</small>

            {{-- NAME --}}
            <input type="text" class="form-control my-2"
              name="items[{{ $item->id }}][name]"
              value="{{ $item->name }}" placeholder="Feature Name">

            {{-- IMAGE --}}
            @if($item->image)
              <img src="{{ asset('storage/'.$item->image) }}" style="height:60px" class="mb-2"><br>
            @endif
            <input type="file" class="form-control mb-2"
              name="items[{{ $item->id }}][image_file]">

            {{-- SHORT DESC --}}
            <textarea class="form-control mb-2" rows="2"
              name="items[{{ $item->id }}][short_description]"
              placeholder="Short Description">{{ $item->short_description }}</textarea>

            <button type="button" class="btn btn-danger btn-sm"
              onclick="deleteItem({{ $item->id }})">
              <i class="fa fa-trash"></i>
            </button>
          </div>
        @empty
          <p>No highlight features added yet.</p>
        @endforelse
      </div>

      {{-- ADD NEW ITEMS --}}
      <h5 class="mt-3">Add New Features</h5>
      <div id="new-items"></div>

      <button type="button" class="btn btn-secondary mt-2" id="addMoreBtn">
        <i class="fa fa-plus"></i> Add Feature
      </button>

      <button class="btn btn-primary mt-3 float-right">Save Changes</button>

    </form>
  </div>
</div>

</div>
</div>

@include('admin.footer')

<script>
let addIndex = 0;

document.getElementById('addMoreBtn').addEventListener('click', function() {
    let box = `
      <div class="border rounded p-2 mb-2">
        <input type="text" class="form-control my-2"
          name="new_items[${addIndex}][name]" placeholder="Feature Name">

        <input type="file" class="form-control mb-2"
          name="new_items[${addIndex}][image_file]">

        <textarea class="form-control mb-2" rows="2"
          name="new_items[${addIndex}][short_description]"
          placeholder="Short Description"></textarea>
      </div>`;
    document.getElementById('new-items').insertAdjacentHTML('beforeend', box);
    addIndex++;
});

function deleteItem(id){
  Swal.fire({
      title: 'Delete?',
      text: 'Delete this highlight feature?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete'
  }).then((res)=>{
      if(res.isConfirmed){
        $.ajax({
            url: "{{ url('admin/highlight-item/delete') }}/" + id,
            type: "DELETE",
            data: {_token: "{{ csrf_token() }}"},
            success: function(msg){
                Swal.fire('Deleted!', 'Feature removed', 'success');
                setTimeout(()=>location.reload(), 800);
            }
        })
      }
  });
}
</script>
