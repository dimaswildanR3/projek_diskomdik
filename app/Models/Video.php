<?php

// app/Models/Video.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'tbl_video';

    protected $fillable = [
        'judul',
        'url',
        'kategori_id',
        'pengguna_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriVideo::class, 'kategori_id');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }
}