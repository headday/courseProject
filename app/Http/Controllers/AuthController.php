<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recording;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    //
    public function createUser(Request $request){
        $request->validate([
            // 'fio'=>'required|',
            'login'=>'required|unique:users',
            'email'=>'required|email',
            'password'=>'required|min:4|max:12',
            // 'repassword' =>'required|min:6|max:12'
        ]);
        $user = new User;
        $user->FIO = $request->fio;
        $user->login = $request->login;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar = $request->avatar;
        // dump($user);
        $query =  $user->save();
        if($query){
            return back()->with('succes','You have been registered');
        }else{
            return back()->with('fail','You have been not registered');
        }
    }
    function check(Request $request ){
        $request->validate([
            'login'=>'required',
            'password'=>'required|min:4|max:12'
        ]);

        $user = User::where('login','=',$request->login)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put(['LoggedUser'=>$user->id,'role' => $user->admin_role,'UserName'=> $user->name]);
                if(session()->get('role') == 1){
                    return redirect('/admin');
                }else{
                    
                    return redirect('/profile');
                }
            }else{
                return back()->with('fail','Invalid password'); 
            }
        }else{
            return back()->with('fail','no accout found for this email');
        }
    }
    public function getLoginPage(){
        return view('auth.login');
    }
    public function getPage(){
        return view('auth.registration');
    }
    public function getProfilePage(){
       
        return view('personal.area')->with('courses',$courses);;
    }
    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
    function profile(){
        if(session()->has('LoggedUser')){
            $user = User::where('id','=', session('LoggedUser'))->first();
            $courses = Recording::
            join('courseses','courseses.id','=','course_user.course_id')
            ->join('users','users.id','=','course_user.user_id')
            ->select('course_user.id','courseses.name','courseses.img','courseses.desc','courseses.date_of_start')
            ->where('user_id','=',session()->get('LoggedUser'))
            ->get();
            dump($courses);
            $time = Carbon::now()->toDateTimeString();
            if($courses){
                foreach ($courses as $course) {
                    $course_date = $course['date_of_start'];
                    if(strtotime($time) <= strtotime('-1 days',strtotime($course_date))){
                        $course['unRecording'] = true;
                    }else{
                        $course['unRecording'] = false;
                    }
                }
            }else{
                $courses = null;
            }
            
            $data = [
                'LoggedUserInfo'=>$user,
                'courses' =>$courses,
                'time' => $time
            ];
          
        }
         return view('personal.area',$data); 
    }
}
