<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Major;
use App\User;
use App\Teacher;
use App\Http\Requests;

class TeacherController extends Controller
{
    public function index(){
    	# code...
    	return view('teacher.homepage');
    }

    public function getAdd(){
        $major = Major::select('*')->get()->toArray();
    	return view('teacher.add', compact('major'));

    }


    public function postAdd(Request $request){

        $this->validate($request, [
            'code'=>'required|max:30',
            'name'=>'required|max:30',
            'gender'=>'required',
            'birthday'=>'required',
            'major'=>'required',
            ]);
        $teaher = new Teacher();
        $teaher->code = $request->code;
        $teaher->name = $request->name;
        $teaher->gender = $request->gender;
        $teaher->birthday = $request->birthday;
        $teaher->major_id = $request->major;
        $teaher->save();
        if ($teaher->save() == true) {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->code;
            $user->email =changeName($request->name)."@ictu.edu.vn";
            $user->type = 2;
            $user->password = bcrypt($request->code);
            $user->save();
        }
        return redirect()->route('teacher.list');
    }

    public function getList(){
        $teacher = Teacher::paginate(20);
    	return view('teacher.list', compact('teacher'));
    }
}
