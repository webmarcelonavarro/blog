<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_coment_artigos = "SELECT * FROM comentarios_artigos WHERE id = '$id' LIMIT 1";
	$resultado_coment_artigos = mysqli_query($conn, $result_coment_artigos);
	$row_coment_artigos = mysqli_fetch_assoc($resultado_coment_artigos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Usuário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=59">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=62&id=<?php echo $row_coment_artigos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_coment_artigos.php?id=<?php echo $row_coment_artigos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">	
		<dt>Id: </dt>
		<dd><?php echo $row_coment_artigos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_coment_artigos['nome']; ?></dd>		
		<dt>Email: </dt>
		<dd><?php echo $row_coment_artigos['email']; ?></dd>	
		<dt>Mensagem: </dt>
		<dd><?php echo $row_coment_artigos['mensagem']; ?></dd>

		<dt>Titulo do Artigo: </dt>
		<dd><?php 
			$artigo_id = $row_coment_artigos['artigo_id'];
			$result_artigos = "SELECT * FROM artigos WHERE id = '$artigo_id'";
			$result_artigos = mysqli_query($conn, $result_artigos);
			$row_artigos = mysqli_fetch_assoc($result_artigos);
			echo $row_artigos['titulo']; ?>
		</dd>
		
		<dt>Situação: </dt>
		<dd><?php 
			$situacoes_comentario_id = $row_coment_artigos['situacoes_comentario_id'];
			$result_sit_coment = "SELECT * FROM situacoes_comentarios WHERE id = '$situacoes_comentario_id'";
			$result_sit_coment = mysqli_query($conn, $result_sit_coment);
			$row_sit_coment = mysqli_fetch_assoc($result_sit_coment);
			?><span class="label label-<?php echo $row_sit_coment['cor']; ?>"><?php echo $row_sit_coment['nome']; ?></span>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_coment_artigos['created'])){
				$inserido = $row_coment_artigos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>

		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_coment_artigos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_coment_artigos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>