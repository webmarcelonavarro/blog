<?php
	$result_situacoes_artigos = "SELECT * FROM situacoes_artigos";
	$resultado_situacoes_artigos = mysqli_query($conn , $result_situacoes_artigos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Situação para Artigo</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=53"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome</th>
						<th class="text-center">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_situacoes_artigos = mysqli_fetch_assoc($resultado_situacoes_artigos)){?>
						<tr>
							<td class="text-center"><?php echo $row_situacoes_artigos["id"]; ?></td>
							<td class="text-center"><?php echo $row_situacoes_artigos["nome"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_situacoes_artigos["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=52&id=<?php echo $row_situacoes_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=54&id=<?php echo $row_situacoes_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_sit_artigos.php?id=<?php echo $row_situacoes_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>