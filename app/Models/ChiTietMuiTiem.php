<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietMuiTiem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_VX',
        'id_NV',
        'id_PhieuDK',
        'ngayTiem',
        'donGia',
        'soLuong',
        'ghiChu',
        'tinhTrang'
    ];
}
