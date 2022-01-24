<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doiTuong extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenDT',
        'doTuoi',
    ];
}
