<?php

// app/Models/Kontak.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'tbl_kontak';

    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'alamat',
        'media_sosial_1',
        'media_sosial_2',
        'logo_sosial_1',
        'logo_sosial_2',
        'media_sosial_3',
        'logo_sosial_3',
        'logo',
    ];
}