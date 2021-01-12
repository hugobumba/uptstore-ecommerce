<?php
	session_start();
		if(isset($_POST['aguardar'])){
		$con = new mysqli("localhost", "root", "", "uptstore");
		$nome = $_POST["anome"];
		$mail = $_POST["amail"];
		$tel = $_POST["atel"];
		$morada = $_POST["amorada"];
		$pass = $_POST["apass"];
		$sql = "INSERT INTO users (nome, email, telemovel, morada, password) VALUES ('$anome', $atel, '$amail', '$amorada', '$apass')";
		if ($con->query($sql) == TRUE) {
			echo "<script>alert('ALTERAÇÕES GUARDADAS COM SUCESSO!')</script>";
		}else{
			echo "<script>alert('OCORREU UM ERRO!')</script>";
		}
		$con->close();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Perfil</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="dw_img/dw_logo1.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="dw_serv_css.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<style>
			@import url('https://fonts.googleapis.com/css?family=Poppins:300');
			*{font-family: Poppins;}
			input[type=text], input[type=submit]{
				width: 100%;
				margin: 8px 0;
				padding: 10px;
				border-radius: 4px;
				font-family: Poppins;
				display: inline-block;
				box-sizing: border-box;
				border: 1px solid black;
			}
			input[type=text]{
				padding: 20px;
				font-size: 20px;
			}
			table{
				padding: 50px;
				border-radius: 10px;
				background-color: white;
				border: 1px solid black;
			}
			textarea{
				width: 100%;
				resize: none;
			    resize: none;
			    height: 200px;
			    padding: 70px;
				font-size: 20px;
			    border-radius: 4px;
				font-family: Poppins;
			    box-sizing: border-box;
			    border: 1px solid black;
			}
			input[type=submit]{
			    color: white;
			    border: none;
			    margin: 8px 0;
			    padding: 14px 20px;
			    border-radius: 4px;
			    border: 1px dotted black;
			    background-color: #2E64FE;
			}
			input[type=submit]:hover{
			    background-color: White;
			    border: 1px solid #2E64FE;
			    color: #2E64FE;
			}
			h1, h6{
				text-align: center;
			}
			body{
				font-family: Poppins;
				background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('dw_img/646.jpg');
			    background-size: cover;
			    background-position: center;
			    background-repeat: no-repeat;
			    background-attachment: scroll;
			}
			input[type=submit], input[type=file], input[type=text], select{
			    width: 100%;
			    margin: 8px 0;
			    padding: 12px 20px;
			    border-radius: 4px;
			    display: inline-block;
			    border: 1px solid #ccc;
			    box-sizing: border-box;
			}
			textarea{
			    width: 100%;
			    padding: 12px;
			    border: 1px solid #ccc;
			    border-radius: 10px;
			    box-sizing: border-box;
			    margin-top: 6px;
			    margin-bottom: 16px;
			    resize: none;
			}
			.loader {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(dw_img/Preloader_6.gif) center no-repeat #fff;
			}
			.button {
				color: black;
				text-align: center;
				font-size: 30px;
				padding: 10px;
				width: 100px;
				transition: all 0.5s;
			}
			.button a{text-decoration: none;}
			.button span {
				cursor: pointer;
				display: inline-block;
				position: relative;
				transition: 0.5s;
			}
			.button span:after {
				content: '\00AB';
				position: absolute;
				opacity: 0;
				top: 0;
				left: -10px;
				transition: 0.5s;
			}
			a{text-decoration:none;}
			.button:after{content:'Perfil';}
			.button:hover:after{content:'Voltar'; color: #2481BA;}
			.button:hover span {padding-left: 10px; color: #2481BA;}
			.button:hover span:after {
				opacity: 1;
				left: 0;
			}
			h1{text-align:center;}
			.button1 {
				color: black;
				text-align: center;
				font-size: 30px;
				padding: 10px;
				width: 100px;
				transition: all 0.5s;
			}
			.button1 a{text-decoration: none;}
			.button1 span {
				cursor: pointer;
				display: inline-block;
				position: relative;
				transition: 0.5s;
			}
			.button1 span:after {
				content: '\00AB';
				position: absolute;
				opacity: 0;
				top: 0;
				left: -10px;
				transition: 0.5s;
			}
			a{text-decoration:none;}
			.button1:after{content:'Alterar Serviço';}
			.button1:hover:after{content:'Voltar'; color: #2481BA;}
			.button1:hover span {padding-left: 10px; color: #2481BA;}
			.button1:hover span:after {
				opacity: 1;
				left: 0;
			}
		</style>
	</head>
		<form method="post" action="">
			<table style="margin: auto;">
				<th colspan="2"><h1><a class="button" href="index.php"></a></h1></th>
				<tr>
					<td>Nome:</td>
					<td><input type="text" name="anome" id="anome" value="<?php echo ($_SESSION['nome']) ?>"></td>
				</tr>
				<tr>
					<td>E-mail:</td>
					<td><input type="text" name="amail" id="amail" value="<?php echo ($_SESSION['email']) ?>" disabled></td>
				</tr>
				<tr>
					<td>Telemóvel:</td>
					<td><input type="text" name="atel" id="atel" value="<?php echo ($_SESSION['telemovel']) ?>"></td>
				</tr>
				<tr>
					<td>Morada:</td>
					<td><input type="text" name="amorada" id="amorada" value="<?php echo ($_SESSION['morada']) ?>"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="text" name="apass" id="apass"></td>
				</tr>
				<tr>
					<td></td>
					<td><button id="aguardar" name="aguardar">Guardar</button></td>
				</tr>
			</table>
		</form>
	</body>
</html>