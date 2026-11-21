<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function daftar()
    {
        $obat = Obat::orderByDesc('id_obat')->get();

        return view('obat.daftar', compact('obat'));
    }

    public function tambah()
    {
        return view('obat.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kategori_obat' => 'required',
            'sediaan' => 'required',
            'pabrikan' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.daftar')
            ->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);

        return view('obat.edit', compact('obat'));
    }


    public function update(Request $request, $id)
    {
            $request->validate([
            'nama_obat' => 'required',
            'kategori_obat' => 'required',
            'sediaan' => 'required',
            'pabrikan' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $obat = Obat::findOrFail($id);

        $obat->update($request->only([
            'nama_obat',
            'kategori_obat',
            'sediaan',
            'pabrikan',
            'stok',
            'harga'
        ]));

        return redirect()->route('obat.daftar')
            ->with('success', 'Data obat berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        return redirect()->route('obat.daftar')
            ->with('success', 'Data obat berhasil dihapus!');
    }


}