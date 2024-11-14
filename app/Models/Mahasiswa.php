<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama',
        'nim',
        'tanggal_lahir'
    ];

    public function dpa()
    {
        return $this->belongsTo(Dosen::class, 'id_dpa');
    }
}
