<?php
	session_start();
	$id = $_GET["id"];
	$nome = $_GET["nome"];
	$marca = $_GET["marca"];
	$cor = $_GET["cor"];
	$tipo = $_GET["tipo"];
	$preco = $_GET["preco"];
	$img = $_GET["imagem"];
	$desc = str_replace(", ", "<br>", $_GET["descricao"]);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Item</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
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
			.compras {
				border: 1px solid black;
				width: 60%;
				background: white;
				box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
				border-radius: 5px;
				display: flex;
				flex-direction: column;
				margin: auto;
			}
			.xtitle {
				border-bottom: 1px solid black;
				padding: 10px;
				color: #5E6977;
				font-size: 20px;
			}
			.item {
				padding: 20px;
				display: flex;
				border-bottom: 1px solid #E1E8EE;
			}
			.xbuttons {
				position: relative;
				padding-top: 30px;
				margin-right: 60px;
			}
			.xdelete-btn {
				display: inline-block;
				cursor: pointer;
				width: 20px;
				height: 17px;
				background: url("img/delete-icn.svg") no-repeat center;
				margin-right: 20px;
			}
			.gosto {
				position: absolute;
				top: 9px;
				left: 15px;
				display: inline-block;
				background: url('img/twitter-heart.png');
				width: 60px;
				height: 60px;
				background-size: 2900%;
				background-repeat: no-repeat;
				cursor: pointer;
			}
			.xis-active {
				animation-name: animate;
				animation-duration: .8s;
				animation-iteration-count: 1;
				animation-timing-function: steps(28);
				animation-fill-mode: forwards;
			}
			.ximage {margin-right: 50px;}
			.xdescription {
				padding-top: 10px;
				margin-right: 60px;
				width: 115px;
			}
			.xdescription span {
				display: block;
				font-size: 14px;
				color: #43484D;
			}
			.xdescription span:first-child {margin-bottom: 5px;}
			.xdescription span:last-child {
				margin-top: 10px;
				color: #86939E;
			}
			.xquantity {
				padding-top: 20px;
				margin-right: 60px;
			}
			.xquantity input {
				border: none;
				text-align: center;
				width: 30px;
				font-size: 15px;
				color: #43484D;
			}
			button[class*=btn] {
				width: 30px;
				height: 30px;
				background-color: #E1E8EE;
				border-radius: 6px;
				border: none;
				cursor: pointer;
			}
			.xminus-btn img { margin-bottom: 3px;}
			.xplus-btn img { margin-top: 2px;}
			button:focus, input:focus {outline:0;}
			.xtotal-price {
				width: 83px;
				padding-top: 27px;
				text-align: center;
				font-size: 15px;
				color: #43484D;
			}
			#container{
				display: flex;
				padding-bottom: 100px;
			}
			#sumario{
				margin: auto;
				height: 230px;
				top: 0;
				border-radius: 5px;
				width: 30%;
				position: relative;
				border: 1px solid black;
				padding: 10px;
			}
			#check-btn{
				color: white;
				position: relative;
				text-align: center;
				font-size: 14px;
				padding: 5px;
				transition: .3s;
				width: 30%;
				border-radius: 5px;
				background-color: #0475C2;
			}
			#check-btn:hover{
				background-color: black;
				transition: .3s;
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
		<div id="container">
			<div style="width: 50%;">
				<div style="position: relative; left: 15%;">
					<img src="img/produtos/<?php echo $img; ?>.jpg" style="width: 500px;">
					<h1>Descrição</h1>
					<p><?php echo $desc; ?></p>
				</div>
			</div>
			<div style="width: 50%;">
				<div style="position: relative; top: 10%;">
					<h1>Detalhes do artigo</h1>
					<table>
						<tr>
							<td><b>Código:</b></td>
							<td><?php echo $id; ?></td>
						</tr>
						<tr>
							<td><b>Nome:</b></td>
							<td><?php echo $nome; ?></td>
						</tr>
						<tr>
							<td><b>Cor:</b></td>
							<td><?php echo $cor; ?></td>
						</tr>
						<tr>
							<td><b>Marca:</b></td>
							<td><?php echo $marca; ?></td>
						</tr>
						<tr>
							<td><b>Tipo:</b></td>
							<td><?php echo $tipo; ?></td>
						</tr>
						<tr>
							<td><b>Preço:</b></td>
							<td><?php echo number_format($preco,2,',','.'); ?>€</td>
						</tr>
					</table>
					<div id="check-btn"><a href="#" style="color: white;">Adicionar aos Favoritos</a></div><br>
					<div id="check-btn"><a href="#" style="color: white;">Adicionar ao Carrinho</a></div>
				</div>
			</div>
		</div>

		<!--LINKS-->
		<div id="links" class="row">
			<div id="link">
				<h3>UPT Store</h3>
				<img src="img/logo.png">
			</div>
			<div id="link">
				<h3>Links</h3>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Produtos</a></li>
					<li><a href="#">Contactos</a></li>
					<li><a href="#">Sobre</a></li>
					<li><a href="#">&nbsp;</a></li>
					<li><a href="#">&nbsp;</a></li>
				</ul>
			</div>
			<div id="link">
				<h3>Informações</h3>
				<ul>
					<li><a href="#">Mapa do site</a></li>
					<li><a href="#">Legal</a></li>
					<li><a href="#">Reembolsos</a></li>
					<li><a href="#">Termos de uso</a></li>
					<li><a href="#">Política de privacidade</a></li>
					<li><a href="#">&nbsp;</a></li>
				</ul>
			</div>
			<div id="link">
				<h3>Serviços</h3>
				<ul>
					<li><a href="#">Pagamentos</a></li>
					<li><a href="#">Suporte</a></li>
					<li><a href="#">Entregas</a></li>
					<li><a href="#">&nbsp;</a></li>
					<li><a href="#">&nbsp;</a></li>
					<li><a href="#">&nbsp;</a></li>
				</ul>
			</div>
		</div>		
		<footer>
			<p>UPT Store © 2019. Todos os direitos reservados | by UPTS</p>
		</footer>
	</body>
</html>