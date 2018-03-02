@extends('students-mgmt.base')

@section('action-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new student</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('student-management.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="firstname" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label">Surname</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }}">
                                <label for="id_number" class="col-md-4 control-label">ID Number</label>

                                <div class="col-md-6">
                                    <input id="id_number" type="text" class="form-control" name="id_number" value="{{ old('id_number') }}" required>

                                    @if ($errors->has('id_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sanc_number') ? ' has-error' : '' }}">
                                <label for="sanc_number" class="col-md-4 control-label">SANC Number</label>

                                <div class="col-md-6">
                                    <input id="sanc_number" type="text" class="form-control" name="sanc_number" value="{{ old('sanc_number') }}" required>

                                    @if ($errors->has('sanc_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sanc_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('physical_address') ? ' has-error' : '' }}">
                                <label for="physical_address" class="col-md-4 control-label">Physical Address</label>

                                <div class="col-md-6">
                                    <input id="physical_address" type="text" class="form-control" name="physical_address" value="{{ old('physical_address') }}" required>

                                    @if ($errors->has('physical_address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('physical_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('place_of_employment') ? ' has-error' : '' }}">
                                <label for="place_of_employment" class="col-md-4 control-label">Place Of Employment </label>

                                <div class="col-md-6">
                                    <input id="place_of_employment" type="text" class="form-control" name="place_of_employment" value="{{ old('place_of_employment') }}" required>

                                    @if ($errors->has('place_of_employment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('place_of_employment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date Of Registration</label>
                                <div class="col-md-6">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" value="{{ old('date_of_registration') }}" name="date_of_registration" class="form-control pull-right" id="registrationDate" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('programme_registered') ? ' has-error' : '' }}">
                                <label for="programme_registered" class="col-md-4 control-label">Programme Registered</label>

                                <div class="col-md-6">
                                    <input id="programme_registered" type="text" class="form-control" name="programme_registered" value="{{ old('programme_registered') }}" required>

                                    @if ($errors->has('programme_registered'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('programme_registered') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('allocation') ? ' has-error' : '' }}">
                                <label for="allocation" class="col-md-4 control-label">Allocation</label>

                                <div class="col-md-6">
                                    <input id="allocation" type="text" class="form-control" name="allocation" value="{{ old('allocation') }}" required>

                                    @if ($errors->has('allocation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('allocation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
