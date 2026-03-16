@extends('layouts.app')

@section('content')




    <!-- MAIN CONTENT -->
    <main class="max-w-5xl mx-auto px-6 py-12 md:py-16">

        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-red-700 mb-4">डिस्क्लेमर</h1>
            <p class="text-lg text-gray-600">अंतिम अपडेट: 15 मार्च 2026</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-red-100 p-8 md:p-12">

            <div class="warning-box mb-10">
                <div class="flex items-start gap-4">
                    <i class="fa-solid fa-triangle-exclamation text-5xl text-red-600 mt-1"></i>
                    <div>
                        <h2 class="text-2xl font-bold text-red-700 mb-3">महत्वपूर्ण सूचना</h2>
                        <p class="text-lg text-red-800 leading-relaxed">
                            BayepurBazaar.com पर उपलब्ध सभी जानकारी <strong>केवल उपयोगकर्ताओं (व्यापारियों/दुकानदारों) द्वारा प्रदान की गई है</strong>।<br>
                            हम किसी भी जानकारी की सत्यता, पूर्णता या सटीकता की गारंटी <strong>नहीं</strong> देते हैं।
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-10 text-lg leading-relaxed">

                <div>
                    <h2 class="section-title text-2xl font-bold mb-5">1. सूचना की प्रकृति</h2>
                    <p>
                        यह प्लेटफॉर्म एक स्थानीय डायरेक्टरी/सूचना मंच मात्र है। यहाँ दिखाई जाने वाली सभी लिस्टिंग्स, संपर्क विवरण, उत्पाद/सेवा की जानकारी, कीमतें, उपलब्धता, फोटो और अन्य विवरण पूरी तरह से संबंधित व्यापारी/उपयोगकर्ता द्वारा स्वयं अपलोड किए जाते हैं।
                    </p>
                    <p class="mt-4">
                        BayepurBazaar.com केवल एक मंच उपलब्ध कराता है – हम किसी भी लिस्टिंग की सामग्री को संशोधित या संपादित नहीं करते (सिवाय स्पष्ट उल्लंघन के मामलों के)।
                    </p>
                </div>

                <div>
                    <h2 class="section-title text-2xl font-bold mb-5">2. कोई जिम्मेदारी नहीं</h2>
                    <p class="font-semibold text-xl mb-4 text-red-700">BayepurBazaar.com निम्नलिखित के लिए किसी भी प्रकार की जिम्मेदारी नहीं लेता:</p>
                    <ul class="list-disc pl-8 space-y-3 text-red-900">
                        <li>किसी लिस्टिंग में दी गई जानकारी की सत्यता या शुद्धता</li>
                        <li>व्यापारी द्वारा दी गई सेवाओं/उत्पादों की गुणवत्ता, मात्रा, डिलीवरी समय या विश्वसनीयता</li>
                        <li>व्यापारी और ग्राहक के बीच किसी भी प्रकार के लेन-देन, विवाद, धोखाधड़ी या नुकसान</li>
                        <li>गलत, भ्रामक, अपूर्ण या पुरानी जानकारी के कारण होने वाले किसी भी नुकसान, हानि या असुविधा</li>
                        <li>किसी व्यापारी द्वारा दिए गए वादे/ऑफर का पालन न होने पर</li>
                    </ul>
                </div>

                <div>
                    <h2 class="section-title text-2xl font-bold mb-5">3. उपयोगकर्ताओं के लिए सलाह</h2>
                    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-r-xl mt-4">
                        <p class="font-semibold text-lg mb-3">हर उपयोगकर्ता (ग्राहक) को सलाह दी जाती है कि:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>खरीदने/सेवा लेने से पहले व्यापारी से स्वयं संपर्क करके सभी जानकारी दोबारा सत्यापित कर लें</li>
                            <li>महत्वपूर्ण लेन-देन से पहले व्यक्तिगत रूप से मिलें या पूरी तरह से पुष्टि कर लें</li>
                            <li>कीमत, उपलब्धता, शर्तें आदि लिखित रूप में ले लें</li>
                            <li>किसी भी संदेह की स्थिति में पहले छोटा लेन-देन करें या समीक्षा/राय लें</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="section-title text-2xl font-bold mb-5">4. हमारी भूमिका</h2>
                    <p>
                        हम केवल एक सूचना मंच हैं। हम न तो किसी व्यापारी के एजेंट हैं, न ही किसी उत्पाद/सेवा के प्रदाता या गारंटर। हमारा एकमात्र उद्देश्य बायेपुर के स्थानीय व्यापारियों को डिजिटल मंच प्रदान करना है।
                    </p>
                    <p class="mt-4 font-semibold">
                        किसी भी प्रकार का कोई वाणिज्यिक संबंध या गारंटी हमारी ओर से नहीं है।
                    </p>
                </div>

                <div>
                    <h2 class="section-title text-2xl font-bold mb-5">5. शिकायत या गलत जानकारी</h2>
                    <p>
                        यदि आपको किसी लिस्टिंग में गलत या भ्रामक जानकारी मिलती है, तो कृपया हमें तुरंत रिपोर्ट करें। हम उचित कार्रवाई (जाँच के बाद लिस्टिंग हटाना/सुधारना) करेंगे, लेकिन किसी भी नुकसान की भरपाई या जिम्मेदारी हम नहीं लेंगे।
                    </p>
                    <p class="mt-4">
                        रिपोर्ट करने के लिए: <strong>support@bayepurbazaar.com</strong> या व्हाट्सएप: +91 98765 43210
                    </p>
                </div>

                <div class="mt-12 pt-8 border-t text-center text-gray-600">
                    <p class="text-xl font-semibold mb-4">अंतिम बात</p>
                    <p class="text-lg">
                        BayepurBazaar.com का उपयोग अपनी जोखिम पर करें।<br>
                        हमारा प्रयास बायेपुर को डिजिटल रूप से सशक्त बनाना है, लेकिन अंतिम जिम्मेदारी हमेशा उपयोगकर्ताओं (व्यापारी और ग्राहक) की रहती है।
                    </p>
                </div>

            </div>

        </div>

    </main>

@endsection