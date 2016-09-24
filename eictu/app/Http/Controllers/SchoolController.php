<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::with('manager')->get();

        return view("schools.index")->with('schools',$schools);
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->input('name');
        $data['code'] = $request->input('code');
        $data['user_id'] = $request->input('user_id');

        $this->validate($request, [
            'name'    => 'required',
            'code'    => 'required',
            'user_id' => 'required'
        ]);

        //validation laravel

        $school = new School();
        $school->name = $data['name'];
        $school->code = $data['code'];
        $school->user_id = $data['user_id'];
        $school->save();

        return redirect("schools");
    }
    public function eICTuHomePage(){
        return view("schools.eICTuHomePage");
    }

    public function eICTuSchoolRegister(){
        return view("schools.eICTuSchoolRegister");
    }

    public function eICTuSchoolAdminLogin(){
        return view("schools.eICTuSchoolAdminLogin");
    }

    public function eICTuMajorList(){
        $_majors =  DB::table('majors')
            ->select('name','id','code')
            ->orderBy('id', 'asc')
            ->get();
        return view("schools.eICTuMajorList",['_majors'=>$_majors]);

    }




    public function eICTuClassList(){

        $_classes =  DB::table('classes')
            ->select('name','id')
            ->orderBy('id', 'asc')
            ->get();
        return view("schools.eICTuClassList",['_classes'=>$_classes]);
    }

    public  function  eICTuClassRegister(){
        $_majors =  DB::table('majors')
            ->select('name','id','code')
            ->orderBy('id', 'asc')
            ->get();
        return view("schools.eICTuClassRegister",['_majors'=>$_majors]);
    }









    public  function eICTuMajorRegister(){
        return view("schools.eICTuMajorRegister");
    }
    public function add(Request $request)
    {
          if( Input::get('viettat')==null|| Input::get('tendaydu')==null|| Input::get('hoten')==null||Input::get('taikhoan')==null||Input::get('matkhau')==null){
              echo  "Bạn Hãy nhập đầy đủ !";
          }else{
                  DB::table('adminschool')->insert(['code' => Input::get('viettat'), 'fullname' =>  Input::get('tendaydu'), 'name' =>  Input::get('hoten'), 'email' =>  Input::get('taikhoan'), 'password' =>  Input::get('matkhau')]);
                  return view("schools.eICTuSchoolAdminLogin");
          }
    }

    public function  dangnhap(){

        if( Input::get('user')!=null&& Input::get('matkhau')!=null){
       $bien= DB::table('adminschool')->select('email','password')
                                  ->where([['email', '=', Input::get('user')],['password', '=', Input::get('matkhau')]])
                                   ->get();
              if($bien=='[]'){
             echo "Sai mật khẩu hoặc Password !";
            }else{
                 return view("schools.eICTuSchoolHomePage");

              }
        }else{
            echo  "Bạn Hãy nhập đầy đủ !";
        }


    }

    public function dangkynganh(Request $request)
    {
      if(Input::get('code')!=null&&Input::get('name')!=null){
        DB::table('majors')->insert(['code' => Input::get('code'), 'name' =>  Input::get('name')]);
        $_majors =  DB::table('majors')
            ->select('name','id','code')
            ->orderBy('id', 'asc')
            ->get();
        return view("schools.eICTuMajorList",['_majors'=>$_majors]);}
        else{
            echo  "Bạn Hãy nhập đầy đủ !";
        }
    }

    public function dangkylop(Request $request)
    {
        if(Input::get('name')!=null&&Input::get('manganh')!=null){
        DB::table('classes')->insert(['name' => Input::get('name'), 'major_id' =>  Input::get('manganh')]);
        $_classes =  DB::table('classes')
            ->select('name','id')
            ->orderBy('id', 'asc')
            ->get();
        return view("schools.eICTuClassList",['_classes'=>$_classes]);}
        else{
            echo  "Bạn Hãy nhập đầy đủ !";
        }
    }


    public function login(Request $request)
    {
        $username =$request->input('username'); //Input::get('username');
        $password =$request->input('password'); //Input::get('password');

        if (auth()->attempt(['username' => $username, 'password' => $password])) {
            if (auth()->user()->type == 1) {
                $data = Student::select('*')
                    ->where('code', '=', auth()->user()->username)
                    ->get()->first();
                $classid = $data->class_id;
                $name = Auth::user()->name;
                return view("students.studentHomepage", compact('name', 'classid'));
            }
            else
                return redirect()->back()->with('global', 'Xin lỗi! bạn không phải sinh viên.');
        }
        return redirect()->back()->with('global', ' Tên đăng nhập hoặc mật khẩu không đúng.');
    }



}
