<?php 
	include "includes/db_connect.php";  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Redigera inlägg</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
	<body>
		<div id="wrapper">
			<?php include "includes/header2.php"; ?>
			<div class="edit_post">

				<?php
					//Om användaren valt att redigera ett inlägg, hämtas inlägget och användaren ges möjlighet att redigera/radera/spara som utkast
					if(isset($_GET["id"])) { //GET hämtar från dashboard
						
						$post_id = (int)$_GET["id"];

						$query = "SELECT * FROM blogposts WHERE post_id = '$post_id'";

						$stmt = $db_connect->stmt_init();
						$result = $db_connect->query($query);
						echo mysqli_error($db_connect);
						$stmt->prepare($query);
						$stmt->execute();

						while($row = $result->fetch_assoc()) {
							//Formulär där användaren kan redigera inlägget
							?>
							<form class="form_new_post" action="edit_data.php" method="post">
								<input type="hidden" name="post_id" value="<? echo "{$row['post_id']}"?>" />
								<input type="text" name="title" value="<? echo "{$row['post_title']}"?>" /><br />
								<textarea name="text" cols="100" rows="30">
									<? echo "{$row['post_text']}"?>
								</textarea><br />
								<select name="categories">
									<option value="Select">Välj kategori</option>
									<option value="1">Komedi</option>
									<option value="2">Drama</option>
									<option value="3">Sci-fi</option>
									<option value="4">Deckare</option>
								</select><br />
								<input type="submit" name="edit" value="Publicera" />
								<input type="submit" name="draft" value="Spara som utkast" />
								<input type="submit" name="delete" value="Ta bort" />
							</form>
						<?php
						}
					}
					$db_connect->close();
				?>
			</div><!-- #edit_post -->
		</div>
	</body>
</html>