<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $fillable = ['id_peminjam', 'id_buku','status', 'tgl_pinjam', 'tgl_kembali', 'denda','tgl_wajib_kembali'];
    protected $table = "peminjaman";

    public function peminjam(){
        return $this->belongsTo(Anggota::class,"id_peminjam","id_anggota");
    }
    public function dipinjam(){
        return $this->belongsTo(buku::class,"id_buku","id");
    }
}
