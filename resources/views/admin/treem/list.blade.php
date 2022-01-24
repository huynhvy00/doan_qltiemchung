@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN HỒ SƠ TRẺ EM</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Trẻ em
                </li>
                <li class="breadcrumb-item active">
                    <strong>Danh sách</strong>
                </li>
            </ol>
        </div>
        <button>
            <a class="btn btn-primary" style="float: right; " href="{{url('treem/create')}}">Thêm mới</a>
        </button>
    </div>

    @include('admin.alert')

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
                                        <td class="text-bold-500">
                                            <a class="btn btn-outline-secondary" href="{{url('treem/edit/'.$te->id)}}">
                                                Sửa
                                            </a>
                                            <a class="btn btn-outline-secondary" href="{{url('treem/delete/'.$te->id)}}">
                                                Xoá
                                            </a>
                                        </td>
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
