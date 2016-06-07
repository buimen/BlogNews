<?php
	include "../models/query.php";
	$categoryID = $_GET['id'];
	$category = new SQL\Category();
	$delete = $category->deleteCategory($categoryID);
	header("location: ../admin/category.php");