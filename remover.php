<?php
	session_start();
	if (isset($_GET['remover']) && $_GET['remover'] == "carrinho") {
		$idProduto = $_GET['id'];
		if (isset($_SESSION['itens'][$idProduto])) {
			$_SESSION['itens'][$idProduto] -= 1;
		}
		if($_SESSION['itens'][$idProduto] == 0){
			unset($_SESSION['itens'][$idProduto]);
		}
		header ('Location: carrinho.php');
	}
?>