<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastramento de Valores</title>
	<link rel="stylesheet" type="text/css" href="../model/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../model/css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require '../model/conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		
		//$cpf   = (isset($_POST['cpf'])) ? str_replace(array('.','-'), '', $_POST['cpf']): '';

		$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
		$data = (isset($_POST['data'])) ? $_POST['data'] : '';

				$data = explode('/', $data);
				if (!checkdate($dataa[1], $dataa[0], $dataa[2])):
					$mensagem .= '<li>Formato da Data Inválida.</li>';
				endif;
			

			// Constrói a data no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $data);
			$data_ansi = $data_temp[2] . '/' . $data_temp[1] . '/' . $data_temp[0];
		


			$sql = 'INSERT INTO oferta (tipo, data)
							   VALUES(:tipo, :data)';

			$stm = $conexao->prepare($sql);
			

			$stm->bindValue(':tipo', $tipo);
			$stm->bindValue(':data', $data_ansi);
			
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=../view/adicionar_valor.php'>";

		?>

	</div>
</body>
</html>