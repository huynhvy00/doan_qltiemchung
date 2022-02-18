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
    <section class="section" style="background: #fff; margin-top: 20px;">
        <form method="post" enctype="multipart/form-data">
            <div class="panel-body">
                <!-- <h3>Chi tiết phiếu đăng ký tiêm (MÃ PHIẾU: )</h3> -->
                <div class="abb">
                    <div class="ro">
                        <h3 class="title-detail">THÔNG TIN TRẺ ĐĂNG KÝ</h3>
                        <div class="infor">
                            <label class="co2 ">Họ và tên trẻ: </label>
                            @foreach($phieudk as $dk)
                            @if($chitiet->id_PhieuDK == $dk->id)
                            @foreach($treem as $tre)
                            @if($dk ->id_Tre == $tre ->code)
                            <label class="col2"><b>{{$tre->tenTre}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Mã tiêm chủng: </label>
                            @foreach($phieudk as $dk)
                            @if($chitiet->id_PhieuDK == $dk->id)
                            @foreach($treem as $tre)
                            @if($dk ->id_Tre == $tre ->code)
                            <label class="col2"><b>{{$tre->code}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Ngày sinh: </label>
                            @foreach($phieudk as $dk)
                            @if($chitiet->id_PhieuDK == $dk->id)
                            @foreach($treem as $tre)
                            @if($dk ->id_Tre == $tre ->code)
                            <label class="col2"><b>{{$tre->ngaySinh}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <div class="infor">
                            <label class="co2 ">Nhóm trẻ: </label>
                            @foreach($phieudk as $dk)
                            @if($chitiet->id_PhieuDK == $dk->id)
                            @foreach($treem as $tre)
                            @if($dk ->id_Tre == $tre ->code)
                            @foreach($doituong as $dt)
                            @if($tre ->id_DT == $dt ->id)
                            <label class="col2"><b>{{$dt->tenDT}} - {{$dt->doTuoi}}</b></label>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="ro">
                        <h3 class="title-detail">THÔNG TIN ĐĂNG KÝ TIÊM</h3>
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
                </div>
                <hr>
                <h3 class="title-detail">NHẬP CÁC CHỈ SỐ </h3>

                <div class="abb">
                    <div class="ro">
                        <div class="infor">
                            <label class="chiso">Biểu hiện trước khi tiêm:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="bieuHienTruoc">
                            </div>
                        </div>
                        <div class="infor">
                            <label class="chiso">Biểu hiện sau khi tiêm:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="bieuHienSau">
                            </div>
                        </div>
                        <div class="infor">
                            <label class="chiso">Nhịp tim:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="nhipTim">
                            </div>
                        </div>

                    </div>
                    <div class="ro">
                       <div class="infor">
                            <label class="chiso">Chiều cao:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="chieuCao">
                            </div>
                        </div>
                        <div class="infor">
                            <label class="chiso">Cân nặng:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="canNang">
                            </div>
                        </div>
                        <div class="infor">
                            <label class="chiso">Nhiệt độ cơ thể:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nhietDo">
                            </div>
                        </div>

                    </div>
                </div>



                @if($chitiet->tinhTrang == 1)
                <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('admin/phieutiem/chitietmuitiem/list')}}">Quay lại</a></button>
            </div>
            @csrf
        </form>
        @else
        <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('admin/phieutiem/chitietmuitiem/list')}}">Quay lại</a></button>
        <button type="submit" id="btn-submit" class="btn btn-primary">Xác nhận đã kiểm tra</button>

</div>
@csrf
</form>
@endif

</section>
@endsection
</div>
