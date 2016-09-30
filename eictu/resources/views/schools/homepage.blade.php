<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{url("/css/app.css")}}" rel="stylesheet">
    <link href="{{url("/css/style.css")}}" rel="stylesheet">
    <link href="{{url("/css/chat.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @yield('css')
    <style type="text/css" media="screen">
        /*.pagination ul li{
            padding: 3px 10px;
            margin: 3px;
            font-size: 20px;
            background: #bdc3c7;
        }*/
        #Left  table{

            margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        #Left table img{
            width: 30px;
            height: auto;
            float: left;
            margin-left: 50px;
        }
        #Left table #topimg {
            width: 50px;
            float: left;
            margin-bottom: 20px;
        }
        #Left table td{
            padding: 5px 0;
            font-weight: bold;
        }
        #Left table td a{
            text-decoration: none;
            color: black;
        }
        #Left table td a:hover{
            color:#FF2C21 ;
        }
        #Left table td a:checked{
            color:#FF2C21 ;
        }
        #Left table td span {
            color: #BFCDE3;
            font-weight: bold;
        }

        #toptext{
            font-weight: bold;
            font-size: 20px;
        }

        #Right table img
        {
            width: 50px;
            height: 50px;
            float: left;
            margin: 20px;
        }
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" >
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand" href="{!! url('/')!!}" style="font-size: 22px;"><strong>eICTU</strong></a>
            <div class="navbar-brand"> Hệ sinh thái dành cho các trường đại học</div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="">@yield('title')</a></li>

            </ul>
            <ul class="navbar-nav nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" style="font-size:15px">Đăng Nhập</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/dormitory/logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container" style="margin-top: 60px; ">
    <div class="col-md-6" id="Left">
        <div  style="background-color: #ededed; position: fixed; height: 468px;">
            <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/trangthanhvien.css')!!}">
            <table style="text-align: left">
                <tr>
                    <td>Nếu Bạn là giáo viên,hay chọn</td>
                </tr>

                <tr>
                    <td>
                        <img class="image" src="{{url('quanlytruong/images/giaovien.ico')}}">
                        <a class="link" href="{{route('teacher.login')}}">Giáo Viên</a>
                    </td>
                </tr>
                <tr>
                    <td>Nếu Bạn là Sinh Viên,hay chọn</td>
                </tr>
                <tr>
                    <td>
                        <img class="image" src="{{url('quanlytruong/images/sinhvien.ico')}}">
                        <a class="link" href="{{url('student/login')}}">Sinh Viên</a>

                    </td>
                </tr>
                <tr>
                    <td>Nếu Bạn là quản trị viên của trường học đã tham gia eictu,hãy chọn</td>
                </tr>
                <tr>
                    <td>
                        <img class="image" src="{{url('quanlytruong/images/go-home-128.png')}}">
                        <a class="link" href="{{url('schools/login')}}">Trường Học</a>
                    </td>
                </tr>
                <tr>
                    <td>Nếu trường đại học của bản chưa tham gia eictu, hãy bắt đầu </td>
                </tr>
                <tr>
                    <td>
                        <img class="image" src="{{url('quanlytruong/images/register.png')}}">
                        <a class="link" href="{{url('/schools/eICTuSchoolRegister')}}">Đăng Kí</a>
                    </td>
                </tr>
                <tr>
                    <td>Nếu bạn cần tuyển sinh viên ngoài giờ hãy chọn </td>
                </tr>
                <tr>
                    <td>
                        <img class="image" src="{{url('quanlytruong/images/job.png')}}">
                        <a class="link" href="{{url('findjob/index')}}">Sinh Viên Tìm Việc</a>
                    </td>
                </tr>
                <tr>
                    <td>Nếu Bạn muốn xem thông tin ngành học </td>
                </tr>
                <tr>
                    <td>
                        <img class="image" src="{{url('quanlytruong/images/thongtin.png')}}">
                        <a class="link" href="{{url('indexmajor')}}">Thông Tin Các Ngành</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-6"  id="Right">
        <table style="text-align: left">


            <tr>
                <td>
                    <img class="image"  src="{{url('img/go-home.png')}}"></td>
                    <td><h2>Trường Đại học Ngoại Ngữ</h2>

                </td>
            </tr>

            <tr>
                <td>
                    <img class="image" src="{{url('img/go-home.png')}}"></td>
                <td><h2>Trường Đại học Công nghệ
                        Thông tin và Truyền thông</h2>

                </td>
            </tr>

            <tr>
                <td>
                    <img class="image"  src="{{url('img/go-home.png')}}"></td>
                <td><h2>Trường Đại học Nông lâm
                        Thái Nguyên</h2>

                </td>
            </tr>

            <tr>
                <td>
                    <img class="image"  src="{{url('img/go-home.png')}}"></td>
                <td><h2>Trường Đại học Y Dược
                        Thái Nguyên</h2>

                </td>
            </tr>
            <td>
                <img class="image" src="{{url('img/go-home.png')}}"></td>
            <td><h2>Trường Đại học Tại chức…</h2>

            </td>

        </table>
    </div>
</div>
<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstit rap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
