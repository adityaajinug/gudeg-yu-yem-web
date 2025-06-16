@extends('app')
@section('content')
    <!-- Banner -->
    <section id="banner"
        class="relative bg-[url('{{ asset('images/gudeg.webp') }}')] bg-cover bg-center text-start h-[70vh] rounded-sm">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 to-black/20 rounded-sm"></div>

        <div class="relative z-10 flex flex-col justify-between h-full p-6 md:p-10">
            <div>
                <p class="text-2xl md:text-4xl font-bold text-white uppercase leading-tight">
                    Cita rasa Otentik Gudeg khas Semarang
                </p>
                <p class="text-base md:text-lg font-semibold text-white mt-2">
                    Berdiri Sejak 1981
                </p>
            </div>

            <div class="w-32 md:w-40 aspect-video mt-6">
                <img src="{{ asset('images/gudegyuyem.png') }}" alt="logo gudeg" class="w-full h-full object-contain" />
            </div>
        </div>
    </section>

    <!-- Top Menus -->
    <section id="mainMenu" class="max-w-5xl mx-auto pt-16 px-4">
        <div class="flex justify-between items-start sm:items-center gap-3">
            <h2 class="text-darkteal font-bold text-2xl">Menus</h2>
            <a href="menu.html" class="bg-darkteal text-white px-4 py-2 rounded-lg text-sm">
                Lihat Semua
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
            @foreach ($menus as $menu)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition hover:shadow-xl">
                    <div class="aspect-[4/3] w-full bg-gray-200">
                        <img src="{{ asset('storage/' . $menu->image_path) }}" alt="menu"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-4 space-y-2">
                        <h3 class="text-lg font-bold text-darkteal">{{ $menu->menu_name }}</h3>
                        <p class="text-sm text-gray-700">{{ $menu->description }}</p>
                        <p class="text-tealcook font-semibold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Location -->
    <section id="location" class="max-w-5xl mx-auto mt-20 py-6 px-6 bg-darkteal rounded-lg">
        <h2 class="text-2xl font-bold text-white text-center py-4">
            Ayo, Datang Langsung ke Toko Kami
        </h2>
        <div class="flex flex-col lg:flex-row justify-between items-start gap-6 mt-5">
            <!-- Google Maps -->
            <div class="w-full lg:w-1/2 rounded-lg overflow-hidden aspect-[4/3]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1642721686144!2d110.4297162669905!3d-6.989923463542703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708dad2403b301%3A0x600969b3d2a9d020!2sGUDEG%20YU%20YEM%20(%20Telogorejo%20)!5e0!3m2!1sid!2sid!4v1749971231385!5m2!1sid!2sid"
                    class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="flex flex-col gap-4 text-white lg:w-1/2">
                <p>
                    <strong>GUDEG YU YEM (Telogorejo)</strong><br />
                    Jl. Stadion Barat Ruko Stadion Diponegoro No.B6, Sekaranglah,
                    Karangkidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50136
                </p>
                <a href="https://maps.google.com?q=Gudeg%20Yu%20Yem%20Semarang" target="_blank"
                    class="bg-lightteal shadow-xl py-2 px-4 w-max rounded-full text-darkteal font-semibold flex items-center gap-2">
                    <span>Arahkan Saya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-chevron-right">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m10 8 4 4-4 4" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <!-- Galeri -->
    <section id="galeri" class="max-w-5xl mx-auto py-8 px-4">
        <h2 class="text-darkteal font-bold text-2xl text-center uppercase mb-5 mt-7">
            Galeri Toko
        </h2>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:grid-rows-2 lg:grid-flow-row-dense">
            <!-- Gambar besar atas -->
            <div class="lg:col-span-2 h-72 lg:h-[400px]">
                <img src="{{ asset('images/tokodepan.jpg') }}" alt="Toko Depan"
                    class="w-full h-full object-cover rounded-lg shadow-md" />
            </div>
            <!-- Gambar Bawah -->
            <div class="h-60">
                <img src="{{ asset('images/tokodalam1.jpg') }}" alt="Toko Dalam 1"
                    class="w-full h-full object-cover rounded-lg shadow-md" />
            </div>
            <div class="h-60">
                <img src="{{ asset('images/tokodalam2.jpg') }}" alt="Toko Dalam 2"
                    class="w-full h-full object-cover rounded-lg shadow-md" />
            </div>
        </div>
    </section>
@endsection
