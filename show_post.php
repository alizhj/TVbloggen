<?php 
	include "includes/db_connect.php";  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Visa inlägget</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" /> 
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
	<body>
		<div id="wrapper">
			<?php include "includes/header2.php"; ?>
			<?php
				
				//Skapar variabler, GET hämtar från bloggers.php eller categories.php, SESSION från inloggad anvämdare
				$post_id = $_GET['post'];
				
				//Hämtar hela texten på det valda inlägget. 
				$query =  "SELECT 
					blogposts.*,
					categories.*,
					users.first_name, users.last_name, users.email, users.website
					FROM blogposts
					LEFT JOIN categories ON blogposts.category_id = categories.category_id
					LEFT JOIN users ON blogposts.user_id = users.user_id
					WHERE blogposts.post_id = '$post_id'
					";

				$stmt = $db_connect->stmt_init();
				$result = $db_connect->query($query);
				echo mysqli_error($db_connect);
				$stmt->prepare($query);
				$stmt->execute();

				
				while($row = $result->fetch_assoc()) {
					//Skriver ut det valda inlägget 
					?>
					<div class="show_post">
						<h3><? echo "{$row['post_title']}"?></h3>
						<p><? echo "{$row['post_text']}"?></p>
						<p>Skapad: <? echo "{$row['published_time']}"?></p> 
						<p>Av <? echo "{$row['first_name']} " . "{$row['last_name']}"?></p>
						<p>Kategori: <? echo "{$row['category_name']}"?></p>
					</div>
					<?php
				}

				//Bekräftelsemeddelanden om huruvida kommentaren har raderats
				if(isset($_GET["deleted_comment"])) {
					echo "<p class='success'>Komentaren har raderats</p>";
				}

				//Kontrollerar att användaren som loggat in INTE är superadmin
				if(isset($_SESSION["status"]) && ($_SESSION["status"] == "logged_in") && ($_SESSION["user_id"] != 4)) {
					$user_id = $_SESSION["user_id"];

					//Hämtar kommentarer som hör till det valda inlägget och den inloggade användaren
					$query3 = "SELECT 
						comments.*,
						blogposts.*
						FROM comments
						LEFT JOIN blogposts ON comments.post_id = blogposts.post_id
						WHERE blogposts.post_id = '$post_id' AND blogposts.user_id = '$user_id'
						"; 

					$stmt = $db_connect->stmt_init();
					$result = $db_connect->query($query3);
					echo mysqli_error($db_connect);
					$stmt->prepare($query3);
					$stmt->execute();

					while($row = $result->fetch_assoc()) {
						//Skriver ut kommentarer för det aktuella inlägget och raderaknapp
						?>
						<div class="show_comments">
							<p><? echo "{$row['comment_name']} "; ?>skrev den: </p>
							<p><? echo "{$row['comment_time']}"; ?></p>
							<p><? echo "{$row['comment_text']}"; ?></p>
							<p><? echo "{$row['comment_email']}"; ?></p>
							<p><? echo "{$row['comment_website']}"; ?></p>
							<form action="delete_comment.php" method="post">
								<input type="hidden" name="comment_id" value="<? echo "{$row['comment_id']}"; ?>" />
								<input type="hidden" name="post_id" value="<? echo "{$row['post_id']}"; ?>" />
								<input type="submit" name="delete_comment" value="Radera kommentar" />
							</form>
						</div><!-- #show_comments -->	
						<?php
					}
				}
				else {
					//Hämtar alla kommentarer som tillhör det aktuella inlägget  
					$query2 = "SELECT * 
						FROM comments 
						WHERE post_id = '$post_id' 
						ORDER BY comment_time DESC
						";

					$stmt = $db_connect->stmt_init();
					$result = $db_connect->query($query2);
					echo mysqli_error($db_connect);
					$stmt->prepare($query2);
					$stmt->execute();

					while($row = $result->fetch_assoc()) {
						//Skriver ut kommentarer för det aktuella inlägget
						?>
						<a name="view_comments"></a>
						<div class="show_comments">
							<p><? echo "{$row['comment_name']} "; ?>skrev den: <br />
								<? echo "{$row['comment_time']}"; ?></p>
							<p><? echo "{$row['comment_text']}"; ?></p>
							<p><? echo "{$row['comment_email']}"; ?><br />
								<? echo "{$row['comment_website']}"; ?></p>
							<?
							//Kontrollerar om den inloggade användaren är superadmin, då visas raderaknapp för kommentarer
							if(isset($_SESSION["status"]) && ($_SESSION["status"] == "logged_in") && ($_SESSION["user_id"] == 4)) {
								?>
								<form action="delete_comment.php" method="post">
									<input type="hidden" name="comment_id" value="<? echo "{$row['comment_id']}"; ?>" />
									<input type="hidden" name="post_id" value="<? echo "{$row['post_id']}"; ?>" />
									<input type="submit" name="delete_comment" value="Radera kommentar" />
								</form>
								<?
							}
							?>
						</div><!-- #show_comments -->
						<?php 
					}
				}

				//Kontrollerar att email är rätt ifylld
				if(isset($_GET["error"])) {
					echo "<p class='message'>Du har inte fyllt i email rätt</p>";
				}
				if(isset($_GET["empty_fields"])) {
					echo "<p class='message'>Var god fyll i formulärsfälten</p>";
				}

				//Formulär för att skriva en ny kommentar
				?>

				<!-- commentform -->
				<form class="form_comment" action="save_comment.php" method="post">
					<label>Namn</label><br />
					<input type="text" name="comment_name" /><br />
					<label>E-post</label><br />
					<input type="text" name="comment_email" /><br />
					<label>Hemsida</label><br />
					<input type="text" name="comment_website" /><br />
					<label>Kommentar</label><br />
					<textarea name="comment_text" cols="45" rows="8">
					</textarea><br />
					<input type="hidden" name="post_id" value="<? echo "$post_id"?>"; />
					<input type="submit" name="send_comment" value="Skicka kommentar" /> 
				</form><!-- #commentform --> 
				<?	
				$db_connect->close();
				include "includes/footer.php";
			?>
		</div><!-- #wrapper -->
	</body>
</html>