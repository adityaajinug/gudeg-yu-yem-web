@extends('app')
@section('content')
    <section class="px-4">
        <h2 class="text-2xl font-bold uppercase text-center text-darkteal my-5">
            Tentang Kami
        </h2>

        <!-- Gambar -->
        <div class="w-full max-w-md aspect-video mx-auto my-6 rounded-lg overflow-hidden">
            <img src="{{ asset('images/tokodepan.jpg') }}" alt="logo gudeg" class="w-full h-full object-cover rounded-lg" />
        </div>

        <!-- Paragraf -->
        <div class="max-w-5xl mx-auto mb-20 text-justify leading-relaxed">
            <p>
                Gudeg Yu Yem adalah usaha kuliner tradisional yang berdiri sejak 1981,
                berawal dari pedagang kaki lima dan kini memiliki kios tetap di Jl. Stadion
                Barat Ruko Stadion Diponegoro No. B6 dan Jl. Trengguli Raya No. 33,
                Semarang. Selain melayani pembeli langsung, usaha ini juga menjual produk
                secara online melalui GrabFood, GoFood, dan ShopeeFood. Untuk mendukung
                operasional, direncanakan pengembangan sistem digital yang sesuai dengan
                kebutuhan usaha.
            </p>
            <p class="mt-4">
                Restoran kami terletak di Jl. Stadion Barat Ruko Stadion Diponegoro No.B6,
                Sekaranglah, Karangkidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah
                50136. Kami buka setiap hari dari pukul 06.00 hingga 16.00 (Senin – Sabtu)
                dan 05.30 hingga 16.00 (Minggu).
            </p>
        </div>
    </section>
@endsection
