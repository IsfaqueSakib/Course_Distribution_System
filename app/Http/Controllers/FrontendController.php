<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
session_start();

class FrontendController extends Controller
{

    public function editProfile()
    {
        return view('TeachersPages.edit_profile');
    }

    public function course_selection()
    {
      //$this->AdminAuthCheck();

      $all_course_info=DB::table('course_tbl')->get();
      $manage_course=view('TeachersPages.course_selection')
            ->with('all_course_info',$all_course_info);

      return view('TeachersPages.profile_layout')
            ->with('TeachersPages.course_selection',$manage_course);
    }

    public function current_course()
    {
      $all_course_info=DB::table('course_distribution_tbl')
                      ->where('assigned_teacher', Session::get('short_name'))
                      ->get();
      $manage_course=view('TeachersPages.assigned_courses')
            ->with('all_course_info',$all_course_info);

      return view('TeachersPages.profile_layout')
            ->with('TeachersPages.assigned_courses',$manage_course);

    }

    public function primary_course_selection($course_code)
    {

        $course_data = DB::table('course_tbl')
                      ->where('course_code', $course_code)
                      ->first();
        $course_load=0;
        if($course_data->course_type == 'Compulsory') $course_load = $course_data->credit*2;
        else $course_load = $course_data->credit;

        $data = array();

        $data['course_code'] = $course_code;
        $data['course_title'] = $course_data->course_title;
        $data['semester'] = $course_data->semester;
        $data['assigned_teacher'] = Session::get('short_name');
        $data['course_load'] = $course_load;

        //dd($data);

        DB::table('course_distribution_tbl')->insert($data);

        return Redirect::to('/courseSelection');

    }

    public function level_1_courses()
    {
      $all_course_info=DB::table('course_tbl')
                      ->where('semester', "1/1")
                      ->orWhere('semester', "1/2")
                      ->get();
      $manage_course=view('TeachersPages.course_selection')
            ->with('all_course_info',$all_course_info);

      return view('TeachersPages.profile_layout')
            ->with('TeachersPages.course_selection',$manage_course);

    }

    public function level_2_courses()
    {
      $all_course_info=DB::table('course_tbl')
                      ->where('semester', "2/1")
                      ->orWhere('semester', "2/2")
                      ->get();
        //dd($all_course_info);
      $manage_course=view('TeachersPages.course_selection')
            ->with('all_course_info',$all_course_info);

      return view('TeachersPages.profile_layout')
            ->with('TeachersPages.course_selection',$manage_course);

    }

    public function level_3_courses()
    {
      $all_course_info=DB::table('course_tbl')
                      ->where('semester', "3/1")
                      ->orWhere('semester', "3/2")
                      ->get();
      $manage_course=view('TeachersPages.course_selection')
            ->with('all_course_info',$all_course_info);

      return view('TeachersPages.profile_layout')
            ->with('TeachersPages.course_selection',$manage_course);

    }

    public function level_4_courses()
    {
      $all_course_info=DB::table('course_tbl')
                      ->where('semester', "4/1")
                      ->orWhere('semester', "4/2")
                      ->get();
      $manage_course=view('TeachersPages.course_selection')
            ->with('all_course_info',$all_course_info);

      return view('TeachersPages.profile_layout')
            ->with('TeachersPages.course_selection',$manage_course);

    }

    public function release_course($course_code)
    {
        DB::table('course_distribution_tbl')
        ->where('course_code', $course_code)
        ->delete();

        return Redirect::to('/currentCourse');

    }

    public function user_logout()
    {
          Session::flush();
          return Redirect::to('/');
    }

    public function AdminAuthCheck()
    {
      $admin_id = Session::get('short_name');
      if($short_name){
        return;
      }
      else{
        return Redirect::to('/home')->send();
      }
    }
}
