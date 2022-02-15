@extends('admin.main')
@section('content')
<?php $i = 0;
$j = 0;
$k = 0;
$l = 0;
$m = 0; ?>
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN HỒ SƠ TRẺ EM</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Trẻ em
                </li>
                <li class="breadcrumb-item active">
                    <strong>Danh sách</strong>
                </li>
            </ol>
        </div>
        <button style="background: none;
    border: none;">
            <a class="btn btn-primary" style="float: right; " href="{{url('treem/create')}}">Thêm mới</a>
        </button>
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
                                    <th>Code</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>CMND Phụ Huynh</th>

                                    <th>Đối tượng</th>
                                    <th>Giới tính</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($haichau as $te)
                                <tr>
                                    <td class="text-bold-500">{{++$i}}</td>
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    <td>{{ $te->tenTre }}</td>

                                    <td class="text-bold-500">{{ $te->ngaySinh }}</td>
                                    <td class="text-bold-500">{{ $te->id_PH }}</td>

                                    @foreach($doituong as $dt)
                                    @if($te->id_DT == $dt->id)
                                    <td class="text-bold-500">{{ $dt->tenDT }} - {{ $dt->doTuoi }}</td>
                                    @endif
                                    @endforeach

                                    @if ($te->gioiTinh ==0)
                                    <td class="text-bold-500">Nữ</td>
                                    @else
                                    <td class="text-bold-500">Nam</td>
                                    @endif
                                    <td class="text-bold-500"> <a href="{{url('treem/detail/'.$te->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                    <td class="text-bold-500"> <a href="{{url('treem/active/'.$te->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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
                                    <th>Code</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>CMND Phụ Huynh</th>

                                    <th>Đối tượng</th>
                                    <th>Giới tính</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($camle as $te)
                                <tr>
                                    <td class="text-bold-500">{{++$j}}</td>
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    <td>{{ $te->tenTre }}</td>

                                    <td class="text-bold-500">{{ $te->ngaySinh }}</td>
                                    <td class="text-bold-500">{{ $te->id_PH }}</td>


                                    @foreach($doituong as $dt)
                                    @if($te->id_DT == $dt->id)
                                    <td class="text-bold-500">{{ $dt->tenDT }} - {{ $dt->doTuoi }}</td>
                                    @endif
                                    @endforeach

                                    @if ($te->gioiTinh ==0)
                                    <td class="text-bold-500">Nữ</td>
                                    @else
                                    <td class="text-bold-500">Nam</td>
                                    @endif
                                    <td class="text-bold-500"> <a href="{{url('treem/detail/'.$te->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                    <td class="text-bold-500"> <a href="{{url('treem/active/'.$te->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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
                                    <th>Code</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>CMND Phụ Huynh</th>

                                    <th>Đối tượng</th>
                                    <th>Giới tính</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nguhanhson as $te)
                                <tr>
                                    <td class="text-bold-500">{{++$k}}</td>
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    <td>{{ $te->tenTre }}</td>

                                    <td class="text-bold-500">{{ $te->ngaySinh }}</td>
                                    <td class="text-bold-500">{{ $te->id_PH }}</td>


                                    @foreach($doituong as $dt)
                                    @if($te->id_DT == $dt->id)
                                    <td class="text-bold-500">{{ $dt->tenDT }} - {{ $dt->doTuoi }}</td>
                                    @endif
                                    @endforeach

                                    @if ($te->gioiTinh ==0)
                                    <td class="text-bold-500">Nữ</td>
                                    @else
                                    <td class="text-bold-500">Nam</td>
                                    @endif
                                    <td class="text-bold-500"> <a href="{{url('treem/detail/'.$te->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                    <td class="text-bold-500"> <a href="{{url('treem/active/'.$te->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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
                                    <th>Code</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>CMND Phụ Huynh</th>

                                    <th>Đối tượng</th>
                                    <th>Giới tính</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sontra as $te)
                                <tr>
                                    <td class="text-bold-500">{{++$l}}</td>
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    <td>{{ $te->tenTre }}</td>

                                    <td class="text-bold-500">{{ $te->ngaySinh }}</td>
                                    <td class="text-bold-500">{{ $te->id_PH }}</td>


                                    @foreach($doituong as $dt)
                                    @if($te->id_DT == $dt->id)
                                    <td class="text-bold-500">{{ $dt->tenDT }} - {{ $dt->doTuoi }}</td>
                                    @endif
                                    @endforeach

                                    @if ($te->gioiTinh ==0)
                                    <td class="text-bold-500">Nữ</td>
                                    @else
                                    <td class="text-bold-500">Nam</td>
                                    @endif
                                    <td class="text-bold-500"> <a href="{{url('treem/detail/'.$te->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                    <td class="text-bold-500"> <a href="{{url('treem/active/'.$te->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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
                                    <th>Code</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>CMND Phụ Huynh</th>
                                    <th>Đối tượng</th>
                                    <th>Giới tính</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lienchieu as $te)
                                <tr>
                                    <td class="text-bold-500">{{++$m}}</td>
                                    <td class="text-bold-500">{{ $te->code }}</td>
                                    <td>{{ $te->tenTre }}</td>

                                    <td class="text-bold-500">{{ $te->ngaySinh }}</td>
                                    <td class="text-bold-500">{{ $te->id_PH }}</td>


                                    @foreach($doituong as $dt)
                                    @if($te->id_DT == $dt->id)
                                    <td class="text-bold-500">{{ $dt->tenDT }} - {{ $dt->doTuoi }}</td>
                                    @endif
                                    @endforeach

                                    @if ($te->gioiTinh ==0)
                                    <td class="text-bold-500">Nữ</td>
                                    @else
                                    <td class="text-bold-500">Nam</td>
                                    @endif
                                    <td class="text-bold-500"> <a href="{{url('treem/detail/'.$te->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                    <td class="text-bold-500"> <a href="{{url('treem/active/'.$te->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

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

{{ $treem->links() }}

@endsection
