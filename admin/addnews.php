<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();

	$categoryID = isset($_POST['category']) ? $_POST['category'] : null;
	$memberID = 1;
	$newsTitle = isset($_POST['title']) ? $_POST['title'] : null;
	$newsContent = isset($_POST['content']) ? $_POST['content'] : null;
	$newsTag = isset($_POST['tag']) ? $_POST['tag'] : null;
	$date = getdate();
	$newsDatetime = $date['year']. "-" .$date['mon']. "-" .$date['mday']. " - " .$date['hours']. "-" .$date['minutes']. "-" .$date['seconds'];
	$newsView = 0;
	$newsSummary = isset($_POST['summary']) ? $_POST['summary'] : null;
	if (isset($_POST['save'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$newsImage = $_FILES['file']['name'];
		$url = "../images/news/".$newsImage;
		move_uploaded_file($tmp_name, $url);
		$news = new SQL\News();
		$listNews = $news->setNews($categoryID, $memberID, $newsTitle, $newsContent, $newsImage, $newsTag, $newsDatetime, $newsView, $newsSummary);
		if ($listNews) {
			echo "<script>
					alert('Lỗi: Không lưu được.');
				</script>";
		}
		else {
			echo "<script>
					alert('Oke!');
				</script>";
		}
		header("location: ../admin/home.php");
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
					<div class="title">
						<input class="col-sm-12" type="text" name="title" value="" placeholder="Tiêu đề bài viết...">
						<select class="col-sm-4" name="category">
							<option value="">- Chọn chuyên mục -</option>
							<?php
								foreach ($listCategory as $key => $value) {
							?>
							<option value="<?php echo $value['categoryID']; ?>"><?php echo $value['categoryName']; ?></option>
							<?php
								}
							?>
						</select>
						<input type="file" id="image" class="col-sm-4 col-sm-offset-1" name="file" value="">
					</div>
					<div class="summary">
						<input class="col-sm-12 summary" type="text" name="summary" value="" placeholder="Mô tả...">
					</div>
					<div class="main">
						<textarea class="col-sm-12" name="content" placeholder="Nội dung bài viết..."></textarea>
					</div>
					<div class="bottom">
						<input class="col-sm-12" type="text" name="tag" value="" placeholder="Tags...">
						<button class="btn btn-default">Lưu nháp</button>
						<button class="btn btn-primary" name="save" onclick='return confirm("Bạn chắc chắn muốn đăng bài?")'>Đăng bài</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>