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
		<div id="wrapper">
			<?php
				//Skapar variabler som hämtats från edit_post formuläret i edit_post.php
				$stmt = $db_connect->stmt_init();
				$title = $_POST["title"];
				$text = $_POST["text"];
				$post_id = $_POST["post_id"];
				$category_id = (int)$_POST["categories"];

				//Query för att uppdatera OCH publicera ett redigerat inlägg i db
				if(isset($_POST["edit"])) {
					
					$query = "UPDATE blogposts 
						SET post_title = '$title', post_text = '$text', published_time = NOW(), category_id = '$category_id', published = '1'
						WHERE post_id = '$post_id'";

					if($stmt->prepare($query)) { 
						$stmt->execute();
						header("Location: dashboard.php?edited");
					}
					else {
						header("Location: dashboard.php?save_failed");
					}
				}
				//Query för att uppdatera OCH spara ett redigerat inlägg som utkast idb
				else if(isset($_POST["draft"])) {
					
					$query = "UPDATE blogposts 
						SET post_title = '$title', post_text = '$text', published_time = NOW(), category_id = '$category_id', published = '0'
						WHERE post_id = '$post_id'";

					if($stmt->prepare($query)) { 
						$stmt->execute();
						header("Location: dashboard.php?edited");
					}
					else {
						header("Location: dashboard.php?save_failed");
					}
				}
				
				//Query för att ta bort ett valt inlägg
				if(isset($_POST["sure"])) {

					$query = "DELETE FROM blogposts WHERE post_id = '$post_id'";

					if($stmt->prepare($query)) { 
						$stmt->execute();
						header("Location: dashboard.php?deleted");
					}
					else {
						header("Location: dashboard.php?save_failed");
					}
				}
				else if(isset($_POST["regret"])) {
					header("Location: dashboard.php");
				}
				else if(isset($_POST["delete"])) {
					//Kontrollerar om man verkligen vill ta bort inlägget
					?>
					<div class="sure">
						<p>Är du säker på att du vill radera inlägget?</p>
						<form class=" edit_data" action="edit_data.php" method="post">
							<input type="hidden" name="post_id" value="<? echo $post_id?>" />
							<input type="submit" name="sure" value="JA" />
							<input type="submit" name="regret" value="NEJ" />
						</form>
					</div><!-- #sure -->
					<?php
				}
				$db_connect->close();
			?>
		</div><!-- #wrapper -->
	</body>
</html>