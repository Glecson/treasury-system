<?php
//////////////////PEGANDO CONFIG DE ARQUIVOS CRIADOS///////////////////

require_once "../model/pdo.class.php";
require_once "../controller/seguranca.php";
require_once "../model/usuario.class.php";

$valor = new usuario();
$lista_usuario = $valor->listarUsuarios();

///////////////////CONEXÃO COM BANCO DE DADOS//////////////////////////

$PDO = DB::conexao();

///////////////////CONSULTA USUÁRIOS CADASTRADOS///////////////////////
	
	foreach($lista_usuario as $value)
	
?>

<html lang="br">

	<head>
		<title>Cadastrar usuário</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link rel="stylesheet" href="../model/css/estilos.css" rel="stylesheet">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

		<script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});

		</script>

	</head>

	<body>
		<header>
			<div class="alert alert-info">
			<h2>Cadastrar usuário novo</h2>
			</div>
		</header>

		<section>

				<table class="table">

					<tr class="info">
						<th>Matrícula</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Senha</th>
						<th>Cargo</th>
						<th>Nível</th>
				    </tr>

				    <td><?php echo $value["idUsuario"]; ?></td>
					<td><?php echo $value["nome"]; ?></td>
					<td><?php echo $value["email"]; ?></td>
					<td><?php echo $value["senha"]; ?></td>
					<td><?php echo $value["cargo"]; ?></td>
					<td><?php echo $value["nivel"]; ?></td>

				</table>

			<form method="post" action="../controller/inserir_usuario.php">

				<h3 class="bg-primary text-center pad-basic no-btm">Inserir novo usuário</h3>

				<table class="table bg-info"  id="tabla">
					<tr class="fila-fija">
						<td><input required name="nome[]" placeholder="Digite o nome"/></td>
						<td><input required name="email[]" placeholder="Digite o e-mail"/></td>
						<td><input required name="senha[]" placeholder="Escolha a senha"/></td>
						<td><input required name="cargo[]" placeholder="Cargo"/></td>
						<td><input required name="nivel[]" placeholder="Nível de acesso"/></td>
						<td class="eliminar"><input type="button"   value="Menos -"/></td>
					</tr>
				</table>

				<div class="btn-der">
					<button  class="btn btn-info" onclick="window.location.href='../view/insertar_registros.php'">Atualizar</button>
					<input type="submit" name="insertar" value="Adicionar usuário" class="btn btn-info"/>
					<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Mais + </button>
				</div>

			</form>
		</section>
	</body>
</html>


