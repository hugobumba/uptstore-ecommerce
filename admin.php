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
		<title>ADMIN - UPTS</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<style>
			* {
				margin: 0px; 
				padding: 0px; 
				box-sizing: border-box;
			}
			table {
			  border-spacing: 1;
			  border-collapse: collapse;
			  background: white;
			  border-radius: 10px;
			  overflow: hidden;
			  width: 100%;
			  margin: 0 auto;
			  position: relative;
			}
			table * {
			  position: relative;
			}
			table td, table th {
			  padding-left: 10px;
			}
			table thead tr {
			  height: 60px;
			  background: #36304a;
			}
			table tbody tr {
			  height: 50px;
			}
			tr:nth-child(even) {
			  background-color: #f5f5f5;
			}
			tr:nth-child(1) {
			  background-color: black;
			}
			tr {
			  font-size: 15px;
			  color: #808080;
			  line-height: 1.2;
			  font-weight: unset;
			}
			tr:hover {
			  color: #555555;
			  background-color: #f1f1f1;
			}
			.item span{font-size: 20px; color: #0475C2;}
			table{width: 100%;}
			td, tr, table{
				border-bottom: 1px solid grey;
				padding: 5px;
			}
			th{
				text-align: left;
			}
			body {font-family: "Lato", sans-serif; margin: auto;}
			h2{
				width: 100%;
				text-align: center;
			}
			.sidenav {
				height: 100%;
				width: 15%;
				position: fixed;
				z-index: 1;
				padding-top: 10px;
				background-color: #111;
			}
			.sidenav a {
				padding: 8px 8px 8px 32px;
				text-decoration: none;
				font-size: 20px;
				color: #818181;
				display: block;
				transition: 0.3s;
			}
			.sidenav a:hover {color: #f1f1f1;}
			.sidenav .closebtn {
				position: absolute;
				top: 0;
				right: 25px;
				font-size: 30px;
				margin-left: 50px;
			}
			#main {
				position: absolute;
				width: 85%;
				left: 15%;
			}
			.item{
				text-align: center;
				margin: auto;
				transition: .3s;
				opacity: 1;
			}
			.item:hover{
				transition: .3s;
				opacity: 0.4;
			}
			#resumo{
				position: absolute;
				width: 100%;
			}
			#produtos{
				position: absolute;
				width: 100%;
				top: -100px;
			}
			#clientes{
				position: absolute;
				width: 100%;
				top: -100px;
			}
			#contactos{
				position: absolute;
				width: 100%;
				top: -100px;
			}
			#vendas{
				position: absolute;
				width: 100%;
				top: -100px;
			}
			#user{
				position: relative;
				left: 90%;
				top: -40px;
				z-index: 1;
				width: 10%;
			}
			.dropdown {
				position: relative;
				display: inline-block;
			}
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #ccc;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				padding: 15px;
				z-index: 1;
				border-radius: 5px;
				text-align: center;
				margin: auto;
			}
			.dropdown:hover .dropdown-content {display: block;}
			#user a{text-decoration: none;}
			#user ul{list-style-type: none;}
			#user p{font-size: 12px;
				color: grey;
				text-align: center;
				font-style: italic;
			}
			.wcontainer {
				position: relative;
				min-height:1px;
				padding-right:30px;
				padding-left:30px;
				float:left;
				width:20%;
				text-align: center;
			}
			.wimage {
				opacity: 1;
				display: block;
				width: 100%;
				height: auto;
				transition: .5s ease;
				backface-visibility: hidden;
			}
			.wmiddle {
				transition: .5s ease;
				opacity: 0;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				-ms-transform: translate(-50%, -50%);
				text-align: center;
			}
			.wcontainer:hover .wimage {opacity: 0.3;}
			.wcontainer:hover .wmiddle {opacity: 1;}
			.wtext {
				background-color: #4CAF50;
				color: white;
				font-size: 16px;
				padding: 10px;
				border-radius: 5px;
			}
			.wtext a{color: white; text-decoration: none;}
			#topo{
				background-color: #111; color: white; margin: 0; padding-top: 10px; height: 50px;
			}
			#content{
				position: relative;
				top: 200px;
			}
		</style>
	</head>
	<?php
		$conn = new mysqli("localhost", "root", "", "uptstore");
		if ($conn->connect_error) {
			die('Erro na ligação : ('.$conn->connect_errno.') '.$conn->connect_error);
		}
		if (isset($_SESSION['email']) && $_SESSION['valid'] == TRUE){
			if ($_SESSION['tipo'] == 'admin'){
	?>
	<body onload="produtos();">
		<div id="mySidenav" class="sidenav">
			<h2 style="text-align: left; color: white; padding-left: 15%">Menu</h2><hr>
			<a href="#" onclick="resumo();">Resumo</a>
			<a href="admin.php?tipo=" onclick="produtos();">Produtos</a>
			<a href="#" onclick="clientes();">Clientes</a>
			<a href="#" onclick="contactos();">Contactos</a>
			<a href="#" onclick="vendas();">Vendas</a>
		</div>
		<div id="main">
			<div id="topo">
				<h4 style="padding-left: 10px;">Administração</h4>
				<div id="user">
					<ul>
						<li class="dropdown"><a href="#"><?php echo($_SESSION['nome']); ?> <br><p>(Admin)</p></a>
							<ul class="dropdown-content">
								<li><a href="index.php">Home</a></li>
								<li><a href="perfil.php">Perfil</a></li>
								<li><a href="logout.php">Sair</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div id="content">
				<!--RESUMO-->
				<div id="resumo">
					<h2>Resumo</h2>
					<div>
						<h3 style="font-size: 20px; background-color: grey; color: white; padding: 5px;">Produtos</h3>
						<div style="display: flex; padding-bottom: 50px;">
							<div style="cursor: pointer; border-radius: 5px; padding: 10px; margin: auto; width: 20%; display: flex; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><img src="img/iphone.png" style="width: 50px;"><h4 style="font-size: 20px; position: relative; top: 10px;"><a href="admin.php?tipo=telemovel">Telemóveis</a></h4></div>
							<div style="cursor: pointer; border-radius: 5px; padding: 10px; margin: auto; width: 20%; display: flex; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><img src="img/watch.png" style="width: 50px;"><h4 style="font-size: 20px; position: relative; top: 10px;"><a href="admin.php?tipo=smartwatch">Smartwatches</a></h4></div>
							<div style="cursor: pointer; border-radius: 5px; padding: 10px; margin: auto; width: 20%; display: flex; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><img src="img/airpods.png" style="width: 50px;"><h4 style="font-size: 20px; position: relative; top: 10px;"><a href="admin.php?tipo=auricular">Auriculares</a></h4></div>
							<div style="cursor: pointer; border-radius: 5px; padding: 10px; margin: auto; width: 20%; display: flex; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><img src="img/case.png" style="width: 50px;"><h4 style="font-size: 20px; position: relative; top: 10px;"><a href="admin.php?tipo=acessorio">Acessórios</a></h4></div>
						</div>
					</div>

				<!--PRODUTOS-->
				<div id="produtos">
					<h2>Produtos</h2>
					<div id="org">
						<?php
							if (!empty($tipo)) {
								$sql = "SELECT * FROM produtos WHERE tipo = '$tipo'";
								$res = $conn->query($sql);
								if($res->num_rows > 0){
									while($row = $res->fetch_assoc()){
										echo '
											<div class="wcontainer">
												<img src="img/produtos/'.$row["imagem"].'.jpg" class="wimage" style="width:100%">
												<p>ID: '.$row["id"].'</p>
												<div class="wmiddle">
													<div class="wtext"><a href="editprod.php?id='.$row["id"].'&nome='.$row["nome"].'&marca='.$row["marca"].'&tipo='.$row["tipo"].'&cor='.$row["cor"].'&preco='.$row["preco"].'&desc='.$row["descricao"].'&img='.$row["imagem"].'">Editar</a></div>
												</div>
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
											<div class="wcontainer">
												<img src="img/produtos/'.$row["imagem"].'.jpg" class="wimage" style="width:100%">
												<p>ID: '.$row["id"].'</p>
												<div class="wmiddle">
													<div class="wtext"><a href="editprod.php?id='.$row["id"].'&nome='.$row["nome"].'&marca='.$row["marca"].'&tipo='.$row["tipo"].'&cor='.$row["cor"].'&preco='.$row["preco"].'&desc='.$row["descricao"].'&img='.$row["imagem"].'">Editar</a></div>
												</div>
											</div>
										';
									}
								}
							}
						?>
					</div>
				</div>

				<!--CLIENTES-->
				<div id="clientes">
					<h2>Clientes</h2>
					<span id="cont_clientes"></span>
				</div>
				<script>
					var pag = 1;
					var res = 5;
					$(document).ready(function () {
						listar(pag, res);
					});			
					function listar(pag, res){
						var dados = {
							pag: pag,
							res: res
						}
						if($('#clientes').visibility = 'visible'){
							$.post('show_clientes.php', dados , function(retorna){
								$("#cont_clientes").html(retorna);
							});
						}else{
							if($('#produtos').visibility = 'visible'){
								$.post('show_produtos.php', dados , function(retorna){
								$("#cont_produtos").html(retorna);
							});
							}
						}
					}
				</script>

				<!--CONTACTOS-->
				<div id="contactos">
					<h2>Contactos</h2>				
					<table>
						<tr>
							<th>ID</th>
							<th>Título</th>
							<th>Autor</th>
							<th>Conteúdo</th>
							<th>Data</th>
						</tr>
						<tr>
							<td>Id 1</td>
							<td>Titulo 1</td>
							<td>Autor 1</td>
							<td>Conteúdo 1</td>
							<td>Data 1</td>
						</tr>
						<tr>
							<td>Id 2</td>
							<td>Titulo 2</td>
							<td>Autor 2</td>
							<td>Conteúdo 2</td>
							<td>Data 2</td>
						</tr>
						<tr>
							<td>Id 3</td>
							<td>Titulo 3</td>
							<td>Autor 3</td>
							<td>Conteúdo 3</td>
							<td>Data 3</td>
						</tr>
						<tr>
							<td>Id 4</td>
							<td>Titulo 4</td>
							<td>Autor 4</td>
							<td>Conteúdo 4</td>
							<td>Data 4</td>
						</tr>
						<tr>
							<td>Id 5</td>
							<td>Titulo 5</td>
							<td>Autor 5</td>
							<td>Conteúdo 5</td>
							<td>Data 5</td>
						</tr>
					</table>
				</div>

				<!--VENDAS-->
				<div id="vendas">
					<h2>Vendas</h2>				
					<table>
						<tr>
							<th>ID</th>
							<th>Produto</th>
							<th>Comprador</th>
							<th>Preço</th>
							<th>Data</th>
						</tr>
						<tr>
							<td>Id 1</td>
							<td>Produto 1</td>
							<td>Comprador 1</td>
							<td>Preço 1</td>
							<td>Data 1</td>
						</tr>
						<tr>
							<td>Id 2</td>
							<td>Produto 2</td>
							<td>Comprador 2</td>
							<td>Preço 2</td>
							<td>Data 2</td>
						</tr>
						<tr>
							<td>Id 3</td>
							<td>Produto 3</td>
							<td>Comprador 3</td>
							<td>Preço 3</td>
							<td>Data 3</td>
						</tr>
						<tr>
							<td>Id 4</td>
							<td>Produto 4</td>
							<td>Comprador 4</td>
							<td>Preço 4</td>
							<td>Data 4</td>
						</tr>
						<tr>
							<td>Id 5</td>
							<td>Produto 5</td>
							<td>Comprador 5</td>
							<td>Preço 5</td>
							<td>Data 5</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<script>
			function resumo() {
				document.getElementById("resumo").style.visibility = "visible";
				document.getElementById("produtos").style.visibility = "hidden";
				document.getElementById("clientes").style.visibility = "hidden";
				document.getElementById("contactos").style.visibility = "hidden";
				document.getElementById("vendas").style.visibility = "hidden";
			}
			function produtos(){
				document.getElementById("resumo").style.visibility = "hidden";
				document.getElementById("produtos").style.visibility = "visible";
				document.getElementById("clientes").style.visibility = "hidden";
				document.getElementById("contactos").style.visibility = "hidden";
				document.getElementById("vendas").style.visibility = "hidden";
			}
			function clientes(){
				document.getElementById("resumo").style.visibility = "hidden";
				document.getElementById("produtos").style.visibility = "hidden";
				document.getElementById("clientes").style.visibility = "visible";
				document.getElementById("contactos").style.visibility = "hidden";
				document.getElementById("vendas").style.visibility = "hidden";
			}
			function contactos(){
				document.getElementById("resumo").style.visibility = "hidden";
				document.getElementById("produtos").style.visibility = "hidden";
				document.getElementById("clientes").style.visibility = "hidden";
				document.getElementById("contactos").style.visibility = "visible";
				document.getElementById("vendas").style.visibility = "hidden";
				document.getElementById("reports").style.visibility = "hidden";
			}
			function vendas(){
				document.getElementById("resumo").style.visibility = "hidden";
				document.getElementById("produtos").style.visibility = "hidden";
				document.getElementById("clientes").style.visibility = "hidden";
				document.getElementById("contactos").style.visibility = "hidden";
				document.getElementById("vendas").style.visibility = "visible";
				
			}
		</script>
	</body>
	<?php
			}else{
				header('Location: index.php');
			}
		}else{
			header('Location: login.php');
		}
	?>
</html>