<?php

require_once 'vendor/autoload.php';

//referenciando o namespace da dompdf

use Dompf\Dompf;

$pdo = new PDO('mysql:host=localhost; dbname=igreja;','root','');

$sql = $pdo->query('SELECT * FROM lc_movimento');

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
	echo $linha['id'] . '<br>';
	echo $linha['tipo'] . '<br>';
	echo $linha['dia'] . '<br>';
	echo $linha['mes'] . '<br>';
	echo $linha['ano'] . '<br>';
	echo $linha['cat'] . '<br>';
	echo $linha['descricao'] . '<br>';
	echo $linha['valor'] . '<hr>';
}


       


