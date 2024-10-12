<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_berita';

    protected $fillable = [
        'nama_kategori',
    ];

    public function beritas()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }
}