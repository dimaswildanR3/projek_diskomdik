<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'tbl_agenda';

    protected $fillable = [
        'judul',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'kategori_id',
        'pengguna_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriAgenda::class, 'kategori_id');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }
}