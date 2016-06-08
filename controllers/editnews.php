<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$newsID = $_GET['id'];
	$member = new SQL\Member();
	$listMember = $member->getMemberByID($newsID);
	$news = new SQL\News();
	$listNews = $news->getNewsById($newsID);

	$categoryID = isset($_POST['category']) ? $_POST['category'] : null;
	$memberID = $listNews['memberID'];
	$newsTitle = isset($_POST['title']) ? $_POST['title'] : null;
	$newsContent = isset($_POST['content']) ? $_POST['content'] : null;
	$newsTag = isset($_POST['tag']) ? $_POST['tag'] : null;
	$newsDatetime = $listNews['newsDatetime'];
	$newsView = $listNews['newsView'];
	$newsSummary = isset($_POST['summary']) ? $_POST['summary'] : null;
	$memberEdit = 'Admin';
	$date = getdate();
	$datetimeEdit = $date['year']. "-" .$date['mon']. "-" .$date['mday']. " - " .$date['hours']. "-" .$date['minutes']. "-" .$date['seconds'];
	if (isset($_POST['save'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$newsImage = $_FILES['file']['name'];
		$url = "../images/news/".$newsImage;
		move_uploaded_file($tmp_name, $url);
		$listEdit = $news->setNewsEdit($newsID, $categoryID, $memberID, $newsTitle, $newsContent, $newsImage, $newsTag, $newsDatetime, $newsView, $newsSummary, $memberEdit, $datetimeEdit);
		if ($listEdit) {
			echo "<script>
					alert('Lỗi: Không lưu được.');
				</script>";
		}
		else {
			echo "<script>
					alert('Oke!');
				</script>";
		}
		header("location: ../controllers.listnews.php");
	}
	if (!isset($_SESSION['memberUser'])) {
		header("location: ../controllers/login.php");
	}
	include "../views/vieweditnews.php";