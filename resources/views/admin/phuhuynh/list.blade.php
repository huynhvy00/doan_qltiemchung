@extends('admin.main')
@section('content')
<?php $i = 0; $j=0; $k=0; $l=0; $m=0; ?>
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN HỒ SƠ</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Quản lý hồ sơ phụ huynh
                </li>
                <li class="breadcrumb-item active">
                    <strong>Danh sách</strong>
                </li>
            </ol>
        </div>
        <button style="background: none;
    border: none;">
            <a class="btn btn-primary" style="float: right; " href="{{url('admin/phuhuynh/create')}}">Thêm mới</a>
        </button>
    </div>
    <div class="page-title">

    </div>

    @include('admin.alert')

    <!-- Striped rows start -->
    <section class="section">

        <div class="tabs-container" style="margin-top: 20px;">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active show" data-toggle="tab" href="#tab-1">Hải Châu</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">Cẩm Lệ</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-3">Ngũ Hành Sơn</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-4">Sơn Trà</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-5">Liên Chiểu</a></li>
                <!-- <li><a class="nav-link" data-toggle="tab" href="#tab-3">Ngũ Hành Sơn</a></li> -->
            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active show">
                    <div class="panel-body">
                        <table class="table table-striped mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>CMND</th>
                                    <th>SDT</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Giới tính</th>
                                    <!-- <th>Nhân viên</th> -->
                                    <!-- <th>Khu vực</th> -->
                                    <th>Hình ảnh</th>
                                    <th>Tình trạng</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($haichau as $ph)
                                    <tr>
                                        <td class="text-bold-500">{{++$i}}</td>
                                        <td>{{ $ph->tenPH }}</td>
                                        <td class="text-bold-500">{{ $ph->CMND }}</td>
                                        <td class="text-bold-500">{{ $ph->sdt }}</td>
                                        <td class="text-bold-500">{{ $ph->ngaySinh }}</td>
                                        <td class="text-bold-500">{{ $ph->email }}</td>

                                        @if ($ph->gioiTinh ==0)
                                        <td class="text-bold-500">Nữ</td>
                                        @else
                                        <td class="text-bold-500">Nam</td>
                                        @endif
                                        <!-- <td class="text-bold-500">{{ $ph->diaChi }}</td> -->
                                        <!-- <td class="text-bold-500">{{ $ph->idLoaiPH }}</td> -->

                                        <!-- @foreach($khuvuc as $kv)
                                        @if($ph->code == $kv->code)
                                        <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                        @endif
                                        @endforeach -->
                                        <td>
                                            <img src="/images/phuhuynh/{{ $ph->anh }}" height="50px" width="50px" border-radius="25px">
                                        </td>
                                        @if ($ph->tinhTrang ==0)
                                        <td class="text-bold-500" style="color: #f11;"><b>Vô hiệu hoá</b></td>
                                        @else
                                        <td class="text-bold-500" style="color: blue;"><b>Đang hoạt động</b></td>
                                        @endif

                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/detail/'.$ph->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/active/'.$ph->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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
                                    <th>Họ tên</th>
                                    <th>CMND</th>
                                    <th>SDT</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Giới tính</th>
                                    <!-- <th>Nhân viên</th> -->
                                    <!-- <th>Khu vực</th> -->
                                    <th>Hình ảnh</th>
                                    <th>Tình trạng</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($camle as $ph)
                                    <tr>
                                        <td class="text-bold-500">{{++$j}}</td>
                                        <td>{{ $ph->tenPH }}</td>
                                        <td class="text-bold-500">{{ $ph->CMND }}</td>
                                        <td class="text-bold-500">{{ $ph->sdt }}</td>
                                        <td class="text-bold-500">{{ $ph->ngaySinh }}</td>
                                        <td class="text-bold-500">{{ $ph->email }}</td>

                                        @if ($ph->gioiTinh ==0)
                                        <td class="text-bold-500">Nữ</td>
                                        @else
                                        <td class="text-bold-500">Nam</td>
                                        @endif
                                        <!-- <td class="text-bold-500">{{ $ph->diaChi }}</td> -->
                                        <!-- <td class="text-bold-500">{{ $ph->idLoaiPH }}</td> -->

                                        <!-- @foreach($khuvuc as $kv)
                                        @if($ph->code == $kv->code)
                                        <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                        @endif
                                        @endforeach -->
                                        <td>
                                            <img src="/images/phuhuynh/{{ $ph->anh }}" height="50px" width="50px" border-radius="25px">
                                        </td>
                                        @if ($ph->tinhTrang ==0)
                                        <td class="text-bold-500" style="color: #f11;"><b>Vô hiệu hoá</b></td>
                                        @else
                                        <td class="text-bold-500" style="color: blue;"><b>Đang hoạt động</b></td>
                                        @endif

                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/detail/'.$ph->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/active/'.$ph->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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
                                    <th>Họ tên</th>
                                    <th>CMND</th>
                                    <th>SDT</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Giới tính</th>
                                    <!-- <th>Nhân viên</th> -->
                                    <!-- <th>Khu vực</th> -->
                                    <th>Hình ảnh</th>
                                    <th>Tình trạng</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($nguhanhson as $ph)
                                    <tr>
                                        <td class="text-bold-500">{{++$k}}</td>
                                        <td>{{ $ph->tenPH }}</td>
                                        <td class="text-bold-500">{{ $ph->CMND }}</td>
                                        <td class="text-bold-500">{{ $ph->sdt }}</td>
                                        <td class="text-bold-500">{{ $ph->ngaySinh }}</td>
                                        <td class="text-bold-500">{{ $ph->email }}</td>

                                        @if ($ph->gioiTinh ==0)
                                        <td class="text-bold-500">Nữ</td>
                                        @else
                                        <td class="text-bold-500">Nam</td>
                                        @endif
                                        <!-- <td class="text-bold-500">{{ $ph->diaChi }}</td> -->
                                        <!-- <td class="text-bold-500">{{ $ph->idLoaiPH }}</td> -->

                                        <!-- @foreach($khuvuc as $kv)
                                        @if($ph->code == $kv->code)
                                        <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                        @endif
                                        @endforeach -->
                                        <td>
                                            <img src="/images/phuhuynh/{{ $ph->anh }}" height="50px" width="50px" border-radius="25px">
                                        </td>
                                        @if ($ph->tinhTrang ==0)
                                        <td class="text-bold-500" style="color: #f11;"><b>Vô hiệu hoá</b></td>
                                        @else
                                        <td class="text-bold-500" style="color: blue;"><b>Đang hoạt động</b></td>
                                        @endif

                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/detail/'.$ph->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/active/'.$ph->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" id="tab-4" class="tab-pane">
                    <div class="panel-body">
                        <table class="table table-striped mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>CMND</th>
                                    <th>SDT</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Giới tính</th>
                                    <!-- <th>Nhân viên</th> -->
                                    <!-- <th>Khu vực</th> -->
                                    <th>Hình ảnh</th>
                                    <th>Tình trạng</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sontra as $ph)
                                    <tr>
                                        <td class="text-bold-500">{{++$l}}</td>
                                        <td>{{ $ph->tenPH }}</td>
                                        <td class="text-bold-500">{{ $ph->CMND }}</td>
                                        <td class="text-bold-500">{{ $ph->sdt }}</td>
                                        <td class="text-bold-500">{{ $ph->ngaySinh }}</td>
                                        <td class="text-bold-500">{{ $ph->email }}</td>

                                        @if ($ph->gioiTinh ==0)
                                        <td class="text-bold-500">Nữ</td>
                                        @else
                                        <td class="text-bold-500">Nam</td>
                                        @endif
                                        <!-- <td class="text-bold-500">{{ $ph->diaChi }}</td> -->
                                        <!-- <td class="text-bold-500">{{ $ph->idLoaiPH }}</td> -->

                                        <!-- @foreach($khuvuc as $kv)
                                        @if($ph->code == $kv->code)
                                        <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                        @endif
                                        @endforeach -->
                                        <td>
                                            <img src="/images/phuhuynh/{{ $ph->anh }}" height="50px" width="50px" border-radius="25px">
                                        </td>
                                        @if ($ph->tinhTrang ==0)
                                        <td class="text-bold-500" style="color: #f11;"><b>Vô hiệu hoá</b></td>
                                        @else
                                        <td class="text-bold-500" style="color: blue;"><b>Đang hoạt động</b></td>
                                        @endif

                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/detail/'.$ph->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/active/'.$ph->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" id="tab-5" class="tab-pane">
                    <div class="panel-body">
                        <table class="table table-striped mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>CMND</th>
                                    <th>SDT</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Giới tính</th>
                                    <!-- <th>Nhân viên</th> -->
                                    <!-- <th>Khu vực</th> -->
                                    <th>Hình ảnh</th>
                                    <th>Tình trạng</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($lienchieu as $ph)
                                    <tr>
                                        <td class="text-bold-500">{{++$m}}</td>
                                        <td>{{ $ph->tenPH }}</td>
                                        <td class="text-bold-500">{{ $ph->CMND }}</td>
                                        <td class="text-bold-500">{{ $ph->sdt }}</td>
                                        <td class="text-bold-500">{{ $ph->ngaySinh }}</td>
                                        <td class="text-bold-500">{{ $ph->email }}</td>

                                        @if ($ph->gioiTinh ==0)
                                        <td class="text-bold-500">Nữ</td>
                                        @else
                                        <td class="text-bold-500">Nam</td>
                                        @endif
                                        <!-- <td class="text-bold-500">{{ $ph->diaChi }}</td> -->
                                        <!-- <td class="text-bold-500">{{ $ph->idLoaiPH }}</td> -->

                                        <!-- @foreach($khuvuc as $kv)
                                        @if($ph->code == $kv->code)
                                        <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                        @endif
                                        @endforeach -->
                                        <td>
                                            <img src="/images/phuhuynh/{{ $ph->anh }}" height="50px" width="50px" border-radius="25px">
                                        </td>
                                        @if ($ph->tinhTrang ==0)
                                        <td class="text-bold-500" style="color: #f11;"><b>Vô hiệu hoá</b></td>
                                        @else
                                        <td class="text-bold-500" style="color: blue;"><b>Đang hoạt động</b></td>
                                        @endif

                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/detail/'.$ph->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                        <td class="text-bold-500"> <a href="{{url('admin/phuhuynh/active/'.$ph->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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

{{ $phuhuynh->links() }}

@endsection
