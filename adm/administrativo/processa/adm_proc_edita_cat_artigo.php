<?php
	session_start();
	include_once("../../conexao/conexao.php");
		
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		
		$result_niveis_acessos = "UPDATE categorias_artigos SET nome='$nome', modified =  NOW() WHERE id = '$id'";
		
		$resultado_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);	
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=50'>
						<script type=\"text/javascript\">
							alert(\"Categoria de Artigo alterado com Sucesso.\");
						</script>
					";	
				}else{
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=50'>
						<script type=\"text/javascript\">
							alert(\"Categoria de Artigo não foi alterado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	$conn->close(); ?>