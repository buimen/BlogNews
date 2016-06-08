<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $list['newsTitle']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styledetail.css">
	<link rel="stylesheet" type="text/css" href="../css/styleheader.css">
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/reponsive.css">
</head>
<body>
	<div class="wrapper">
		<!-- Header -->
		<header>
			<div id="navbar-example" class="navbar navbar-default navbar-static">
				<form method="post" action="">
					<div class="navbar-header">
						<a class="navbar-brand logo" href="../index.php">Blog</a>
						<div class="input-group">
							<input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>"><button class="btn btn-default btnsearch" name="isearch"><span class="glyphicon glyphicon-search"></span></button></input>
						</div>
					</div>
				</form>
				<nav>
					<span>Menu</span>
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
				</nav> 
			</div>
		</header>
		<!-- Content -->
		<div class="content">
			<div class="container">
				<!-- Content Left -->
				<!-- Content TOP -->
				<div class="col-sm-7 col-sm-offset-2">
					<div class="main">
						<div class="back">
							<p><a href="../controllers/home.php">Trang chủ</a> / <a href="../controllers/sitetab.php?name=<?php echo $list['categoryName']; ?>"><?php echo $list['categoryName']; ?></a></p>
						</div>
						<div class="detail">
							<div class="title">
								<h3><?php echo $list['newsTitle']; ?></h3>
								<p>Đăng lúc: <?php echo $list['newsDatetime']; ?> - View: <?php echo $list['newsView']; ?></p>
							</div>
							<div class="newscontent">
								<?php echo $list['newsContent']; ?>
							</div>
						</div>
						<div class="tag">
							<span class="glyphicon glyphicon-tags"></span>
							 Tags: <a href="#"><?php echo $list['newsTag']; ?></a>
						</div>
					</div>
				</div>

			</div>
		</div>
		<footer>
			<p>@Copyright © 2016, All Rights Reserved </p>
		</footer>
	</div>
</body>
</html>