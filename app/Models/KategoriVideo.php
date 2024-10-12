<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriVideo extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_video';

    protected $fillable = [
        'nama_kategori',
        'url',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class, 'kategori_id');
    }
}