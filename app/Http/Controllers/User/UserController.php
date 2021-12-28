<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TeacherResource;

class UserController extends Controller
{
    // public function index(){
    //     $users =User::all();
    //     return view('dashboard.user.home',['users'=>$users]);
    // }
     public function index(){
         $paginate =request('paginate');
        if(isset($paginate)){
            $users = User::studentsQuery()->paginate($paginate);
        }else{
            $users=User::studentsQuery()->get();
        }
        return UserResource::collection($users);
    }
    // public function getAttendance(){
    // //     $classes = Classes::getAll();
    // // $sections = Classes::getAll();
    // $t= Teacher::All();
    // $teachers = TeacherResource::collection($t);

    //  return view('dashboard.user.home',['teachers'=>$teachers]);

    // }
   public function create(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'parentName' => 'required',
            'phoneNumber' => 'required',
            'yob'=>'required',
            'yearJoined'=>'required',
            'section_id' => '1',
            'class_id' =>'2',
            'password' => 'required|confirmed',
            // 'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->parentName= $request->parentName;
        $user->phoneNumber= $request->phoneNumber;
        $user->yob=$request->yob;
        $user->yearJoined= $request->yearJoined;
         $user->section_id= '2';
        $user->class_id= '1';
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        if($save) {

            return redirect()->route('user.login')->with('Success','Registered Successflly');
        }else
        return redirect()->back()->with('Something Went Wrong','Failed to Register');

    }
    public function addUser(Request $request){
    $request->validate([
           'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'parentName' => 'required',
            'phoneNumber' => 'required',
            'yob'=>'required',
            'yearJoined'=>'required',
            'section_id' => '1',
            'class_id' =>'2',
            'password' => 'required|confirmed',
            // 'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->parentName= $request->parentName;
        $user->phoneNumber= $request->phoneNumber;
        $user->yob=$request->yob;
        $user->yearJoined= $request->yearJoined;
         $user->section_id= '2';
        $user->class_id='1';
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        //  dd($user);
        if($save) {

            return redirect()->route('admin.home')->with('Success','Student Added Successflly');
        }else
        return redirect()->back()->with('Something Went Wrong','Failed to Register');

    }


    public function show(){
        $u =User::All();
        $students = UserResource::collection($u);
        $t= Teacher::All();
        $teachers = TeacherResource::collection($t);

     return view('dashboard.user.home',compact('students','teachers'));
    }
    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('user.login');
    }
      public function destroy(User $student)
    {
        $student->delete();
        // return back();
        return response()->noContent();
    }

    public function massDestroy($students)
    {
        $studentsArray = explode(',', $students);
        User::whereKey($studentsArray)->delete();
        return back();
        // return response()->noContent();
    }

    // public function export($students)
    // {
    //     $studentsArray = explode(',', $students);
    //     return (new StudentsExport($studentsArray))->download('students.xlsx');
    // }

}
