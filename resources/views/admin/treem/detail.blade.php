@extends('admin.main')
@section('content')
@include('admin.alert')
<?php $i = 0; ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h3>QUẢN LÝ THÔNG TIN Hồ SƠ TRẺ EM</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                Quản lý hồ sơ trẻ em
            </li>
            <li class="breadcrumb-item active">
                <strong>Chi tiết</strong>
            </li>
        </ol>
    </div>
</div>
<div style="flex-direction: row; display: flex; justify-content: space-between">
    <h3 style="    margin-left: 33px; margin-top: 20px;">
        Thông tin trẻ em (MÃ HỒ SƠ: {{ $treem ->id }})
    </h3>
    <button style="background: none; margin-right: 40px; border: none;margin-top: 10px;">
        <a class="btn btn-primary" style="float: right; " href="{{url('admin/treem/create')}}">
            Tra cứu lịch sử tiêm
        </a>
    </button>
</div>

<hr>


<div class="content-detail-child">
    <div class="info-child">



        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" style="width: 580px;" data-page-size="5">

            <tr class="tr-detail">
                <th class="bbb">Tên con</th>
                <td class="bbc">
                    {{ $treem ->tenTre }}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Mã tiêm chủng</th>
                <td class="bbc">
                    {{ $treem ->code }}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Ngày sinh</th>

                <td class="bbc">{{ $treem->ngaySinh }}</td>
            </tr>

            <tr class="tr-detail">
                <th class="bbb">Giới tính</th>
                @if ($treem->gioiTinh == 0)
                <td class="bbc">Nữ</td>
                @elseif ($treem->gioiTinh == 1)
                <td class="bbc">Nam</td>
                @endif
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Đối tượng</th>
                @foreach($doituong as $dt)
                @if($treem->id_DT == $dt->id)
                <td class="bbc">{{ $dt->tenDT}} - {{ $dt->doTuoi }}</td>
                @endif
                @endforeach
            </tr>

        </table>

        @foreach($phuhuynh as $ph)
        @if($treem->id_PH == $ph->CMND)
        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" style="width: 580px;" data-page-size="5">

            <tr class="tr-detail">
                <th class="bbb">Tên phu huynh</th>
                <td class="bbc">
                    {{ $ph ->tenPH }}
                </td>
            </tr>

            <tr class="tr-detail">
                <th class="bbb">Chứng minh nhân dân</th>

                <td class="bbc">{{ $ph->CMND }}</td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Email</th>
                <td class="bbc">{{ $ph->email }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Số điện thoại</th>
                <td class="bbc">{{ $ph->sdt }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Ngày sinh</th>
                <td class="bbc">{{ $ph->ngaySinh }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Địa chỉ</th>
                <td class="bbc">{{ $ph->diaChi }}</td>

            </tr>
            <tr class="tr-detail">
                <th class="bbb">Giới tính</th>
                @if ($ph->gioiTinh == 0)
                <td class="bbc">Nữ</td>
                @elseif ($ph->gioiTinh == 1)
                <td class="bbc">Nam</td>
                @endif
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Khu vực</th>
                @foreach($khuvuc as $kv)
                @if($ph->code == $kv->code)
                <td class="bbc">{{ $kv->tenKV }}</td>
                @endif
                @endforeach
            </tr>
            <tr class="tr-detail">

                <th class="bbb">Tình trạng</th>
                @if ($ph->tinhTrang == 1)
                <td class="bbc">Đang hoạt động </td>
                @elseif ($ph->phuhuynh == 0)
                <td class="bbc">Vô hiệu hoá </td>
                @endif
            </tr>

        </table>
        @endif
        @endforeach

    </div>
</div>
<button id="btn-submit" class="btn btn-secondary" style="width: fit-content; margin: 0px 0px 20px 33px !important">
    <a style="color: #fff;" href="{{url('admin/treem/list')}}">Quay lại</a>
</button>

</div>
@endsection
