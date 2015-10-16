<?php
	include "includes/db_connect.php"; 
	session_start();

	//Om man har klickat på logga in knappen, kontrollera mot db
	if(isset($_POST["login"])) {
		//Initiering av variabler
		$stmt = $db_connect->stmt_init();
		$email = $_POST["email"];
		$password = $_POST["password"];

		$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

		//Om queryn stämmer, utför frågan
		if($stmt->prepare($query)) {
		 	$stmt->execute();
		 	$stmt->store_result();

		 	//Om uppgifterna finns i en rad i db, skapa sessions
		 	if($stmt->num_rows == 1) {
		 		$_SESSION["status"] = "logged_in";
		 		$stmt->bind_result($user_id, $first_name, $last_name, $email, $password, $website);
		 		mysqli_stmt_fetch($stmt);
		 		
		 		$_SESSION["user_id"] = $user_id;
		 		$_SESSION["first_name"] = $first_name;
		 		header("Location: dashboard.php");
		 	}
		 	else {
			header("Location: index.php?unknown=unknown#login");
			}
		}
	}
	$db_connect->close();
?>