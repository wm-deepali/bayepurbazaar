@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>नियम एवं शर्तें (Terms & Conditions) - BayepurBazaar.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');
        body { font-family: 'Noto Sans Devanagari', system-ui, sans-serif; }
        .section-title { border-bottom: 3px solid #0d9488; padding-bottom: 0.5rem; }
        ol { counter-reset: item; }
        ol > li { counter-increment: item; position: relative; padding-left: 2.5rem; }
        ol > li::before {
            content: counter(item) ".";
            position: absolute;
            left: 0;
            font-weight: bold;
            color: #0d9488;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">


    <!-- MAIN CONTENT -->
    <main class="max-w-5xl mx-auto px-6 py-12 md:py-16">

        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">नियम एवं शर्तें</h1>
            <p class="text-lg text-gray-600">अंतिम अपडेट: 15 मार्च 2026</p>
            <p class="mt-4 text-gray-700 max-w-3xl mx-auto">
                BayepurBazaar.com (इसके बाद "प्लेटफॉर्म", "हम", "हमारा") का उपयोग करने से पहले कृपया इन नियमों को ध्यान से पढ़ लें। प्लेटफॉर्म का उपयोग करके आप इन नियमों से बंधे होने की सहमति देते हैं।
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 md:p-12">

            <ol class="space-y-10 text-lg leading-relaxed">

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">1. स्वीकृति एवं उपयोग की शर्तें</h2>
                    <p>
                        प्लेटफॉर्म का उपयोग केवल 18 वर्ष या उससे अधिक आयु के व्यक्तियों द्वारा किया जा सकता है। यदि आप 18 वर्ष से कम हैं, तो आपको माता-पिता/अभिभावक की सहमति के साथ ही उपयोग करना होगा।
                    </p>
                    <p class="mt-3">
                        हम किसी भी समय बिना पूर्व सूचना के इन नियमों में संशोधन कर सकते हैं। संशोधित नियम प्रकाशित होने के बाद प्लेटफॉर्म का निरंतर उपयोग आपकी सहमति माना जाएगा।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">2. उपयोगकर्ता खाता एवं जिम्मेदारी</h2>
                    <p>
                        सटीक और पूर्ण जानकारी प्रदान करना आपकी जिम्मेदारी है। गलत जानकारी देने पर आपकी लिस्टिंग/मेंबरशिप निलंबित की जा सकती है।
                    </p>
                    <p class="mt-3">
                        आपका पासवर्ड (यदि लागू हो) गोपनीय रखना आपकी जिम्मेदारी है। किसी अनधिकृत उपयोग की स्थिति में तुरंत हमें सूचित करें।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">3. लिस्टिंग एवं सामग्री</h2>
                    <p>
                        प्लेटफॉर्म पर दी गई सभी जानकारी (फोटो, विवरण, संपर्क विवरण आदि) उपयोगकर्ता द्वारा प्रदान की जाती है। हम इसकी सत्यता की जाँच करते हैं लेकिन पूर्ण गारंटी नहीं देते।
                    </p>
                    <p class="mt-3">
                        निम्नलिखित सामग्री प्रतिबंधित है:
                    </p>
                    <ul class="list-disc pl-8 mt-3 space-y-2">
                        <li>अश्लील, हिंसक, घृणा फैलाने वाली, या कानून विरुद्ध सामग्री</li>
                        <li>कॉपीराइट उल्लंघन वाली सामग्री</li>
                        <li>धोखाधड़ी, फर्जी उत्पाद/सेवा का प्रचार</li>
                        <li>नकली या गुमराह करने वाली जानकारी</li>
                    </ul>
                    <p class="mt-4">
                        ऐसी सामग्री पाए जाने पर लिस्टिंग तुरंत हटाई जाएगी और खाता निलंबित किया जा सकता है।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">4. मुफ्त एवं प्रीमियम सेवाएँ</h2>
                    <p>
                        वर्तमान में बेसिक लिस्टिंग पूरी तरह निःशुल्क है। भविष्य में प्रीमियम सुविधाएँ (टॉप लिस्टिंग, अधिक फोटो, एनालिटिक्स आदि) शुल्क के साथ उपलब्ध हो सकती हैं।
                    </p>
                    <p class="mt-3">
                        कोई भी भुगतान (यदि लागू हो) केवल अधिकृत भुगतान गेटवे के माध्यम से होगा। हम किसी भी रिफंड नीति को स्पष्ट रूप से घोषित करेंगे।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">5. गोपनीयता एवं डेटा उपयोग</h2>
                    <p>
                        हम आपकी जानकारी का उपयोग केवल प्लेटफॉर्म संचालन, सुधार और आपके साथ संवाद के लिए करते हैं। हम आपकी व्यक्तिगत जानकारी कभी भी बिना सहमति के तीसरे पक्ष को नहीं बेचते या किराए पर नहीं देते।
                    </p>
                    <p class="mt-3">
                        विस्तृत जानकारी के लिए हमारी <a href="#" class="text-teal-600 hover:underline">गोपनीयता नीति</a> पढ़ें।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">6. दायित्व की सीमा</h2>
                    <p>
                        हम किसी भी लेन-देन, उत्पाद की गुणवत्ता, सेवा की विश्वसनीयता या उपयोगकर्ताओं के बीच विवाद के लिए जिम्मेदार नहीं हैं। प्लेटफॉर्म केवल सूचना देने वाला माध्यम है।
                    </p>
                    <p class="mt-3">
                        हमारी कुल दायित्व किसी भी स्थिति में उपयोगकर्ता द्वारा भुगतान की गई राशि (यदि लागू) से अधिक नहीं होगी।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">7. बौद्धिक संपदा</h2>
                    <p>
                        प्लेटफॉर्म पर मौजूद सभी लोगो, डिज़ाइन, टेक्स्ट और कोड © BayepurBazaar.com के स्वामित्व में हैं। बिना अनुमति के इसका उपयोग प्रतिबंधित है।
                    </p>
                    <p class="mt-3">
                        उपयोगकर्ता द्वारा अपलोड की गई सामग्री पर उपयोगकर्ता ही स्वामी रहता है, लेकिन प्लेटफॉर्म पर प्रकाशित करने के साथ ही हमें गैर-विशिष्ट, रॉयल्टी-मुक्त उपयोग का अधिकार मिल जाता है।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">8. समाप्ति</h2>
                    <p>
                        हम बिना पूर्व सूचना के किसी भी समय किसी भी उपयोगकर्ता की पहुंच को समाप्त या निलंबित कर सकते हैं यदि:
                    </p>
                    <ul class="list-disc pl-8 mt-3 space-y-2">
                        <li>नियमों का उल्लंघन हो</li>
                        <li>धोखाधड़ी या गैरकानूनी गतिविधि का संदेह हो</li>
                        <li>प्लेटफॉर्म की सुरक्षा या अन्य उपयोगकर्ताओं को खतरा हो</li>
                    </ul>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">9. लागू कानून</h2>
                    <p>
                        ये नियम भारत के कानूनों के अनुसार शासित होंगे। किसी भी विवाद का निपटारा घाज़ीपुर, उत्तर प्रदेश की अदालतों में होगा।
                    </p>
                </li>

                <li>
                    <h2 class="section-title text-2xl font-bold text-teal-800 mb-4">10. संपर्क</h2>
                    <p>
                        किसी भी प्रश्न, शिकायत या सुझाव के लिए कृपया हमसे संपर्क करें:
                    </p>
                    <div class="mt-4 space-y-2 pl-6">
                        <p><strong>ईमेल:</strong> support@bayepurbazaar.com</p>
                        <p><strong>व्हाट्सएप:</strong> +91 98765 43210</p>
                    </div>
                </li>

            </ol>

            <div class="mt-16 pt-10 border-t text-center text-gray-600">
                <p>अंतिम बार अपडेट: 15 मार्च 2026</p>
                <p class="mt-2">BayepurBazaar.com का उपयोग करके आप इन सभी नियमों एवं शर्तों से सहमत हैं।</p>
            </div>

        </div>

    </main>

@endsection