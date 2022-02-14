@extends('admin.main')
@section('content')
@include('admin.alert')
<?php $i = 0; ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h3>QUẢN LÝ THÔNG TIN Hồ SƠ PHỤ HUYNH</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                Quản lý hồ sơ phụ huynh
            </li>
            <li class="breadcrumb-item active">
                <strong>Chi tiết</strong>
            </li>
        </ol>
    </div>
</div>
<h3 style="    margin-left: 33px;
    margin-top: 20px;">Thông tin phụ huynh (MÃ HỒ SƠ: {{ $phuhuynh ->id }})</h3>
<hr>
<div class="content-detail">
    <div class="info">
        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="5">

            <tr class="tr-detail">
                <th class="bbb">Tên phu huynh</th>
                <td class="bbc">
                    {{ $phuhuynh ->tenPH }}
                </td>
            </tr>

            <tr class="tr-detail">
                <th class="bbb">Chứng minh nhân dân</th>

                <td class="bbc">{{ $phuhuynh->CMND }}</td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Email</th>
                <td class="bbc">{{ $phuhuynh->email }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Số điện thoại</th>
                <td class="bbc">{{ $phuhuynh->sdt }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Ngày sinh</th>
                <td class="bbc">{{ $phuhuynh->ngaySinh }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Địa chỉ</th>
                <td class="bbc">{{ $phuhuynh->diaChi }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Giới tính</th>
                @if ($phuhuynh->gioiTinh == 0)
                <td class="bbc">Nữ</td>
                @elseif ($phuhuynh->gioiTinh == 1)
                <td class="bbc">Nam</td>
                @endif
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Khu vực</th>
                @foreach($khuvuc as $kv)
                @if($phuhuynh->code == $kv->code)
                <td class="bbc">{{ $kv->tenKV }}</td>
                @endif
                @endforeach
            </tr>
            <tr class="tr-detail">

                <th class="bbb">Tình trạng</th>
                @if ($phuhuynh->tinhTrang == 1)
                <td class="bbc">Đang hoạt động </td>
                @elseif ($phuhuynh->phuhuynh == 0)
                <td class="bbc">Vô hiệu hoá </td>
                @endif
            </tr>
        </table>
    </div>
    <span style="margin: 0px 0px 0px 20px;"><b>Ảnh:</b></span>
    <img class="img-vaccine" src="/images/phuhuynh/{{ $phuhuynh->anh }}" alt="">
</div>
<hr>

<h3 style="    margin-left: 33px;
    margin-top: 20px;">Thông tin con </h3>
<div class="content-detail-child">
    <div class="info-child">

        @foreach($treem as $tre)
        @if($phuhuynh->id == $tre->id_PH)

        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" style="width: 580px;" data-page-size="5">

            <tr class="tr-detail">
                <th class="bbb">STT</th>
                <td class="bbc">
                    {{++$i}}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Tên con</th>
                <td class="bbc">
                    {{ $tre ->tenTre }}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Ngày sinh</th>

                <td class="bbc">{{ $tre->ngaySinh }}</td>
            </tr>

            <tr class="tr-detail">
                <th class="bbb">Giới tính</th>
                @if ($tre->gioiTinh == 0)
                <td class="bbc">Nữ</td>
                @elseif ($tre->gioiTinh == 1)
                <td class="bbc">Nam</td>
                @endif
            </tr>
            <tr class="tr-detail">
                <th class="bbb">ĐốI tượng</th>
                @foreach($doituong as $dt)
                @if($tre->id_DT == $dt->id)
                <td class="bbc">{{ $dt->tenDT}} - {{ $dt->doTuoi }}</td>
                @endif
                @endforeach
            </tr>

        </table>
        @endif
        @endforeach

    </div>
</div>
<button id="btn-submit" class="btn btn-secondary" style="width: fit-content; margin: 0px 0px 20px 33px !important">
    <a style="color: #fff;" href="{{url('phuhuynh/list')}}">Quay lại</a>
</button>

</div>
@endsection
