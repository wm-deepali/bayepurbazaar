<!-- FOOTER -->
<footer class="bg-[#0f172a] text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 pt-16 pb-8">

        <!-- Top Footer -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-10">

            <!-- Brand Section -->
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-5">
                    <img src="bayepurbazaar-logo.jpeg" alt="Logo" class="h-12 w-auto">
                    <span class="text-2xl font-bold tracking-wide">BAYEPURBAZAAR</span>
                </div>
                <p class="text-sm text-gray-400 leading-7 max-w-md">
                    अपना गाँव, अपना बाज़ार, अपना विकास। बायेपुर का डिजिटल बाज़ार।
                </p>
            </div>

            <!-- Categories -->
            @php
                use App\Models\Category;

                $categories = Category::where('status', 1)
                    ->where('show_footer', 1)
                    ->orderBy('name')
                    ->get();
            @endphp
            <div>
                <h5 class="font-semibold mb-5 text-teal-400 text-base">श्रेणियाँ</h5>
                <ul class="space-y-3 text-sm text-gray-300">
                    @foreach($categories as $category)
                        <a href="#" onclick="filterCategory(this)" class="category-link"
                            data-category="{{ $category->slug }}">

                            {{ $category->name }}

                        </a>
                        <li><a href="#" class="hover:text-teal-300 transition">किराना</a></li>
                        <li><a href="#" class="hover:text-teal-300 transition">स्वास्थ्य</a></li>
                        <li><a href="#" class="hover:text-teal-300 transition">कृषि</a></li>
                        <li><a href="#" class="hover:text-teal-300 transition">शिक्षा</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Company -->
            <!-- Company -->
            <div>
                <h5 class="font-semibold mb-5 text-teal-400 text-base">कंपनी</h5>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a href="#" class="hover:text-teal-300 transition">हमारे बारे में</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">बायेपुर बाज़ार क्यों</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">सदस्य पंजीकरण</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">संपर्क करें</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">ब्लॉग्स</a></li>
                </ul>
            </div>

            <!-- Terms & Policies -->
            <div>
                <h5 class="font-semibold mb-5 text-teal-400 text-base">नियम एवं नीतियाँ</h5>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a href="#" class="hover:text-teal-300 transition">नियम एवं शर्तें</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">गोपनीयता नीति</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">अस्वीकरण</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">सहायता एवं समर्थन</a></li>
                    <li><a href="#" class="hover:text-teal-300 transition">सामान्य प्रश्न (FAQ)</a></li>
                </ul>
            </div>



        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-700 mt-14 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-400">

                <p>© 2026 BayepurBazaar.com | सभी अधिकार सुरक्षित</p>

                <div class="flex flex-wrap justify-center gap-5">
                    <a href="#" class="hover:text-white transition">गोपनीयता नीति</a>
                    <a href="#" class="hover:text-white transition">उपयोग की शर्तें</a>
                    <a href="#" class="hover:text-white transition">संपर्क</a>
                </div>

                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-heart text-red-500"></i>
                    बायेपुर के लिए बनाया गया
                </p>

            </div>
        </div>

    </div>
</footer>