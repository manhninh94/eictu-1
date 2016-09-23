@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Hãy nhập đầy đủ thông tin cho sinh viên mới trúng tuyển vào mẫu sau:</div>
                    <div class="panel-body">
                        <form action="{{ url("students")}}" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="Major_Id">Mã ngành :</label>
                                <div class="col-md-9">
                                    <select class="form-control col-sm-9" id="Major_Id" name="Major_Id">
                                        <option value="0"> - Chọn - </option>
                                        @forelse($majors as $major)
                                            <option value="{{$major-> id}}">{{$major-> code}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="Code" >Mã sinh viên :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="Code" name="Code" placeholder="Mã sinh viên">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="Name">Họ và tên :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Họ và tên">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="gender">Giới tính :</label>
                               <div class="col-sm-9">
                                    <select class="form-control col-sm-9" id="gender" name="gender">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                               </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="Birthday">Ngày sinh :</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="Birthday" name="Birthday" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="School_Id">Tên trường :</label>
                                <div class="col-sm-9">
                                    <select class="form-control col-sm-9" id="School_Id" name="School_Id">
                                        @forelse($data as $school)
                                            <option value="{{$school-> id}}">{{$school-> name}}</option>
                                        @empty
                                            <option value="0">Không có trường nào được chọn</option>
                                        @endforelse
                                    </select>

                                </div>
                            </div>

                            <div class="form-group" style="text-align: center;">
                                <button type="submit" class="btn btn-default">Thêm mới</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-5"></div>
        </div>


    </div>


@endsection