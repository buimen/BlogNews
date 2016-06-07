<?php
	include "../models/query.php";
	$newsID = $_GET['id'];
	$news = new SQL\News();
	$delete = $news->deleteNews($newsID);
	header("location: ../admin/home.php");