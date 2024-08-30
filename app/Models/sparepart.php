<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{
    protected $table = 'pc-specification';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mobo',
        'cpu',
        'ram',  
        'gpu',
        'hdd',
        'ssd',
        'psu',
    ];

}
