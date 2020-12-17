<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'config';
    protected $primaryKey = 'id_config';
    public $timestamps = false;
    protected $fillable = [
        'nama_config',
        'isi'
    ];
}
