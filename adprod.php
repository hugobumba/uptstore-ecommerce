<?php
	if(isset($_POST['add'])){
		$con = new mysqli("localhost", "root", "", "uptstore");
		if ($con->connect_error){
			die('Erro na ligação : ('.$con->connect_errno.') '.$con->connect_error);
		}
		$nome = $_POST["nome"];
		$marca = $_POST["marca"];
		$tipo = $_POST["tipo"];
		$cor = $_POST["cor"];
		$preco = $_POST['preco'];
		$desc = $_POST["desc"];
		$foto = $_FILES["foto"]; 
		if(!empty($foto["name"])){
			$img = time();
			$caminho_imagem = "img/produtos/".$img.".jpg";
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);	
			$sql = "INSERT INTO produtos (nome, marca, tipo, cor, preco, descricao, imagem) VALUES ('$nome', '$marca', '$tipo', '$cor', $preco, '$desc', '$img')";
			if ($con->query($sql) == TRUE) {
				echo "<script>alert('SERVIÇO ADICIONADO COM SUCESSO!')</script>";
			}else{
				echo "<script>alert('OCORREU UM ERRO!')</script>";
			}
		}
		$con->close();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Adicionar</title>
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
			.button:after{content:'Adicionar Produto';}
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
		<form method="post" action="" enctype="multipart/form-data">
			<table style="margin: auto;">
				<th style="padding-bottom: 50px" colspan="2"><h1><a class="button" href="index.php"></a></h1></th>
				<tr>
					<td><input type="text" id="nome" name="nome" required placeholder="Nome:"></td>
				</tr>
				<tr>
					<td><input type="text" id="marca" name="marca" required placeholder="Marca:"></td>
				</tr>
				<tr>
					<td><select id="tipo" name="tipo">
						<option value="#">Tipo</option>
						<option value="telemovel">Telemóvel</option>
						<option value="smartwatch">Smartwatch</option>
						<option value="auricular">Auriculares</option>
						<option value="acessorio">Acessório</option>
					</select></td>
				</tr>
				<tr>
					<td><input type="text" id="cor" name="cor" required placeholder="Cor:"></td>
				</tr>
				<tr>
					<td><textarea type="text" id="desc" name="desc" required placeholder="Descrição do produto"></textarea></td>
				</tr>
				<tr>
					<td><input type="file" id="foto" name="foto" required></td>
				</tr>
				<tr>
					<td><input type="text" id="preco" name="preco" required placeholder="Preço:"></td>
				</tr>
				<td><input type="submit" name="add" id="add"></td>
			</table>
		</form>
	</body>
</html>