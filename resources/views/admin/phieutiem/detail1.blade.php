@extends('admin.main')
@section('content')
<div>
    @include('admin.alert')
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
                    <strong>Chi tiết phiếu tiêm</strong>
                </li>
            </ol>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <section class="section" style="background: #fff; margin-top: 20px;">
            <div class="panel-body">
                <h3>Chi tiết phiếu đăng ký tiêm (MÃ PHIẾU: {{ $phieudk ->id }})</h3>
                <hr>
                <h3 class="title-detail">THÔNG TIN TRẺ ĐĂNG KÝ</h3>
                <div class="abb">
                    <div class="ro">
                        <div class="infor">
                            <label class="co2 ">Họ và tên trẻ: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            <label class="col2"><b>{{$tre->tenTre}}</b></label>
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Mã tiêm chủng: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            <label class="col2"><b>{{$tre->code}}</b></label>
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Ngày sinh: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            <label class="col2"><b>{{$tre->ngaySinh}}</b></label>
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Nhóm trẻ: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            @foreach($doituong as $dt)
                            @if($tre ->id_DT == $dt ->id)
                            <label class="col2"><b>{{$dt->tenDT}} - {{$dt->doTuoi}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="ro">
                        <div class="infor">
                            <label class="co2 ">Họ và tên phụ huynh: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            @foreach($phuhuynh as $ph)
                            @if($tre ->id_PH == $ph ->id)
                            <label class="col2"><b>{{$ph->tenPH}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">CMND: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            @foreach($phuhuynh as $ph)
                            @if($tre ->id_PH == $ph ->id)
                            <label class="col2"><b>{{$ph->CMND}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Số điện thoại: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            @foreach($phuhuynh as $ph)
                            @if($tre ->id_PH == $ph ->id)
                            <label class="col2"><b>{{$ph->sdt}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Địa chỉ: </label>
                            @foreach($treem as $tre)
                            @if($phieudk ->id_Tre == $tre ->id)
                            @foreach($phuhuynh as $ph)
                            @if($tre ->id_PH == $ph ->id)
                            <label class="col2"><b>{{$ph->diaChi}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>

                <h3 class="title-detail">THÔNG TIN ĐĂNG KÝ TIÊM</h3>

                <div class="abb">
                    @foreach($chitietmuitiem as $chitiet)
                    @if($phieudk ->id == $chitiet ->id_PhieuDK)
                    <div class="ro">

                        <div class="infor">
                            <label class="co2 ">Loại vắc xin: </label>
                            @foreach($vaccine as $vx)
                            @if($chitiet ->id_VX == $vx ->id)

                            <label class="col2"><b>{{$vx->tenVX}}</b></label>

                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Bệnh: </label>
                            @foreach($vaccine as $vx)
                            @if($chitiet ->id_VX == $vx ->id)
                            @foreach($benh as $be)
                            @if($vx ->code == $be ->code)
                            <label class="col2"><b>{{$be->tenBenh}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Số lượng: </label>
                            <label class="col2"><b>{{$chitiet->soLuong}}</b></label>
                        </div>
                        <div class="infor">
                            <label class="co2 ">Đơn giá: </label>
                            @foreach($vaccine as $vx)
                            @if($chitiet ->id_VX == $vx ->id)

                            <label class="col2"><b>{{ number_format($vx->donGia,0,',','.').' đ'}}</b></label>

                            @endif
                            @endforeach
                        </div>

                    </div>
                    @endif
                    @endforeach

                </div>
                <hr>

                <div class="abb">

                    <div class="ro">

                        <div class="infor">
                            <label class="co2 ">Ngày dự kiến tiêm: </label>
                            <label class="col2"><b>{{$phieudk->ngayDKTiem}}</b></label>
                        </div>
                        <div class="infor">
                            <label class="co2 ">Tình trạng: </label>
                            @if($phieudk->tinhTrang == 0)
                            <label class="col2"><b>Chưa xác nhận</b></label>
                            @else
                            <label class="col2"><b>Đã xác nhận</b></label>
                            @endif
                        </div>
                    </div>
                </div>

                <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('phieutiem/list')}}">Quay lại</a></button>


            </div>
        </section>
        @csrf
    </form>

    @endsection
