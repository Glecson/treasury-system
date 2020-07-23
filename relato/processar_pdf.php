<?php 
require_once 'vendor/autoload.php';
//referenciando o namespace da dompdf
use Dompdf\Dompdf;

$pdo = new PDO('mysql:host=localhost; dbname=igreja;', 'root', '');

$mes = $_POST['mes'];
$ano = $_POST['ano'];

$sql = $pdo->query("SELECT * FROM lc_movimento WHERE mes='$mes' and ano='$ano'");

$html ='<h1>Tesouraria - Relatório Mensal</h1>';
$html .= '<table border=1 width=100%>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>Código</td>';
$html .= '<td>Tipo</td>';
$html .= '<td>Dia</td>';
$html .= '<td>Mês</td>';
$html .= '<td>Ano</td>';
$html .= '<td>Categoria</td>';
$html .= '<td>Descrição</td>';
$html .= '<td>Valor</td>';
$html .= '</tr>';
$html .= '</thead>';

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
	$html .='<tbody>';
	$html .= '<tr><td>'.$linha['id'] .'</td>';
	$html .= '<td>'.$linha['tipo'] .'</td>';
	$html .= '<td>'.$linha['dia'] .'</td>';
	$html .= '<td>'.$linha['mes'] .'</td>';
	$html .= '<td>'.$linha['ano'] .'</td>';
	$html .= '<td>'.$linha['cat'] .'</td>';
	$html .= '<td>'.$linha['descricao'] .'</td>';
	$html .= '<td>'.$linha['valor'] .'</td></tr>';
	$html .='</tbody>';	
}
$html .='</table>';

//instancia da dompdf
 $dompdf = new Dompdf;

//converter o html
$dompdf->loadHtml($html);
//definir tamanho e orientação
$dompdf-> setPaper('A4', 'portrait');

//renderizar o html
$dompdf->render();

//enviar para o browser

$dompdf->stream('relatorio.pdf', array('Attachment' =>false));



