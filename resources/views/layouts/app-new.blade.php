<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Student Admin') }}</title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset("/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset("/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css")}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset("/AdminLTE/bower_components/Ionicons/css/ionicons.min.css")}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset("/AdminLTE/dist/css/AdminLTE.min.css")}}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset("/AdminLTE/plugins/iCheck/square/blue.css")}}">

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- Scripts -->
	<script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
		]) !!};
	</script>
</head>
<body class="hold-transition login-page">
	@yield('content')


	<script src="{{ asset ("/AdminLTE/bower_components/jquery/dist/jquery.min.js") }}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{ asset ("/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
	<!-- iCheck -->
	<script src="{{ asset ("/AdminLTE/plugins/iCheck/icheck.min.js") }}"></script>
	<script>
	  $(function () {
	    $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass: 'iradio_square-blue',
	      increaseArea: '20%' // optional
	    });
	  });
	</script>
</body>
</html>