<?php
	include "../models/query.php";
	$memberUser = $_GET['member'];
	$member = new SQL\Member();
	$listMember = $member->getMemberByID($memberUser);
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$search = isset($_POST['isearch']) ? $_POST['isearch'] : null;
	$submit = isset($_POST['btn']) ? $_POST['btn'] : null;
	$news = new SQL\News();
	$listSearch = $news->getSearchMember($search, $memberUser);
	switch ($submit) {
		case 'search':
			break;
		case 'add':
			header("location: ../controllers/write.php?member=".$memberUser);
			break;
		default:
			break;
	}
	include "../views/viewlistnews.php";