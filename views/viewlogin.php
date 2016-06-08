<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<title>Form Login</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/stylelogin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-social.css">
	<script type="text/javascript" src="http://apis.google.com/js/plusone.js"> {lang: 'vi'} </script>
	<link rel="stylesheet" type="text/css" href="../css/reponsive.css">
</head>
<body>
	<div class="login">
		<form class="form-horizontal" method="post" action="">
			<h2>Form Login</h2>
			<div class="main">
				<div class="form-group">
					<label class="name control-label">Username:</label>
					<div class="put">
					    <input type="text" class="form-control" id="username" name="user" placeholder="Username" value="<?= $user; ?>">
					</div>
					<label class="control-label error"><?= $errUser; ?></label>
				</div>
				<div class="form-group">
					<label class="name control-label">Password:</label>
					<div class="put">
					    <input type="password" class="form-control" id="password" name="pass" placeholder="Password" value="<?= $pass; ?>">
					</div>
					<label class="control-label error"><?= $errPass; ?></label>
				</div>
				<div class="form-group">
					<div class="button">
					    <button type="submit" class="btn btn-primary signin" name="login">Sign in</button>
					    <button type="submit" class="btn btn-default cancel" name="cancel">Cancel</button>
					</div>
				</div>
				<p>Hoặc đăng nhập bằng: </p>
				<div class="app">
					<a class="btn btn-social btn-facebook" href="../auth/facebook">
	            		<i class="fa fa-facebook"></i> Facebook
	         		</a>
	         		<a class="btn btn-social btn-google" href="../auth/google">
	            		<i class="fa fa-google"></i> Google
	         		</a>
	         		<a class="btn btn-social btn-twitter" href="../auth/twitter">
	            		<i class="fa fa-twitter"></i> Twitter
	         		</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>