<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoSX extends Model
{
    use HasFactory;
    protected $fillable = [
        'soLo',
        'ngaySX',
        'tinhTrang',
        'tenNSX',
        'quocGia',
    ];
}
