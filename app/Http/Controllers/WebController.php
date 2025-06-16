<?php

namespace App\Http\Controllers;

use App\Models\BigOrder;
use App\Models\Menu;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index() {
        $menus = Menu::limit(4)->orderBy('id','desc')->get();
        return view('index', [
            'menus' => $menus
        ]);
    }

    public function pesanan() {
        return view('pemesanan');
    }

    public function menu() {
        $menus = Menu::all();
        return view('menu', [
            'menus' => $menus
        ]);
    }

    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'date' => 'required|date',
            'order' => 'required|string|max:1000',
        ]);

        BigOrder::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'date' => $validated['date'],
            'description' => $validated['order'],
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil dikirim!');
    }
}
