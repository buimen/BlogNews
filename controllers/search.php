<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$search = $_GET['search'];
	$news = new SQL\News();
	$listSearch = $news->getSearch($search);
	include "../views/viewsearch.php";