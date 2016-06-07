<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $list['newsTitle']; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styledetail.css">
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
				<div class="main">
					<div class="back">
						Đường dẫn
					</div>
					<div class="content">
						<h2><?php echo $list['newsTitle']; ?></h2>
						<p>Đăng lúc: <?php echo $list['newsDatetime']; ?> - View: <?php echo $list['newsView']; ?></p>
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
		<p>Copyright © 2016, All Rights Reserved </p>
	</footer>
</body>
</html>