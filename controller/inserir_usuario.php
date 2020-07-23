<?php
//////////////////PEGANDO CONFIG DE ARQUIVOS CRIADOS///////////////////

require_once "../model/pdo.class.php";
require_once "../controller/seguranca.php";
require_once "../model/usuario.class.php";

$valor = new usuario();
$lista_dizimo = $valor->listarDizimo();

///////////////////CONEXÃO COM BANCO DE DADOS//////////////////////////

$PDO = DB::conexao();

/////////////////////////PRESIONAR O BOTÃO////////////////////////////

				if(isset($_POST['insertar']))

				{
				
				$items1 = ($_POST['valor']);
				$items2 = ($_POST['tipo']);

///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)

				while(true) {

/////////////////// RECUPERA OS VALORES DA VARIAVEL //////////

				    $item1 = current($items1);
				    $item2 = current($items2);
				
/////////////////// ASIGNARLOS A VARIABLES ///////////////////

				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");

////////////////////CONCATENA OS VALORES PARA SUA INSERÇÃO///////////////////////

				    $valores='('.$id.',"'.$nom.'"),';

/////////////////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				   
				    $valoresQ= substr($valores, 0, -1);

				    // insere no banco

					$sql = "INSERT INTO dizimo  VALUES $valoresQ";
					$stmt = $PDO->prepare($sql);

					// bindvalue pega qualquer valor e bidparam pega somente variavel

					$stmt->bindValue(':valor', $item1);
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
			