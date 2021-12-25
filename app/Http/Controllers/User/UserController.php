<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index(){
    //     $users =User::all();
    //     return view('dashboard.user.home',['users'=>$users]);
    // }
     public function index(){
         $paginate =request('paginate',10);
         $search_term = request('q','');
         $students = User::with(['class', 'section'])->search(trim($search_term))->paginate($paginate);
        return UserResource::collection($students);

    }
   public function create(Request $request){
        dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'parentName' => 'required',
            'phoneNumber' => 'required|digits:10',
            'yob'=>'required',
            'yearJoined'=>'required',
            'section_id' => 'required',
            'class_id' =>'required',
            'password' => 'required|password|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);
        $user = new User();
        $user->name = $user->name;
        $user->email= $user->email;
        $user->parentName= $user->parentName;
        $user->phoneNumber= $user->phoneNumber;
        $user->yob= $user->yob;
        $user->yearJoined= $user->yearJoined;
        $user->section_id= $user->section_id;
        $user->class_id= $user->class_id;
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        if($save) {
            return redirect()->back()->with('Success','Registered Successflly');
        }else
        return redirect()->back()->with('Something Went Wrong','Failed to Register');

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
        return redirect('/');
    }

     public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('email', 'like', $term)
                ->orWhere('address', 'like', $term)
                ->orWhere('phone_number', 'like', $term)
                ->orWhereHas('class', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                })
                ->orWhereHas('section', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                });
        });
    }

    public function scopeStudentsQuery($query)
    {
        $search_term = request('q', '');

        $selectedClass = request('selectedClass');
        $selectedSection = request('selectedSection');

        $sort_direction = request('sort_direction', 'desc');

        if (!in_array($sort_direction, ['asc', 'desc'])) {
            $sort_direction = 'desc';
        }

        $sort_field = request('sort_field', 'created_at');
        if (!in_array($sort_field, ['name', 'email', 'address', 'phone_number', 'created_at'])) {
            $sort_field = 'created_at';
        }

        $query->with(['class', 'section'])
            ->when($selectedClass, function ($query) use ($selectedClass) {
                $query->where('class_id', $selectedClass);
            })
            ->when($selectedSection, function ($query) use ($selectedSection) {
                $query->where('section_id', $selectedSection);
            })
            ->orderBy($sort_field, $sort_direction)
            ->search(trim($search_term));
    }

}

