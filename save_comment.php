<?php 
	include "includes/db_connect.php"; 
	session_start();
	$post_id = $_POST["post_id"];

	//Om formuläret från show_post.php ifylld gå vidare
	if(isset($_POST["comment_name"]) && isset($_POST["comment_text"]) && !empty($_POST["comment_name"]) && !empty($_POST["comment_text"]) && isset($_POST["send_comment"])) {

		//Skapar variabler med $_POST som hämtas från show_post.php
		$comment_name = $_POST["comment_name"];
		$comment_email = $_POST["comment_email"];
		$comment_website = $_POST["comment_website"];
		$comment_text = $_POST["comment_text"];
		

		$regex = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
		if (!preg_match($regex, $comment_email)) {
	     	header("Location: show_post.php?post=$post_id&error");
		}
		else {
			//Sparar kommentaren i db
			$stmt = $db_connect->stmt_init();
			$query = "INSERT INTO comments (comment_text, comment_name, comment_email, comment_website, post_id, comment_time)
			VALUES ('$comment_text', '$comment_name', '$comment_email', '$comment_website', '$post_id', NOW())";

			if($stmt->prepare($query)) {
				$stmt->execute();
				header("Location: show_post.php?post=$post_id");
			}
		}
	}
	else {
		header("Location: show_post.php?post=$post_id&empty_fields");
	}
	$db_connect->close();
?>