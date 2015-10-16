<?php 
	include "includes/db_connect.php"; 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TV-Bloggen</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" /> 
	<link href="http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300" rel="stylesheet" type="text/css" />
</head>
	<body>
		<div id="wrapper">
			<?php include "includes/header.php"; ?>
			<?php
				//Skapar variabel för antalet inlägg/sida
				$per_page = 6;
				//GET hämtar från pagineringslänkarna
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}
				else {
					$page = 1;
				}

				//Sidan startar med 0 och ökar för varje sida
				$start_from = ($page-1) * $per_page;

				//Hämtar alla inlägg som finns i databasen med tillhörande information om författaren och kommentarer
				$query = "SELECT 
					blogposts.*, 
					users.*, 
					categories.*, 
					COUNT(comments.comment_id) AS commentCount
					FROM blogposts
					LEFT JOIN comments ON blogposts.post_id = comments.post_id
					LEFT JOIN categories ON blogposts.category_id = categories.category_id
					LEFT JOIN users ON blogposts.user_id = users.user_id
					WHERE blogposts.published = '1'
					GROUP BY blogposts.post_id
					";
			?>
		
			<?php
				$stmt = $db_connect->stmt_init();
				$result = $db_connect->query($query);
				echo mysqli_error($db_connect);
				$stmt->prepare($query);
				$stmt->execute();

				$total_pages = ceil($result->num_rows / $per_page);

				//Länk till föregående sida
				?><div class="pagination">
					<?
					echo "<a href='index.php?page=1'>" . '‹‹Första sidan' . "</a> ";
					for ($i=1; $i<=$total_pages; $i++) {
						echo "<a href='index.php?page=" . $i . "'>" . $i . "</a> ";
					}
					//Länk till nästa sida
					echo "<a href='index.php?page=$total_pages'>" . 'Sista sidan››' . "</a>";
				?></div><!-- #pagination -->

			<div class="post_wall">
				<?php
			
					//Hämtar alla inlägg som finns i databasen med tillhörande information om författaren och kommentarer
					$query = "SELECT 
						blogposts.*, 
						users.*, 
						categories.*, 
						COUNT(comments.comment_id) AS commentCount
						FROM blogposts
						LEFT JOIN comments ON blogposts.post_id = comments.post_id
						LEFT JOIN categories ON blogposts.category_id = categories.category_id
						LEFT JOIN users ON blogposts.user_id = users.user_id
						WHERE blogposts.published = '1'
						GROUP BY blogposts.post_id
						ORDER BY blogposts.published_time DESC
						LIMIT $start_from, $per_page
						";
								
					$stmt = $db_connect->stmt_init();
					$result = $db_connect->query($query);
					echo mysqli_error($db_connect);
					$stmt->prepare($query);
					$stmt->execute();

					while($row = $result->fetch_assoc()) {
						//Skriver ut inläggen
						?>
						<div class="box">
							<div class="post">
								<h3><? echo "{$row['post_title']}"; ?></h3> 
								<p>Skapad: <? echo "{$row['published_time']} "; ?><br />
								Av <? echo "{$row['first_name']} " . "{$row['last_name']}"; ?></p>
								<p><? echo "{$row['post_text']}"?></p>
							</div><!-- #post -->
							<div class="post_links">
								<p><small>Kontakt: <? echo "{$row['email']} "; ?></small><br />
								<small><? echo "{$row['website']}"?></small></p>
								<p>Kategori: <? echo "{$row['category_name']}"; ?></p>
								<a href="show_post.php?post=<? echo "{$row['post_id']}"; ?>">Läs mer...</a><br />
								<a href="show_post.php?post=<? echo "{$row['post_id']}"; ?>#view_comments">Visa kommentarer(<? echo "{$row['commentCount']}"?>)</a>
							</div><!-- #post_links -->
						</div><!-- #box -->
						<?php 
					}
				?>
			</div><!-- #post_wall -->

			<div class="clearfix"></div>

			<div class="pagination">
				<?
				echo "<a href='index.php?page=1'>" . '‹‹Första sidan' . "</a> ";
				for ($i=1; $i<=$total_pages; $i++) {
					echo "<a href='index.php?page=" . $i . "'>" . $i . "</a> ";
				}
				//Länk till nästa sida
				echo "<a href='index.php?page=$total_pages'>" . 'Sista sidan››' . "</a>";
				?>
			</div><!-- #pagination -->
			<?
				$db_connect->close();
				include "includes/footer.php";
			?>
		</div><!-- #wrapper -->
	</body>
</html>