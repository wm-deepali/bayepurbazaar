<style>
    .jd-mobile-btn {
        
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 4px;
    background: #f1f5f9;
    border-radius: 10px;
    padding: 10px 15px;
    font-size: 12px;
    color: #334155;
    transition: 0.3s;
}

.jd-mobile-btn i {
    font-size: 16px;
}

.jd-mobile-btn:hover {
    background: #e2e8f0;
}

@media (max-width: 768px) {
    .search-btnnow{
    display:none;
}
}
</style>

<header class="bg-white border-b shadow-sm sticky top-0 z-50">
  {{--  <div class="max-w-7xl mx-auto px-4 py-4">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">
                <img src="{{ asset('images/bayepurbazaar-logo.png') }}" class="h-12">

                <div>
                    <h1 class="text-3xl font-bold">
                        <span class="text-blue-900">BAYEPUR</span>
                        <span class="text-orange-600">BAZAAR</span>
                        <span class="text-blue-900">.COM</span>
                    </h1>

                    <p class="text-xs text-teal-700">
                        अपना गाँव, अपना बाज़ार, अपना विकास
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-4">

                <div class="relative w-80">
<input id="listingSearch"
       type="text"
       placeholder="दुकान, सेवा या उत्पाद खोजें..."
       class="w-full border border-gray-300 rounded-xl py-3 px-5 pl-12">
       <div id="searchSuggestions"
     class="absolute w-full bg-white border border-gray-200 rounded-xl mt-1 shadow-lg hidden z-50">
</div>
                    <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>


                @php
                    use App\Models\Location;

                    $locations = Location::orderBy('location')->get();
                @endphp

                <select id="locationFilter" class="border border-gray-300 rounded-xl px-4 py-3">

                    @foreach($locations as $location)

                                    <option value="{{ $location->id }}" {{ request()->has('location')
                        ? (request('location') == $location->id ? 'selected' : '')
                        : ($location->is_default ? 'selected' : '') }}>
                                        {{ $location->location }}
                                    </option>
                    @endforeach

                </select>


                <button onclick="window.location.href='{{ url('/#add-listing') }}'"
                    class="bg-teal-600 text-white px-6 py-3 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                        लिस्टिंग जोड़ें
                </button>
            </div>

        </div>

    </div>
    --}}
    <div class="max-w-7xl mx-auto px-4 py-2">

    <!-- ✅ MOBILE HEADER -->
    <div class="block lg:hidden">

    <!-- Logo + Text Row -->
<div class="flex items-center  gap-3" style="justify-content:space-between;">
    <div class="flex items-center  gap-1">
    
    <img src="{{ asset('images/bayepurbazaar-logo.png') }}"
         class="object-contain" style="height:50px;">

    <!-- Text -->
    <div class="text-left">
        <h1 class="text-xl font-extrabold leading-tight tracking-tight" style="font-size:20px;margin-top:5px;">
            <span class="text-blue-900">BAYEPUR</span>
            <span class="text-orange-600">BAZAAR</span>
        </h1>

        <p class="text-xs text-teal-700 font-medium">
            अपना गाँव, अपना बाज़ार
        </p>
    </div>
    </div>
    <div class="grid grid-cols-2 gap-2 ">

        <button onclick="toggleSearch()" class="jd-mobile-btn">
    <i class="fa-solid fa-search"></i>
    <span>खोजें</span>
</button>

<button onclick="toggleLocation()" class="jd-mobile-btn">
    <i class="fa-solid fa-location-dot"></i>
    <span>स्थान</span>
</button>


      

    </div>

</div>


    <!-- 3 Buttons -->
    <!--<div class="grid grid-cols-3 gap-2 ">-->

    <!--    <button onclick="toggleSearch()" class="jd-mobile-btn">-->
    <!--        <i class="fa-solid fa-search"></i>-->
    <!--        <span>Search</span>-->
    <!--    </button>-->

    <!--    <button onclick="toggleLocation()" class="jd-mobile-btn">-->
    <!--        <i class="fa-solid fa-location-dot"></i>-->
    <!--        <span>Location</span>-->
    <!--    </button>-->

    <!--    <button onclick="window.location.href='{{ url('/#add-listing') }}'"-->
    <!--        class="jd-mobile-btn bg-teal-600 text-white">-->
    <!--        <i class="fa-solid fa-plus"></i>-->
    <!--        <span>Add</span>-->
    <!--    </button>-->

    <!--</div>-->

    <!-- Search Box -->
    <div id="mobileSearch" class="hidden mt-3">
        <div class="relative">
            <input type="text"
                placeholder="दुकान, सेवा या उत्पाद खोजें..."
                class="w-full border border-gray-300 rounded-xl py-3 px-5 pl-12">

            <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>
    </div>

    <!-- Location -->
    <div id="mobileLocation" class="hidden mt-3">
        @php
                    use App\Models\Location;

                    $locations = Location::orderBy('location')->get();
                @endphp

                <select id="locationFilter" class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    @foreach($locations as $location)

                                    <option value="{{ $location->id }}" {{ request()->has('location')
                        ? (request('location') == $location->id ? 'selected' : '')
                        : ($location->is_default ? 'selected' : '') }}>
                                        {{ $location->location }}
                                    </option>
                    @endforeach

                </select>
    </div>

</div>



    <!-- ✅ DESKTOP HEADER (UNCHANGED) -->
    <div class="hidden lg:flex items-center justify-between">

        <div class="flex items-center gap-3">
            <img src="{{ asset('images/bayepurbazaar-logo.png') }}" class=""  style="height:50px;">

            <div>
                <h1 class="text-3xl font-bold" style="font-size:20px;margin-top:5px;">
                    <span class="text-blue-900">BAYEPUR</span>
                    <span class="text-orange-600">BAZAAR</span>
                    <span class="text-blue-900">.COM</span>
                </h1>

                <p class="text-xs text-teal-700">
                    अपना गाँव, अपना बाज़ार, अपना विकास
                </p>
            </div>
        </div>

        <!-- Desktop Controls -->
        <div class="flex items-center gap-4">

            <div class="relative w-80">
                <input type="text"
                    placeholder="दुकान, सेवा या उत्पाद खोजें..."
                    class="w-full border border-gray-300 rounded-xl py-3 px-5 pl-12">

                <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>

            <select class="border border-gray-300 rounded-xl px-4 py-3">
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">
                        {{ $location->location }}
                    </option>
                @endforeach
            </select>

            <button onclick="window.location.href='{{ url('/#add-listing') }}'"
                class="bg-teal-600 text-white px-6 py-3 rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-plus"></i>
                लिस्टिंग जोड़ें
            </button>

        </div>

    </div>

</div>

    <!-- CATEGORIES NAV -->

    @php
        use App\Models\Category;

        $categories = Category::where('status', 1)
            ->where('show_header', 1)
            ->orderBy('name')
            ->get();
    @endphp

    <nav class="bg-teal-50 border-t">
        <div class="max-w-7xl mx-auto px-4 py-3 overflow-x-auto">

            <div class="flex gap-8 whitespace-nowrap text-sm font-medium">

                <a href="{{ route('listing') }}" class="category-link active text-teal-700 hover:text-teal-800">
                    सभी श्रेणियाँ
                </a>

                @foreach($categories as $category)

                    <a href="{{ route('listing', ['category' => $category->slug]) }}" class="category-link"
                        data-category="{{ $category->slug }}">

                        {{ $category->name }}

                    </a>

                @endforeach

            </div>

        </div>
    </nav>
</header>
<script>
    document.getElementById('locationFilter').addEventListener('change', function () {

        let locationId = this.value;

        let url = new URL(window.location.href);

        url.searchParams.set('location', locationId);

        window.location.href = url.toString();

    });

    const searchInput = document.getElementById('listingSearch');
const suggestionsBox = document.getElementById('searchSuggestions');

searchInput.addEventListener('keyup', function(){

    let query = this.value;

    if(query.length < 2){
        suggestionsBox.style.display = 'none';
        return;
    }

    fetch(`/search-listings?search=${query}`)
    .then(res => res.json())
    .then(data => {

        if(data.length === 0){
            suggestionsBox.innerHTML = '<div class="p-3 text-gray-500">No results found</div>';
            suggestionsBox.style.display = 'block';
            return;
        }

        let html = '';

        data.forEach(item => {
            html += `
                <a href="/listing" 
                   class="block px-4 py-3 hover:bg-teal-50 border-b">
                   ${item.business_name}
                </a>
            `;
        });

        suggestionsBox.innerHTML = html;
        suggestionsBox.style.display = 'block';
    });

});
</script>
<script>
    function toggleSearch() {
    document.getElementById("mobileSearch").classList.toggle("hidden");
    document.getElementById("mobileLocation").classList.add("hidden");
}

function toggleLocation() {
    document.getElementById("mobileLocation").classList.toggle("hidden");
    document.getElementById("mobileSearch").classList.add("hidden");
}

</script>