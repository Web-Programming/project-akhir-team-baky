<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['judul_buku','sampul_buku','kategori_id','penerbit','pengarang','stok'];
    protected $table = "buku";

    public function kategoriAja(){
        return $this->belongsTo(kategoriBuku::class,"kategori_id","id");
    }

}
