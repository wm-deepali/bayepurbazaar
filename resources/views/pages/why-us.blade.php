@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>क्यों चुनें BayepurBazaar.com? - अपना गाँव, अपना बाज़ार</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');
        body { font-family: 'Noto Sans Devanagari', system-ui, sans-serif; }
        .benefit-card { transition: all 0.4s ease; }
        .benefit-card:hover { transform: translateY(-12px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-gray-50">


    <!-- HERO -->
    <div class="bg-gradient-to-br from-teal-600 via-teal-700 to-orange-600 text-white py-24 md:py-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://picsum.photos/id/1015/1920/1080')] bg-cover bg-center"></div>
        <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight drop-shadow-lg">
                क्यों चुनें BayepurBazaar.com?
            </h1>
            <p class="text-xl md:text-2xl max-w-4xl mx-auto font-light opacity-95">
                क्योंकि यह सिर्फ एक ऐप या वेबसाइट नहीं है...<br>
                <span class="font-semibold">यह बायेपुर के हर दुकानदार और हर परिवार की तरक्की का साथी है।</span>
            </p>
        </div>
    </div>

    <!-- WHY SECTION - Local Dukandaar ke liye -->
    <div class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-4">दुकानदार भाईयों, यह आपके लिए क्यों ज़रूरी है?</h2>
        <p class="text-center text-xl text-gray-600 max-w-4xl mx-auto mb-16">
            आज के समय में अगर आपकी दुकान सिर्फ सड़क किनारे है, तो ग्राहक सिर्फ वहीँ तक सीमित रह जाते हैं।<br>
            BayepurBazaar.com के साथ आपकी दुकान अब पूरे बायेपुर और आसपास के गाँवों तक पहुँच जाती है – बिना किराया बढ़ाए, बिना दुकान बढ़ाए।
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div class="benefit-card bg-white rounded-3xl p-8 shadow-lg border border-teal-100 text-center">
                <div class="w-24 h-24 mx-auto bg-teal-100 rounded-full flex items-center justify-center text-5xl mb-6">
                    <i class="fa-solid fa-bullhorn text-teal-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-teal-800">मुफ्त में लाखों तक पहुँच</h3>
                <p class="text-gray-700 text-lg">
                    अपनी दुकान, उत्पाद, सेवा या ऑफर को बिना एक पैसा खर्च किए पूरे बायेपुर में दिखाएँ।<br>
                    <span class="font-semibold">कोई विज्ञापन खर्च नहीं – सिर्फ एक बार लिस्टिंग।</span>
                </p>
            </div>

            <!-- Benefit 2 -->
            <div class="benefit-card bg-white rounded-3xl p-8 shadow-lg border border-orange-100 text-center">
                <div class="w-24 h-24 mx-auto bg-orange-100 rounded-full flex items-center justify-center text-5xl mb-6">
                    <i class="fa-solid fa-phone-volume text-orange-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-orange-800">सीधा कॉल और व्हाट्सएप ऑर्डर</h3>
                <p class="text-gray-700 text-lg">
                    ग्राहक आपसे सीधे बात करेंगे – बिना किसी कमीशन के।<br>
                    घर बैठे ऑर्डर लें, डिलीवरी का इंतजाम खुद करें – पूरा कंट्रोल आपके हाथ में।
                </p>
            </div>

            <!-- Benefit 3 -->
            <div class="benefit-card bg-white rounded-3xl p-8 shadow-lg border border-teal-100 text-center">
                <div class="w-24 h-24 mx-auto bg-teal-100 rounded-full flex items-center justify-center text-5xl mb-6">
                    <i class="fa-solid fa-chart-line text-teal-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-teal-800">बिक्री बढ़ेगी, खर्चा घटेगा</h3>
                <p class="text-gray-700 text-lg">
                    ज्यादा ग्राहक = ज्यादा बिक्री<br>
                    कम स्टॉक बर्बाद होगा, क्योंकि लोग पहले ऑर्डर कर लेंगे।
                </p>
            </div>

            <!-- Benefit 4 -->
            <div class="benefit-card bg-white rounded-3xl p-8 shadow-lg border border-orange-100 text-center">
                <div class="w-24 h-24 mx-auto bg-orange-100 rounded-full flex items-center justify-center text-5xl mb-6">
                    <i class="fa-solid fa-shield-check text-orange-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-orange-800">सत्यापित और विश्वसनीय</h3>
                <p class="text-gray-700 text-lg">
                    हम हर लिस्टिंग को चेक करते हैं।<br>
                    आपका नाम और नंबर सत्यापित होने से ग्राहकों का भरोसा बढ़ता है।
                </p>
            </div>

            <!-- Benefit 5 -->
            <div class="benefit-card bg-white rounded-3xl p-8 shadow-lg border border-teal-100 text-center">
                <div class="w-24 h-24 mx-auto bg-teal-100 rounded-full flex items-center justify-center text-5xl mb-6">
                    <i class="fa-solid fa-users-gear text-teal-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-teal-800">अपने मंडल से जुड़ें</h3>
                <p class="text-gray-700 text-lg">
                    मंडल सदस्यों की लिस्ट में आपका नाम –<br>
                    लोग आपको पहले पहचानेंगे, पहले बुलाएंगे।
                </p>
            </div>

            <!-- Benefit 6 -->
            <div class="benefit-card bg-white rounded-3xl p-8 shadow-lg border border-orange-100 text-center">
                <div class="w-24 h-24 mx-auto bg-orange-100 rounded-full flex items-center justify-center text-5xl mb-6">
                    <i class="fa-solid fa-hand-holding-heart text-orange-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-orange-800">गाँव की तरक्की में योगदान</h3>
                <p class="text-gray-700 text-lg">
                    आपकी सफलता = गाँव की सफलता।<br>
                    आप जितना आगे बढ़ेंगे, उतना बायेपुर मजबूत होगा।
                </p>
            </div>
        </div>
    </div>

    <!-- FOR CUSTOMERS / LOG SECTION -->
    <div class="bg-gradient-to-r from-gray-50 to-teal-50 py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-6">
                और ग्राहकों के लिए क्यों ज़रूरी है BayepurBazaar?
            </h2>
            <p class="text-center text-xl text-gray-600 max-w-4xl mx-auto mb-16">
                क्योंकि अब आपको दूर शहर जाने, महँगा सामान खरीदने या अनजान दुकानों पर भरोसा करने की ज़रूरत नहीं।<br>
                <span class="font-semibold">अपने गाँव के भरोसेमंद दुकानदार अब आपकी उँगलियों पर।</span>
            </p>




            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="p-8">
                    <i class="fa-solid fa-inr text-6xl text-teal-600 mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">सस्ता और ताज़ा सामान</h3>
                    <p class="text-gray-700 text-lg">गाँव की दुकानों से सीधा खरीदें – कम दाम, ताज़ा माल, घर तक डिलीवरी का ऑप्शन।</p>
                </div>
                <div class="p-8">
                    <i class="fa-solid fa-handshake-simple text-6xl text-orange-600 mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">भरोसेमंद लोकल दुकानदार</h3>
                    <p class="text-gray-700 text-lg">जिन्हें आप जानते हैं, जिन पर भरोसा है – वही अब ऑनलाइन भी उपलब्ध।</p>
                </div>
                <div class="p-8">
                    <i class="fa-solid fa-clock text-6xl text-teal-600 mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">समय और पैसे की बचत</h3>
                    <p class="text-gray-700 text-lg">बाजार घूमने, भीड़ में परेशान होने की ज़रूरत नहीं – बस सर्च करें और ऑर्डर करें।</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FINAL CALL TO ACTION -->
    <div class="bg-teal-700 text-white py-20 text-center">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">अब समय आ गया है – जुड़िए!</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-4xl mx-auto">
                चाहे आप दुकान चलाते हों या घर चलाते हों,<br>
                BayepurBazaar.com आपके साथ है – बायेपुर को मजबूत, समृद्ध और डिजिटल बनाने के लिए।
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="listing-add.html" class="bg-white text-teal-700 hover:bg-gray-100 px-12 py-6 rounded-2xl font-bold text-xl shadow-xl transition">
                    <i class="fa-solid fa-store mr-3"></i> अपनी दुकान लिस्ट करें (मुफ्त)
                </a>
                <a href="index.html#listings" class="bg-orange-600 hover:bg-orange-700 px-12 py-6 rounded-2xl font-bold text-xl shadow-xl transition">
                    <i class="fa-solid fa-magnifying-glass mr-3"></i> अभी खोजें और ऑर्डर करें
                </a>
            </div>
        </div>
    </div>

 @endsection