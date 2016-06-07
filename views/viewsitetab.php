<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $categoryName; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/styleheader.css">
</head>
<body>
	<!-- Header -->
	<header>
		<nav id="navbar-example" class="navbar navbar-default navbar-static">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand logo" href="../index.php">Blog</a>
					<form method="post">
						<div class="input-group">
							<input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>"><button class="btn btn-default btnsearch" name="isearch"><span class="glyphicon glyphicon-search"></span></button></input>
						</div>
					</form>
				</div>
				<div class="collapse navbar-collapse bs-example-js-navbar-collapse">
					<ul class="nav navbar-nav navbar-right"> 
						<li><a class="nav navbar-brand navbar-right" href="../index.php">Trang chủ</a></li>
						<?php
							foreach ($listCategory as $key=>$value) {
						?>
						<li><a class="nav navbar-brand navbar-right" href="../controllers/sitetab.php?name=<?php echo $value['categoryName']; ?>"><?php echo $value['categoryName']; ?></a></li>
						<?php
							}
						?>
						<li><a class="nav navbar-brand navbar-right" href="../controllers/login.php"><button class="btn btn-danger">Viết bài</button></a></li>
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
			<div class="col-sm-7 col-sm-offset-2">
				<?php
				if ($list > 0) {
					foreach ($list as $key=>$value) {
				?>
				<div class="item">
					<div class="title">
						<img src="../images/members/<?php echo $value['memberImage']; ?>">
						<div class="user">
							<p><?php echo $value['memberUser']; ?></p>
							<p><?php echo "Đăng lúc: " .$value['newsDatetime']. " - View: " .$value['newsView']; ?></p>
						</div>
					</div>
					<hr>
					<div class="main">
						<div class="content">
							<h2><a href="../controllers/detail.php?title=<?php echo $value['newsID']; ?>"><?php echo $value['newsTitle']; ?></a></h2>
							<p><?php echo $value['newsSummary']. "..."; ?></p>
						</div>
						<img src="../images/news/<?php echo $value['newsImage']; ?>">
					</div>
					<hr>
					<div class="bottom">
						<button class="btn btn-primary">
						<i class="fa fa-heart-o"></i>
						Recommened
						</button>
						<div class="share">Share bài viết: 
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></i></a>
							<a href="#"><i class="fa fa-google"></i></a>
						</div>
					</div>
				</div>
				<?php
					}
				}
				?>
				<div class="item">
				<?php
				if ($list == 0) {
					echo "Không có bài viết nào";
				}
				?>
				</div>
			</div>

		</div>
	</div>
</body>
</html>