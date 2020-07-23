<?php
//////////////////PEGANDO CONFIG DE ARQUIVOS CRIADOS///////////////////

require_once "../model/pdo.class.php";
require_once "../controller/seguranca.php";
require_once "../model/usuario.class.php";

$valor = new usuario();
$lista_oferta = $valor->listarOferta();

///////////////////CONEXÃO COM BANCO DE DADOS//////////////////////////

$PDO = DB::conexao();

///////////////////CONSULTA USUÁRIOS CADASTRADOS///////////////////////
	
	foreach($lista_oferta as $value)
	
?>

<html lang="br">

	<head>
		<title></title>
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
			<h2>Cadastrar Dízimo e Ofertas</h2>
			</div>
		</header>

		<section>

				<table class="table">

					<tr class="info">
						<th>Valor</th>
						<th>Data</th>
						<th>Horário</th>
                        <th>Tipo</th>
				    </tr>

				    <td><?php echo $value["valor"]; ?></td>
					<td><?php echo $value["data"]; ?></td>
					<td><?php echo $value["horario"]; ?></td>
                    <td><?php echo $value["tipo"]; ?></td>
				</table>

			<form method="post">
				<h3 class="bg-primary text-center pad-basic no-btm">Agregar Nuevo Alumno </h3>
				<table class="table bg-info"  id="tabla">
					<tr class="fila-fija">
						<td><input required name="valor[]" placeholder="ID Alumno"/></td>
						<td><input required name="tipo[]" placeholder="Nombre Alumno"/></td>
						<td class="eliminar"><input type="button"   value="Menos -"/></td>
					</tr>
				</table>

				<div class="btn-der">
					<input type="submit" name="insertar" value="Insertar Alumno" class="btn btn-info"/>
					<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>
				</div>

			</form>

			<?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				if(isset($_POST['insertar']))

				{


				$items1 = ($_POST['valor']);
				$items2 = ($_POST['tipo']);
				//$items3 = ($_POST['carrera']);
				//$items4 = ($_POST['grupo']);
				 
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    $item2 = current($items2);
				    //$item3 = current($items3);
				    //$item4 = current($items4);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    //$carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
				   // $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$id.',"'.$nom.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				  
					$sql = "INSERT INTO oferta (valor, tipo) 
					VALUES $valoresQ";

					$stmt = $PDO->prepare($sql);

					// bindvalue pega qualquer valor e bidparam pega somente variavel

					$stmt->bindValue(':valor', $item1); 
					//$stmt->bindValue(':data', $item2);
					$stmt->bindValue(':tipo', $item2);

					if ($stmt->execute())
					{
   				 		header('Location: ../view/insertar_registros.php');
					}
					else
					{
  					    echo "Erro ao cadastrar";
    					print_r($stmt->errorInfo());
					}	
				}
			}
			?>



		</section>
			<script type="text/javascript" src="../model/js/custom.js"></script>
		<footer>
		</footer>
	</body>

</html>


