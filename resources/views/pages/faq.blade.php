@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>अक्सर पूछे जाने वाले सवाल (FAQ) - BayepurBazaar.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');
        body { font-family: 'Noto Sans Devanagari', system-ui, sans-serif; }
        details summary { cursor: pointer; }
        details[open] summary { background-color: #f0fdfa; }
    </style>
</head>


 

    <!-- HERO -->
    <div class="bg-gradient-to-r from-teal-600 to-teal-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">अक्सर पूछे जाने वाले सवाल</h1>
            <p class="text-xl max-w-3xl mx-auto">व्यापारी (सेलर्स) और सदस्य (यूजर्स) दोनों के लिए स्पष्ट जवाब। अगर आपका सवाल यहाँ नहीं है तो हमें संपर्क करें!</p>
        </div>
    </div>

    <!-- MAIN FAQ -->
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="space-y-10">

            <!-- Section 1: सामान्य सवाल -->
            <section>
                <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-3">सामान्य सवाल (सभी के लिए)</h2>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        बायेपुरबाज़ार.कॉम क्या है?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        बायेपुरबाज़ार.कॉम बायेपुर (घाज़ीपुर) का अपना डिजिटल बाज़ार है। यहाँ स्थानीय दुकानदार, सेवाएँ देने वाले और व्यापारी अपनी लिस्टिंग मुफ्त में डाल सकते हैं, जबकि ग्राहक आसानी से खोजकर कॉल या व्हाट्सएप कर सकते हैं। हमारा मंत्र है: अपना गाँव, अपना बाज़ार, अपना विकास।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        क्या यह प्लेटफॉर्म पूरी तरह मुफ्त है?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        हाँ! यूजर्स (ग्राहक) के लिए ब्राउज़िंग, सर्च और संपर्क करना 100% मुफ्त है। व्यापारियों (सेलर्स) के लिए बेसिक लिस्टिंग भी पूरी तरह फ्री है। भविष्य में प्रीमियम फीचर्स (जैसे टॉप लिस्टिंग, ज्यादा फोटो आदि) पेड हो सकते हैं।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        मेरी जानकारी सुरक्षित रहेगी?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        हाँ, हम आपकी प्राइवेसी का पूरा ध्यान रखते हैं। आपका फोन नंबर या अन्य डिटेल्स केवल वेरिफाइड यूजर्स/ग्राहकों को दिखाई जाती हैं। हम कभी भी आपकी जानकारी थर्ड पार्टी को नहीं बेचते।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        अगर कोई समस्या आए तो क्या करें?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        हमसे व्हाट्सएप (+91 98765 43210) या ईमेल (support@bayepurbazaar.com) पर संपर्क करें। हम 24 घंटे के अंदर जवाब देते हैं।
                    </div>
                </details>
            </section>

            <!-- Section 2: सदस्य/यूजर्स (ग्राहकों) के लिए -->
            <section>
                <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-3">सदस्य/ग्राहकों के लिए FAQ</h2>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        मैं कैसे दुकान या सेवा खोज सकता हूँ?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        होमपेज पर सर्च बार में दुकान का नाम, उत्पाद या श्रेणी टाइप करें। लोकेशन ड्रॉपडाउन से बायेपुर या आसपास चुनें। श्रेणियाँ क्लिक करके भी ब्राउज़ कर सकते हैं।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        कॉल या व्हाट्सएप बटन से सीधे बात कैसे करें?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        हर लिस्टिंग पर "कॉल करें" और "व्हाट्सएप" बटन होता है। क्लिक करने पर आपका फोन डायल हो जाएगा या व्हाट्सएप खुल जाएगा। नंबर हमारी टीम द्वारा वेरिफाई किए जाते हैं।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        क्या मुझे अकाउंट बनाना ज़रूरी है?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        नहीं, ब्राउज़िंग और संपर्क के लिए अकाउंट की ज़रूरत नहीं। लेकिन अगर आप अपनी पसंदीदा दुकानें सेव करना चाहें या रिव्यू देना चाहें तो लॉगिन/रजिस्टर कर सकते हैं।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        गलत जानकारी या फ्रॉड लिस्टिंग मिले तो क्या करें?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        लिस्टिंग के नीचे "रिपोर्ट" बटन पर क्लिक करें या हमें व्हाट्सएप पर बताएँ। हम 24 घंटे में जांच करके एक्शन लेंगे।
                    </div>
                </details>
            </section>

            <!-- Section 3: व्यापारी/सेलर्स के लिए -->
            <section>
                <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-3">व्यापारी/सेलर्स के लिए FAQ</h2>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        अपनी दुकान/सेवा कैसे लिस्ट करें?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        होमपेज या लिस्टिंग पेज पर "लिस्टिंग जोड़ें" बटन क्लिक करें। फॉर्म में नाम, फोटो, विवरण, नंबर, श्रेणी आदि भरें। हमारी टीम 24-48 घंटे में वेरिफाई करके लाइव कर देगी।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        लिस्टिंग जोड़ने के लिए कोई फीस है?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        बेसिक लिस्टिंग पूरी तरह मुफ्त है। फोटो, विवरण, कॉल/व्हाट्सएप बटन सब शामिल। प्रीमियम फीचर्स (टॉप पर दिखना, ज्यादा फोटो, एनालिटिक्स) भविष्य में उपलब्ध होंगे।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        मेरी लिस्टिंग को कितनी जल्दी अप्रूव किया जाएगा?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        ज्यादातर मामलों में 24-48 घंटे में। अगर कोई दस्तावेज़ चाहिए तो हम संपर्क करेंगे।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        क्या मैं अपनी लिस्टिंग में फोटो, कीमत या ऑफर डाल सकता हूँ?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        हाँ! आप 5 तक फोटो, उत्पाद/सेवा विवरण, कीमत रेंज और स्पेशल ऑफर डाल सकते हैं। ज्यादा फोटो प्रीमियम प्लान में उपलब्ध होंगे।
                    </div>
                </details>

                <details class="bg-white rounded-2xl shadow-sm border mb-4">
                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">
                        अगर ग्राहक से कोई शिकायत आए तो क्या होगा?
                        <i class="fa-solid fa-chevron-down transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 pt-2 text-gray-700">
                        हम दोनों पक्ष सुनेंगे और निष्पक्ष तरीके से समस्या सुलझाने की कोशिश करेंगे। गंभीर मामलों में लिस्टिंग सस्पेंड भी कर सकते हैं।
                    </div>
                </details>
            </section>

        </div>

        <div class="text-center mt-12 py-8 bg-white rounded-2xl shadow-sm border">
            <h3 class="text-2xl font-bold mb-4">आपका सवाल यहाँ नहीं है?</h3>
            <p class="text-gray-600 mb-6">हमसे सीधे बात करें – हम 24 घंटे में जवाब देंगे!</p>
            <a href="contact.html" class="inline-block bg-teal-600 hover:bg-teal-700 text-white px-10 py-4 rounded-2xl font-semibold text-lg transition">
                संपर्क फॉर्म खोलें
            </a>
        </div>
    </div>

@endsection