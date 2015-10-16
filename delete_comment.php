<?php 
	include "includes/db_connect.php";  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Säkerhetsfråga</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" /> 
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
	<body>
		<?php
			$stmt = $db_connect->stmt_init();
			$comment_id = $_POST["comment_id"];
			$post_id = $_POST["post_id"];

			//Query för att ta bort en vald kommentar
			if(isset($_POST["sure"])) {

				$query = "DELETE FROM comments WHERE comment_id = '$comment_id'";

				if($stmt->prepare($query)) { 
					$stmt->execute();
					header("Location: show_post.php?post=$post_id&deleted_comment");
				}
			}
			else if(isset($_POST["regret"])) {
				header("Location: show_post.php?post=$post_id");
			}
			else if(isset($_POST["delete_comment"])) {
				//Kontrollerar om man verkligen vill ta bort kommentaren
				?>
				<div class="sure">
					<p>Är du säker på att du vill radera inlägget?</p>
					<form action="delete_comment.php" method="post">
						<input type="hidden" name="comment_id" value="<? echo $comment_id; ?>" />
						<input type="hidden" name="post_id" value="<? echo $post_id; ?>" />
						<input type="submit" name="sure" value="JA" />
						<input type="submit" name="regret" value="NEJ" />
					</form>
				</div><!-- #sure -->
				<?php
			}
		?>
	</body>
</html>