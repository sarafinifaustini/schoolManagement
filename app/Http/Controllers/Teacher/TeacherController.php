<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
{
    public function index(){
       $paginate =request('paginate');
        if(isset($paginate)){
            $users = Teacher::studentsQuery()->paginate($paginate);
        }else{
            $users=Teacher::studentsQuery()->get();
        }
        return TeacherResource::collection($users);
    }
    function create(Request $request){
          //Validate inputs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:teachers,email',
            //  'subject'=>'required',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $teacher = new Teacher();
          $teacher->name = $request->name;
          $teacher->email = $request->email;
        //   $teacher->subject = $request->subject;
          $teacher->password = \Hash::make($request->password);
          $save = $teacher->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully as Teacher');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:teachers,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exists in Teachers table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('teacher')->attempt($creds) ){
            return redirect()->route('teacher.home');
        }else{
            return redirect()->route('teacher.login')->with('fail','Incorrect Credentials');
        }
    }
     public function InsertAttendance(){

     }
     public function EditAttendance(){

     }
     public function AttendanceList(){

     }
     public function UpdateAttendance(){
         
     }

    function logout(){
        Auth::guard('teacher')->logout();
        return redirect('/');
    }

     public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back();
        // return response()->noContent();
    }

     public function massDestroy($teachers)
    {
        $studentsArray = explode(',', $teachers);
        Teacher::whereKey($studentsArray)->delete();
        return back();
        // return response()->noContent();
    }

}
