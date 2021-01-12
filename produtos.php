<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "uptstore");
	if ($conn->connect_error) {
		die('Erro na ligação : ('.$conn->connect_errno.') '.$conn->connect_error);
	}
	$tipo = $_GET['tipo'];	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Produto</title>
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
				height: 400px;
				padding: 30px;
			}
			#new-left{
				border-radius: 5px;
				padding: 10px;
				position: relative;
				width: 50%;
				left: -1%;
				top: -10%;
				height: 100%;
				background-image: url("img/logo.png");
				background-position: center;
				background-size: cover;
			}
			#new-right{
				border-radius: 5px;
				padding: 10px;
				position: relative;
				width: 50%;
				left: 1%;
				top: -2%;
				height: 100%;
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
			.wcontainer{
				position:relative;
				min-height:1px;
				padding-right:30px;
				padding-left:30px;
				float:left;
				width:20%;
				text-align: center;
				transition: .3s;
				transform: scale(1);
			}
			.wcontainer:hover{
				transition: .3s;
				transform: scale(1.1);
			}
			.wcontainer:hover .wimage {opacity: 0.7;}
			.wcontainer:hover .wmiddle {opacity: 1;}
			.wimage {
				opacity: 1;
				display: block;
				width: 100%;
				height: auto;
				transition: .5s ease;
				backface-visibility: hidden;
			}
			.wmiddle a{
				padding: 3px;
				width: 30px;
				text-decoration: none;
			}
			.wtext {
				border-radius: 5px;
				background-color: #0475C2;
				color: white;
				font-size: 12px;
				transition: .3s;
				padding: 5px;
				transform: scale(1);
				text-align: center;
			}
			.wtext:hover{
				transition: .3s;
				transform: scale(1.2);
			}
			.wmiddle img:hover{
				transition: .3s;
				transform: scale(1.2);
			}
			.wmiddle {
				transition: .5s ease;
				opacity: 0;
				position: absolute;
				display: flex;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				text-align: center;
				margin: auto;
				transition: .3s;
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
			<h2>Produtos</h2>
			<p>Confira a nossa vasta gama de produtos</p>
		</div>

		<div id="container">
			<div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 80%; margin: auto; border-radius: 5px; padding: 5px">
				<span>FILTROS</span>
				<span style="padding-left: 50px">Tipo: <select>
					<?php
						$sql1 = "SELECT tipo FROM produtos GROUP BY tipo";
						$res1 = $conn->query($sql1);
						if ($res1->num_rows > 0){
							echo "<option selected>--</option>";
							while ($row1 = $res1->fetch_assoc()){
								echo "<option style='text-transform: capitalize;'>".$row1['tipo']."</option>";
							}
						}
					?>
				</select></span>
				<span style="padding-left: 50px">Marca: <select>
					<?php
						$sql2 = "SELECT marca FROM produtos GROUP BY marca";
						$res2 = $conn->query($sql2);
						if ($res2->num_rows > 0){
							echo "<option selected>--</option>";
							while ($row2 = $res2->fetch_assoc()){
								echo "<option style='text-transform: capitalize;'>".$row2['marca']."</option>";
							}
						}
					?>
				</select></span>
				<span style="padding-left: 50px">Cor: <select>
					<?php
						$sql3 = "SELECT cor FROM produtos GROUP BY cor";
						$res3 = $conn->query($sql3);
						if ($res3->num_rows > 0){
							echo "<option selected>--</option>";
							while ($row3 = $res3->fetch_assoc()){
								echo "<option style='text-transform: capitalize;'>".$row3['cor']."</option>";
							}
						}
					?>
				</select></span>
				<span style="padding-left: 50px">Ordenar: 
					<select>
						<option>--</option>
						<option>Mais barato</option>
						<option>Mais caro</option>
						<option>Mais comprado</option>
						<option>Data</option>
					</select>
				</span>
				<span style="padding-left: 50px"><button>Aplicar</button></span>
			</div>
			<div style="padding-top: 30px;">
				<?php
					if (!empty($tipo)) {
						$sql = "SELECT * FROM produtos WHERE tipo='$tipo'";
						$res = $conn->query($sql);
						if($res->num_rows > 0){
							while($row = $res->fetch_assoc()){
								echo '
									<div class="wcontainer" style="text-align: center;">
										<img src="img/produtos/'.$row["imagem"].'.jpg" class="wimage" style="width: 300px;">
										<h3>'.$row["nome"].'</h3>
										<div class="wmiddle">
											<a href="#"><img src="img/heart.png" width="30px"></a>
											<a href="carrinho.php?add=carrinho&id='.$row["id"].'"><img src="img/cart.png" width="30px"></a>
											<a href="item.php?id='.$row["id"].'&nome='.$row["nome"].'&cor='.$row["cor"].'&marca='.$row["marca"].'&tipo='.$row["tipo"].'&preco='.$row["preco"].'&descricao='.str_replace("; ", "<br>", $row["descricao"]).'&imagem='.$row["imagem"].'" class="wtext">Ver</a>
										</div>
										<p><span style="font-size: 20px; color: #0475C2">'.$row["preco"].'€</span></p>
									</div>
								';
							}
						}
					}else{
						$sql = "SELECT * FROM produtos";
						$res = $conn->query($sql);
						if($res->num_rows > 0){
							while($row = $res->fetch_assoc()){
								echo '
									<div class="wcontainer" style="text-align: center;">
										<img src="img/produtos/'.$row["imagem"].'.jpg" class="wimage" style="width: 300px;">
										<h3>'.$row["nome"].'</h3>
										<div class="wmiddle">
											<a href="#"><img src="img/heart.png" width="30px"></a>
											<a href="carrinho.php?add=carrinho&id='.$row["id"].'"><img src="img/cart.png" width="30px"></a>
											<a href="item.php?id='.$row["id"].'&nome='.$row["nome"].'&cor='.$row["cor"].'&marca='.$row["marca"].'&tipo='.$row["tipo"].'&preco='.$row["preco"].'&descricao='.str_replace("; ", "<br>", $row["descricao"]).'&imagem='.$row["imagem"].'" class="wtext">Ver</a>
										</div>
										<p><span style="font-size: 20px; color: #0475C2">'.$row["preco"].'€</span></p>
									</div>
								';
							}
						}
					}

				?>
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

		<!--FOOTER-->
		<footer>
			<p>UPT Store © 2019. Todos os direitos reservados | by UPTS</p>
		</footer>
	</body>
</html>