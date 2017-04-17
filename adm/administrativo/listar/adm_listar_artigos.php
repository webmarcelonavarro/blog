<?php
	$result_artigos = "SELECT * FROM artigos";
	$resultado_artigos = mysqli_query($conn , $result_artigos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Artigos</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=57"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Titulo</th>
						<th class="text-center">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_artigos = mysqli_fetch_assoc($resultado_artigos)){?>
						<tr>
							<td class="text-center"><?php echo $row_artigos["id"]; ?></td>
							<td class="text-center"><?php echo $row_artigos["titulo"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_artigos["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=56&id=<?php echo $row_artigos["id"]; ?>">
									<span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
								</a>
								<a href="administrativo.php?link=58&id=<?php echo $row_artigos["id"]; ?>">
									<span class="glyphicon glyphicon-pencil text-warning" aria-hidden="true"></span>
								</a>
								<a href="administrativo/processa/adm_apagar_artigos.php?id=<?php echo $row_artigos["id"]; ?>">
									<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>