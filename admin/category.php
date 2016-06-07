<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$search = isset($_POST['isearch']) ? $_POST['isearch'] : null;
	$submit = isset($_POST['btn']) ? $_POST['btn'] : null;
	$list = $category->getCategorySearch($search);
	switch ($submit) {
		case 'search':
			break;
		case 'add':
			header("location: addcategory.php");
			break;
		default:
			break;
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
			<div id="top" class="col-sm-10">
				<div class="item" style="box-shadow: 2px 2px 5px #ccc; background-color: #fff;">
					<form method="post" action="">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>Chuyên mục</th>
									<th>Parent</th>
									<th>Người sửa cuối</th>
									<th>Ngày sửa cuối</th>
									<th>Chức năng</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="4">
										<input type="text" id="idsearch" name="isearch" placeholder="Search..." value="<?php echo $search; ?>">
									</td>
									<td>
										<button class="btn btn-default" name="btn" value="search">Search</button>
										<button class="btn btn-default" name="btn" value="add">Add</button>
									</td>
								</tr>
								<?php
									if ($list) {
										foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?php echo $value['categoryName']; ?></td>
									<td><?php echo $value['categoryParent']; ?></td>
									<td><?php echo $value['memberEditCategory']; ?></td>
									<td><?php echo $value['datetimeEditCategory']; ?></td>
									<td>
										<a href="editcategory.php?id=<?php echo $value['categoryID']; ?>">Sửa</a>
										<a href="deletecategory.php?id=<?php echo $value['categoryID']; ?>" onclick='return confirm("Bạn chắc chắn muốn xóa bài này không?")'>Xóa</a>
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