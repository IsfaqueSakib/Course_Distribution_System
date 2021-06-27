@extends('TeachersPages.profile_layout')
@section('profile_content')

<br>
<div class="table-users">
   <div class="header">Selected Courses</div>


   <table cellspacing="0">
      <tr>
         <th width="15%"><b>Course Code</b></th>
         <th><b>Course Title</b></th>
         <th width="15%"><b>Semester</b></th>
         <th width="15%"><b>Course Load</b></th>
         <th width="15%"><b>Action</b></th>
      </tr>

      @foreach ($all_course_info as $v_course)

      <tr>
         <td>{{ $v_course->course_code }}</td>
         <td>{{ $v_course->course_title }}</td>
         <td>{{ $v_course->semester }}</td>
         <td>{{ $v_course->course_load }}</td>
         <!-- <td><button class="guiz-awards-buttons guiz-awards-but-back"><i class="fa fa-angle-left"></i> Release </button></td> -->
         <td><a href="{{ url('/release_course/'.$v_course->course_code) }}" class="guiz-awards-buttons guiz-awards-but-back">Release</a>
      </tr>

      @endforeach

   </table>

   <?php
          $total_load = DB::table('course_distribution_tbl')
                       ->where('assigned_teacher', Session::get('short_name'))
                       ->sum('course_load');
         //dd($total_load)

    ?>

     <div class="header">Total Course Load : <?php echo $total_load ?> </div>
</div>

@endsection
