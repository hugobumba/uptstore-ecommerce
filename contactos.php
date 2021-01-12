<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Contactos</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="myjs.js"></script>
		<link rel="stylesheet" type="text/css" href="./slick/slick.css">
	    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
	    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
	    <style>
	    	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
			body{
				margin: auto;
				font-family: Poppins;
			}
			header{
				width: 100%;
				height: 500px;
				background-image: url("img/pic9.jpg");/*back7; img2,3,7,9; pic1,9*/
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			nav{
				background-color: rgba(255,255,255,0);
				position: absolute;
				width: 100%;
				z-index: 2;
			}
			nav a{
				text-decoration: none;
				color: black;
				transition: 0.3s;
			}
			nav a:hover{
				color:#0475C2;
				transition: 0.3s;
			}
			.dropdown {
				position: relative;
				display: inline-block;
			}
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #f9f9f9;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				padding: 12px 16px;
				z-index: 1;
				border-radius: 5px;
			}
			.dropdown:hover .dropdown-content {display: block;}
			#logo{
				position: relative;
				left: 0;
			}
			#logo img{
				width: 35px;
				height: 35px;
			}
			.navbar{
				position: relative;
				left: 15%;
			}
			nav li{
				display: inline;
				padding-left: 15px;
				padding-right: 15px;
			}
			#user, #counters{
				position: relative;
				left: 40%;
			}
			#counters a{padding: 5px;}
			#counters img{
				width: 20px;
				height: 20px;
			}
			#user img{
				width: 20px;
				height: 20px;
			}
			#pagename{
				position: absolute;
				top: 25%;
				left: 40%;
				text-align: center;
				font-size: 20px;
			}
			.title{
				width: 50%;
				text-align: left;
				padding-top: 40px;
				position: relative;
				left: 5%;
			}
			.title p{color: grey;}
			#new{
				display: flex;
			}
			#new-left{
				margin: auto;
				font-size: 17px;
			}
			#new-right{
				margin: auto;
			}
			#links{
				width: 100%;
				background-color: #C0C0C0;
			}
			#link{
				margin: auto;
				text-align: left;
				font-size: 13px;
			}
			#link img{width: 300px;}
			#link li{display: block;}
			#link h3{text-align: center;}
			#link a{
				text-decoration: none;
				color: black;
				transition: 0.3s;
			}
			#link a:hover{
				color: #0475C2;
				transition: 0.3s;
			}
			footer{
				background-color: #1B1B1B;
				padding: 5px;
			}
			footer p{
				text-align: center;
				color: white;
			}
			.row{display: flex;}
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
		<header>
			<nav id="nav">
				<ul id="menu">
					<li id="logo"><img src="img/upt.png"></li>
					<li class="navbar"><a href="index.php">Home</a></li>
					<li class="navbar dropdown"><a href="produtos.php?tipo=">Produtos</a>
						<ul class="dropdown-content">
							<li><a href="produtos.php?tipo=telemovel">Smartphones</a></li>
							<li><a href="produtos.php?tipo=auricular">Auriculares</a></li>
							<li><a href="produtos.php?tipo=smartwatch">Smartwatches</a></li>
							<li><a href="produtos.php?tipo=acessorio">Acessórios</a></li>
						</ul>
					</li>
					<li class="navbar"><a href="contactos.php">Contactos</a></li>
					<li class="navbar"><a href="sobre.php">Sobre</a></li>
					<li id="counters">
						<a href="favoritos.php"><img src="img/heart.png"></a>
						<a href="carrinho.php"><img src="img/cart.png"></a>
					</li>
					<?php
						if (isset($_SESSION['email']) && $_SESSION['valid'] == TRUE) {
							if($_SESSION['tipo'] == 'admin'){
								echo '<li id="user" class="dropdown"><img src="img/user.png"><a href="produtos.php">'.$_SESSION["nome"].'</a>
									<ul class="dropdown-content">
										<li><a href="perfil.php">Perfil</a></li>
										<li><a href="admin.php?tipo=">Administração</a></li>
										<li><a href="adprod.php">Adicionar Item</a></li>
										<li><a href="logout.php">Sair</a></li>
									</ul>
								</li>';
							}else{
								echo '<li id="user" class="dropdown"><img src="img/user.png"><a href="produtos.php">'.$_SESSION["nome"].'</a>
									<ul class="dropdown-content">
										<li><a href="perfil.php">Perfil</a></li>
										<li><a href="favoritos.php">Favoritos</a></li>
										<li><a href="carrinho.php">Carrinho</a></li>
										<li><a href="logout.php">Sair</a></li>
									</ul>
								</li>';
							}
						}else{
							echo '<li id="user"><img src="img/user.png"><a href="login.php">Login</a>|<a href="registo.php">Registo</a></li>';
						}
					?>
				</ul>
			</nav>
			<div id="pagename">
				<h1>UPT Store</h1>
				<p>Todos amamos Tecnologia.</p>
			</div>
		</header>

		<div class="title">
			<h2>Contactos</h2>
			<p>Contacte-nos ou deixe-no contactá-lo</p>
		</div>

		<section id="new">
			<div id="new-left">
				<p><b>Telemóvel:</b> +351 912 345 678 / +351 934 987 654</p>
				<p><b>Telefone:</b> +351 222 987 654 / +351 223 919 001</p>
				<p><b>E-mail:</b> geral@upts.pt / suporte@upts.pt</p>
				<p><b>Morada:</b> R. Dr. António Bernardino de Almeida 541</p>
			</div>
			<div id="new-right">
				<form>
					<table>
						<tr>
							<td><label>Nome:</label></td>
							<td><input type="text" id="nome" placeholder="Introduza o seu nome"></td>
						</tr>
						<tr>
							<td><label>Apelido:</label></td>
							<td><input type="text" id="sobrenome" placeholder="Introduza o seu sobrenome"></td>
						</tr>
						<tr>
							<td><label>E-mail:</label></td>
							<td><input type="text" id="mail" placeholder="Introduza o seu e-mail"></td>
						</tr>
						<tr>
							<td><label>Telemóvel:</label></td>
							<td><input type="text" id="password" placeholder="Introduza a sua palavra-passe"></td>
						</tr>
					</table>
					<button>Enviar</button>
				</form>
			</div>
		</section>

		<!--LINKS-->
		<div id="links" class="row">
			<div id="link">
				<h3>UPT Store</h3>
				<img src="img/logo.png">
			</div>
			<div id="link">
				<h3>Links Úteis</h3>
				<ul>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
				</ul>
			</div>
			<div id="link">
				<h3>Informações importantes</h3>
				<ul>
					<li><a href="#">Informação</a></li>
					<li><a href="#">Informação</a></li>
					<li><a href="#">Informação</a></li>
					<li><a href="#">Informação</a></li>
					<li><a href="#">Informação</a></li>
				</ul>
			</div>
			<div id="link">
				<h3>Serviços</h3>
				<ul>
					<li><a href="#">Serviço</a></li>
					<li><a href="#">Serviço</a></li>
					<li><a href="#">Serviço</a></li>
					<li><a href="#">Serviço</a></li>
					<li><a href="#">Serviço</a></li>
				</ul>
			</div>
		</div>

		<!--FOOTER-->
		<footer>
			<p>UPT Store © 2019. Todos os direitos reservados | by UPTS</p>
		</footer>
	</body>
</html>