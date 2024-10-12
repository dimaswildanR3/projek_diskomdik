<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGambar extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_gambar';

    protected $fillable = [
        'nama_kategori',
        'url',
    ];

    public function gambars()
    {
        return $this->hasMany(Gambar::class, 'kategori_id');
    }
}