<?php
	include "../models/query.php";
	$category = new SQL\Category();
	$listCategory = $category->getCategory();
	$memberUser = $_GET['member'];
	$member = new SQL\Member();
	$listMember = $member->getMemberByID($memberUser);

	$categoryID = isset($_POST['category']) ? $_POST['category'] : null;
	$memberID = $listMember['memberID'];
	$newsTitle = isset($_POST['title']) ? $_POST['title'] : null;
	$newsContent = isset($_POST['content']) ? $_POST['content'] : null;
	$newsTag = isset($_POST['tag']) ? $_POST['tag'] : null;
	$date = getdate();
	$newsDatetime = $date['year']. "-" .$date['mon']. "-" .$date['mday']. " - " .$date['hours']. "-" .$date['minutes']. "-" .$date['seconds'];
	$newsView = 0;
	$newsSummary = isset($_POST['summary']) ? $_POST['summary'] : null;
	if (isset($_POST['save'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$newsImage = $_FILES['file']['name'];
		$url = "../images/news/".$newsImage;
		move_uploaded_file($tmp_name, $url);
		$news = new News();
		$listNews = $news->setNews($categoryID, $memberID, $newsTitle, $newsContent, $newsImage, $newsTag, $newsDatetime, $newsView, $newsSummary);
		if ($listNews) {
			echo "<script>
					alert('Lỗi: Không lưu được.');
				</script>";
		}
		else {
			echo "<script>
					alert('Oke!');
				</script>";
		}
		header("location: ../controllers/listnews.php?member=".$listMember['memberUser']);
	}
	include "../views/viewwrite.php";