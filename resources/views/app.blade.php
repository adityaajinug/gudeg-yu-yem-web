<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Landing Page</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            @theme {
                --color-tealcook: #129990;
                --color-cream: #fffbde;
                --color-lightteal: #90d1ca;
                --color-darkteal: #096b68;
            }
        </style>
    </head>
    <body class="min-h-screen border-red-500 bg-[#F5F5F5]">
        <header
            class="max-w-5xl mx-auto py-2 px-4 bg-tealcook rounded-2xl sticky top-2 z-30 shadow-xl"
        >
            <!-- Baris atas: logo dan toggle -->
            <div class="flex justify-between items-center">
                <!-- Logo kiri -->
                <div class="w-28 md:w-32 aspect-video">
                    <img
                        src="{{ asset('images/gudegyuyem.png') }}"
                        alt="logo gudeg"
                        class="w-full h-full object-contain"
                    />
                </div>

                <!-- Navigasi desktop (horizontal) -->
                <nav class="hidden md:flex gap-6 items-center text-white font-semibold">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('menu') }}">Menu</a>
                    <a href="{{ route('pesanan') }}">Pemesanan</a>
                    <a href="{{ route('about') }}">About</a>
                   
                </nav>

                <!-- Tombol toggle untuk mobile -->
                <button id="menu-toggle" class="md:hidden text-white text-3xl focus:outline-none">
                    ☰
                </button>
            </div>

            <!-- Navigasi mobile (vertikal) -->
            <nav
                id="mobile-nav"
                class="hidden flex-col gap-10 mt-3 text-white font-semibold md:hidden"
            >
                <a href="index.html" class="block">Home</a>
                <a href="menu.html" class="block">Menu</a>
                <a href="pemesanan.html" class="block">Pemesanan</a>
                <a href="about.html" class="block">About</a>
                <a
                    href="#login"
                    class="bg-white text-darkteal px-4 rounded-xl shadow-md text-center"
                >
                    Login
                </a>
            </nav>
        </header>

        <main class="border-orange-500 max-w-7xl mx-auto pt-5">
           @yield('content')
        </main>
        <footer
            class="flex flex-col md:flex-row justify-between items-start md:items-center px-5 py-7 bg-darkteal mt-5 gap-6"
        >
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="w-32 aspect-video shrink-0">
                    <img
                        src="{{ asset('images/gudegyuyem.png') }}"
                        alt="logo gudeg"
                        class="w-full h-full object-contain"
                    />
                </div>
                <p class="max-w-md text-white text-sm leading-relaxed">
                    GUDEG YU YEM (Telogorejo) <br />
                    Jl. Stadion Barat Ruko Stadion Diponegoro No.B6, Sekaranglah, Karangkidul, Kec.
                    Semarang Tengah, Kota Semarang, Jawa Tengah 50136
                </p>
            </div>
            <div class="text-sm text-white">
                <p><strong>Jam Operasional:</strong></p>
                <p>Senin – Sabtu: 06.00 – 16.00</p>
                <p>Minggu: 05.30 – 16.00</p>
            </div>
        </footer>
        <script>
            const toggleBtn = document.getElementById("menu-toggle");
            const mobileNav = document.getElementById("mobile-nav");

            toggleBtn.addEventListener("click", () => {
                mobileNav.classList.toggle("hidden");
            });
        </script>
    </body>
</html>
