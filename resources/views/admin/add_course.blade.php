@extends('admin.admin_layout')

@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<!-- <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2> -->
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save_course')}}" method="post">
                {{ csrf_field() }}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">Course Code</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="course_code" required="">
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="date01">Course Title</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="course_title" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="selectError3">Course Type</label>
							  <div class="controls">
									<select id="selectError3" name="course_type">
										<option>Select Course Type</option>
												 <option value="Compulsory">Compulsory</option>
												 <option value="Optional">Optional</option>
												 <option value="Paid">Paid</option>
								</select>
							<!-- <input type="text" class="input-xlarge" name="course_type" required=""> -->
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Credit</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="credit" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="selectError3">Course Duration</label>
							  <div class="controls">
									<select id="selectError3" name="course_duration">
										<option>Select Duration</option>
												 <option value="January - June">January - June</option>
												 <option value="July - December">July - December</option>
								</select>

								<!-- <input type="text" class="input-xlarge" name="course_duration" required=""> -->
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Assigned Teacher</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="assigned_teacher" required="">
							  </div>
							</div>

              <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Course Status</label>
                <div class="controls">
                <input type="checkbox" name="course_status" value="1"></input>
                </div>
              </div>

							<div class="control-group hidden-phone">
                <p class="alert-success">

									<?php

											$message=Session::get('message');

											if($message){
												echo $message;
												Session::put('message',null);
											}

									 ?>

								</p>
              </div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Course</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection
