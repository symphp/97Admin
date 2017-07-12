<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>97Admin Power by symphp</title>

	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="/public/assets/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/public/css/form-elements.css">
	<link rel="stylesheet" href="/public/css/style.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="/public/assets/ico/logo_48.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/public/assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/public/assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/public/assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top content -->
<div class="top-content">

	<div class="inner-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text">
					<h1><strong>97Admin</strong>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 form-box">
					<div class="form-top">
						<div class="form-top-left">
							<h3>Login to 97Admin</h3>
							<p>Enter your username and password to log on:</p>
						</div>
						<div class="form-top-right">
							<i class="fa fa-key"></i>
						</div>
					</div>
					<div class="form-bottom">
						<form role="form" action="" method="post" class="login-form">
							<div class="form-group">
								<label class="sr-only" for="form-username">Username</label>
								<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
							</div>
							<div class="form-group">
								<label class="sr-only" for="form-password">Password</label>
								<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
							</div>
                            <div class="form-inline">
                                <label class="sr-only" for="form-verify_code">VerifyCode</label>
                                <input type="text" class="form-control"  name="verify_code" placeholder="verify_code" id="form-verify_code">
                                <img src="verify_code" style="float: right"  title="看不清？点击更换另一个验证码。">
                            </div>
                            <div class="form-group" style="margin-top: 2%">
                                <input type="checkbox" name="remember" id="form-remember">&nbsp;
                                <label for="form-remember" style="font-weight:normal">Remember me</label>
                            </div>
							<button type="submit" class="btn">Sign in!</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<!-- Javascript -->
<script src="/public/js/jquery.js?v=1"></script>
<script src="/public/assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.backstretch.min.js"></script>
<script src="/public/js/scripts.js?v=1"></script>

<!--[if lt IE 10]>
<script src="/public/js/placeholder.js"></script>
<![endif]-->

</body>

</html>