@extends('admin.admin_layout')

@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			<p class="alert-success">

				<?php

						$message=Session::get('message');

						if($message){
							echo $message;
							Session::put('message',null);
						}

				 ?>

			</p>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<!-- <h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2> -->
						<div class="box-icon">
							<!-- <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a> -->
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                  <th>Course Code</th>
								  <th>Course Title</th>
								  <th>Credit</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>

						@foreach ($all_course_info as $v_course)

						  <tbody>
							<tr>
                <td>{{ $v_course->course_code }}</td>
								<td class="center">{{ $v_course->course_title }}</td>
								<td class="center">{{ $v_course->credit }}</td>
								<td class="center">

                  @if($v_course->course_status==1)
									    	<span class="label label-success">Active</span>
									@else
												<span class="label label-danger">Inctive</span>
									@endif
								</td>
                <td class="center">
									@if($v_course->course_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactiveCourse/'.$v_course->course_code)}}">
										<i class="halflings-icon white thumbs-down"></i>
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/activeCourse/'.$v_course->course_code)}}">
										<i class="halflings-icon white thumbs-up"></i>
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/editCourse/'.$v_course->course_code)}}">
										<i class="halflings-icon white edit"></i>
									</a>
								<!--	delete option
								  <a class="btn btn-danger" href="{{URL::to('/deleteCourse/'.$v_course->course_code)}}" id="delete">
										<i class="halflings-icon white trash"></i>
									</a> -->
								</td>
							</tr>

						  </tbody>
						@endforeach
					  </table>
					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection
