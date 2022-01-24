<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreEm extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_PH',
        'id_DT',
        'tenTre',
        'ngaySinh',
        'code',
        'gioiTinh',
    ];
}
