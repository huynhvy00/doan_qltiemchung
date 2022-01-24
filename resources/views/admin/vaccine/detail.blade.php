@extends('admin.main')
@section('content')
@include('admin.alert')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h3>QUẢN LÝ THÔNG TIN VACINE</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                Vaccine
            </li>
            <li class="breadcrumb-item active">
                <strong>Chi tiết</strong>
            </li>
        </ol>
    </div>
</div>
<button id="btn-submit" class="btn btn-secondary" style="width: fit-content; margin: 0px 0px 20px 0px !important"><a style="color: #fff;" href="{{url('vaccine/list')}}">Quay lại</a></button>
<h3>Thông tin chi tiết vaccine (MÃ: {{ $vaccine ->id }})</h3>
<hr>
<div class="content-detail">
    <div class="info">
        <div class="line">
            <strong>Tên vaccine: </strong>
            <p>{{ $vaccine ->tenVX }}</p>
        </div>
        <div class="line">
            <strong>Đối tượng: </strong>
            @foreach($doituong as $dt)
            @if($vaccine->id_DoiTuong == $dt->id)
            <p>{{ $dt->tenDT }}</p>
            @endif
            @endforeach
        </div>
        <div class="line">
            <strong>Lô sản xuất: </strong>
            @foreach($benh as $b)
            @if($vaccine->code == $b->code)
            <p>{{ $b->tenBenh }}</p>
            @endif
            @endforeach
        </div>
        <div class="line">
            <strong>Bệnh: </strong>
            @foreach($losx as $lo)
            @if($vaccine->code_lo == $lo->soLo)
            <p>{{ $lo->soLo }}</p>
            @endif
            @endforeach
        </div>
        <div class="line">
            <strong>Ngày sản xuất: </strong>
            <p>{{ $vaccine ->ngaySX }}</p>
        </div>
        <div class="line">
            <strong>Hạn sử dụng: </strong>
            <p>{{ $vaccine ->hanSD }}</p>
        </div>
        <div class="line">
            <strong>Số lượng: </strong>
            <p>{{ $vaccine ->soLuong }}</p>
        </div>
        <div class="line">
            <strong>Đơn giá: </strong>
            <p>{{ $vaccine ->donGia }} VND</p>
        </div>
        <div class="line">
            <strong>Ngày nhập: </strong>
            <p>{{ $vaccine ->ngayNhap }}</p>
        </div>
        <div class="line">
            <strong>Ghi chú: </strong>
            <p>{{ $vaccine ->ghiChu }}</p>
        </div>
        <div class="line">
            <strong>Tình trạng</strong>
            @if ($vaccine->tinhTrang == 1)
            <p>Còn</p>
            @elseif ($vaccine->tinhTrang == 0)
            <p>Hết</p>
            @else
            <p>Thu hồi</p>
            </td>
            @endif
        </div>
    </div>
    <img class="img-vaccine" src="/images/vx/{{ $vaccine->anh }}" alt="">
</div>
</div>
@endsection
