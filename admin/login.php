<?php
	include "../models/query.php";
	$user = isset($_POST['user']) ? $_POST['user'] : null;
	$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
	$errUser = "";
	$errPass = "";
	$member = new SQL\Member();
	$listMember = $member->getMemberLevelByID($user, $pass);
	if (isset($_POST['login'])) {
		if ($user && $pass) {
			if (isset($listMember)) {
				$_SESSION['memberUser'] = $user;
				header("location: ../admin/home.php?member=".$user);
			}
			else {
				$errPass = "Username hoặc Password không đúng";
			}
		}
		else {
			if (empty($user)) {
				$errUser = "Tên đăng nhập không được để trống";
			}
			if (empty($pass)) {
				$errPass = "Mật khẩu không được để trống";
			}
			elseif (strlen($pass) < 6) {
				$errPass = "Mật khẩu phải lớn hơn hoặc bằng 6 ký tự";
			}
			if ($user != 'admin' || $pass != '123456') {
				$errPass = "Tên đăng nhập hoặc mật khẩu không đúng!";
			}
			include "../admin/login.php";
		}
	}

	if (isset($_POST['cancel'])) {
		header("location: ../admin/home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Form Login</title>
	<link rel="stylesheet" type="text/css" href="../css/stylelogin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-social.css">
</head>
<body>
	<div class="col-sm-4 col-sm-offset-4">
		<form class="form-horizontal" method="post" action="">
			<h2>Form Login</h2>
			<hr>
			<div class="form-group">
				<label class="col-sm-2 control-label">Username:</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" id="username" name="user" placeholder="Username" value="<?= $user; ?>">
				</div>
				<label class="control-label error"><?= $errUser; ?></label>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Password:</label>
				<div class="col-sm-7">
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
			<div class="login">
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
		</form>
	</div>
</body>
</html>