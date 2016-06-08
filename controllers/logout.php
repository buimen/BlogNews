<?php
	include "../models/query.php";
	session_destroy();
	header("location: ../controllers/home.php");