<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Recording;
use Carbon\Carbon;

class ContentController extends Controller
{
    //
    public function index(){
        $courses = Course::all();
        return view('index')->with(['courses'=>$courses]);
    }
    public function getAdminPage(){
        $courses = Course::all();
        
        return view('admin')->with(['courses' =>$courses]);
    }
    public function getAddPage(){
        return view('add');
    }
    public function addCourse(Request $request){
        $path = 'images/';
        $filename = $request->file('_file')->getClientOriginalName();

        //dump($filename);
        $upload = $request->_file->move(public_path($path),$filename);
        
        $course = new Course;
        $course->name = $request->title;
        $course->desc = $request->desc;
        $course->img = $filename;
        $course->date_of_start = $request->date_of_start;
        $course->count = $request->count;
        $course->save();
        return redirect('/admin');
    }
    public function deleteCourse($id){
        $course = Course::find($id);
        $course->delete();
        return redirect('/admin');
    }
    public function recordingCourse($id){
        $course_id = $id;
        $recording = new Recording;
        $recording ->user_id = session()->get('LoggedUser');
        $recording ->course_id = $course_id;
        $recording -> save();
        $course = Course::find($id);
        $course->count = $course->count-1;
        $course->recording_users = $course->recording_users + 1;
        $course->save();
        return redirect('/');
    }
    public function unRecordingCourse ($id){
        $recording = Recording::find($id);
        $course_id = $recording->course_id;
        $course = Course::find($course_id);
        $course->recording_users = $course->recording_users-1;
        $course->count = $course->count+1;
        $course->save();
        $recording->delete();
        return back();
    }
    public function unRecordingUserWithCourse($course_id,$user_id){
        $recording = Recording::select()->where('course_id',$course_id)->where('user_id',$user_id)->get()->first();
        $course_id = $recording->course_id;
        $course = Course::find($course_id);
        $course->recording_users = $course->recording_users-1;
        $course->count = $course->count+1;
        $course->save();
        $recording->delete();
        return back();
    }
    public function getDetailCourse($id){
        
        $course = Course::find($id);
        $date = Carbon::now()->toDateTimeString();    
        $course->date_of_start < $date ? $recording = false : $recording = true;
        if(!session()->has('LoggedUser')){
            $recording = false;
        }
        $hasRecording = Recording::select()->where('course_id',$id)->where('user_id',session()->get('LoggedUser'))->get()->first();
        if($hasRecording){
            $recording = false;
        } 
        return view('kurs')->with('course',$course)->with('recording',$recording); 
    }
    public function filter($type){
        switch ($type) {
            case 'active':
                $date = Carbon::now()->toDateTimeString();
                $courses = Course::select()->where('date_of_start','>',$date)->get();
                # code...
                return view('index')->with('courses',$courses);
                break;

            case 'count':
                $courses = Course::select()->whereColumn('recording_users','count')->get();
                //dump($courses);
                return view('index')->with('courses',$courses);
                break;
            case 'not_active':
                $date = Carbon::now()->toDateTimeString();
                $courses = Course::select()->where('date_of_start','<',$date)->get();
                # code...
                return view('index')->with('courses',$courses);
                break;
            default:
                # code...
                break;
        }
    }
    public function getRecordingCourse($id){
        $users = Recording::select()->where('course_id','=',$id)
                                    ->join('users','users.id','=','course_user.user_id')
                                    ->join('courseses','courseses.id','=','course_user.course_id')
                                    ->get();
        $course = Course::select('name','count','date_of_start')->where('id',$id)
                                            ->get()
                                            ->first();
        //dump($course);
        return view('recording')->with('users',$users)->with('course',$course);
        
    }
}
