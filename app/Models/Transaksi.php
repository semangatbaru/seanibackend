<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'sewa';
    protected $primaryKey = 'id_sewa';
    public $timestamps = false;

    protected $fillable = [
        'id_sewa',
        
        'id_user',
        'tgl_sewa',
        'total',
        'status',
        'lahan'
    ];
}
