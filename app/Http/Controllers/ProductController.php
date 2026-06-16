<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('Produits/Creer');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'stock' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect()->route('dashboard');
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();

    return redirect()->route('dashboard')->with('success', 'Produit supprimé avec succès.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('Produits.Modifier', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('dashboard');
    }
}
