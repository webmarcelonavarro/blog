<?php
	$result_coment_artigos = "SELECT * FROM comentarios_artigos ORDER BY id DESC";
	$resultado_coment_artigos = mysqli_query($conn , $result_coment_artigos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Comentários</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=7"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">E-mail</th>
						<th class="text-center">Artigo</th>
						<th class="text-center">Inserido</th>						
						<th class="text-center">Situação</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_coment_artigos = mysqli_fetch_assoc($resultado_coment_artigos)){?>
						<tr>
							<td class="text-center"><?php echo $row_coment_artigos["id"]; ?></td>
							<td class="text-center"><?php echo $row_coment_artigos["email"]; ?></td>
							<td class="text-center">
								<?php
								    $artigo_id = $row_coment_artigos["artigo_id"]; 
									$result_artigos = "SELECT * FROM artigos WHERE id = '$artigo_id' LIMIT 1";
									$resultado_artigos = mysqli_query($conn, $result_artigos);
									$row_artigos = mysqli_fetch_assoc($resultado_artigos);
									echo $row_artigos['titulo'];
								?>
							</td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_coment_artigos["created"])); ?></td>							
							<td class="text-center">							
								<?php
								    $situacoes_comentario_id = $row_coment_artigos["situacoes_comentario_id"]; 
									$result_sit_coment = "SELECT * FROM situacoes_comentarios WHERE id = '$situacoes_comentario_id' LIMIT 1";
									$resultado_sit_coment = mysqli_query($conn, $result_sit_coment);
									$row_sit_coment = mysqli_fetch_assoc($resultado_sit_coment);
									echo $row_sit_coment['nome'];
								?>
							</td>
							<td class="text-center">
								<a href="administrativo.php?link=60&id=<?php echo $row_coment_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=62&id=<?php echo $row_coment_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_coment_artigos.php?id=<?php echo $row_coment_artigos["id"]; ?>">
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