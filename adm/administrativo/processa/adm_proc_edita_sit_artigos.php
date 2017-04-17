<?php
	session_start();
	include_once("../../conexao/conexao.php");
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	
	if(empty($_POST['nome'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=54'>
		";	
		$_SESSION['nome_sit_artigo_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	if($salvar_dados_bd == 1){
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		
		$result_situacoes = "UPDATE situacoes_artigos SET nome='$nome', modified =  NOW() WHERE id = '$id'";
		
		$resultado_situacoes = mysqli_query($conn, $result_situacoes);	
		unset($_SESSION['value_nome']);
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
							alert(\"Situação para Artigo alterado com Sucesso.\");
						</script>
					";	
				}else{
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=51'>
						<script type=\"text/javascript\">
							alert(\"Situação para Artigo não foi alterado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	}else{
		$_SESSION['value_id'] = $_POST['id'];
	}
	$conn->close(); ?>