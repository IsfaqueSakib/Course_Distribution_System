<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
session_start();

class TeacherController extends Controller
{
  public function index()
  {
      $this->AdminAuthCheck();
      return view('admin.add_teacher');
  }

  public function upload_teacher_csv()
  {
    $this->AdminAuthCheck();
    return view('admin.upload_teacher_csv');
  }

  public function store_teacher_data(Request $request)
  {
    //get file
        $upload=$request->file('teacher_csv_file');
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

           $teacher_data = array();

           $teacher_data['short_name']=$data['short_name'];
           $teacher_data['name']=$data['name'];
           $teacher_data['designation']=$data['designation'];
           $teacher_data['email']=$data['email'];
           $teacher_data['phone']='0'.$data['phone'];
           $teacher_data['position']=(integer)$data['position'];
           $teacher_data['status']=(integer)$data['status'];

           DB::table('teacher_tbl')->insert($teacher_data);
        }

        Session::put('message','Teacher Added Successfully !!!');
        return Redirect::to('/uploadTeacherCSV');
  }

  public function save_teacher(Request $request)
  {
        $this->AdminAuthCheck();
        $data=array();
        $data['short_name']=$request->teacher_shortname;
        $data['name']=$request->teacher_name;
        $data['designation']=$request->designation;
        $data['email']=$request->teacher_email;
        $data['phone']=$request->teacher_phone;
        $data['position']=$request->position;
        $data['status']=$request->publication_status;

        DB::table('teacher_tbl')->insert($data);
        Session::put('message','Teacher Added Successfully !!!');
        return Redirect::to('/addTeacher');
  }

  public function all_teacher()
  {
      $this->AdminAuthCheck();

        $all_teacher_info=DB::table('teacher_tbl')->get();
        $manage_teacher = view('admin.all_teacher')
                ->with('all_teacher_info',$all_teacher_info);

        return view('admin.admin_layout')
                ->with('admin.all_teacher',$manage_teacher);
  }

  public function inactive_teacher($short_name)
  {
      DB::table('teacher_tbl')
          ->where('short_name',$short_name)
          ->update(['status'=>0]);
      Session::put('message','Teacher publication is OFF now !!!');
      return Redirect::to('/allTeachers');
  }

  public function active_teacher($short_name)
  {
      DB::table('teacher_tbl')
          ->where('short_name',$short_name)
          ->update(['status'=>1]);
      Session::put('message','Teacher publication is ON now !!!');
      return Redirect::to('/allTeachers');
  }

  public function edit_teacher($short_name)
  {
    $this->AdminAuthCheck();
    $teacher_info=DB::table('teacher_tbl')
                    ->where('short_name',$short_name)
                    ->first();

    $teacher_info=view('admin.edit_teacher')
                    ->with('teacher_info',$teacher_info);

    return view('admin.admin_layout')
                ->with('admin.edit_teacher',$teacher_info);
  }

  public function update_teacher(Request $request,$short_name){
      $data=array();

      $data['short_name']=$request->teacher_shortname;
      $data['name']=$request->teacher_name;
      $data['designation']=$request->designation;
      $data['email']=$request->teacher_email;
      $data['phone']=$request->teacher_phone;
      $data['position']=$request->position;
      $data['status']=$request->publication_status;

      DB::table('teacher_tbl')
          ->where('short_name',$short_name)
          ->update($data);

      Session::get('message', '$short_name'.'Information Updated Successfully !!!');
      return Redirect::to('/allTeachers');
  }

  public function delete_teacher($short_name)
    {
        DB::table('teacher_tbl')
            ->where('short_name',$short_name)
            ->delete();

        Session::put('message','Teacher deleted Successfully !!!');
        return Redirect::to('/allTeachers');
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
