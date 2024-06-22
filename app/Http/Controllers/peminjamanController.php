<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\buku;
use Illuminate\Support\Facades\DB;


class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = peminjaman::where('status', 1)->with("peminjam", "dipinjam")
                ->where('id', 'like', "%$katakunci%")
                ->orWhere('id_peminjam', 'like', "%$katakunci%")
                ->orWhere('id_buku', 'like', "%$katakunci%")
                ->orWhere("tgl_pinjam", "like", "%$katakunci%")
                ->orderBy("id", "asc")
                ->paginate($jumlahbaris);
        } else {
            $data = peminjaman::where('status', 1)->with("peminjam", "dipinjam")->orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('peminjaman.Pindex')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_anggota = Anggota::all();
        $data_buku  = buku::all();
        return view('Peminjaman.Pcreate', compact('data_buku', 'data_anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_peminjam' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required'
        ], [
            'id_peminjam.required' => 'Peminjam buku harus dipilih',
            'id_buku.required' => 'Buku yang di pinjam harus dipili',
            'tgl_pinjam' => 'Tanggal pinjam harus dipilih'
        ]);
        $cek = DB::table('buku')->where('id', $request->id_buku)->where('stok', '>', 0)->first();
        if ($cek) {
            $days = 4;
            $data = [
                'id_peminjam' => $request->id_peminjam,
                'id_buku' => $request->id_buku,
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_wajib_kembali' => date('Y-m-d', strtotime($request->tgl_pinjam . ' +'  . $days . ' days')),
                'status' => 1
            ];
        $qty = DB::table('buku')->where('id', $request->id_buku)->first();
        $qty_now = $qty->stok;
        $qty_new = $qty_now - 1;

        DB::table('buku')->where('id', $request->id_buku)->update([
            'stok'=> $qty_new
            ]);

            peminjaman::create($data);
            return redirect()->to('peminjaman')->with('success', 'Berhasil meminjam buku');
        } else {
            return redirect()->to('peminjaman')->with('error', 'Gagal meminjam buku karena stok buku habis');
        }
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
        //
    }
}
