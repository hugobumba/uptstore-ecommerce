<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "uptstore");
	if ($conn->connect_error) {
		die('Erro na ligação : ('.$conn->connect_errno.') '.$conn->connect_error);
	}
	if (isset($_POST['entrar'])){
		$sql = "SELECT * FROM users WHERE email='".$_POST['mail']."' AND password='".$_POST['pass']."'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['valid'] = TRUE;
			$_SESSION['sessao'] = session_id();
			$_SESSION['email'] = $row['email'];
			$_SESSION['nome'] = $row['nome'];
			$_SESSION['tipo'] = $row['tipo'];
			$_SESSION['morada'] = $row['morada'];
			$_SESSION['telemovel'] = $row['telemovel'];
			header('Location: index.php');
		}else{
			header('Location: login.php');
		}
		mysqli_close($conn);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Login</title>
		<meta charset="utf-8">
		<style>
			@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
			body{
				font-family: Poppins;
				background-color: #82D5F6;
			}
			a{text-decoration: none; color: black;}
			a:hover{color: blue}
			h1{
				text-align: center;
			}
			#content{
				position: absolute;
				left: 32%;
				top: 10%;
				border-radius: 5px;
				width: 30%;
				margin: auto;
				padding: 30px;
				background-color: white;
			}
			table{
				position: center;
				margin: auto;
			}
			input{
				display: block;
				width: 200px;
				border: 0px solid grey;
				border-bottom: 1px solid grey;
				padding: 15px;
			}
			button{
				position: relative;
				left: 45%;
				top: 20px;
				border: 1px solid grey;
				border-radius: 5px;
				padding: 10px;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div id="content">
			<h1>Iniciar sessão</h1>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table>
					<tr>
						<td><label>E-mail:</label></td>
						<td><input type="text" id="mail" name="mail" placeholder="Introduza o seu e-mail" required></td>
					</tr>
					<tr>
						<td><label>Palavra-passe:</label></td>
						<td><input type="password" id="pass" name="pass" placeholder="Introduza a sua palavra-passe" required></td>
					</tr>
					<tr><td></td>
						<td><input type="checkbox" onclick="showPass();">Mostrar Palavra-passe</td>
					</tr>
					<script>
						function showPass() {
						    var x = document.getElementById("pass");
						    if (x.type === "password")
						        x.type = "text";
						    else
						        x.type = "password";
						}
					</script>
				</table>
				<button>Voltar</button>
				<button type="submit" id="entrar" name="entrar">Entrar</button>
			</form>
		</div>
	</body>
</html>