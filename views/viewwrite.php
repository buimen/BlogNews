<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blog Tin tức</title>
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
						<li><a class="nav navbar-brand navbar-right" href="../index.php">Trang chủ</a></li>
						<li>
							<a class="nav navbar-brand navbar-right" href="#">
								<img src="../images/members/<?php echo $listMember['memberImage']; ?>">
								<?php echo $listMember['memberUser']; ?>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Profile</a></li>
								<li><a href="../controllers/listnews.php?member=<?php echo $listMember['memberUser']; ?>">Bài viết</a></li>
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
			<!-- Content TOP -->
			<div class="col-sm-10 col-sm-offset-1">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="title">
						<input class="col-sm-12" type="text" name="title" placeholder="Tiêu đề bài viết...">
						<select class="col-sm-4" name="category">
							<option value="">- Chọn chuyên mục -</option>
							<?php
								foreach ($listCategory as $key=>$value) {
							?>
							<option value="<?php echo $value['categoryID']; ?>"><?php echo $value['categoryName']; ?></option>
							<?php
								}
							?>
						</select>
						<input type="file" id="image" class="col-sm-4 col-sm-offset-1" name="file">
					</div>
					<input class="col-sm-12 summary" type="text" name="summary" placeholder="Mô tả...">
					<div class="main">
						<textarea class="col-sm-12" name="content" placeholder="Nội dung..."></textarea>
					</div>
					<div class="bottom">
						<input class="col-sm-12" type="text" name="tag" placeholder="Tags...">
						<button class="btn btn-default">Lưu nháp</button>
						<button class="btn btn-primary" name="save" onclick='return confirm("Bạn chắc chắn muốn đăng bài?")'>Đăng bài</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</body>
</html>