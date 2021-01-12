<?php
	$conn = mysqli_connect("localhost", "root", "", "uptstore");
	$pag = filter_input(INPUT_POST, 'pag', FILTER_SANITIZE_NUMBER_INT);
	$res = filter_input(INPUT_POST, 'res', FILTER_SANITIZE_NUMBER_INT);
	$inicio = ($pag * $res) - $res;
	$result_usuario = "SELECT * FROM produtos ORDER BY id DESC LIMIT $inicio, $res";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
		<table>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Marca</th>
				<th>Descrição</th>
				<th>Tipo</th>
			</tr>
			<?php
				while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
					?>
						<tr>
							<td><?php echo $row_usuario['id']; ?></th>
							<td><?php echo $row_usuario['nome']; ?></td>
							<td><?php echo $row_usuario['marca']; ?></td>
							<td><?php echo $row_usuario['descricao']; ?></td>
							<td><?php echo $row_usuario['tipo']; ?></td>
						</tr>
					<?php
				}
			?>
		</table>
	<?php
	$result_pg = "SELECT COUNT(id) AS num_result FROM produtos";
	$resultado_pg = mysqli_query($conn, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	$quantidade_pg = ceil($row_pg['num_result'] / $res);
	$max_links = 2;
	echo "<a href='#' onclick='listar(1, $res)'><<</a> ";
	for($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++){
		if($pag_ant >= 1){
			echo " <a href='#' onclick='listar($pag_ant, $res)'>$pag_ant </a> ";
		}
	}
	echo " $pag ";
	for ($pag_dep = $pag + 1; $pag_dep <= $pag + $max_links; $pag_dep++) {
		if($pag_dep <= $quantidade_pg){
			echo " <a href='#' onclick='listar($pag_dep, $res)'>$pag_dep</a> ";
		}
	}
	echo " <a href='#' onclick='listar($quantidade_pg, $res)'>>></a>";
	}else{
		echo "<div class='alert alert-danger' role='alert'>Nenhum utilizador encontrado!</div>";
	}
?>