<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // isi nilai nama table sesuai database
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama',
        'nim',
        'tanggal_lahir'
    ];
}
