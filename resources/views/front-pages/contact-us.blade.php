@extends('layouts.app')

@section('content')

    <!-- HERO SECTION -->
    <div class="bg-gradient-to-r from-teal-700 to-teal-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">हमसे संपर्क करें</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">आपके सुझाव, शिकायत या सहयोग के लिए हम हमेशा तैयार हैं। नीचे दिए गए तरीकों से हमें तुरंत बताएं!</p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">

            <!-- LEFT: CONTACT INFO + MAP -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">हमारे संपर्क विवरण</h2>

                <div class="space-y-8">
                    <!-- Address -->
                    <div class="flex items-start gap-4">
                        <div class="bg-teal-100 text-teal-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">पता</h3>
                            <p class="text-gray-600 mt-1">बायेपुर बाज़ार कार्यालय,<br>मुख्य बाजार, बायेपुर, जिला घाज़ीपुर,<br>उत्तर प्रदेश - 233001</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4">
                        <div class="bg-orange-100 text-orange-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">फोन / व्हाट्सएप</h3>
                            <p class="text-gray-600 mt-1">
                                <a href="tel:+919451591515" class="hover:text-teal-600">+91 9451591515 43210</a><br>
                                <a href="tel:+919123456789" class="hover:text-teal-600">+91 91234 56789 (सपोर्ट)</a>
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 text-blue-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">ईमेल</h3>
                            <p class="text-gray-600 mt-1">
                                <a href="mailto:support@bayepurbazaar.com" class="hover:text-teal-600">support@bayepurbazaar.com</a><br>
                                <a href="mailto:info@bayepurbazaar.com" class="hover:text-teal-600">info@bayepurbazaar.com</a>
                            </p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 text-green-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">कार्य समय</h3>
                            <p class="text-gray-600 mt-1">सोमवार से शनिवार: सुबह 9:00 से शाम 7:00 बजे<br>रविवार: बंद (आपातकालीन व्हाट्सएप उपलब्ध)</p>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mt-10">
                    <h3 class="font-semibold text-lg mb-4">सोशल मीडिया पर फॉलो करें</h3>
                    <div class="flex gap-6 text-3xl">
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-800"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-cyan-600 hover:text-cyan-800"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="text-green-600 hover:text-green-800"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Google Map -->
                <div class="mt-10">
                    <h3 class="font-semibold text-lg mb-4">हमारा स्थान</h3>
                    <div class="rounded-2xl overflow-hidden border shadow-sm h-80">
                        <!-- Replace with your actual embed code from Google Maps -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600.0000000000005!2d83.58000000000001!3d25.580000000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398f5e0000000001%3A0x0!2sGhazipur%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1690000000000" 
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <!-- RIGHT: CONTACT FORM -->
            <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-10 border">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">मैसेज भेजें</h2>
                <p class="text-gray-600 mb-8">आपका संदेश हमें तुरंत मिलेगा। कृपया सही जानकारी भरें।</p>

                <form id="contactForm" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">आपका नाम *</label>
                        <input type="text" required class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200" placeholder="पूर्ण नाम लिखें">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">मोबाइल नंबर *</label>
                            <input type="tel" required class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200" placeholder="9876543210">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ईमेल पता *</label>
                            <input type="email" required class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200" placeholder="your@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">विषय *</label>
                        <input type="text" required class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200" placeholder="जैसे: लिस्टिंग समस्या, सुझाव आदि">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">आपका संदेश *</label>
                        <textarea rows="6" required class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200" placeholder="अपनी समस्या या सुझाव विस्तार से लिखें..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-teal-600 to-orange-600 text-white py-4 rounded-2xl font-bold text-lg hover:from-teal-700 hover:to-orange-700 transition shadow-lg">
                        संदेश भेजें
                    </button>
                </form>

                <p class="text-center text-sm text-gray-500 mt-6">हम 24 घंटे के अंदर जवाब देंगे। धन्यवाद!</p>
            </div>
        </div>
    </div>

    <script>
        // Simple form submission alert (replace with real backend later)
        document.getElementById("contactForm").addEventListener("submit", function(e) {
            e.preventDefault();
            alert("धन्यवाद! आपका संदेश सफलतापूर्वक भेज दिया गया है। हम जल्द ही संपर्क करेंगे।");
            this.reset();
        });
    </script>
    @endsection
