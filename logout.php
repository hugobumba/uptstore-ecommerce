<!DOCTYPE html>
<html>
	<body>
		<h1>Session Terminated</h1>
		<?php
			session_start();
			unset($_SESSION["email"]);
			$_SESSION["valid"] = FALSE;
			session_destroy();
			header('Location: index.php');
		?>
	</body>
</html>