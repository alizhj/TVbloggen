<div class="header">
	<div id="logo">
		<h1><a href="index.php">TVBloggen</a></h1>
	</div><!-- #logo -->

	<?php
		if(isset($_SESSION["status"]) && ($_SESSION["status"] == "logged_in")) {
			?>
			<div class="nav_admin">
				<ul id="menu">
					<li><a href="index.php">Hem</a></li>

					<li><a href="#">Bloggare ￬</a>
						<ul class="hidden">
							<li><a href="bloggers.php?blog=1&desc">Diana</a></li>
							<li><a href="bloggers.php?blog=2&desc">Erik</a></li>
							<li><a href="bloggers.php?blog=3&desc">Lisa</a></li>
						</ul>
					</li>

					<li><a href="#">Kategorier ￬</a>
						<ul class="hidden">
							<li><a href="categories.php?category=1&desc">Komedi</a></li>
							<li><a href="categories.php?category=2&desc">Drama</a></li>
							<li><a href="categories.php?category=3&desc">Sci-fi</a></li>
							<li><a href="categories.php?category=4&desc">Deckare</a></li>
						</ul>
					</li>

					<li><a href="#">Arkiv ￬</a>
						<ul class="hidden">
							<?php 
								$stmt = $db_connect->stmt_init();

								//Hämtar månader där det finns inlägg skrivna
								$query = "SELECT 
									MONTH(published_time) as monthnumber,
									MONTHNAME(published_time) as monthname
									FROM blogposts
									GROUP BY MONTH(published_time)
									";

								$result = $db_connect->query($query);
								echo mysqli_error($db_connect);
								$stmt->prepare($query);
								$stmt->execute();

								while($row = $result->fetch_assoc()) {
								//Länk till de månaderna som har inlägg. Skickar till archive.php
								?>
								<li><a href="archive.php?month=<? echo "{$row['monthnumber']}"; ?>&desc"><? echo "{$row['monthname']}"; ?></a></li>
								<?
								}
								$stmt->close();
							?>
						</ul>
					</li>
					<li><a href="dashboard.php">Dashboard</a></li>
				</ul><!-- #ul menu -->
			</div><!-- #nav_admin -->
			<?php
		} 
		else {
			?>
			<div class="nav_guest">
				<ul id="menu">
					<li><a href="index.php">Hem</a></li>

					<li><a href="#">Bloggare ￬</a>
						<ul class="hidden">
							<li><a href="bloggers.php?blog=1&desc">Diana</a></li>
							<li><a href="bloggers.php?blog=2&desc">Erik</a></li>
							<li><a href="bloggers.php?blog=3&desc">Lisa</a></li>
						</ul>
					</li>

					<li><a href="#">Kategorier ￬</a>
						<ul class="hidden">
							<li><a href="categories.php?category=1&desc">Komedi</a></li>
							<li><a href="categories.php?category=2&desc">Drama</a></li>
							<li><a href="categories.php?category=3&desc">Sci-fi</a></li>
							<li><a href="categories.php?category=4&desc">Deckare</a></li>
						</ul>
					</li>

					<li><a href="#">Arkiv ￬</a>
						<ul class="hidden">
							<?php 
								$stmt = $db_connect->stmt_init();

								//Hämtar månader där det finns inlägg skrivna
								$query = "SELECT 
									MONTH(published_time) as monthnumber,
									MONTHNAME(published_time) as monthname
									FROM blogposts
									GROUP BY MONTH(published_time)
									";

								$result = $db_connect->query($query);
								echo mysqli_error($db_connect);
								$stmt->prepare($query);
								$stmt->execute();

								while($row = $result->fetch_assoc()) {
								//Länk till de månaderna som har inlägg. Skickar till archive.php
								?>
								<li><a href="archive.php?month=<? echo "{$row['monthnumber']}"; ?>&desc"><? echo "{$row['monthname']}"; ?></a></li>
								<?
								}
								$stmt->close();
							?>
						</ul>
					</li>
				</ul><!-- #ul menu -->
			</div><!-- #nav_guest -->
			<?php
		}
	?>
</div><!-- #header -->
<div class="clearfix"></div>
