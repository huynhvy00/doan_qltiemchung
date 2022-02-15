@extends('admin.main')
@section('content')
@include('admin.alert')
<?php $i = 0; ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h3>QUẢN LÝ THÔNG TIN Hồ SƠ NHÂN VIÊN</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                Quản lý hồ sơ nhân viên
            </li>
            <li class="breadcrumb-item active">
                <strong>Chi tiết</strong>
            </li>
        </ol>
    </div>
</div>
<h3 style="    margin-left: 33px;
    margin-top: 20px;">Thông tin nhân viên (MÃ HỒ SƠ: {{ $nhanvien ->id }})</h3>
<hr>
<div class="content-detail">
    <div class="info">
        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="5">

            <tr class="tr-detail">
                <th class="bbb">Tên nhân viên</th>
                <td class="bbc">
                    {{ $nhanvien ->tenNV }}
                </td>
            </tr>

            <tr class="tr-detail">
                <th class="bbb">Chứng minh nhân dân</th>

                <td class="bbc">{{ $nhanvien->CMND }}</td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Email</th>
                <td class="bbc">{{ $nhanvien->email }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Số điện thoại</th>
                <td class="bbc">{{ $nhanvien->sdt }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Ngày sinh</th>
                <td class="bbc">{{ $nhanvien->ngaySinh }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Địa chỉ</th>
                <td class="bbc">{{ $nhanvien->diaChi }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Giới tính</th>
                @if ($nhanvien->gioiTinh == 0)
                <td class="bbc">Nữ</td>
                @elseif ($nhanvien->gioiTinh == 1)
                <td class="bbc">Nam</td>
                @endif
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Khu vực</th>
                @foreach($khuvuc as $kv)
                @if($nhanvien->code == $kv->code)
                <td class="bbc">{{ $kv->tenKV }}</td>
                @endif
                @endforeach
            </tr>
            <tr class="tr-detail">

                <th class="bbb">Tình trạng</th>
                @if ($nhanvien->tinhTrang == 1)
                <td class="bbc">Đang hoạt động </td>
                @elseif ($nhanvien->nhanvien == 0)
                <td class="bbc">Vô hiệu hoá </td>
                @endif
            </tr>
        </table>
    </div>
    <span style="margin: 0px 0px 0px 20px;"><b>Ảnh:</b></span>
    <img class="img-vaccine" src="/images/phuhuynh/{{ $nhanvien->anh }}" alt="">
</div>
<button id="btn-submit" class="btn btn-secondary" style="width: fit-content; margin: 0px 0px 20px 33px !important">
    <a style="color: #fff;" href="{{url('nhanvien/list')}}">Quay lại</a>
</button>

</div>
@endsection
