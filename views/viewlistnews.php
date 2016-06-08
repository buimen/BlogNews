<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<title>Bài viết</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/stylewrite.css">
	<link rel="stylesheet" type="text/css" href="../css/styleheader.css">
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
								<li><a href="#">Bài viết</a></li>
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
			<!-- Content TOP -->
			<div id="top" class="col-sm-10 col-sm-offset-1">
				<div class="item" style="box-shadow: 2px 2px 5px #ccc; background-color: #fff;">
					<form method="post" action="">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>Ảnh</th>
									<th>Tiêu đề</th>
									<th>Chuyên mục</th>
									<th>Người đăng</th>
									<th>Ngày đăng</th>
									<th>Lượt xem</th>
									<th>Người sửa cuối</th>
									<th>Ngày sửa cuối</th>
									<th>Chức năng</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="8">
										<input type="text" id="idsearch" name="isearch" placeholder="Search..." value="<?php echo $search; ?>">
									</td>
									<td>
										<button class="btn btn-default" name="btn" value="search">Search</button>
										<button class="btn btn-default" name="btn" value="add">Add</button>
									</td>
								</tr>
								<?php
									if ($listSearch) {
										foreach ($listSearch as $key => $value) {
								?>
								<tr>
									<td><img src="../images/news/<?php echo $value['newsImage']; ?>"></td>
									<td><?php echo $value['newsTitle']; ?></td>
									<td><?php echo $value['categoryName']; ?></td>
									<td><?php echo $value['memberUser']; ?></td>
									<td><?php echo $value['newsDatetime']; ?></td>
									<td><?php echo $value['newsView']; ?></td>
									<td><?php echo $value['memberEditNews']; ?></td>
									<td><?php echo $value['datetimeEditNews']; ?></td>
									<td>
										<a href="../controllers/editnews.php?id=<?php echo $value['newsID']; ?>">Sửa</a>
										<a href="../controllers/deletenews.php?id=<?php echo $value['newsID']; ?>" onclick='return confirm("Bạn chắc chắn muốn xóa bài này không?")'>Xóa</a>
									</td>
								</tr>
								<?php
										}
									}
									else {
										echo "";
									}
								?>
							</tbody>
						</table>
					</form>
				</div>
			</div>

		</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>