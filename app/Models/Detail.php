<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model

{
    use HasFactory;
    protected $table = 'detail_sewa';
    
    public $timestamps = false;

    protected $fillable = [
        'id_sewa',
        'id_alat',
        'harga'
    ];
}

