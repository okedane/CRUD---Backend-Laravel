<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $films = Film::all();
        return view('pages.films.index', compact('films', 'kategori'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'kategori_id' => 'required|exists:kategoris,id',
            ]);

            Film::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $request->file('image')->store('images', 'public'),
                'kategori_id' => $request->kategori_id,
            ]);

            return redirect()->back()->with('success', 'Film created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create film: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'kategori_id' => 'required|exists:kategoris,id',
            ]);

            $film = Film::findOrFail($id);
            $film->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $request->file('image')->store('images', 'public'),
                'kategori_id' => $request->kategori_id,
            ]);

            return redirect()->back()->with('success', 'Film updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update film: ' . $e->getMessage());
        }
    }
}
