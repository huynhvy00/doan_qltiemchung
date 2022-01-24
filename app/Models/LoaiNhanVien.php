<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiNhanVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenLoaiNV',
        'code',
    ];
}
