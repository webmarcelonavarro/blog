<?php
	$result_cat_artigos = "SELECT * FROM categorias_artigos";
	$resultado_cat_artigos = mysqli_query($conn , $result_cat_artigos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Categoria dos Artigo</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#cadastrar">
				Cadastrar
			</button>
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
					<?php while($row_cat_artigos = mysqli_fetch_assoc($resultado_cat_artigos)){?>
						<tr>
							<td class="text-center"><?php echo $row_cat_artigos["id"]; ?></td>
							<td class="text-center"><?php echo $row_cat_artigos["nome"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_cat_artigos["created"])); ?></td>
							<td class="text-center">								
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row_cat_artigos["id"]; ?>" data-whatevernome="<?php echo $row_cat_artigos["nome"]; ?>" data-whateverinserido="<?php echo $row_cat_artigos["created"]; ?>" data-whateveralterado="<?php echo $row_cat_artigos["modified"]; ?>">Visualizar</button>
								
								<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editar" data-whatever="<?php echo $row_cat_artigos["id"]; ?>" data-whatevernome="<?php echo $row_cat_artigos["nome"]; ?>">Editar</button>
								
								<a href="administrativo/processa/adm_apagar_cat_artigo.php?id=<?php echo $row_cat_artigos["id"]; ?>">
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

<?php include_once("administrativo/editar/adm_editar_cat_artigo.php"); ?>
<?php include_once("administrativo/visualizar/adm_visual_cat_artigos.php"); ?>
<?php include_once("administrativo/cadastro/adm_cad_cat_artigo.php"); ?>
