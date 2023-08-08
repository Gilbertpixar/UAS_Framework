<?php

namespace App\Http\Controllers;

use App\Models\Roster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;




class RostersController extends Controller
{
    // Fungsi-fungsi yang dihasilkan dari resource controller

    public function index()
    {
        $rosters = Roster::all();
        return view('dashboard.rosters.index', compact('rosters'));
    }

    public function create()
    {
        return view('dashboard.rosters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rooster' => 'required',
            'image'   => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $data = [
            'nama_rooster' => $request->nama_rooster,
        ];

        if ($request->hasFile('image')) {
            // Jika ada file gambar yang diunggah, simpan gambar baru dan simpan nama file di kolom 'images'
            $data['images'] = $request->image->store('public/resource/images/rosters');
        }

        Roster::create($data);
        Alert::success('Roster berhasil ditambahkan', 'DATA BERHASIL DITAMBAH.');
        return redirect()->route('rosters.index')->with('success', 'Data roster berhasil ditambahkan!');
    }

    public function show($id)
    {
        $roster = Roster::findOrFail($id);
        return view('dashboard.rosters.show', compact('roster'));
    }

    public function edit($id)
    {
        $roster = Roster::findOrFail($id);
        return view('dashboard.rosters.edit', compact('roster'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rooster' => 'required',
            'images' => 'sometimes|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $roster = Roster::findOrFail($id);

        $data = [
            'nama_rooster' => $request->nama_rooster,
        ];

        if ($request->hasFile('images')) {
            // Jika ada file gambar yang diunggah, simpan gambar baru dan hapus gambar lama
            $data['images'] = $request->images->store('public/resource/images/rosters');
        }

        $roster->update($data);

        return redirect()->route('rosters.index')->with('success', 'Data roster berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $roster = Roster::findOrFail($id);

        // Hapus gambar dari penyimpanan saat menghapus data roster
        if (Storage::exists($roster->images)) {
            Storage::delete($roster->images);
        }

        $roster->delete();

        return redirect()->route('rosters.index')->with('success', 'Data roster berhasil dihapus!');
    }
}
