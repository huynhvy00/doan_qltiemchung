@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<?php $j = 0; ?>
<?php $f = 0; ?>
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN PHIẾU TIÊM</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/main">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Quản lý phiếu tiêm
                </li>
                <li class="breadcrumb-item active">
                    <strong>Phiếu đăng ký tiêm</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="page-title">
        <div class="page-title-actions">
            <div class="mb-2 mr-2 btn-group">
                <button class="btn btn-focus"> <i class="pe-7s-filter"></i></button>
                <select name="filter" id="exampleSelect" class="dropdown-toggle-split dropdown-toggle btn btn-focus">
                    <option value="">--Choose an option--</option>
                    <option value="code">Mã số sinh viên</option>
                    <option value="name">Tên sinh viên</option>
                    <option value="course">Khoá học</option>
                </select>
            </div>
        </div>
    </div>

    @include('admin.alert')

    <!-- Striped rows start -->
    <section class="section">

        <div class="tabs-container" style="margin-top: 20px;">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active show" data-toggle="tab" href="#tab-1">Chưa kiểm tra (B1)</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">Đã kiểm tra (B2)</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-3">Đã Tiêm (B3)</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active show">
                    <div class="panel-body">
                        <table class="table table-striped mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã phiếu</th>
                                    <th>Loại vaccine</th>
                                    <th>Họ tên trẻ</th>
                                    <th>Mã tiêm</th>
                                    <th>Khu vực</th>
                                    <th>Ngày tiêm </th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Nhân viên</th>

                                    <th>Tình trạng</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chuakiemtra as $chuakt )
                                <tr>
                                    <td class="text-bold-500">{{++$i}}</td>
                                    <td class="text-bold-500">{{$chuakt ->id_PhieuDK}}</td>

                                    @foreach($vaccine as $vx)
                                    @if($chuakt->id_VX == $vx->id)
                                    <td class="text-bold-500">{{ $vx->tenVX }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($chuakt->id_PhieuDK == $dk->id)
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->code)
                                    <td class="text-bold-500">{{ $te->tenTre }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($chuakt->id_PhieuDK == $dk->id)
                                    <td class="text-bold-500">{{ $dk->id_Tre }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($chuakt->id_PhieuDK == $dk->id)
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->code)

                                    @foreach($phuhuynh as $ph)
                                    @if($te->id_PH == $ph ->CMND)

                                    @foreach($khuvuc as $kv)
                                    @if($ph->code == $kv ->code)

                                    <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    <td class="text-bold-500">{{ $chuakt->ngayTiem }}</td>
                                    <td class="text-bold-500">{{ number_format($chuakt->donGia,0,',','.').' đ'}}

                                    <td class="text-bold-500">{{ $chuakt->soLuong }}</td>
                                    @if($chuakt->id_NV == 0)
                                    <td class="text-bold-500" style="color: red;">Trống</td>
                                    @endif
                                    @foreach($nhanvien as $nv)
                                    @if($chuakt->id_NV == $nv->id)
                                    <td class="text-bold-500">{{ $nv->tenNV }}</td>
                                    @endif
                                    @endforeach

                                    @if ($chuakt->tinhTrang ==0)
                                    <td class="text-bold-500" style="color: #fff;background: red; margin-left:20px ">Chưa kiểm tra</td>
                                    @elseif ($chuakt->tinhTrang ==1)
                                    <td class="text-bold-500" style="color: #fff;background: yellow; margin-left:20px ">Đã kiểm tra</td>
                                    @else
                                    <td class="text-bold-500" style="color: #fff;background: blue;">Đã xác nhận</td>
                                    @endif
                                    <td class="text-bold-500">
                                        <a href="{{url('admin/phieutiem/chitietmuitiem/detail/'.$chuakt->id)}}">
                                            <i class="fa fa-edit" style="color: blue;font-size: 20px;"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
                <div role="tabpanel" id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <table class="table table-striped mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã phiếu</th>
                                    <th>Loại vaccine</th>
                                    <th>Họ tên trẻ</th>
                                    <th>Mã tiêm</th>
                                    <th>Khu vực</th>
                                    <th>Ngày tiêm </th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Nhân viên</th>

                                    <th>Tình trạng</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dakiemtra as $dakt )
                                <tr>
                                    <td class="text-bold-500">{{++$i}}</td>
                                    <td class="text-bold-500">{{$dakt ->id_PhieuDK}}</td>

                                    @foreach($vaccine as $vx)
                                    @if($dakt->id_VX == $vx->id)
                                    <td class="text-bold-500">{{ $vx->tenVX }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($dakt->id_PhieuDK == $dk->id)
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->code)
                                    <td class="text-bold-500">{{ $te->tenTre }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($dakt->id_PhieuDK == $dk->id)
                                    <td class="text-bold-500">{{ $dk->id_Tre }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($dakt->id_PhieuDK == $dk->id)
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->code)

                                    @foreach($phuhuynh as $ph)
                                    @if($te->id_PH == $ph ->CMND)

                                    @foreach($khuvuc as $kv)
                                    @if($ph->code == $kv ->code)

                                    <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    <td class="text-bold-500">{{ $dakt->ngayTiem }}</td>
                                    <td class="text-bold-500">{{ number_format($dakt->donGia,0,',','.').' đ'}}

                                    <td class="text-bold-500">{{ $dakt->soLuong }}</td>
                                    @if($dakt->id_NV == 0)
                                    <td class="text-bold-500" style="color: red;">Trống</td>
                                    @endif
                                    @foreach($nhanvien as $nv)
                                    @if($dakt->id_NV == $nv->id)
                                    <td class="text-bold-500">{{ $nv->tenNV }}</td>
                                    @endif
                                    @endforeach

                                    @if ($dakt->tinhTrang ==0)
                                    <td class="text-bold-500" style="color: #fff;background: red; margin-left:20px ">Chưa kiểm tra</td>
                                    @elseif ($dakt->tinhTrang ==1)
                                    <td class="text-bold-500" style="color: #fff;background: #d00; margin-left:20px ">Đã kiểm tra</td>
                                    @else
                                    <td class="text-bold-500" style="color: #fff;background: blue;">Đã xác nhận</td>
                                    @endif
                                    <td class="text-bold-500">
                                        <a href="{{url('admin/phieutiem/chitietphieutiem/detail/'.$dakt->id)}}">
                                            <i class="fa fa-edit" style="color: blue;font-size: 20px;"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
                <div role="tabpanel" id="tab-3" class="tab-pane">
                    <div class="panel-body">
                        <table class="table table-striped mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã phiếu</th>
                                    <th>Loại vaccine</th>
                                    <th>Họ tên trẻ</th>
                                    <th>Mã tiêm</th>
                                    <th>Khu vực</th>
                                    <th>Ngày tiêm </th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Nhân viên</th>

                                    <th>Tình trạng</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datiem as $dt )
                                <tr>
                                    <td class="text-bold-500">{{++$i}}</td>
                                    <td class="text-bold-500">{{$dt ->id_PhieuDK}}</td>

                                    @foreach($vaccine as $vx)
                                    @if($dt->id_VX == $vx->id)
                                    <td class="text-bold-500">{{ $vx->tenVX }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($dt->id_PhieuDK == $dk->id)
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->code)
                                    <td class="text-bold-500">{{ $te->tenTre }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($dt->id_PhieuDK == $dk->id)
                                    <td class="text-bold-500">{{ $dk->id_Tre }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($phieudk as $dk)
                                    @if($dt->id_PhieuDK == $dk->id)
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->code)

                                    @foreach($phuhuynh as $ph)
                                    @if($te->id_PH == $ph ->CMND)

                                    @foreach($khuvuc as $kv)
                                    @if($ph->code == $kv ->code)

                                    <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    <td class="text-bold-500">{{ $dt->ngayTiem }}</td>
                                    <td class="text-bold-500">{{ number_format($dt->donGia,0,',','.').' đ'}}

                                    <td class="text-bold-500">{{ $dt->soLuong }}</td>
                                    @if($dt->id_NV == 0)
                                    <td class="text-bold-500" style="color: red;">Trống</td>
                                    @endif
                                    @foreach($nhanvien as $nv)
                                    @if($dt->id_NV == $nv->id)
                                    <td class="text-bold-500">{{ $nv->tenNV }}</td>
                                    @endif
                                    @endforeach

                                    @if ($dt->tinhTrang ==0)
                                    <td class="text-bold-500" style="color: #fff;background: red; margin-left:20px ">Chưa kiểm tra</td>
                                    @elseif ($dt->tinhTrang ==1)
                                    <td class="text-bold-500" style="color: #fff;background: yellow; margin-left:20px ">Đã kiểm tra</td>
                                    @else
                                    <td class="text-bold-500" style="color: #fff;background: blue;">Đã xác nhận</td>
                                    @endif
                                    <td class="text-bold-500">
                                        <!-- <a href="{{url('phieutiem/detail/'.$dt->id)}}"> -->
                                        <i class="fa fa-edit" style="color: blue;font-size: 20px;"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </section>
</div>


@endsection

<!-- <div class="col-lg-6">

</div> -->
