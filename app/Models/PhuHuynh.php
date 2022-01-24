<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuHuynh extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenPH',
        'email',
        'password',
        'sdt',
        'diaChi',
        'CMND',
        'anh',
        'ngaySinh',
        'code',
        'gioiTinh',
        'tinhTrang',
    ];
}
