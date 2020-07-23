<?php 
require_once 'vendor/autoload.php';
//referenciando o namespace da dompdf
use Dompdf\Dompdf;

$pdo = new PDO('mysql:host=localhost; dbname=igreja;', 'root', '');

$sql = $pdo->query('SELECT * FROM usuario');

$html ='<h1> Relatorio de Campus</h1>';
$html .= '<table border=1 width=100%>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>Codigo</td>';
$html .= '<td>Nome</td>';
$html .= '<td>E-mail</td>';
$html .= '<td>Senha</td>';
$html .= '<td>Cargo</td>';
$html .= '<td>Nível de acesso</td>';
$html .= '</tr>';
$html .= '</thead>';

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
	$html .='<tbody>';
	$html .= '<tr><td>'.$linha['idUsuario'] .'</td>';
	$html .= '<td>'.$linha['nome'] .'</td>';
	$html .= '<td>'.$linha['email'] .'</td>';
	$html .= '<td>'.$linha['senha'] .'</td>';
	$html .= '<td>'.$linha['cargo'] .'</td>';
	$html .= '<td>'.$linha['nivel'] .'</td></tr>';
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



