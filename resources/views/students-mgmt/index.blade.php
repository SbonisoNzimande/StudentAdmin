@extends('students-mgmt.base')
@section('action-content')
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-header">
				<div class="row">
					<div class="col-sm-8">
						<h3 class="box-title">List of students</h3>
					</div>
					<div class="col-sm-4">
						{{--<a class="btn btn-primary pull-right" href="{{ route('student-management.create') }}">Add new student</a>--}}
						<a class="btn btn-primary pull-right add-modal" href="#" >Add new student</a>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6"></div>
					<div class="col-sm-6"></div>
				</div>
				<form method="POST" action="{{ route('student-management.search') }}">
					{{ csrf_field() }}
					@component('layouts.search', ['title' => 'Search'])
						@component('layouts.two-cols-search-row', ['items' => ['SANC Number', 'ID Number'],
						'oldVals' => [isset($searchingVals) ? $searchingVals['sanc_number'] : '', isset($searchingVals) ? $searchingVals['id_number'] : '']])
						@endcomponent
					@endcomponent
				</form>
				<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="panel-body text-center">
								<table data-toggle="table"
								data-url="student-list?_token={{ csrf_token() }}"
								data-search="true"
								data-show-refresh="true"
								data-show-toggle="true"
								data-show-columns="true"
								data-show-pagination-switch="true"
								data-pagination="true"
								data-page-list="[10, 25, 50, 100, ALL]"
								data-show-export="true"
								data-export-options='{
								"fileName": "Student list",
								"worksheetName": "Student list"
							}'
							id="student-list"
							class="display table table-striped"
							>
							<thead>
								<tr>
									<th data-field = "full_name"  data-sortable="true" >Student Name</th>
									<th data-field = "id_number"  data-sortable="true" >ID Number</th>
									<th data-field = "sanc_number" data-sortable="true" >SANC Number</th>
									<th data-field = "physical_address" data-sortable="true" >Physical Address</th>
									<th data-field = "postal_address" data-sortable="true" >Postal Address</th>
									<th data-field = "place_of_employment" data-sortable="true" >Place of Employment</th>
									<th data-field = "date_of_registration" data-sortable="true" >Date of Registration</th>
									<th data-field = "programme_registered" data-sortable="true" >Programme Programme</th>
									<th data-field = "allocation" data-sortable="true" >Allocation</th>
									<th data-field = "created" data-sortable="true" >Created</th>
									<th data-field = "action"  >Action</th>
								</tr>
							</thead>
						</table>

					</div>
				</div>
			</div>

		</div>
			</div>
			<!-- /.box-body -->
		</div>
	</section>
	<!-- /.content -->
	</div>

	<!-- Modal form to add a post -->
	<div id="addModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="firstname" class="col-md-2 control-label">First Name</label>
							<div class="col-sm-10">
								<input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
								<small>Min: 2, Max: 32, only text</small>
								<p class="errorfirstname text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-md-2 control-label">Surname</label>
							<div class="col-sm-10">
								<input id="lastname" type="text" class="form-control" name="lastname" required>
								<small>Min: 2, Max: 32, only text</small>
								<p class="errorlastname text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="id_number" class="col-md-2 control-label">ID Number</label>
							<div class="col-sm-10">
								<input id="id_number" type="text" class="form-control" name="id_number" required>
								<small>13 digits, numbers only</small>
								<p class="errorid_number text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="sanc_number" class="col-md-2 control-label">SANC Number</label>
							<div class="col-sm-10">
								<input id="sanc_number" type="text" class="form-control" name="sanc_number" required>
								<small>8 digits, numbers only</small>
								<p class="errorsanc_number text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="physical_address">Physical Address</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="physical_address" name="physical_address" cols="40" rows="3"></textarea>
								<small>Min: 2, Max: 128, only text</small>
								<p class="errorphysical_address text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="postal_address">Postal Address</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="postal_address" name="postal_address" cols="40" rows="3"></textarea>
								<small>Min: 2, Max: 128, only text</small>
								<p class="errorpostal_address text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label for="place_of_employment" class="col-md-2 control-label">Place Of Employment</label>
							<div class="col-sm-10">
								<input id="place_of_employment" type="text" class="form-control" name="place_of_employment" required>
								<small>8 digits, numbers only</small>
								<p class="errorplace_of_employment text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Date Of Registration</label>
							<div class="col-md-6">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text"  name="date_of_registration" class="form-control pull-right" id="registrationDate" required>
								</div>
								<p class="errordate_of_registration text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label for="programme_registered" class="col-md-2 control-label">Programme Registered</label>

							<div class="col-md-10">
								<input id="programme_registered" type="text" class="form-control" name="programme_registered" required>
								<small>Min: 2, Max: 32, only text</small>
								<p class="errorprogramme_registered text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="allocation" class="col-md-2 control-label">Allocation</label>

							<div class="col-md-6">
								<input id="allocation" type="text" class="form-control" name="allocation" required>
								<small>Min: 2, Max: 32, only text</small>
								<p class="errorallocation text-center alert alert-danger hidden"></p>
							</div>
						</div>
					</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-success add" data-dismiss="modal">
							<span id="" class='glyphicon glyphicon-check'></span> Add
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="editModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Edit Student</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
						    <label class="control-label col-sm-2" for="id">ID:</label>
						    <div class="col-sm-10">
						        <input type="text" class="form-control" id="id_edit" disabled>
						    </div>
						</div>
						<div class="form-group">
							<label for="firstname" class="col-md-2 control-label">First Name</label>
							<div class="col-sm-10">
								<input id="firstname_edit" type="text" class="form-control" name="firstname" required autofocus>
								<small>Min: 2, Max: 32, only text</small>
								<p class="erroreditfirstname text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-md-2 control-label">Surname</label>
							<div class="col-sm-10">
								<input id="lastname_edit" type="text" class="form-control" name="lastname" required>
								<small>Min: 2, Max: 32, only text</small>
								<p class="erroreditlastname text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="id_number" class="col-md-2 control-label">ID Number</label>
							<div class="col-sm-10">
								<input id="id_number_edit" type="text" class="form-control" name="id_number" required>
								<small>13 digits, numbers only</small>
								<p class="erroreditid_number text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="sanc_number" class="col-md-2 control-label">SANC Number</label>
							<div class="col-sm-10">
								<input id="sanc_number_edit" type="text" class="form-control" name="sanc_number" required>
								<small>8 digits, numbers only</small>
								<p class="erroreditsanc_number text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="physical_address">Physical Address</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="physical_address_edit" name="physical_address" cols="40" rows="3"></textarea>
								<small>Min: 2, Max: 128, only text</small>
								<p class="erroreditphysical_address text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="postal_address">Postal Address</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="postal_address_edit" name="postal_address" cols="40" rows="3"></textarea>
								<small>Min: 2, Max: 128, only text</small>
								<p class="erroreditpostal_address text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label for="place_of_employment" class="col-md-2 control-label">Place Of Employment</label>
							<div class="col-sm-10">
								<input id="place_of_employment_edit" type="text" class="form-control" name="place_of_employment" required>
								<small>8 digits, numbers only</small>
								<p class="erroreditplace_of_employment text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Date Of Registration</label>
							<div class="col-md-6">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text"  name="date_of_registration" class="form-control pull-right" id="date_of_registration_edit" required>
								</div>
								<p class="erroreditdate_of_registration text-center alert alert-danger hidden"></p>
							</div>
						</div>

						<div class="form-group">
							<label for="programme_registered" class="col-md-2 control-label">Programme Registered</label>

							<div class="col-md-10">
								<input id="programme_registered_edit" type="text" class="form-control" name="programme_registered" required>
								<small>Min: 2, Max: 32, only text</small>
								<p class="erroreditprogramme_registered text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="allocation" class="col-md-2 control-label">Allocation</label>

							<div class="col-md-6">
								<input id="allocation_edit" type="text" class="form-control" name="allocation" required>
								<small>Min: 2, Max: 32, only text</small>
								<p class="erroreditallocation text-center alert alert-danger hidden"></p>
							</div>
						</div>
					</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-success edit" data-dismiss="modal">
							<span id="" class='glyphicon glyphicon-check'></span> Update
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal form to delete a form -->
	<div id="deleteModal" class="modal fade" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">×</button>
	                <h4 class="modal-title"></h4>
	            </div>
	            <div class="modal-body">
	                <h3 class="text-center">Are you sure you want to delete the following student?</h3>
	                <br />
	                <form class="form-horizontal" role="form">
	                    <div class="form-group">
	                        <label class="control-label col-sm-2" for="id">ID:</label>
	                        <div class="col-sm-10">
	                            <input type="text" class="form-control" id="id_delete" disabled>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-sm-2" for="firstname_delete">Name:</label>
	                        <div class="col-sm-10">
	                            <input type="firstname_delete" class="form-control" id="firstname_delete" disabled>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="control-label col-sm-2" for="lastname_delete">Surname:</label>
	                        <div class="col-sm-10">
	                            <input type="lastname_delete" class="form-control" id="lastname_delete" disabled>
	                        </div>
	                    </div>
	                </form>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-danger delete" data-dismiss="modal">
	                        <span id="" class='glyphicon glyphicon-trash'></span> Delete
	                    </button>
	                    <button type="button" class="btn btn-warning" data-dismiss="modal">
	                        <span class='glyphicon glyphicon-remove'></span> Close
	                    </button>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection