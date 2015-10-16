<div class="footer">
	<p class="copyright"><small>&copy;LED</small></p>
	<div id="login">
		<?php
			//Felmeddelande om användaren skrivit fel lösen eller användarnamn
			if(isset($_GET["unknown"])) {
				echo "<p class='message'>Du har skrivit fel email eller lösenord, var god försök igen</p>";
			}
		?>

		<?php
			//Kontrollerar om inloggad användare
			if(isset($_SESSION["status"]) && ($_SESSION["status"] == "logged_in")) {
				?>
				<form action="logout.php" method="post">
					<input type="submit" name="logout" value="Logga ut" />
				</form>
				<?php
			}
			else {
				?>
				<form action="login_check.php" method="post">
					<div name="login"></div> 
					<input type="text" placeholder="E-post" name="email" />
					<input type="password" placeholder="Lösenord" name="password" />
					<input type="submit" name="login" value="Logga in" />
				</form>	
				<?php
			}
		?>
	</div><!-- #login -->
</div><!-- #footer -->