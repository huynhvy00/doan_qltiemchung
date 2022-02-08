@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<?php $j = 0; ?>
<?php $f = 0; ?>
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN VACINE</h3>
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

    </div>

    @include('admin.alert')

    <!-- Striped rows start -->
    <section class="section">

        <div class="tabs-container" style="margin-top: 20px;">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active show" data-toggle="tab" href="#tab-1"> Tất cả phiếu đăng ký</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">Phiếu đăng ký đã xác nhận</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-3">Phiếu đăng ký chưa xác nhận</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active show">
                    <div class="panel-body">
                        <table class="table table-striped mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên trẻ</th>
                                    <th>Mã tiêm</th>
                                    <th>Khu vực</th>
                                    <th>Ngày tạo phiếu</th>
                                    <th>Số mũi</th>
                                    <th>Ngày tiêm dự kiến</th>
                                    <th>Tổng tiền</th>
                                    <th>Nhân viên</th>
                                    <th>Tình trạng</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($phieudk as $dk )
                                <tr>
                                    <td class="text-bold-500">{{++$i}}</td>
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)
                                    <td class="text-bold-500">{{ $te->tenTre }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)

                                    @foreach($phuhuynh as $ph)
                                    @if($te->id_PH == $ph ->id)

                                    @foreach($khuvuc as $kv)
                                    @if($ph->code == $kv ->code)

                                    <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    <td class="text-bold-500">Ngày tạo phiếu</td>
                                    <td class="text-bold-500">{{ $dk->soMui }}</td>
                                    <td class="text-bold-500">{{ $dk->ngayDKTiem }}</td>
                                    <td class="text-bold-500">{{ number_format($dk->tongTien,0,',','.').' đ'}}
                                        @foreach($nhanvien as $nv)
                                        @if($dk->id_NV == $nv->id)
                                    <td class="text-bold-500">{{ $nv->tenNV }}</td>
                                    @endif
                                    @endforeach

                                    @if ($dk->tinhTrang ==0)
                                    <td class="text-bold-500" style="color: red">Chưa xác nhận</td>
                                    @else
                                    <td class="text-bold-500">Đã xác nhận</td>
                                    @endif
                                    <td class="text-bold-500">
                                        <a href="{{url('phieutiem/detail/'.$dk->id)}}">
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
                                    <th>Họ tên trẻ</th>
                                    <th>Mã tiêm</th>
                                    <th>Khu vực</th>
                                    <th>Ngày tạo phiếu</th>
                                    <th>Số mũi</th>
                                    <th>Ngày tiêm dự kiến</th>
                                    <th>Tổng tiền</th>
                                    <th>Nhân viên</th>
                                    <th>Tình trạng</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($a2 as $dk )
                                <tr>
                                    <td class="text-bold-500">{{++$j}}</td>
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)
                                    <td class="text-bold-500">{{ $te->tenTre }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)

                                    @foreach($phuhuynh as $ph)
                                    @if($te->id_PH == $ph ->id)

                                    @foreach($khuvuc as $kv)
                                    @if($ph->code == $kv ->code)

                                    <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    <td class="text-bold-500">Ngày tạo phiếu</td>
                                    <td class="text-bold-500">{{ $dk->soMui }}</td>
                                    <td class="text-bold-500">{{ $dk->ngayDKTiem }}</td>
                                    <td class="text-bold-500">{{ number_format($dk->tongTien,0,',','.').' đ'}}
                                        @foreach($nhanvien as $nv)
                                        @if($dk->id_NV == $nv->id)
                                    <td class="text-bold-500">{{ $nv->tenNV }}</td>
                                    @endif
                                    @endforeach

                                    @if ($dk->tinhTrang ==0)
                                    <td class="text-bold-500" style="color: red">Chưa xác nhận</td>
                                    @else
                                    <td class="text-bold-500">Đã xác nhận</td>
                                    @endif
                                    <td class="text-bold-500"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></td>
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
                                    <th>Họ tên trẻ</th>
                                    <th>Mã tiêm</th>
                                    <th>Khu vực</th>
                                    <th>Ngày tạo phiếu</th>
                                    <th>Số mũi</th>
                                    <th>Ngày tiêm dự kiến</th>
                                    <th>Tổng tiền</th>
                                    <th>Nhân viên</th>
                                    <th>Tình trạng</th>
                                    <th colspan="2">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($a1 as $dk )
                                <tr>
                                    <td class="text-bold-500">{{++$f}}</td>
                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)
                                    <td class="text-bold-500">{{ $te->tenTre }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    @endif
                                    @endforeach

                                    @foreach($treem as $te)
                                    @if($dk->id_Tre == $te->id)

                                    @foreach($phuhuynh as $ph)
                                    @if($te->id_PH == $ph ->id)

                                    @foreach($khuvuc as $kv)
                                    @if($ph->code == $kv ->code)

                                    <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    <td class="text-bold-500">Ngày tạo phiếu</td>
                                    <td class="text-bold-500">{{ $dk->soMui }}</td>
                                    <td class="text-bold-500">{{ $dk->ngayDKTiem }}</td>
                                    <td class="text-bold-500">{{ number_format($dk->tongTien,0,',','.').' đ'}}
                                        @foreach($nhanvien as $nv)
                                        @if($dk->id_NV == $nv->id)
                                    <td class="text-bold-500">{{ $nv->tenNV }}</td>
                                    @endif
                                    @endforeach

                                    @if ($dk->tinhTrang ==0)
                                    <td class="text-bold-500" style="color: red">Chưa xác nhận</td>
                                    @else
                                    <td class="text-bold-500">Đã xác nhận</td>
                                    @endif
                                    <td class="text-bold-500"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></td>
                                    <td class="text-bold-500" style="color: red;font-size: 20px;"><i class="fa fa-trash"></i></td>
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

<div class="col-lg-6">

</div>
