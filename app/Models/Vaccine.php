<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $fillable = [

    'id_DoiTuong',
    'code',//benh
    'code_lo', //loSX
    'tenVX',
    'ngaySX',
    'hanSD',
    'soLuong',
    'donGia',
    'ghiChu',
    'tinhTrang',
    'anh',
    'ngayNhap',
    ];
}
