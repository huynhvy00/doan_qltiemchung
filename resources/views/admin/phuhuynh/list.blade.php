@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN VACINE</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    App Views
                </li>
                <li class="breadcrumb-item active">
                    <strong>Contacts</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="page-title">

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
                                        <th>Họ tên</th>
                                        <th>CMND</th>
                                        <th>SDT</th>
                                        <th>Ngày sinh</th>
                                        <th>Email</th>
                                        <th>Giới tính</th>
                                        <!-- <th>Nhân viên</th> -->
                                        <th>Khu vực</th>
                                        <th>Hình ảnh</th>
                                        <th>Tình trạng</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($phuhuynh as $ph)
                                    <tr>
                                        <td class="text-bold-500">{{++$i}}</td>
                                        <td>{{ $ph->tenPH }}</td>
                                        <td class="text-bold-500">{{ $ph->CMND }}</td>
                                        <td class="text-bold-500">{{ $ph->sdt }}</td>
                                        <td class="text-bold-500">{{ $ph->ngaySinh }}</td>
                                        <td class="text-bold-500">{{ $ph->email }}</td>

                                        @if ($ph->gioiTinh ==0)
                                        <td class="text-bold-500">Nữ</td>
                                        @else
                                        <td class="text-bold-500">Nam</td>
                                        @endif
                                        <!-- <td class="text-bold-500">{{ $ph->diaChi }}</td> -->
                                        <!-- <td class="text-bold-500">{{ $ph->idLoaiPH }}</td> -->

                                        @foreach($khuvuc as $kv)
                                        @if($ph->code == $kv->code)
                                        <td class="text-bold-500">{{ $kv->tenKV }}</td>
                                        @endif
                                        @endforeach
                                        <td>

                                            <img src="/images/phuhuynh/{{ $ph->anh }}" height="50px" width="50px" border-radius="25px">
                                        </td>
                                        @if ($ph->tinhTrang ==0)
                                        <td class="text-bold-500">Bị khoá</td>
                                        @else
                                        <td class="text-bold-500">Đang hoạt động</td>
                                        @endif
                                        <td class="text-bold-500"> <a class="btn btn-outline-secondary" href="{{url('phuhuynh/edit/'.$ph->id)}}">Sửa</a></td>



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

{{ $phuhuynh->links() }}

@endsection