<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;


class pengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = peminjaman::where('status', 2)->with("peminjam", "dipinjam")
                ->where('id', 'like', "%$katakunci%")
                ->orWhere('id_peminjam', 'like', "%$katakunci%")
                ->orWhere('id_buku', 'like', "%$katakunci%")
                ->orWhere("tgl_pinjam", "like", "%$katakunci%")
                ->orWhere("tgl_kembali", "like", "%$katakunci%")
                ->orderBy("id", "asc")
                ->paginate($jumlahbaris);
        } else {
            $data = peminjaman::where('status', 2)->with("peminjam", "dipinjam")->orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('history.Hindex')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = peminjaman::find($id);
        $id_buku = $data->id_buku;

        $buku = buku::find($id_buku);
        $now = $buku->stok;
        $stok_pengembalian = $now + 1;

        $tgl_wajib_kembali = Carbon::parse($data->tgl_wajib_kembali);
        $tgl_kembali = Carbon::now();
        $denda = 0;
        $denda_per_hari = 2000;

        if ($tgl_kembali > $tgl_wajib_kembali) {
            $selisih_hari = $tgl_wajib_kembali->diffInDays($tgl_kembali);
            $denda = ceil($selisih_hari * $denda_per_hari);
        }
        $rounded_denda = round($denda, -3);

        peminjaman::where('id', $id)->update([
            'status' => 2,
            'tgl_kembali' => Date::now(),
            'denda'=> $rounded_denda,
        ]);
        buku::where('id', $id_buku)->update([
            'stok' => $stok_pengembalian
        ]);
        return redirect()->to('pengembalian')->with('success', 'Berhasil menggembalikan buku');
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
