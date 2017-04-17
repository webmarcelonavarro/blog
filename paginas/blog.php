<?php
	$result_artigos = "SELECT * FROM artigos";
	$resultado_artigos = mysqli_query($conn , $result_artigos);
?><!-- Inicio blog -->
<div class="container pag-blog">
<?php while($row_artigos = mysqli_fetch_assoc($resultado_artigos)){?>
	<div class="row featurette">
		<div class="col-md-6">
			<a href="<?php echo pg.'artigo/'. $row_artigos['slug']; ?>">
			  <img class="featurette-image img-responsive center-block" src="foto/<?php echo $row_artigos['imagem']; ?>" alt="<?php echo $row_artigos['titulo']; ?>">
			</a>
		</div>
		<div class="col-md-6">
			
			  <a href="<?php echo pg.'artigo/'. $row_artigos['slug']; ?>">
			  <h2 class="featurette-heading"><?php echo $row_artigos['titulo']; ?></h2>
			</a>  
			<p class="lead"><?php echo $row_artigos['descricao']; ?></p>
		</div>
	</div>
	<hr class="featurette-divider">	
<?php } ?>
</div>
<!-- Fim Blog -->