<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$search = isset($_POST['search']) ? $_POST['search'] : null;
	$news = new SQL\News();
	$listSearch = $news->getSearch($search);
	include "../views/viewhome.php";