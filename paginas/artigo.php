<?php
	
	if(isset($url[1])){
		$slug_artigo = $url[1];
	}else{
		$destino = pg.'/home';
		header("Location: $destino");
	}
	
	//Buscar os dados referente ao artigo com este slug
	$result_artigos = "SELECT * FROM artigos WHERE slug LIKE '%$slug_artigo%' LIMIT 1";
	$resultado_artigos = mysqli_query($conn, $result_artigos);
	$row_artigos = mysqli_fetch_assoc($resultado_artigos);
	$id_artigo = $row_artigos['id'];;
	
?>
	<!-- Inicio corpo artigo -->
	<div class="container pag-blog">
		<div class="blog-header">
			<h1 class="blog-title"><?php echo $row_artigos['titulo']; ?></h1>
		</div>

		<div class="row">
			<div class="col-sm-8 blog-main">
				<div class="blog-post">
					<?php echo $row_artigos['conteudo']; ?>
		
				</div><!-- /.blog-post -->

			</div><!-- /.blog-main -->

			<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
				<div class="sidebar-module sidebar-module-inset">
					<h4>Sobre Mim</h4>
					<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				</div>
				<div class="sidebar-module">
					<h4>Artigos</h4>
					<ol class="list-unstyled">
						  <li><a href="#">March 2014</a></li>
						  <li><a href="#">February 2014</a></li>
						  <li><a href="#">January 2014</a></li>
						  <li><a href="#">December 2013</a></li>
						  <li><a href="#">November 2013</a></li>
						  <li><a href="#">October 2013</a></li>
						  <li><a href="#">September 2013</a></li>
						  <li><a href="#">August 2013</a></li>
						  <li><a href="#">July 2013</a></li>
						  <li><a href="#">June 2013</a></li>
						  <li><a href="#">May 2013</a></li>
						  <li><a href="#">April 2013</a></li>
					</ol>
				</div>
			</div><!-- /.blog-sidebar -->

		</div><!-- /.row -->
		
	</div>
	<!-- Fim corpo artigo -->
	
	<?php
		$result_artigo = "SELECT * FROM artigos  LIMIT 4";
		$resultado_artigo = mysqli_query($conn , $result_artigo);
	?>
	<!-- Inicio artigos recentes -->
	<div class="espaco">
		<div class="container">			
			<div class="row">
				<h2>Sugestões</h2>
			</div>
			<div class="row">
				<?php while($row_artigo = mysqli_fetch_assoc($resultado_artigo)){ ?>
					<div class="col-md-3">
						<div class="text-center">
							<img src="<?php echo pg.'/foto/'.$row_artigo['imagem']; ?>" alt="..." class="img-rounded" width="140" height="120">
							<h2><?php echo $row_artigo['titulo']; ?></h2>
						</div>
						<?php echo $row_artigo['descricao']; ?>
					</div>
				<?php } ?>
			</div>				
		</div>
	</div>
	<!-- Fim artigos recentes -->
	
	<!-- Inicio Comentario -->
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$requisicao = md5(implode($_POST));
			if(isset($_SESSION['ultima_requisicao']) && $_SESSION['ultima_requisicao'] == $requisicao){
				//unset($_SESSION['ultima_requisicao']);
			}else{
				$_SESSION['ultima_requisicao'] = $requisicao;
				
				if(isset($_POST['nome'])){
					$nome 		= mysqli_real_escape_string($conn, $_POST['nome']);
					$email 		= mysqli_real_escape_string($conn, $_POST['email']);
					$mensagem 	= mysqli_real_escape_string($conn, $_POST['mensagem']);
					$result_coment_artigo = "INSERT INTO comentarios_artigos (
						nome,
						email,	
						mensagem,
						artigo_id,
						situacoes_comentario_id,
						created)VALUES(
						'$nome',
						'$email',
						'$mensagem',
						'$id_artigo',
						'1',
						NOW())";
					$resultado_coment_artig = mysqli_query($conn, $result_coment_artigo);
				}			
			}
		}
	?>	
	<div class="container">	
		<div class="row">
			<h2>Deixe seu Comentários</h2>
		</div>
		<div class="row">
			<form action="" method="POST" class="form-horizontal">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Mensagem</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" name="mensagem"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>
			</form>
		</div>
		<div class="row">
			<h2>Comentários</h2>
		</div>
		<?php
			$result_coment_artigos = "SELECT * FROM comentarios_artigos WHERE artigo_id = '$id_artigo'";
			$resultado_coment_artigos = mysqli_query($conn , $result_coment_artigos);
		?>
		<?php while($row_coment_artigos = mysqli_fetch_assoc($resultado_coment_artigos)){?>
			<div class="media">
				<div class="media-left media-middle">
					<img class="media-object" src="<?php echo pg.'/imagens/logo_celke1.png'; ?>" alt="...">
				</div>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $row_coment_artigos['nome']; ?></h4>
					<p><?php echo $row_coment_artigos['mensagem']; ?></p>
				</div>
			</div>
		<?php } ?>		
	</div>
	<!-- Fim Comentario -->
	
	