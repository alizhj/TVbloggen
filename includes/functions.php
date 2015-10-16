<?php 
	/**
	*@desc hämtar alla inlägg
	*@param anslutning till db
	*@param hämtar queryn
	*@return utskrivning av inläggen
	*/
	function getPosts($db_connect, $query) {	
		$stmt = $db_connect->stmt_init();
		$result = $db_connect->query($query);
		echo mysqli_error($db_connect);
		$stmt->prepare($query);
		$stmt->execute();

		while($row = $result->fetch_assoc()) {
			?>
			<div class="blogcat_post">
				<h3><? echo "{$row['post_title']}"; ?></h3>
				<p><? echo "{$row['post_text']}"; ?></p>
				<p>Skapad: <? echo "{$row['published_time']}"; ?><br />
					Av <? echo "{$row['first_name']} " . "{$row['last_name']}"; ?></p>
				<a href="show_post.php?post=<? echo "{$row['post_id']}"; ?>">Kommentera</a><br />
				<a href="show_post.php?post=<? echo "{$row['post_id']}"; ?>">Visa kommentarer(<? echo "{$row['commentCount']}"?>)</a>
			</div><!-- #blogcat_post -->
			<?php
		}
	}
?>