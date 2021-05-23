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

					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save_teacher')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
						  <fieldset>

								<div class="control-group">
								  <label class="control-label" for="date01">Name</label>
								  <div class="controls">
									<input type="text" class="input-xlarge" name="teacher_name" required="">
								  </div>
								</div>

	              <div class="control-group">
								  <label class="control-label" for="date01">Short Name</label>
								  <div class="controls">
									<input type="text" class="input-xlarge" name="teacher_shortname" required="">
								  </div>
								</div>

              <div class="control-group">
								<label class="control-label" for="selectError3">Designation</label>
								<div class="controls">
								  <select id="selectError3" name="designation">

                    <option>Select Designation</option>
									           <option value="Lecturer">Lecturer</option>
														 <option value="Assistant Professor">Assistant Professor</option>
														 <option value="Associate Professor">Associate Professor</option>
														 <option value="Professor">Professor</option>
								  </select>
								</div>
							  </div>

              <div class="control-group">
							  <label class="control-label" for="date01">Email</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="teacher_email" required="">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="date01">Phone</label>
								<div class="controls">
								<input type="text" class="input-xlarge" name="teacher_phone" required="">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="date01">Position</label>
								<div class="controls">
								<input type="text" class="input-xlarge" name="position" required="">
								</div>
							</div>

              <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Status</label>
                <div class="controls">
                <input type="checkbox" name="publication_status" value="1"></input>
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
							  <button type="submit" class="btn btn-primary">Add Teacher</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection
