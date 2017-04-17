<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_situacoes_artigos = "SELECT * FROM situacoes_artigos WHERE id = '$id' LIMIT 1";
		$resultado_situacoes_artigos = mysqli_query($conn, $result_situacoes_artigos);
		$row_situacoes_artigos = mysqli_fetch_assoc($resultado_situacoes_artigos);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Situação para Artigos</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=51"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_sit_artigos" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_sit_artigos.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome" required
				<?php
					if(!empty($row_situacoes_artigos['nome'])){
						echo "value='".$row_situacoes_artigos['nome']."'";
					}
					if(!empty($_SESSION['value_nome'])){
						echo "value='".$_SESSION['value_nome']."'";
						unset($_SESSION['value_nome']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['nome_sit_artigo_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['nome_sit_artigo_vazio']."</p>";
						unset($_SESSION['nome_sit_artigo_vazio']);
					}
				?>
			</div>
		</div>
				
		<input type="hidden" name="id" 
			<?php
				if(!empty($_SESSION['value_id'])){
					echo "value='".$_SESSION['value_id']."'";
					unset($_SESSION['value_id']);
				}
				if(!empty($row_situacoes_artigos['id'])){
					echo "value='".$row_situacoes_artigos['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Editar" onclick="return val_adm_cad_sit_artigos()">
			</div>
		</div>
	</form>
</div>