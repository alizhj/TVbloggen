<?php 
	include "includes/db_connect.php"; 
	session_start();
	require "includes/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kategorier</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" /> 
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
	<body>
		<div id="wrapper">
			<?php include "includes/header2.php"; ?>
			<?php 
				//Hämtar inlägg för respektive månad. GET hämtas från navegeringen i header.php
				$month = $_GET['month'];
				?>

				<h1>Arkiv</h1>
				<div class="pagination">
					<a href="archive.php?month=<? echo "$month"; ?>&desc">Fallande</a>
					<a href="archive.php?month=<? echo "$month"; ?>&asc">Stigande</a>
				</div><!-- #pagination -->

				<div class="blogcat">
					<?php
					//Hämtar inläggen för respektive månad från db sorterat efter senast publicerat
					if (isset($_GET["month"]) && isset($_GET["desc"])) {
						$query = "SELECT 
							blogposts.*, 
							users.*, 
							categories.*, 
							COUNT(comments.comment_id) AS commentCount
							FROM blogposts
							LEFT JOIN comments ON blogposts.post_id = comments.post_id
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							LEFT JOIN users ON blogposts.user_id = users.user_id
							WHERE blogposts.published = '1' AND MONTH(timestamp(blogposts.published_time)) = $month
							GROUP BY blogposts.post_id
							ORDER BY blogposts.published_time DESC
							";
							
						getPosts($db_connect, $query);
					}
					//Hämtar inläggen för respektive månad från db sorterat efter äldsta inlägg
					else if(isset($_GET["month"]) && isset($_GET["asc"])) {
						$query = "SELECT 
							blogposts.*, 
							users.*, 
							categories.*, 
							COUNT(comments.comment_id) AS commentCount
							FROM blogposts
							LEFT JOIN comments ON blogposts.post_id = comments.post_id
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							LEFT JOIN users ON blogposts.user_id = users.user_id
							WHERE blogposts.published = '1' AND MONTH(timestamp(blogposts.published_time)) = $month
							GROUP BY blogposts.post_id
							ORDER BY blogposts.published_time ASC
							";
							
						getPosts($db_connect, $query);
					}
					$db_connect->close();
					?>
				</div><!-- #blogcat -->
				<?php
				include "includes/footer.php";
			?>
		</div><!-- #wrapper -->
	</body>
</html>