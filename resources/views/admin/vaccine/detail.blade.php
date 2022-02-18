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
<h3 style="    margin-left: 33px;
    margin-top: 20px;">Thông tin chi tiết vaccine (MÃ: {{ $vaccine ->id }})</h3>
<hr>
<div class="content-detail">
    <div class="info">
        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="5">

            <tr class="tr-detail">
                <th class="bbb">Tên vaccine</th>
                <td class="bbc">
                    {{ $vaccine ->tenVX }}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Đối tượng</th>
                @foreach($doituong as $dt)
                @if($vaccine->id_DoiTuong == $dt->id)
                <td class="bbc">{{ $dt->tenDT }}</td>
                @endif
                @endforeach
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Loại bệnh</th>

                @foreach($benh as $b)
                @if($vaccine->code == $b->code)
                <td class="bbc">{{ $b->tenBenh }}</td>
                @endif
                @endforeach
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Số lô</th>
                @foreach($losx as $lo)
                @if($vaccine->code_lo == $lo->soLo)
                <td class="bbc">{{ $lo->soLo }}</td>
                @endif
                @endforeach
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Số lượng</th>
                <td class="bbc">
                    {{ $vaccine->soLuong }}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Đơn giá</th>
                <td class="bbc">
                    {{ number_format($vaccine->donGia,0,',','.').' đ'}}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Ngày sản xuất</th>
                <td class="bbc">
                    {{ $vaccine ->ngaySX }}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Hạn sử dụng</th>
                <td class="bbc">
                    {{ $vaccine ->hanSD }}
                </td>
            </tr>
            <tr class="tr-detail">
                <th class="bbb">Ngày nhập:</th>
                <td class="bbc">
                    {{ $vaccine->ngayNhap }} VND
                </td>
            </tr>
            <tr class="tr-detail">

                <th class="bbb">Tình trạng</th>
                @if ($vaccine->tinhTrang == 1)
                <td class="bbc">Còn </td>
                @elseif ($vaccine->tinhTrang == 0)
                <td class="bbc">Hết </td>
                @else
                <td class="bbc">Thu hồi </td>
                @endif
            </tr>
        </table>
    </div>
    <span style="margin: 0px 0px 0px 20px;"><b>Ảnh:</b></span>
    <img class="img-vaccine" src="/images/vx/{{ $vaccine->anh }}" alt="">
</div>
<button id="btn-submit" class="btn btn-secondary" style="width: fit-content; margin: 0px 0px 20px 33px !important">
    <a style="color: #fff;" href="{{url('admin/vaccine/list')}}">Quay lại</a>
</button>

</div>
@endsection
