<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Situação para Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=51"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_sit_artigos" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_cad_sit_artigos.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome da Situação</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Situação para Artigo" required
				<?php
					if(!empty($_SESSION['value_nome'])){
						echo "value='".$_SESSION['value_nome']."'";
						unset($_SESSION['value_nome']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['nome_sit_art_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['nome_sit_art_vazio']."</p>";
						unset($_SESSION['nome_sit_art_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" value="Cadastrar" onclick="return val_adm_cad_sit_artigos()">
			</div>
		</div>
	</form>
</div>