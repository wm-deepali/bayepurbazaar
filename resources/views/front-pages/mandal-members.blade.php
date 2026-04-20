@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>बयेपुर बाज़ार - मंडल सदस्य</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');

            body {
                font-family: 'Noto Sans Devanagari', system-ui, sans-serif;
            }

            table {
                border-collapse: separate;
                border-spacing: 0 6px;
            }

            tr {
                background: white;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            }

            tr:hover {
                background: #f0fdfa;
            }

            th {
                background: #0d9488;
                color: white;
                position: sticky;
                top: 0;
                z-index: 10;
            }

            td.photo {
                width: 70px;
                padding: 8px !important;
            }

            img.member-photo {
                width: 52px;
                height: 52px;
                object-fit: cover;
                border-radius: 50%;
                border: 2px solid #e5e7eb;
            }

            .sidebar {
                max-height: calc(100vh - 120px);
                overflow-y: auto;
            }
        </style>
    </head>

    <body class="bg-gray-50">



        <!-- MAIN CONTENT -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
            <div class="flex flex-col lg:flex-row gap-6">

                <!-- LEFT: मंडल कैटेगरी (Sticky Sidebar) -->
                <aside class="lg:w-80 bg-white rounded-2xl shadow-sm border p-5 h-fit lg:sticky lg:top-20 sidebar">
                    <h3 class="text-xl font-bold mb-5 flex items-center gap-3 text-teal-700 border-b pb-4">
                        <i class="fa-solid fa-users-line"></i> मंडल चुनें
                    </h3>

                    <div id="mandal-list" class="space-y-2">
                        <!-- JS से भरेगा -->
                    </div>

                    <div class="mt-6 pt-4 border-t">
                        <button onclick="showAllMandals()"
                            class="w-full bg-teal-50 hover:bg-teal-100 text-teal-700 py-3 rounded-xl font-medium flex items-center justify-center gap-2 transition">
                            <i class="fa-solid fa-list-ul"></i> सभी मंडल दिखाएँ
                        </button>
                    </div>
                </aside>

                <!-- RIGHT: टेबल व्यू -->
                <div class="flex-1 bg-white rounded-2xl shadow-sm border overflow-hidden">
                    <!-- टॉप कंट्रोल्स -->
                    <div class="p-5 border-b bg-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <h2 id="current-title" class="text-2xl font-bold text-gray-800">सभी सदस्य</h2>

                        <div class="relative w-full sm:w-72">
                            <input id="searchInput" type="text" placeholder="नाम, पद या मंडल से खोजें..."
                                class="w-full border border-gray-300 rounded-xl py-3 px-5 pl-11 focus:outline-none focus:border-teal-600">
                            <i
                                class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- TABLE -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left min-w-[900px]">
                            <thead>
                                <tr class="text-sm uppercase tracking-wider">
                                    <th class="photo px-5 py-4 font-semibold">फोटो</th>
                                    <th class="px-5 py-4 font-semibold">नाम</th>
                                    <th class="px-5 py-4 font-semibold">पद</th>
                                    <th class="px-5 py-4 font-semibold">मंडल</th>
                                    <th class="px-5 py-4 font-semibold hidden md:table-cell">स्थान</th>
                                    <th class="px-5 py-4 font-semibold hidden lg:table-cell">सदस्यता से</th>
                                    <!-- <th class="px-5 py-4 font-semibold text-center">संपर्क</th> -->
                                </tr>
                            </thead>
                            <tbody id="membersTableBody">
                                <!-- JS से rows -->
                            </tbody>
                        </table>
                    </div>

                    <div id="emptyState" class="hidden py-16 text-center text-gray-500">
                        <i class="fa-solid fa-users-slash text-6xl opacity-40"></i>
                        <p class="mt-4 text-lg">कोई सदस्य नहीं मिला</p>
                    </div>
                </div>
            </div>
        </div>

        @php
            $membersData = $members->map(function ($m) {
                return [
                    'photo' => $m->photo ? asset('storage/' . $m->photo) : 'https://via.placeholder.com/52',
                    'name' => $m->name,
                    'designation' => $m->designation,
                    'mandal' => optional($m->mandal)->name,
                    'location' => $m->location,
                    'since' => $m->since,
                    'phone' => $m->mobile,
                    'whatsapp' => $m->whatsapp ?? $m->mobile
                ];
            });
        @endphp

       <script>

// ✅ DATA FROM BACKEND
const categories = @json($categories->map(function($cat){
    return [
        'name' => $cat->name,
        'mandals' => $cat->mandals->map(function($m){
            return [
                'name' => $m->name,
                'count' => $m->members_count
            ];
        })
    ];
}));

const membersData = @json($membersData);

// ✅ STATE
let currentCategory = null;
let currentMandal = "all";
let filteredData = [...membersData];


// ✅ SIDEBAR (CATEGORY → MANDAL)
function renderSidebar() {
    const container = document.getElementById("mandal-list");
    container.innerHTML = "";

    categories.forEach(cat => {

        const wrapper = document.createElement("div");
        wrapper.className = "mb-4";

        // category title
        const title = document.createElement("div");
        title.className = "font-bold text-teal-700 mb-2";
        title.textContent = cat.name;

        wrapper.appendChild(title);

        // mandals
        cat.mandals.forEach(mandal => {

            const div = document.createElement("div");

            div.className = `
                px-4 py-2 ml-2 rounded-lg cursor-pointer text-sm flex justify-between items-center
                ${mandal.name === currentMandal ? 'bg-teal-600 text-white' : 'hover:bg-teal-50'}
            `;

            div.innerHTML = `
                <span>${mandal.name}</span>
                <span class="text-xs bg-white/30 px-2 py-1 rounded">${mandal.count}</span>
            `;

            div.onclick = () => {
                currentCategory = cat.name;
                currentMandal = mandal.name;

                renderSidebar();
                filterAndRender();
            };

            wrapper.appendChild(div);
        });

        container.appendChild(wrapper);
    });
}


// ✅ TABLE RENDER
function renderTable(data) {
    const tbody = document.getElementById("membersTableBody");
    tbody.innerHTML = "";

    if (data.length === 0) {
        document.getElementById("emptyState").classList.remove("hidden");
        document.getElementById("current-title").textContent = "कोई सदस्य नहीं मिला";
        return;
    }

    document.getElementById("emptyState").classList.add("hidden");

    document.getElementById("current-title").textContent =
        currentMandal === "all" ? "सभी सदस्य" : currentMandal;

    data.forEach(member => {

        const row = document.createElement("tr");

        row.innerHTML = `
            <td class="photo px-4 py-3">
                <img src="${member.photo}" class="member-photo">
            </td>

            <td class="px-5 py-4 font-medium">
                ${member.name}
            </td>

            <td class="px-5 py-4 text-teal-700">
                ${member.designation ?? '-'}
            </td>

            <td class="px-5 py-4">
                ${member.mandal ?? '-'}
            </td>

            <td class="px-5 py-4 hidden md:table-cell text-gray-600">
                ${member.location ?? '-'}
            </td>

            <td class="px-5 py-4 hidden lg:table-cell text-gray-500">
                ${member.since ?? '-'}
            </td>

        `;

        tbody.appendChild(row);
    });
}


// ✅ FILTER LOGIC
function filterAndRender() {

    let data = membersData;

    // filter by category
    if (currentCategory) {
        data = data.filter(m => m.category === currentCategory);
    }

    // filter by mandal
    if (currentMandal !== "all") {
        data = data.filter(m => m.mandal === currentMandal);
    }

    // search
    const search = document.getElementById("searchInput").value.toLowerCase().trim();

    if (search) {
        data = data.filter(m =>
            (m.name || '').toLowerCase().includes(search) ||
            (m.designation || '').toLowerCase().includes(search) ||
            (m.mandal || '').toLowerCase().includes(search) ||
            (m.category || '').toLowerCase().includes(search) ||
            (m.location || '').toLowerCase().includes(search)
        );
    }

    filteredData = data;
    renderTable(data);
}


// ✅ RESET
function showAllMandals() {
    currentCategory = null;
    currentMandal = "all";
    renderSidebar();
    filterAndRender();
}


// ✅ INIT
window.onload = () => {
    renderSidebar();
    filterAndRender();

    document.getElementById("searchInput")
        .addEventListener("input", filterAndRender);
};

</script>
@endsection