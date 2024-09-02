<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasOne;


class sparepart extends Model
{
    protected $table = 'pc-specification';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mobo',
        'cpu',
        'ram',  
        'gpu_id',
        'hdd',
        'ssd',
        'psu',
    ];

    public function gpu(): BelongsTo
    {
        return $this->belongsTo(Gpu::class, 'gpu_id', 'id');
    }
}
