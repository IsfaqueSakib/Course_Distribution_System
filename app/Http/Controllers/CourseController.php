<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
session_start();

class CourseController extends Controller
{
  public function index()
  {
      $this->AdminAuthCheck();
      return view('admin.add_course');
  }

  public function upload_course_csv()
  {
    $this->AdminAuthCheck();
    return view('admin.upload_course_csv');
  }

  public function store_course_data(Request $request)
  {
    //get file
        $upload=$request->file('course_csv_file');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');

        $header= fgetcsv($file);
        //$header = fgetcsv($file,90,';', '"');

        //dd($header);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            //$escapedItem=preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $lheader);
        }

        //dd($escapedHeader);

        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            }
            //trim data
            // foreach ($columns as $key => &$value) {
            //     $value=preg_replace('/\D/','',$value);
            // }

           $data= array_combine($escapedHeader, $columns);

           $course_data = array();

           $course_data['course_code']=$data['course_code'];
           $course_data['course_title']=$data['course_title'];
           $course_data['course_type']=$data['course_type'];
           $course_data['credit']=(float)$data['credit'];
           $course_data['course_duration']=$data['course_duration'];
           $course_data['assigned_teacher']=$data['assigned_teacher'];
           $course_data['course_status']=(integer)$data['course_status'];

           DB::table('course_tbl')->insert($course_data);
        }

        Session::put('message','Course Added Successfully !!!');
        return Redirect::to('/uploadCourseCSV');
  }

  public function save_course(Request $request)
    {
        $data=array();
        $data['course_code']=$request->course_code;
        $data['course_title']=$request->course_title;
        $data['course_type']=$request->course_type;
        $data['credit']=$request->credit;
        $data['course_duration']=$request->course_duration;
        $data['assigned_teacher']=$request->assigned_teacher;
        $data['course_status']=$request->course_status;

        DB::table('course_tbl')->insert($data);
        Session::put('message','Course Added Successfully !!!');
        return Redirect::to('/addCourse');

    }

    public function all_courses()
    {
      $this->AdminAuthCheck();

      $all_course_info=DB::table('course_tbl')->get();
      $manage_course=view('admin.all_courses')
            ->with('all_course_info',$all_course_info);

      return view('admin.admin_layout')
            ->with('admin.all_courses',$manage_course);


    //return view('admin.all_category');
  }

  public function inactive_course($course_code)
  {
      DB::table('course_tbl')
          ->where('course_code',$course_code)
          ->update(['course_status'=>0]);
      Session::put('message','Department stops offering this course.');
      return Redirect::to('/allCourses');
  }

  public function active_course($course_code)
    {
      DB::table('course_tbl')
          ->where('course_code',$course_code)
          ->update(['course_status'=>1]);
      Session::put('message','Department starts offering this course.');
      return Redirect::to('/allCourses');
    }

    public function edit_course($course_code)
    {
        $this->AdminAuthCheck();
        $course_info=DB::table('course_tbl')
                        ->where('course_code',$course_code)
                        ->first();

        $course_info=view('admin.edit_course')
                        ->with('course_info',$course_info);

        return view('admin.admin_layout')
                    ->with('admin.edit_course',$course_info);
    }

    public function update_course(Request $request,$course_code){
        $data=array();

        $data['course_code']=$request->course_code;
        $data['course_title']=$request->course_title;
        $data['course_type']=$request->course_type;
        $data['credit']=$request->credit;
        $data['course_duration']=$request->course_duration;
        $data['assigned_teacher']=$request->assigned_teacher;

        DB::table('course_tbl')
            ->where('course_code',$course_code)
            ->update($data);

        Session::get('message','Course Information Updated Successfully !!!');
        return Redirect::to('/allCourses');
    }

    public function AdminAuthCheck()
    {
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }
      else{
        return Redirect::to('/admin')->send();
      }
    }

}
