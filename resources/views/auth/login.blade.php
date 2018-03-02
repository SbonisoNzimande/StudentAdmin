@extends('layouts.app-new')

@section('content')
<div class="login-box">
	<div class="login-logo">
    	{{-- <a href="../../index2.html"><b>Admin</b>LTE</a> --}}
    	<img src="{{ asset ("/img/student-d-system.png") }}" alt="">
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>

		<form  method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
				<input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				@if ($errors->has('email'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
				<input type="password" class="form-control" placeholder="Password"  name="password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>

				@if ($errors->has('password'))
				    <span class="help-block">
				        <strong>{{ $errors->first('password') }}</strong>
				    </span>
				@endif
			</div>

			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>



			<div class="row">
				<div class="col-xs-8">
					<a href="#">I forgot my password</a><br>
				</div>
			</div>
		</form>

		<div class="social-auth-links text-center">
			<p>- POWERED BY -</p>
		</div>

		<div class="social-auth-links text-center">
			<img src="{{ asset ("/img/bitbyte_logo.png") }}" style="width: 50%" alt="">
		</div>
	</div>
</div>
@endsection
