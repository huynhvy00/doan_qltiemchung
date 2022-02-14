@extends('admin.main')
@section('content')
<?php $i = 0; ?>
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
    @include('modal-login')

    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Code</th>
                                        <th>Họ tên</th>
                                        <th>CMND Phụ Huynh</th>
                                        <th>Ngày sinh</th>
                                        <th>Đối tượng</th>
                                        <th>Giới tính</th>

                                        <th colspan="2">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($treem as $te)
                                    <tr>
                                        <td class="text-bold-500">{{++$i}}</td>
                                        <td class="text-bold-500">{{ $te->code }}</td>
                                        <td>{{ $te->tenTre }}</td>

                                        <td class="text-bold-500">{{ $te->id_PH }}</td>
                                        <td class="text-bold-500">{{ $te->ngaySinh }}</td>
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
                                        <td class="text-bold-500"> <a href="#myModal"  class="trigger-btn"   data-toggle="modal"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a></td>
                                        <td class="text-bold-500"> <a href="{{url('treem/active/'.$te->id)}}"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>

                                        </>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{ $treem->links() }}

@endsection
