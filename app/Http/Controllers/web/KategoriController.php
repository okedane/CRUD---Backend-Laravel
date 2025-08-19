<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('pages.kategori.kategori', compact('kategoris'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|alpha',
            ]);


            Kategori::create([
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', 'Kategori created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create kategori: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $kategori = Kategori::findOrFail($id);
            $kategori->update([
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', 'Kategori updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update kategori: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->delete();

            return redirect()->back()->with('success', 'Kategori deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete kategori: ' . $e->getMessage());
        }
    }
}
