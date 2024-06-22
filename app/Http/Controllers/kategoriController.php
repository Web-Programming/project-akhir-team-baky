<?php

namespace App\Http\Controllers;

use App\Models\kategoriBuku;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = kategoriBuku::where('namaKategori','like',"%$katakunci%")
                   ->paginate($jumlahbaris);
        }else{
            $data = kategoriBuku::paginate($jumlahbaris);
        }
        return view('kategori.Kindex')->with('data_kategori', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.Kcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKategori'=> 'required'

        ],[
            'namaKategori.required'=> 'Kategori buku harus diisi'
        ]);
        $data = ['namaKategori'=>$request->namaKategori];
        $kategori = $request->namaKategori;
        kategoriBuku::create($data);
        return redirect()->to('kategoriBuku')->with(['success'=>'Kategori '. $kategori .' berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kategoriBuku::where('id',$id)->delete();
        return redirect()->to('/kategoriBuku')->with('success','Data berhasil dihapus');
    }
}
