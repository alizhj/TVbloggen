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
				//Hämtar inlägg för respektive bloggare. GET hämtas från navegeringen i header.pho
				$cat = $_GET['category'];

				//Hämtar categorins namn
				$query2="SELECT category_name 
					FROM categories
					WHERE categories.category_id = '$cat'
					";

				$stmt2 = $db_connect->stmt_init();
				$result2 = $db_connect->query($query2);
				echo mysqli_error($db_connect);
				$stmt2->prepare($query2);
				$stmt2->execute();
				$row2 = $result2->fetch_assoc();

				?>
				<h1><? echo "{$row2['category_name']}";?></h1>
				<?php $stmt2->close(); ?>

				<div class="pagination">
					<a href="categories.php?category=<? echo "$cat"; ?>&desc">Fallande</a>
					<a href="categories.php?category=<? echo "$cat"; ?>&asc">Stigande</a>
				</div><!-- #pagination -->
				
				<div class="blogcat">
					<?php
					//Hämtar inläggen för respektive kategori från db sorterat efter senast publicerat
					if (isset($_GET["category"]) && isset($_GET["desc"])) {
						$query = "SELECT 
							blogposts.*, 
							users.*, 
							categories.*, 
							COUNT(comments.comment_id) AS commentCount
							FROM blogposts
							LEFT JOIN comments ON blogposts.post_id = comments.post_id
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							LEFT JOIN users ON blogposts.user_id = users.user_id
							WHERE categories.category_id = '$cat' AND blogposts.published = '1'
							GROUP BY blogposts.post_id
							ORDER BY blogposts.published_time DESC
							";
						getPosts($db_connect, $query);
					}
					//Hämtar inläggen för respektive kategori från db sorterat efter äldsta inlägg
					else if(isset($_GET["category"]) && isset($_GET["asc"])) {
						$query = "SELECT 
							blogposts.*, 
							users.*, 
							categories.*, 
							COUNT(comments.comment_id) AS commentCount
							FROM blogposts
							LEFT JOIN comments ON blogposts.post_id = comments.post_id
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							LEFT JOIN users ON blogposts.user_id = users.user_id
							WHERE categories.category_id = '$cat' AND blogposts.published = '1'
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