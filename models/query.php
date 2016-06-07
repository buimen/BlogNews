<?php
	namespace SQL;
	include "../config/connect.php";
	/**
	* 
	*/
	class News
	{
		public $arr = array();
		public function getNews() {
			$sql = mysql_query(
				"SELECT * 
				FROM news, category, members 
				WHERE news.categoryID = category.categoryID and news.memberID = members.memberID") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'newsID'=>$row['newsID'],
						'newsTitle'=>$row['newsTitle'],
						'newsContent'=>$row['newsContent'],
						'newsSummary'=>$row['newsSummary'],
						'newsImage'=>$row['newsImage'],
						'newsTag'=>$row['newsTag'],
						'newsDatetime'=>$row['newsDatetime'],
						'newsView'=>$row['newsView'],
						'categoryID'=>$row['categoryID'],
						'categoryName'=>$row['categoryName'],
						'memberID'=>$row['memberID'],
						'memberUser'=>$row['memberUser'],
						'memberImage'=>$row['memberImage'],
						'memberEditNews'=>$row['memberEditNews'],
						'datetimeEditNews'=>$row['datetimeEditNews']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getNewsById($newsID) {
			$sql = mysql_query(
				"SELECT * 
				FROM news, category, members 
				WHERE news.categoryID = category.categoryID and news.memberID = members.memberID and newsID = '".$newsID."'") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr = array(
						'newsID'=>$row['newsID'],
						'newsTitle'=>$row['newsTitle'],
						'newsContent'=>$row['newsContent'],
						'newsSummary'=>$row['newsSummary'],
						'newsImage'=>$row['newsImage'],
						'newsTag'=>$row['newsTag'],
						'newsDatetime'=>$row['newsDatetime'],
						'newsView'=>$row['newsView'],
						'categoryID'=>$row['categoryID'],
						'categoryName'=>$row['categoryName'],
						'memberID'=>$row['memberID'],
						'memberUser'=>$row['memberUser'],
						'memberImage'=>$row['memberImage'],
						'memberEditNews'=>$row['memberEditNews'],
						'datetimeEditNews'=>$row['datetimeEditNews']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getCategoryById($categoryName) {
			$sql = mysql_query(
				"SELECT * 
				FROM news, category, members 
				WHERE news.categoryID = category.categoryID and category.categoryName = '".$categoryName."' GROUP BY newsID") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'newsID'=>$row['newsID'],
						'newsTitle'=>$row['newsTitle'],
						'newsContent'=>$row['newsContent'],
						'newsSummary'=>$row['newsSummary'],
						'newsImage'=>$row['newsImage'],
						'newsTag'=>$row['newsTag'],
						'newsDatetime'=>$row['newsDatetime'],
						'newsView'=>$row['newsView'],
						'categoryID'=>$row['categoryID'],
						'categoryName'=>$row['categoryName'],
						'memberUser'=>$row['memberUser'],
						'memberImage'=>$row['memberImage'],
						'memberEditNews'=>$row['memberEditNews'],
						'datetimeEditNews'=>$row['datetimeEditNews']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function setView($newsID) {
			if (!isset($_SESSION['view'])) {
				$_SESSION['view'] = 1;
				$sql = mysql_query(
					"UPDATE news 
					SET newsView = newsView + 1 
					WHERE newsID = '".$newsID."'") or die("Error query");
				return ;
			}
			else {
				return ;
			}
		}

		public function setNews($categoryID, $memberID, $newsTitle, $newsContent, $newsImage, $newsTag, $newsDatetime, $newsView, $newsSummary) {
			$sql = mysql_query(
				"INSERT INTO news(categoryID, memberID, newsTitle, newsContent, newsImage, newsTag, newsDatetime, newsView, newsSummary) 
				VALUES ($categoryID, $memberID, '$newsTitle', '$newsContent', '$newsImage', '$newsTag', '$newsDatetime', $newsView, '$newsSummary')") or die("Error insert");
			return ;
		}

		public function setNewsEdit($newsID, $categoryID, $memberID, $newsTitle, $newsContent, $newsImage, $newsTag, $newsDatetime, $newsView, $newsSummary, $memberEditNews, $datetimeEditNews) {
			$sql = mysql_query(
				"UPDATE news 
				SET categoryID=$categoryID, memberID=$memberID, newsTitle='$newsTitle', newsContent='$newsContent', newsImage='$newsImage', newsTag='$newsTag', newsDatetime='$newsDatetime',newsView=$newsView, newsSummary='$newsSummary', memberEditNews='$memberEditNews', datetimeEditNews='$datetimeEditNews' 
				WHERE newsID = $newsID") or die("Error update");
			return ;
		}

		public function getSearch($search) {
			$sql = mysql_query(
				"SELECT * 
				FROM news, category, members 
				WHERE newsTitle LIKE '%$search%' and news.categoryID = category.categoryID and news.memberID = members.memberID 
				GROUP BY newsID") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'newsID'=>$row['newsID'],
						'newsTitle'=>$row['newsTitle'],
						'newsContent'=>$row['newsContent'],
						'newsSummary'=>$row['newsSummary'],
						'newsImage'=>$row['newsImage'],
						'newsTag'=>$row['newsTag'],
						'newsDatetime'=>$row['newsDatetime'],
						'newsView'=>$row['newsView'],
						'categoryName'=>$row['categoryName'],
						'memberUser'=>$row['memberUser'],
						'memberImage'=>$row['memberImage'],
						'memberEditNews'=>$row['memberEditNews'],
						'datetimeEditNews'=>$row['datetimeEditNews']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getSearchMember($search, $memberUser) {
			$sql = mysql_query(
				"SELECT * 
				FROM news, category, members 
				WHERE newsTitle LIKE '%$search%' and news.categoryID = category.categoryID and news.memberID = members.memberID and members.memberUser = '$memberUser'
				GROUP BY newsID") or die("Error query");

			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'newsID'=>$row['newsID'],
						'newsTitle'=>$row['newsTitle'],
						'newsContent'=>$row['newsContent'],
						'newsSummary'=>$row['newsSummary'],
						'newsImage'=>$row['newsImage'],
						'newsTag'=>$row['newsTag'],
						'newsDatetime'=>$row['newsDatetime'],
						'newsView'=>$row['newsView'],
						'categoryName'=>$row['categoryName'],
						'memberUser'=>$row['memberUser'],
						'memberImage'=>$row['memberImage'],
						'memberEditNews'=>$row['memberEditNews'],
						'datetimeEditNews'=>$row['datetimeEditNews']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getSearchCategory($search, $categoryName) {
			$sql = mysql_query(
				"SELECT * 
				FROM news, category, members 
				WHERE newsTitle LIKE '%$search%' and news.categoryID = category.categoryID and news.memberID = members.memberID and category.categoryName = '$categoryName' 
				GROUP BY newsID") or die("Error query");

			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'newsID'=>$row['newsID'],
						'newsTitle'=>$row['newsTitle'],
						'newsContent'=>$row['newsContent'],
						'newsSummary'=>$row['newsSummary'],
						'newsImage'=>$row['newsImage'],
						'newsTag'=>$row['newsTag'],
						'newsDatetime'=>$row['newsDatetime'],
						'newsView'=>$row['newsView'],
						'categoryName'=>$row['categoryName'],
						'memberUser'=>$row['memberUser'],
						'memberImage'=>$row['memberImage'],
						'memberEditNews'=>$row['memberEditNews'],
						'datetimeEditNews'=>$row['datetimeEditNews']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function deleteNews($newsID) {
			$sql = mysql_query("delete from news where newsID = '".$newsID."'");
		}
	}

	class Category
	{
		public $arr = array();
		public function getCategory() {
			$sql = mysql_query(
				"SELECT * 
				FROM category 
				where categoryParent = 0") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'categoryID'=>$row['categoryID'],
						'categoryName'=>$row['categoryName'],
						'categoryParent'=>$row['categoryParent'],
						'memberEditCategory'=>$row['memberEditCategory'],
						'datetimeEditCategory'=>$row['datetimeEditCategory']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getCategoryById($categoryID) {
			$sql = mysql_query(
				"SELECT * 
				FROM category 
				where categoryID = $categoryID") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr = array(
						'categoryID'=>$row['categoryID'],
						'categoryName'=>$row['categoryName'],
						'categoryParent'=>$row['categoryParent'],
						'memberEditCategory'=>$row['memberEditCategory'],
						'datetimeEditCategory'=>$row['datetimeEditCategory']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getCategorySearch($categoryName) {
			$sql = mysql_query(
				"SELECT * 
				FROM category 
				where categoryName like '%$categoryName%'") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'categoryID'=>$row['categoryID'],
						'categoryName'=>$row['categoryName'],
						'categoryParent'=>$row['categoryParent'],
						'memberEditCategory'=>$row['memberEditCategory'],
						'datetimeEditCategory'=>$row['datetimeEditCategory']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function deleteCategory($categoryID) {
			$sql = mysql_query("delete from category where categoryID = '".$categoryID."'");
		}

		public function setCategory($categoryName, $categoryParent) {
			$sql = mysql_query(
				"INSERT INTO category(categoryName, categoryParent) 
				VALUES ('$categoryName', $categoryParent)") or die("Error insert");
			return ;
		}

		public function setCategoryEdit($categoryID, $categoryName, $categoryParent, $memberEditCategory, $datetimeEditCategory) {
			$sql = mysql_query(
				"UPDATE category 
				SET categoryName='$categoryName', categoryParent=$categoryParent, memberEditCategory=$memberEditCategory, datetimeEditCategory='$datetimeEditCategory' 
				WHERE categoryID = $categoryID") or die("Error insert");
			return ;
		}
	}

	class Member
	{
		public $arr = array();
		public function getMemberByID($member) {
			$sql = mysql_query(
				"SELECT * 
				FROM members, level 
				where members.levelID = level.levelID and memberUser = '".$member."' or memberID = '".$member."'") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr = array(
						'memberID'=>$row['memberID'],
						'memberUser'=>$row['memberUser'],
						'memberPass'=>$row['memberPass'],
						'levelID'=>$row['levelID'],
						'levelName'=>$row['levelName'],
						'memberImage'=>$row['memberImage'],
						'memberEdit'=>$row['memberEdit'],
						'datetimeEdit'=>$row['datetimeEdit']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getMemberLevelByID($user, $pass) {
			$sql = mysql_query(
				"SELECT * 
				FROM members, level 
				where members.levelID = level.levelID and memberUser = '$user' and memberPass = '$pass' and levelName = 'admin'") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr = array(
						'memberID'=>$row['memberID'],
						'memberUser'=>$row['memberUser'],
						'memberPass'=>$row['memberPass'],
						'levelID'=>$row['levelID'],
						'levelName'=>$row['levelName'],
						'memberImage'=>$row['memberImage'],
						'memberEdit'=>$row['memberEdit'],
						'datetimeEdit'=>$row['datetimeEdit']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getMemberSearch($search) {
			$sql = mysql_query(
				"SELECT * 
				FROM members, level 
				where memberUser like '%$search%' and members.levelID = level.levelID") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'memberID'=>$row['memberID'],
						'memberUser'=>$row['memberUser'],
						'memberPass'=>$row['memberPass'],
						'levelName'=>$row['levelName'],
						'memberImage'=>$row['memberImage'],
						'memberEdit'=>$row['memberEdit'],
						'datetimeEdit'=>$row['datetimeEdit']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function deleteMember($memberID) {
			$sql = mysql_query("delete from members where memberID = '".$memberID."'");
		}

		public function setMember($memberUser, $memberPass, $memberImage, $levelID) {
			$sql = mysql_query(
				"INSERT INTO members(memberUser, memberPass, memberImage, levelID) 
				VALUES ('$memberUser', '$memberPass', '$memberImage', $levelID)") or die("Error insert");
			return ;
		}

		public function setMemberEdit($memberID, $memberUser, $memberPass, $memberImage, $levelID, $memberEdit, $datetimeEdit) {
			$sql = mysql_query(
				"UPDATE members 
				SET memberUser='$memberUser', memberPass='$memberPass', memberImage='$memberImage', levelID=$levelID, memberEdit=$memberEdit, datetimeEdit='$datetimeEdit'
				WHERE memberID = $memberID") or die("Error insert");
			return ;
		}

		public function login($user, $pass) {
			$sql = mysql_query(
				"select * 
				from members 
				where memberUser = '".$user."' and memberPass = '".$pass."'") or die("Error query");
			return $sql;
		}
	}

	class Level
	{
		public function getLevel() {
			$sql = mysql_query(
				"SELECT * 
				FROM level") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'levelID'=>$row['levelID'],
						'levelName'=>$row['levelName'],
						'levelAccess'=>$row['levelAccess'],
						'memberEditLevel'=>$row['memberEditLevel'],
						'datetimeEditLevel'=>$row['datetimeEditLevel']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}
		public function getLevelById($levelID) {
			$sql = mysql_query(
				"SELECT * 
				FROM level WHERE levelID = $levelID") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr = array(
						'levelID'=>$row['levelID'],
						'levelName'=>$row['levelName'],
						'levelAccess'=>$row['levelAccess'],
						'memberEditLevel'=>$row['memberEditLevel'],
						'datetimeEditLevel'=>$row['datetimeEditLevel']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function getLevelSearch($search) {
			$sql = mysql_query(
				"SELECT * 
				FROM level 
				where levelName like '%$search%'") or die("Error query");
			if (mysql_num_rows($sql) > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$arr[] = array(
						'levelID'=>$row['levelID'],
						'levelName'=>$row['levelName'],
						'levelAccess'=>$row['levelAccess'],
						'memberEditLevel'=>$row['memberEditLevel'],
						'datetimeEditLevel'=>$row['datetimeEditLevel']
						);
				}
			}
			else {
				echo $arr = "";
			}
			return $arr;
		}

		public function deleteLevel($levelID) {
			$sql = mysql_query("delete from level where levelID = '".$levelID."'");
		}

		public function setLevel($levelName, $levelAccess) {
			$sql = mysql_query(
				"INSERT INTO level(levelName, levelAccess) 
				VALUES ('$levelName', '$levelAccess')") or die("Error insert");
			return ;
		}

		public function setLevelEdit($levelID, $levelName, $levelAccess, $memberEditLevel, $datetimeEditLevel) {
			$sql = mysql_query(
				"UPDATE level 
				SET levelName='$levelName', levelAccess='$levelAccess', memberEditLevel=$memberEditLevel, datetimeEditLevel='$datetimeEditLevel'
				WHERE levelID = $levelID") or die("Error insert");
			return ;
		}
	}