<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$search = isset($_POST['search']) ? $_POST['search'] : null;
	$categoryName = $_GET['name'];
	$news = new SQL\News();
	if (isset($_POST['isearch'])) {
		$list = $news->getSearch($search);
	}
	else {
		$list = $news->getCategoryById($categoryName);
	}
	include "../views/viewsitetab.php";