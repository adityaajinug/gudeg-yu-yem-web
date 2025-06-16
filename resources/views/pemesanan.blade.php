@extends('app')
@section('content')
    <h2 class="font-bold text-darkteal text-2xl uppercase text-center mt-10">
        Formulir Pemesanan
    </h2>

    <div class="max-w-3xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md shadow mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white rounded-xl shadow-lg p-5 sm:p-8">
            <form action="{{ route('form.pesanan') }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama
                    </label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-tealcook focus:border-tealcook transition" />
                </div>
                <!-- Alamat Pemesanan -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat Pemesanan
                    </label>
                    <input type="text" id="address" name="address" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-tealcook focus:border-tealcook transition" />
                </div>
                <!-- Tanggal Pemesanan -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Pemesanan
                    </label>
                    <input type="date" id="date" name="date" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-tealcook focus:border-tealcook transition" />
                </div>
                <!-- Pesanan -->
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-1">
                        Pesanan
                    </label>
                    <textarea id="order" name="order" rows="4" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-tealcook focus:border-tealcook transition"></textarea>
                </div>
                <!-- Tombol -->
                <button type="submit"
                    class="w-full bg-tealcook text-white font-semibold px-4 py-2 rounded-md hover:bg-lightteal transition-colors duration-200">
                    Kirim Pesanan
                </button>
            </form>
        </div>
    </div>
@endsection
