<?php
	include_once("../../conexao/conexao.php");
	$id = $_GET['id'];
	
	$result_situacoes = "DELETE FROM situacoes_artigos WHERE id = '$id'";
	$resultado_situacoes = mysqli_query($conn, $result_situacoes);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=51'>
				<script type=\"text/javascript\">
					alert(\"Situação para Artigos apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=51'>
				<script type=\"text/javascript\">
					alert(\"Situação para Artigos não foi apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>