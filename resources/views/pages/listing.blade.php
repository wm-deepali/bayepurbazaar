@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>बायेपुर बाज़ार - सभी लिस्टिंग्स</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');
        body { font-family: 'Noto Sans Devanagari', system-ui, sans-serif; }
        .sticky-top { position: sticky; top: 0; z-index: 40; }
        .listing-card { transition: all 0.25s ease; }
        .listing-card:hover { transform: translateY(-4px); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-gray-50">



    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- LEFT SIDEBAR - CATEGORIES -->
            <aside class="lg:w-80 bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit lg:sticky lg:top-20">
                <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
                    <i class="fa-solid fa-list text-teal-600"></i>
                    सभी श्रेणियाँ
                </h2>

                <ul class="space-y-2">
                    <li><a href="#" class="block px-4 py-3 rounded-xl bg-teal-50 text-teal-700 font-medium hover:bg-teal-100 transition">सभी श्रेणियाँ</a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>किराना स्टोर</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">148</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>स्वास्थ्य सेवाएँ</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">42</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>कृषि उत्पाद & उपकरण</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">67</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>शिक्षा & कोचिंग</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">31</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>कपड़े & फैशन</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">55</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>मोबाइल & इलेक्ट्रॉनिक्स</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">38</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>परिवहन & ट्रैवल</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">22</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>सैलून & ब्यूटी</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">19</span>
                    </a></li>
                    <li><a href="#" class="block px-4 py-3 rounded-xl hover:bg-gray-50 transition flex justify-between items-center">
                        <span>खुदरा दुकानें</span><span class="text-xs bg-gray-200 px-2 py-1 rounded-full">84</span>
                    </a></li>
                </ul>

                <div class="mt-8 pt-6 border-t">
                    <h3 class="font-semibold mb-4">फिल्टर</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">स्थान</label>
                            <select class="w-full border rounded-lg px-4 py-2">
                                <option>सभी स्थान</option>
                                <option>बायेपुर</option>
                                <option>मौखा</option>
                                <option>घाज़ीपुर शहर</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">सत्यापित</label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="rounded text-teal-600">
                                <span>केवल सत्यापित दिखाएँ</span>
                            </label>
                        </div>
                        <div>
                            <button class="w-full bg-teal-600 text-white py-3 rounded-xl mt-4 hover:bg-teal-700">
                                फ़िल्टर लागू करें
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- RIGHT SIDE - LISTINGS -->
            <div class="flex-1">
                <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
                    <h2 class="text-2xl font-bold">सभी लिस्टिंग्स <span class="text-gray-500 text-xl">(248 परिणाम)</span></h2>
                    
                    <div class="flex items-center gap-4">
                        <select class="border rounded-lg px-4 py-2 bg-white">
                            <option>प्रासंगिकता के अनुसार</option>
                            <option>नवीनतम पहले</option>
                            <option>सत्यापित पहले</option>
                            <option>रेटिंग के अनुसार</option>
                        </select>
                        <div class="flex border rounded-lg overflow-hidden">
                            <button class="px-4 py-2 bg-gray-100"><i class="fa-solid fa-th-large"></i></button>
                            <button class="px-4 py-2 bg-teal-600 text-white"><i class="fa-solid fa-list"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Horizontal Listing Cards -->
                <div class="space-y-6">

                    <!-- Listing 1 -->
                    <div class="listing-card bg-white rounded-2xl border border-gray-200 overflow-hidden flex flex-col md:flex-row">
                        <div class="md:w-64 h-64 md:h-auto relative flex-shrink-0">
                            <img src="https://c8.alamy.com/comp/FYB5A2/general-store-near-dharamshala-kangra-district-himachal-pradesh-india-FYB5A2.jpg" 
                                 alt="राम किराना" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-white text-teal-600 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 shadow">
                                <i class="fa-solid fa-circle-check"></i> सत्यापित
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold">राम किराना स्टोर</h3>
                                    <p class="text-sm text-gray-500 mt-1">किराना स्टोर • मुख्य बाजार, बायेपुर</p>
                                </div>
                                <span class="bg-teal-100 text-teal-700 px-4 py-1 rounded-full text-sm font-medium">किराना</span>
                            </div>
                            <p class="mt-4 text-gray-600 line-clamp-3 flex-1">
                                सभी प्रकार के घरेलू सामान, ताज़ा सब्जियाँ, फल, अनाज, मसाले, साबुन, तेल और रोज़मर्रा की ज़रूरत का सामान। प्रतिदिन नया स्टॉक। ग्राहक संतुष्टि हमारी प्राथमिकता।
                            </p>
                            <div class="mt-6 flex flex-wrap gap-4 items-center">
                                <a href="tel:9876543210" class="flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-xl hover:bg-teal-700">
                                    <i class="fa-solid fa-phone"></i> कॉल करें
                                </a>
                                <a href="https://wa.me/919876543210" target="_blank" class="flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600">
                                    <i class="fa-brands fa-whatsapp"></i> व्हाट्सएप
                                </a>
                                <span class="text-sm text-gray-500 flex items-center gap-1">
                                    <i class="fa-solid fa-location-dot"></i> बायेपुर, घाज़ीपुर
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Listing 2 -->
                    <div class="listing-card bg-white rounded-2xl border border-gray-200 overflow-hidden flex flex-col md:flex-row">
                        <div class="md:w-64 h-64 md:h-auto relative flex-shrink-0">
                            <img src="https://c8.alamy.com/comp/R93GB0/rural-hospital-maharashtra-india-R93GB0.jpg" 
                                 alt="बायेपुर क्लिनिक" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-white text-teal-600 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 shadow">
                                <i class="fa-solid fa-circle-check"></i> सत्यापित
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold">बायेपुर हेल्थ क्लिनिक</h3>
                                    <p class="text-sm text-gray-500 mt-1">स्वास्थ्य सेवाएँ • नया मोहल्ला, बायेपुर</p>
                                </div>
                                <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm font-medium">स्वास्थ्य</span>
                            </div>
                            <p class="mt-4 text-gray-600 line-clamp-3 flex-1">
                                डॉ. अजय सिंह द्वारा संचालित क्लिनिक। सामान्य चिकित्सा, टीकाकरण, छोटी-मोटी सर्जरी, लैब टेस्ट, ब्लड प्रेशर चेकअप। 24 घंटे आपातकालीन सेवा उपलब्ध।
                            </p>
                            <div class="mt-6 flex flex-wrap gap-4 items-center">
                                <a href="tel:9456123789" class="flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-xl hover:bg-teal-700">
                                    <i class="fa-solid fa-phone"></i> कॉल करें
                                </a>
                                <a href="https://wa.me/919456123789" target="_blank" class="flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600">
                                    <i class="fa-brands fa-whatsapp"></i> व्हाट्सएप
                                </a>
                                <span class="text-sm text-gray-500 flex items-center gap-1">
                                    <i class="fa-solid fa-clock"></i> सुबह 8 से रात 10 बजे
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Listing 3 -->
                    <div class="listing-card bg-white rounded-2xl border border-gray-200 overflow-hidden flex flex-col md:flex-row">
                        <div class="md:w-64 h-64 md:h-auto relative flex-shrink-0">
                            <img src="https://ichef.bbci.co.uk/ace/standard/976/cpsprodpb/3940/production/_91965641_thinkstockphotos-135223888-1.jpg" 
                                 alt="शिव कृषि उपकरण" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-white text-teal-600 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 shadow">
                                <i class="fa-solid fa-circle-check"></i> सत्यापित
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold">शिव कृषि उपकरण केंद्र</h3>
                                    <p class="text-sm text-gray-500 mt-1">कृषि • बायेपुर रोड, घाज़ीपुर</p>
                                </div>
                                <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm font-medium">कृषि</span>
                            </div>
                            <p class="mt-4 text-gray-600 line-clamp-3 flex-1">
                                ट्रैक्टर, पावर टिलर, स्प्रेयर, हार्वेस्टर, बीज ड्रिल आदि सभी कृषि मशीनरी उपलब्ध। मरम्मत, सर्विसिंग और किराए पर भी। स्पेयर पार्ट्स की पूरी दुकान।
                            </p>
                            <div class="mt-6 flex flex-wrap gap-4 items-center">
                                <a href="tel:9988776655" class="flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-xl hover:bg-teal-700">
                                    <i class="fa-solid fa-phone"></i> कॉल करें
                                </a>
                                <a href="https://wa.me/919988776655" target="_blank" class="flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600">
                                    <i class="fa-brands fa-whatsapp"></i> व्हाट्सएप
                                </a>
                                <span class="text-sm text-gray-500 flex items-center gap-1">
                                    <i class="fa-solid fa-tractor"></i> ट्रैक्टर किराया भी
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- You can add 4-5 more similar cards here -->

                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center gap-3">
                    <button class="px-6 py-3 border rounded-xl hover:bg-gray-50">पिछला</button>
                    <button class="px-6 py-3 bg-teal-600 text-white rounded-xl">1</button>
                    <button class="px-6 py-3 border rounded-xl hover:bg-gray-50">2</button>
                    <button class="px-6 py-3 border rounded-xl hover:bg-gray-50">3</button>
                    <button class="px-6 py-3 border rounded-xl hover:bg-gray-50">अगला</button>
                </div>
            </div>
        </div>
    </main>

@endsection