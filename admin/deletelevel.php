<?php
	include "../models/query.php";
	$levelID = $_GET['id'];
	$level = new SQL\Level();
	$delete = $level->deleteLevel($levelID);
	header("location: ../admin/level.php");