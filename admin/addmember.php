<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$level = new SQL\Level();
	$listLevel = $level->getLevel();
	$member = new SQL\Member();
	$memberUser = isset($_POST['user']) ? $_POST['user'] : null;
	$memberPass = isset($_POST['pass']) ? $_POST['pass'] : null;
	$memberImage = isset($_POST['img']) ? $_POST['img'] : null;
	$levelID = isset($_POST['level']) ? $_POST['level'] : null;
	if (isset($_POST['save'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$memberImage = $_FILES['file']['name'];
		$url = "../images/members/".$memberImage;
		move_uploaded_file($tmp_name, $url);
		$listMember = $member->setMember($memberUser, $memberPass, $memberImage, $levelID);
		if ($listMember) {
			echo "<script>
					alert('Lỗi: Không lưu được.');
				</script>";
		}
		else {
			echo "<script>
					alert('Oke!');
				</script>";
		}
		header("location: ../admin/member.php");
	}
	if (!isset($_SESSION['memberUser'])) {
		header("location: ../admin/login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang quản trị</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/stylewrite.css">
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>
	<!-- Header -->
	<header>
		<nav id="navbar-example" class="navbar navbar-default navbar-static">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand logo" href="../index.php">Blog</a>
				</div>
				<div class="collapse navbar-collapse bs-example-js-navbar-collapse">
					<ul class="nav navbar-nav navbar-right"> 
						<li><a class="nav navbar-brand navbar-right" href="home.php">Trang chủ</a></li>
						<li>
							<a class="nav navbar-brand navbar-right" href="#">
								<img src="../images/members/admin-account-dnn7.png">
								Admin
							</a>
							<ul class="dropdown-menu">
								<li><a href="../controllers/logout.php" onclick='return confirm("Bạn chắc chắn muốn thoát không?")'>Thoát</a></li>
							</ul>
						</li>
					</ul> 
				</div> 
			</div> 
		</nav>
	</header>
	<!-- Content -->
	<div class="content">
		<div class="container">
			<!-- Content Left -->
			<div class="col-sm-2">
				<ul>
					<li><a href="home.php">Bài viết</a>
						<ul>
							<?php
								foreach ($listCategory as $key => $value) {
							?>
							<li>-> <a href="sitetab.php?name=<?php echo $value['categoryName']; ?>"><?php echo $value['categoryName']; ?></a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li><a href="category.php">Chuyên mục</a></li>
					<li><a href="member.php">Người dùng</a></li>
					<li><a href="level.php">Phân quyền</a></li>
				</ul>
			</div>
			<!-- Content TOP -->
			<div class="col-sm-10">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="category">
						<input class="col-sm-12" type="text" name="user" value="" placeholder="Username...">
						<br/><br/>
						<input class="col-sm-6" type="password" name="pass" value="" placeholder="Password...">
						<select style="height: 27px;" class="col-sm-5 col-sm-offset-1" name="level">
							<option value="">- Chọn quyền truy cập -</option>
						<?php
							foreach ($listLevel as $key => $value) {
						?>
							<option value="<?php echo $value['levelID']; ?>"><?php echo $value['levelName']; ?></option>
						<?php
							}
						?>
					</div>
					<input style="height: 27px; margin-top: 45px;" type="file" name="file" value="">
					<div class="bottom">
						<button class="btn btn-primary" name="save" onclick='return confirm("Bạn chắc chắn muốn lưu chuyên mục này?")'>Lưu chuyên mục</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>