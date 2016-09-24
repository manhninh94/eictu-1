@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/trangthanhvien.css')!!}">
                    <div class="thanhvien">eICTuClassList - Lớp Học   <a style=" padding-left:740px;font-size: 18px; color: #FFFFFF;" href="{{ url('/logout') }}"
                                                                         onclick="event.preventDefault();
                                                                                       document.getElementById('logout-form').submit();">
                                                                                                            Logout
                                                                                                        </a>
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('schools/eICTuClassRegister') }}">Thêm Lớp Học Mới</a>
                        <br/>
                        <br/>
                        Danh Mục Lớp Học
                        <table class="table">
                            <tr>
                               <td>STT</td>
                                <td>Tên Lớp</td>
                            </tr>

                            @if (!isset($_classes) || $_classes ==null)
                                <tr>Chưa có lớp</tr>
                            @else
                                @foreach ($_classes as $_l)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <a href="">

                                            <td> <a href="{{route('classes.studentlist', $_l->id )}}">

                                                    {{ $_l->name}}
                                                </a></td>

                                        </a>

                                    </tr>

                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection