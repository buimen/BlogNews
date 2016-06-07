<?php
	include "../models/query.php";
	$user = isset($_POST['user']) ? $_POST['user'] : null;
	$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
	$errUser = "";
	$errPass = "";
	if (isset($_POST['login'])) {
		$member = new SQL\Member();
		$login = $member->login($user, $pass);
		if (mysql_num_rows($login) == 1) {
			$_SESSION['memberUser'] = $user;
			header("location: ../controllers/write.php?member=".$user);
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
			if (mysql_num_rows($login) != 1) {
				$errPass = "Tên đăng nhập hoặc mật khẩu không đúng!";
			}
			include "../views/viewlogin.php";
		}
	}
	else {
		include "../views/viewlogin.php";
	}

	if (isset($_POST['cancel'])) {
		header("location: ../controllers/home.php");
	}