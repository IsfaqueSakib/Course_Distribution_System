
@extends('TeachersPages.profile_layout')
@section('profile_content')

<br>
<div class="table-users">
    <div class="row">
      <div style="width:25%"> <a style="width:98%" href="{{ url('/level_1_courses') }}" class="btn btn-info">Level 1</a> </div>
      <div style="width:25%"> <a style="width:98%" href="{{ url('/level_2_courses') }}" class="btn btn-info">Level 2</a> </div>
      <div style="width:25%"> <a style="width:98%" href="{{ url('/level_3_courses') }}" class="btn btn-info">Level 3</a> </div>
      <div style="width:25%"> <a style="width:98%" href="{{ url('/level_4_courses') }}" class="btn btn-info">Level 4</a> </div>
    </div>

   <div class="header">Select Course</div>

   <table id="select_course" cellspacing="0">
      <tr>
         <th width="15%"><b>Course Code</b></th>
         <th><b>Course Title</b></th>
         <th width="15%"><b>Credit</b></th>
         <th width="15%"><b>Action</b></th>
      </tr>

			@foreach ($all_course_info as $v_course)

      <tr>
         <td>{{ $v_course->course_code }}</td>
         <td>{{ $v_course->course_title }}</td>
         <td>{{ $v_course->credit }}</td>
      <!--   <td><button class="guiz-awards-buttons guiz-awards-but-back" id="select_btn"><i class="fa fa-angle-left"></i> Select </button></td> -->
         <td><a href="{{ url('/primary_selection/'.$v_course->course_code) }}" class="guiz-awards-buttons guiz-awards-but-back" id="select">Select</a> </td>
      </tr>

      @endforeach

   </table>
</div>

<script>

$("#select_course").on('click', '#select', function(){
  $(this).closest('tr').remove();
});

</script>

@endsection
