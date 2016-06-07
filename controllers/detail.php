<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$newsID = $_GET['title'];
	$search = isset($_POST['search']) ? $_POST['search'] : null;
	$news = new SQL\News();
	// $view = $news->setView($newsID);
	// $list = $news->getNewsById($newsID);
	if (isset($_POST['isearch'])) {
		$list = $news->getSearch($search);
		header("location: ../controllers/sitetab.php?name=".$search);
	}
	else {
		$list = $news->getNewsById($newsID);
	}
	include "../views/viewdetail.php";