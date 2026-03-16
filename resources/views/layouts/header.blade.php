<header class="bg-white border-b shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">
                <img src="{{ asset('images/bayepurbazaar-logo.jpeg') }}" class="h-12">

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
                    <input type="text" placeholder="दुकान, सेवा या उत्पाद खोजें..."
                        class="w-full border border-gray-300 rounded-xl py-3 px-5 pl-12">

                    <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>


                @php
                    use App\Models\Location;

                    $locations = Location::orderBy('location')->get();
                @endphp

                <select class="border border-gray-300 rounded-xl px-4 py-3">

                    @foreach($locations as $location)

                        <option value="{{ $location->id }}" {{ $location->is_default ? 'selected' : '' }}>
                            {{ $location->location }}
                        </option>

                    @endforeach

                </select>

                <button class="bg-teal-600 text-white px-6 py-3 rounded-xl flex items-center gap-2">
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

                <a href="#" onclick="filterCategory(this)"
                    class="category-link active text-teal-700 hover:text-teal-800">
                    सभी श्रेणियाँ
                </a>

                @foreach($categories as $category)

                    <a href="#" onclick="filterCategory(this)" class="category-link" data-category="{{ $category->slug }}">

                        {{ $category->name }}

                    </a>

                @endforeach

            </div>

        </div>
    </nav>
</header>