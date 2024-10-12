<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_dokumen';

    protected $fillable = [
        'nama_kategori',
        'pengguna_id',
    ];

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'kategori_id');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }
}