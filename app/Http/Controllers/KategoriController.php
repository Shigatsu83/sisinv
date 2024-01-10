<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $rsetKategori = Kategori::orderBy('id', 'asc')->get();
        return view('kategori.index', compact('rsetKategori'));

    }

    public function create()
    {
        $akategori = array('blank'=> 'Pilih Kategori',
    'M' => 'Barang Modal',
    'A' => 'Alat',
    'BHP' => 'Barang Habis Pakai',
    'BTHP' => 'Barang Tidak Habis Pakai'
);
        return view('kategori.create', compact('akategori'));
    }       

    public function store(Request $request)
    {
        $this->validate($request,[
            'deskripsi' => 'required',
            'kategori' => 'required | in: M,A,BHP,BTHP'
        ]);
        Kategori::create([
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori
        ]);
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $rsetKategori = Kategori::find($id);
        return view('kategori.show', compact('rsetKategori'));
    }

    public function edit($id)
    {
        $akategori = Kategori::all();
        $rsetKategori = Kategori::find($id);
        return view('kategori.edit', compact('rsetKategori', 'akategori'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate ($request,[
            'deskripsi' => 'required',
            'kategori' => 'required | in:M, A, BHP, BTHP'
        ]);
        
        $rsetKategori = Kategori::find($id);
        $rsetKategori->update([
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
        ]);
    }

    public function destroy($id)
    {
        if(DB::table('barang')->where('kategori_id', $id)->exists()){
            return redirect()->route('kategori.index')->with(['gagal' => 'Data gagal dihapus']);
        }else{
            $rsetKategori = Kategori::find($id);
            $rsetKategori->delete();
            return redirect()->route('kategori.index')->with(['succes' => 'data berhasil dihapus']);
        }
    }
}
