<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$levelID = $_GET['id'];
	$level = new SQL\Level();
	$listLevel = $level->getLevelById($levelID);
	$levelName = isset($_POST['level']) ? $_POST['level'] : null;
	$levelAccess = isset($_POST['access']) ? $_POST['access'] : null;
	$memberEditLevel = 1;
	$date = getdate();
	$datetimeEditLevel = $date['year']. "-" .$date['mon']. "-" .$date['mday']. " - " .$date['hours']. "-" .$date['minutes']. "-" .$date['seconds'];
	if (isset($_POST['save'])) {
		$list = $level->setLevelEdit($levelID, $levelName, $levelAccess, $memberEditLevel, $datetimeEditLevel);
		if ($list) {
			echo "<script>
					alert('Lỗi: Không lưu được.');
				</script>";
		}
		else {
			echo "<script>
					alert('Oke!');
				</script>";
		}
		header("location: ../admin/level.php");
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
	<!-- <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->
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
					<div class="level">
						<input class="col-sm-12" type="text" name="level" value="<?php echo $listLevel['levelName']; ?>" placeholder="Tên quyền truy cập...">
						<br/><br/>
						<textarea class="col-sm-12" name="access" placeholder="Giới hạn quyền truy cập..."><?php echo $listLevel['levelAccess']; ?></textarea>
					</div>
					<div class="bottom">
						<button class="btn btn-primary" name="save" onclick='return confirm("Bạn chắc chắn muốn lưu chuyên mục này?")'>Lưu chuyên mục</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>