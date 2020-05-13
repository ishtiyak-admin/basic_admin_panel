<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
        	<link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">

			<title>{{ (getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel") }}</title>
			<!-- Tell the browser to be responsive to screen width -->
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			<!-- Bootstrap 3.3.7 -->
			<link rel="stylesheet" href="{{ url('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
			<!-- Font Awesome -->
			<link rel="stylesheet" href="{{ url('public/backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
			<!-- Ionicons -->
			<link rel="stylesheet" href="{{ url('public/backend/bower_components/Ionicons/css/ionicons.min.css') }}">
			<!-- Theme style -->
			<link rel="stylesheet" href="{{ url('public/backend/dist/css/AdminLTE.min.css') }}">
			<!-- iCheck -->
			<link rel="stylesheet" href="{{ url('public/backend/plugins/iCheck/square/blue.css') }}">

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->

			<!-- Google Font -->
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		</head>
		<body class="hold-transition login-page">

            @yield('content')

            <!-- jQuery 3 -->
			<script src="{{ url('public/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
			<!-- Bootstrap 3.3.7 -->
			<script src="{{ url('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
			<!-- iCheck -->
			<script src="{{ url('public/backend/plugins/iCheck/icheck.min.js') }}"></script>
            <link href="{{ url('public/backend/css/toastr.min.css') }}">
            <script src="{{ url('public/backend/js/toastr.min.js') }}"></script>
            @toastr_render
			<script>
                $(function () {
                    $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                    });
                });
			</script>
		</body>
	</html>