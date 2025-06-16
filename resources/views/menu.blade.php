@extends('app')
@section('content')
    <h2 class="font-bold text-darkteal text-2xl uppercase text-center mb-6">Daftar Menu</h2>
    <div id="menu-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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
@endsection
