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
                    <input type="text"
                           placeholder="दुकान, सेवा या उत्पाद खोजें..."
                           class="w-full border border-gray-300 rounded-xl py-3 px-5 pl-12">

                    <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>

                <select class="border border-gray-300 rounded-xl px-4 py-3">
                    <option>बायेपुर</option>
                    <option>घाज़ीपुर</option>
                </select>

                <button class="bg-teal-600 text-white px-6 py-3 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    लिस्टिंग जोड़ें
                </button>

            </div>

        </div>

    </div>
    <!-- CATEGORIES NAV -->
        <nav class="bg-teal-50 border-t">
            <div class="max-w-7xl mx-auto px-4 py-3 overflow-x-auto">
                <div class="flex gap-8 whitespace-nowrap text-sm font-medium">
                    <a href="#" onclick="filterCategory(this)" class="category-link active text-teal-700 hover:text-teal-800">सभी श्रेणियाँ</a>
                    <a href="#" onclick="filterCategory(this)" class="category-link">किराना स्टोर</a>
                    <a href="#" onclick="filterCategory(this)" class="category-link">स्वास्थ्य सेवाएँ</a>
                    <a href="#" onclick="filterCategory(this)" class="category-link">कृषि उत्पाद</a>
                    <a href="#" onclick="filterCategory(this)" class="category-link">शिक्षा</a>
                    <a href="#" onclick="filterCategory(this)" class="category-link">कपड़े &amp; फैशन</a>
                    <a href="#" onclick="filterCategory(this)" class="category-link">परिवहन</a>
                    <a href="#" onclick="filterCategory(this)" class="category-link">इलेक्ट्रॉनिक्स</a>
                </div>
            </div>
        </nav>
</header>