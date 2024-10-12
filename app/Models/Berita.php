<?php

// app/Models/Berita.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'tbl_berita';

    protected $fillable = [
        'judul',
        'isi',
        'isi_p',
        'tanggal',
        'kategori_id',
        'kategori_nama',
        'views',
        'gambar',
        'pengguna_id',
        'author',
        'img_slider',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }
}