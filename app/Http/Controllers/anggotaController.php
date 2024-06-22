<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Session;



class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 7;
        if(strlen($katakunci)){
            $data = Anggota::where('id_anggota','like',"%$katakunci%")
                   ->orWhere('nama','like',"%$katakunci%")
                   ->orWhere('npm','like',"%$katakunci%")
                   ->orderBy("id_anggota","asc")
                   ->paginate($jumlahbaris);
        }else{
            $data = Anggota::orderBy('id_anggota','asc')->paginate($jumlahbaris);
        }
        return view('Anggota.index')->with('data3', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('Anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_anggota'=>'required|numeric|unique:anggota,id_anggota',
            'nama'=>'required',
            'gender'=>'required',
            'npm'=>'required|numeric|unique:anggota,npm',

        ],[
            'id_anggota.required'=>'ID Anggota wajib diisi',
            'id_anggota.numeric'=>'ID Anggota wajib dalam angka',
            'id_anggota.unique'=>'ID Anggota sudah terdaftar',
            'nama.required'=>'Nama wajib diisi',
            'gender.required'=>'Gender harus dipilih',
            'npm.required'=>'NPM wajib diisi',
            'npm.numeric'=>'NPM wajib dalam angka',
            'npm.unique'=> 'NPM sudah terdaftar',
        ]);
        $data = [
            'id_anggota'=>$request->id_anggota,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'npm'=>$request->npm,
        ];
        anggota::create($data);
        return redirect()->to('anggota')->with('success','Berhasil menambahkan data');
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
       $data = Anggota::where('id_anggota', $id)->first();
       return view('Anggota.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'npm'=>'required|numeric|unique:anggota,npm',

        ],[
            'nama.required'=>'Nama wajib diisi',
            'npm.required'=>'NPM wajib diisi',
            'npm.numeric'=>'NPM wajib dalam angka',
            'npm.unique'=> 'NPM sudah terdaftar',
        ]);
        $data = [
            'nama'=>$request->nama,
            'npm'=>$request->npm,
        ];
        anggota::where('id_anggota', $id)->update($data);
        return redirect()->to('anggota')->with('success','Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Anggota::where('id_anggota',$id)->delete();
        return redirect()->to('anggota')->with('success','Berhasil melakukan delete data');
    }
}
