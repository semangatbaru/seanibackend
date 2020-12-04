<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WebLogin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin';

    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = [
        
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
