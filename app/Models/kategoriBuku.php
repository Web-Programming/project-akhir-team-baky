<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriBuku extends Model
{
    use HasFactory;
    protected $fillable = ['namaKategori'];

    protected $table = "kategori_buku";
    public function buku(){
        return $this->hasMany(buku::class);
    }
}
