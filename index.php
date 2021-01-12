<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "uptstore");
	if ($conn->connect_error) {
		die('Erro na ligação : ('.$conn->connect_errno.') '.$conn->connect_error);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPT Store</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="myjs.js"></script>
	    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
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

		<!--CARACTERÍSITCAS-->
		<section id="features">
			<div id="feat">
				<img src="img/payment.png">
				<h2>Pagamento Seguro</h2>
				<p>Pgamentos com camadas de seguranças reforçada.</p>
			</div>
			<div id="feat">
				<img src="img/support.png">
				<h2>Suporte Online</h2>
				<p>Contacte-nos à qualquer momento e onde estiver.</p>
			</div>
			<div id="feat">
				<img src="img/delivery.png">
				<h2>Entregas Grátis</h2>
				<p>Entregas gratuitas nas primeiras encomendas.</p>
			</div>
		</section>

		<!--PROMO-->
		<section id="promo">
			<div id="left">
				<h1>Diga olá ao mais novo membro da família.</h1>
				<h2>Smartphone sX.<br>512 GB.<br>HDR Screen.<br>Dual Camera 20 MP.
				</h2>
				<p id="price">Desde 1099€</p>
			</div>
			<div id="right">
				<a id="pay" class="hidden" href="#"><span>Comprar</span></a>
				<a id="details" class="hidden" href="#"><span>Detalhes</span></a>

			</div>
		</section>
		
		<!--PRODUTOS-->
		<section style="position: relative; top: -100px;">
			<div class="title">
				<h2>Produtos</h2>
				<p>A nossa variedade de produtos disponíveis</p>
			</div>
			<div class="row">
				<a id="prod" href="produtos.php?tipo=telemovel">
					<img src="img/iphone.png" style="width: 170px; padding: 20px;">
					<h3>Smartphones</h3>
				</a>
				<a id="prod" href="produtos.php?tipo=auricular">
					<img src="img/airpods.png" style="width: 170px; padding: 20px;">
					<h3>Auriculares</h3>
				</a>
				<a id="prod" href="produtos.php?tipo=smartwatch">
					<img src="img/watch.png" style="width: 170px; padding: 20px;">
					<h3>Smartwatches</h3>
				</a>
				<a id="prod" href="produtos.php?tipo=acessorio">
					<img src="img/case.png" style="width: 170px; padding: 20px;">
					<h3>Acessórios</h3>
				</a>
			</div>
		</section>

		<!--NOVO-->
		<div class="title">
			<h2>Artigos novos</h2>
			<p>Os nossos mais novos artigos</p>
		</div>
		<section id="new">
			<div id="new-left">
				<p><a href="produtos.php" style="color: white;">Novo</a></p>
			</div>
			<div id="new-right">
				<p><a href="produtos.php" style="color: white;">Novo</a></p>
			</div>
		</section>

		<!--PROMOÇÃO-->
		<div class="title">
			<h2>Artigos em Promoção</h2>
			<p>Confira ainda os nossos artigos em promoção</p>
		</div>
		<section class="variable slider" style="padding: 20px">
			<?php
				$sql = "SELECT * FROM produtos LIMIT 5";
				$res = $conn->query($sql);
				if ($res->num_rows > 0){
					while ($row = $res->fetch_assoc()){
						$saldo = round($row['preco'] * 0.75);
						echo '
							<div class="wcontainer" style="text-align: center;">
								<img src="img/produtos/'.$row["imagem"].'.jpg" class="wimage" style="width: 300px;">
								<h3>'.$row["nome"].'</h3>
								<div class="wmiddle">
									<a href="#"><img src="img/heart.png"></a>
									<a href="carrinho.php?add=carrinho&id='.$row["id"].'"><img src="img/cart.png"></a>
									<a href="item.php?id='.$row["id"].'&nome='.$row["nome"].'&cor='.$row["cor"].'&marca='.$row["marca"].'&tipo='.$row["tipo"].'&preco='.$row["preco"].'&descricao='.$row["descricao"].'&imagem='.$row["imagem"].'" class="wtext">Ver</a>
								</div>
								<p><strike>'.number_format($row["preco"],2,',','.').'€</strike><br><span style="font-size: 20px; color: #0475C2">'.number_format($saldo,2,',','.').'€</span></p>
							</div>
						';
						
					}
				}
			?>
		</section>

		<!--NEWSLETTER-->
		<div id="newsletter">
			<div id="newstext">				
				<h2>Subscreva o boletim de notícias</h2>
				<p>Acompanhe-nos com as nossas últimas notícias, novidades e promoções que mandamos pelo e-mail.</p>
			</div>
			<div id="newsubs">
				<input type="text" id="newsmail"><button>Subscrever</button>
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

		<!--SLIDER-->
	    <script type="text/javascript">
			$(document).on('ready', function() {
				$(".variable").slick({
					dots: true,
					infinite: true,
					variableWidth: true,
					slidesToShow: 3,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 2000,
				});
			});
	  	</script>

		<!--FOOTER-->
		<footer>
			<p>UPT Store © 2019. Todos os direitos reservados | by UPTS</p>
		</footer>
	</body>
</html>