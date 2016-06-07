<?php
	include "../models/query.php";
	$memberID = $_GET['id'];
	$member = new SQL\Member();
	$delete = $member->deleteMember($memberID);
	header("location: ../admin/member.php");