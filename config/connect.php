<?php
	$con = mysql_connect('localhost', 'root', '') or die(mysql_error());
	$db = mysql_select_db('db_sql') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 