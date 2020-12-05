<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Info extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    public $timestamps = false;

    protected $fillable = [
        'namaberita',
        'penulis',
        'tanggal',
        'foto',
        'deskripsi',
    ];
}
