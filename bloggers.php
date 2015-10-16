<?php 
	include "includes/db_connect.php";  
	session_start();
	require "includes/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bloggare</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" /> 
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
	<body>
		<div id="wrapper">
			<?php include "includes/header2.php"; ?>
			<?php 
				//Hämtar inlägg för respektive bloggare. GET hämtas från navegeringen i header.php
				$blog = $_GET['blog'];

				//Hämtar bloggarens namn
				$query2="SELECT first_name, last_name 
					FROM users
					WHERE users.user_id = '$blog'
					";

				$stmt2 = $db_connect->stmt_init();
				$result2 = $db_connect->query($query2);
				echo mysqli_error($db_connect);
				$stmt2->prepare($query2);
				$stmt2->execute();
				$row2 = $result2->fetch_assoc();

				?>
				<h1><? echo "{$row2['first_name']} " . "{$row2['last_name']}"; ?></h1>
				<?php $stmt2->close(); ?>

				<div class="pagination">
					<a href="bloggers.php?blog=<? echo "$blog"; ?>&desc">Fallande</a>
					<a href="bloggers.php?blog=<? echo "$blog"; ?>&asc">Stigande</a>
				</div><!-- #pagination -->
				
				<div class="blogcat">
					<?php
					//Hämtar inläggen för respektive bloggare från db sorterat efter senast publicerat
					if (isset($_GET["blog"]) && isset($_GET["desc"])) {
						$query = "SELECT 
							blogposts.*, 
							users.*, 
							categories.*, 
							COUNT(comments.comment_id) AS commentCount
							FROM blogposts
							LEFT JOIN comments ON blogposts.post_id = comments.post_id
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							LEFT JOIN users ON blogposts.user_id = users.user_id
							WHERE users.user_id = '$blog' AND blogposts.published = '1'
							GROUP BY blogposts.post_id
							ORDER BY blogposts.published_time DESC
							";
						
						getPosts($db_connect, $query);
					}
					//Hämtar inläggen för respektive bloggare från db sorterat efter äldsta inlägg
					else if(isset($_GET["blog"]) && isset($_GET["asc"])) {
						$query = "SELECT 
							blogposts.*, 
							users.*, 
							categories.*, 
							COUNT(comments.comment_id) AS commentCount
							FROM blogposts
							LEFT JOIN comments ON blogposts.post_id = comments.post_id
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							LEFT JOIN users ON blogposts.user_id = users.user_id
							WHERE users.user_id = '$blog' AND blogposts.published = '1'
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