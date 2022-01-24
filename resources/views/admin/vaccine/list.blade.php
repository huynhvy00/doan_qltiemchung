@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div>


    @include('admin.alert')

    <!-- Striped rows start -->
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
                    <strong>Danh sách</strong>
                </li>
            </ol>
        </div>
        <button>
            <a class="btn btn-primary" style="float: right; " href="{{url('vaccine/create')}}">Thêm mới</a>
        </button>
    </div>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="5">
                        <thead>
                            <tr>
                                <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">STT<span class="footable-sort-indicator"></span></th>
                                <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Tên vaccine<span class="footable-sort-indicator"></span></th>
                                <th data-hide="phone" class="footable-visible footable-sortable">Đối tượng<span class="footable-sort-indicator"></span></th>
                                <th data-hide="all" class="footable-visible footable-sortable">Loại bệnh<span class="footable-sort-indicator"></span></th>
                                <th data-hide="all" class="footable-visible footable-sortable">Số lô<span class="footable-sort-indicator"></span></th>
                                <th data-hide="phone" class="footable-visible footable-sortable">Số lượng<span class="footable-sort-indicator"></span></th>
                                <th data-hide="phone,tablet" class="footable-visible footable-sortable">Đơn giá<span class="footable-sort-indicator"></span></th>
                                <th data-hide="phone" class="footable-visible">Ảnh<span class="footable-sort-indicator"></span></th>
                                <th data-hide="phone" class="footable-visible footable-sortable">Tình trạng<span class="footable-sort-indicator"></span></th>
                                <th class="text-right footable-visible footable-last-column" data-sort-ignore="true">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vaccine as $vx)
                            <tr class="footable-even">
                                <td class="footable-visible footable-first-column">
                                    {{++$i}}
                                </td>

                                <td class="footable-visible footable-first-column">
                                    {{ $vx->tenVX }}
                                </td>
                                @foreach($doituong as $dt)
                                @if($vx->id_DoiTuong == $dt->id)
                                <td class="footable-visible">{{ $dt->tenDT }}</td>
                                @endif
                                @endforeach

                                @foreach($benh as $b)
                                @if($vx->code == $b->code)
                                <td class="footable-visible">{{ $b->tenBenh }}</td>
                                @endif
                                @endforeach

                                @foreach($losx as $lo)
                                @if($vx->code_lo == $lo->soLo)
                                <td class="footable-visible">{{ $lo->soLo }}</td>
                                @endif
                                @endforeach
                                <td class="footable-visible">
                                    {{ $vx->soLuong }}
                                </td>
                                <td class="footable-visible">
                                    {{ $vx->donGia }} VND
                                </td>
                                <td class="footable-visible">
                                    <img alt="image" class="rounded-circle m-t-xs img-fluid" id="vx" src="/images/vx/{{ $vx->anh }}">

                                </td>
                                @if ($vx->tinhTrang == 1)
                                <td class="footable-visible">
                                    <span class="label label-primary">Còn</span>
                                </td>
                                @elseif ($vx->tinhTrang == 0)
                                <td class="footable-visible">
                                    <span class="label label-warning">Hết</span>
                                </td>
                                @else
                                <td class="footable-visible">
                                    <span class="label label-danger">Thu hồi</span>
                                </td>
                                @endif

                                <td class="text-right footable-visible footable-last-column">
                                    <div class="btn-group">
                                        <button class="btn-white btn btn-xs"><a href="{{url('vaccine/detail/'.$vx->id)}}">View</a></button>
                                        <button class="btn-white btn btn-xs"><a href="{{url('vaccine/edit/'.$vx->id)}}">Edit</a></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

    {{ $vaccine->links() }}

    @endsection
