<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "uptstore");
	if ($conn->connect_error) {
		die('Erro na ligação : ('.$conn->connect_errno.') '.$conn->connect_error);
	}

	#REGISTO
	if (isset($_POST['reg'])){
	    $nome = str_replace(" ", "+", $_POST['nome']);
	    $mail = $_POST['regmail'];
	    $tel = $_POST['tel'];
	    $morada = $_POST['morada'];
	    $pass = $_POST['regpass'];
	    $pass2 = $_POST['pass2'];
		if($pass == $pass2){
			$sql = "INSERT INTO users (nome, email, telemovel, morada, password, tipo) VALUES ('$nome', '$mail', '$tel', '$morada', '$pass', 'cliente')";
    		if (($conn->query($sql) == TRUE)){
    			header('Location: login.php');
    		}
    	}
		mysqli_close($conn);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Registo</title>
		<meta charset="utf-8">
		<style>
			@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
			body{
				font-family: Poppins;
				background-color: #82D5F6;
			}
			h1{
				text-align: center;
			}
			#content{
				position: absolute;
				left: 23%;
				top: 10%;
				border-radius: 5px;
				width: 50%;
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
			<h1>Registo</h1>
			<form method="post" action="">
				<table>
					<tr>
						<td><label>Nome:</label></td>
						<td><input type="text" required id="nome" name="nome" placeholder="Introduza o seu nome"></td>
					</tr>
					<tr>
						<td><label>E-mail:</label></td>
						<td><input type="text" required id="regmail" name="regmail" placeholder="Introduza o seu e-mail"></td>
					</tr>
					<tr>
						<td><label>Telemóvel:</label></td>
						<td><input type="text" required id="tel" name="tel" placeholder="Introduza o seu telemóvel"></td>
					</tr>
					<tr>
						<td><label>Morada:</label></td>
						<td><input type="text" required id="morada" name="morada" placeholder="Introduza a sua morada"></td>
					</tr>
					<tr>
						<td><label>Palavra-passe:</label></td>
						<td><input type="text" required id="regpass" name="regpass" placeholder="Introduza a sua palavra-passe"></td>
					</tr>
					<tr>
						<td><label>Confirmar Palavra-passe:</label></td>
						<td><input type="text" required id="pass2" name="pass2" placeholder="Confirme a sua palavra-passe"></td>
					</tr>
				</table>
				<button>Voltar</button>
				<button id="reg" name="reg">Registar-se</button>
			</form>
		</div>
	</body>
</html>