<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khuVuc extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenKV',
        'code',
    ];
}
