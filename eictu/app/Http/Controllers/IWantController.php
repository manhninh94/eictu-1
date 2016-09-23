<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\IWant;
use App\Student;
use DB;
use App\Http\Requests;

class IWantController extends Controller
{
    public function getStatus()
    {
    	return view('iWant.eICTuStudentDemandUpdate');
    }

    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'content'=>'required|max:1000'
            ]);
        $iwant = new IWant();
        $iwant->content = $request->content;
        $iwant->student_id       = 1;
        $iwant->save();
        // Auth::student()->iwants()->create([
        //     'content'=>$request->input('content'),
        //     ]);

        return redirect()->route('iwant.search');
    }
    public function search()
    {

        $data = IWant::select('id', 'content')->orderBy('id','DESC')->paginate(15);
    	return view('iWant.eICTuStudentDemandSearch', compact('data'));
    }
    public function detail($id)
    {   
        $want  = DB::table('wants')->where('id', $id)->first();
        $student = DB::table('students')->where('id', $want->student_id)->first();
        $address =DB::table('motels')->where('student_id', $want->student_id)->first();
    	return view('iWant.eICTuStudentDemandDetail', compact('want', 'student', 'address'));
    }


}
