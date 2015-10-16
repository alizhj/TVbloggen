<?php
	include "includes/db_connect.php";  
	session_start();

	$stmt = $db_connect->stmt_init();
	//Skapar variabler med $_POST och $_SESSION som hämtas från dashboard.php
	$title = $_POST["title"];
	$text = $_POST["text"];
	$category_id = (int)$_POST["categories"];
	$user_id = $_SESSION["user_id"];

	//Om formuläret är ifylld och användaren vill publicera
	if(isset($_POST["title"]) && isset($_POST["text"]) && isset($_POST["categories"]) && !empty($_POST["title"]) && !empty($_POST["text"]) && !empty($_POST["categories"]) && isset($_POST["published"])) {

		//Publicera inlägg och koppla till category id
		$query = "INSERT INTO blogposts (user_id, post_title, post_text, published_time, category_id, published)
		VALUES ('$user_id', '$title', '$text', NOW(), '$category_id', '1')";

		if($stmt->prepare($query)) {
			$stmt->execute();
			header("Location: dashboard.php?post_saved");
		}
		else {
			header("Location: dashboard.php?save_failed");
		}
	}
	//Om formuläret är ifylld och användaren vill spara som utkast
	else if(isset($_POST["title"]) && isset($_POST["text"]) && isset($_POST["categories"]) && !empty($_POST["title"]) && !empty($_POST["text"]) && !empty($_POST["categories"]) && isset($_POST["draft"])) {

		//Spara inlägg som utkast och koppla till category id 
		$query = "INSERT INTO blogposts (user_id, post_title, post_text, published_time, category_id, published)
		VALUES ('$user_id', '$title', '$text', NOW(), '$category_id', '0')";

		if($stmt->prepare($query)) {
			$stmt->execute();
			header("Location: dashboard.php?post_saved");
		}
		else {
			header("Location: dashboard.php?save_failed");
		}
	}
	//Om man inte fyllt i alla fält skickas tillbaka till dashboard.php
	else {
		header("Location: dashboard.php?empty_fields");
	}
	$db_connect->close();
?>
