<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategoriBuku;
use Illuminate\Http\Request;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = buku::with('kategoriAja')
                ->where('judul_buku', 'like', "%$katakunci%")
                ->orWhere('penerbit', 'like', "%$katakunci%")
                ->orWhere('pengarang', 'like', "%$katakunci%")
                ->orderBy('id', 'asc')
                ->paginate($jumlahbaris);
        } else {
            $data = buku::with('kategoriAja')->orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('buku.Bindex')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = kategoriBuku::all();
        return view('buku.Bcreate', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'sampul_buku' => 'required|file|image|max:5000',
            'kategori_id' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'stok' => 'required|numeric'

        ], [
            'judul_buku.required' => 'Judul buku harus diisi',
            'sampul_buku.image' => 'File sampul harus berupa foto',
            'kategori_id.required' => 'Kategori ID harus diisi',
            'penerbit.required' => 'Penerbit harus diisi',
            'pengarang.required' => 'Pengarang harus diisi',
            'stok.required' => 'Stok harus diisi',
            'stok.numeric' => 'Stok harus diisi'
        ]);

        //untuk mengisii foto
        $ext = $request->sampul_buku->getClientOriginalExtension();
        $nama_file = "sampul_buku-" . time() . "." . $ext;
        $path = $request->sampul_buku->storeAs('public', $nama_file);

        $data = [
            'judul_buku' => $request->judul_buku,
            'sampul_buku' => $nama_file,
            'kategori_id' => $request->kategori_id,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'stok' => $request->stok
        ];

        buku::create($data);
        return redirect()->to('buku')->with('success', 'Berhasil menambahkan data buku');
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
        $data = buku::where('id', $id)->first();
        $dataKategori = kategoriBuku::all();
        return view('buku.Bedit',compact('data','dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_buku' => 'required',
            'sampul_buku' => 'nullable|file|image|max:5000',
            'kategori_id' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'stok' => 'required|numeric'

        ], [
            'judul_buku.required' => 'Judul buku harus diisi',
            'sampul_buku.image' => 'File sampul harus berupa foto',
            'kategori_id.required' => 'Kategori ID harus diisi',
            'penerbit.required' => 'Penerbit harus diisi',
            'pengarang.required' => 'Pengarang harus diisi',
            'stok.required' => 'Stok harus diisi',
            'stok.numeric' => 'Stok harus diisi'
        ]);
        //untuk mengisii foto
        $ext = $request->sampul_buku->getClientOriginalExtension();
        $nama_file = "sampul_buku-" . time() . "." . $ext;
        $path = $request->sampul_buku->storeAs('public', $nama_file);


        $data = [
            'judul_buku' => $request->judul_buku,
            'sampul_buku' => $nama_file,
            'kategori_id' => $request->kategori_id,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'stok' => $request->stok
        ];

        buku::where('id', $id)->update($data);
        return redirect()->to('buku')->with('success', 'Berhasil mengubah data buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        buku::where('id',$id)->delete();
        return redirect()->to('buku')->with('success','Berhasil melakukan delete data buku');
    }
}
