<?php 
	include "includes/db_connect.php"; 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" /> 
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
	<body>
		<div id="wrapper">
			<?php include "includes/header2.php"; ?>

			<?php
				//Kontrollerar att användaren är inloggad och ekar ut välkomstmeddelande
				if(isset($_SESSION["status"]) && ($_SESSION["status"] == "logged_in")) {
					echo "<h2>Välkommen " . $_SESSION["first_name"] . "</h2>";
				}
			?>

			<div class="dashboard">
				<?php
					//Hämtar den aktuella användaren från login_check
					$user_id = $_SESSION["user_id"];

					if($user_id == 4) {
						//Om superadmin är inloggad hämtas alla inlägg och kommentarer
						$query = "SELECT
							blogposts.*,
							categories.*
							FROM blogposts
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							ORDER BY published_time DESC
							";

						$query2 = "SELECT 
						COUNT(comments.comment_id) AS commentCount 
						FROM blogposts
						LEFT JOIN comments ON comments.post_id = blogposts.post_id
						";
					}
					else {
						//Hämtar endast den inloggades inlägg och kommentarer
						$query = "SELECT
							blogposts.*,
							categories.*
							FROM blogposts
							LEFT JOIN categories ON blogposts.category_id = categories.category_id
							WHERE blogposts.user_id = '$user_id'
							ORDER BY published_time DESC
							";

						$query2 = "SELECT 
							COUNT(comments.comment_id) AS commentCount 
							FROM blogposts
							LEFT JOIN comments ON comments.post_id = blogposts.post_id
							WHERE blogposts.user_id = '$user_id'
							";
					}

					//Prepared statements för $query och $query2
					$stmt = $db_connect->stmt_init();
					$result = $db_connect->query($query);
					echo mysqli_error($db_connect);
					$stmt->prepare($query);
					$stmt->execute();
					$stmt->store_result();

					$stmt2 = $db_connect->stmt_init();
					$result2 = $db_connect->query($query2);
					$stmt2->prepare($query2);
					$stmt2->execute();
					
					$res = $result2->fetch_row();
					$total_comments = $res[0];
					$average = $total_comments / ($stmt->num_rows);

					//Skriver ut statistiken
				?>
				<div class="statistics">
				<? echo
					"<h3>Statistik</h3>" .
					"<p>Antal inlägg: " . ($stmt->num_rows) . "</p>" .
					"<p>Antal kommentarer: " . $total_comments . "</p>" .
					"<p>Du har i genomsnitt: " . round($average, 2) . " kommentarer på dina inlägg</p>"; ?>
				</div><!-- #statistics -->
				
				<div class="new_post">
					<h3>Nytt inlägg</h3>
					<?php
						//if-satser med meddelande om inläggen sparats
						if(isset($_GET["post_saved"])) {
							echo "<p class='success'>Inlägget har sparats</p>";
						}
						else if(isset($_GET["save_failed"])) {
							echo "<p class='message'>Något gick fel. Försök igen!</p";
						}
						else if(isset($_GET["empty_fields"])) {
							echo "<p class='message'>Fyll i rubrik och inlägg</p>";
						}
						else if(isset($_GET["edited"])) {
							echo "<p class='success'>Inlägget har redigerats</p>";
						}
						else if(isset($_GET["deleted"])) {
							echo "<p class='success'>Inlägget har raderats</p";
						}
					?>

					<!-- Formulär för att skapa nytt inlägg skickar till save_new_post -->
					<form class="form_new_post" action="save_new_post.php" method="post">
						<input type="text" placeholder="Rubrik" name="title" /><br />
						<textarea name="text" placeholder="Skriv ditt inlägg här"> 
						</textarea><br />
						<select name="categories">
							<option value="select">Välj kategori</option>
							<option value="1">Komedi</option>
							<option value="2">Drama</option>
							<option value="3">Sci-fi</option>
							<option value="4">Deckare</option> 
						</select><br />
						<input type="submit" name="published" value="Publicera" />
						<input type="submit" name="draft" value="Spara som utkast" />
					</form>
				</div><!-- #new_post -->

				<div class="user_table">
					<h3>Inlägg</h3>
					<table>
						<tr>
							<th><h4>Rubrik</h4></th>
							<th><h4>Kategori</h4></th>
							<th><h4>Datum</h4></th>
							<th><h4>Publicerad</h4></th>
							<th><h4>Redigera</h4></th>
						</tr>
						<?php
							//Skriver ut arrayen från $query plus en redigera länk som skickar till edit_post
							while($row = $result->fetch_assoc()) {
								?>
								<tr>
									<td><? echo "{$row['post_title']}"; ?></td>
									<td><? echo "{$row['category_name']}"; ?></td>
									<td><? echo "{$row['published_time']}"; ?></td>
									<td>
										<? if($row['published'] == 1) {
												echo "Ja";
											}
											else {
												echo "Nej";
											}
										?>
									</td>
									<td><a href="edit_post.php?id=<? echo "{$row['post_id']}"; ?>">Redigera</a></td>
								</tr>
								<?php
							}
							$db_connect->close();			
						?>
					</table>
				</div><!-- #user_table -->
			</div><!-- #dashboard -->
			<?php include "includes/footer.php"; ?>
		</div><!-- #wrapper -->
	</body>
</html>