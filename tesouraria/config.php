<?php

require_once "../model/pdo.class.php";
$PDO = DB::conexao();	

//Título do seu livro Caixa, geralmente seu nome
$lc_titulo="v1.0.0";

//Autenticação simples
$usuario="admin";
$senha="123";

if (isset($_SESSION['logado']))
    $logado = $_SESSION['logado'];
else
    $logado = "";

$senha_ = md5($senha);

if (isset($_POST['login']) && $_POST['login'] != '') {

    if ($_POST['login'] == $usuario && $_POST['senha'] == $senha) {
        $logado = $_SESSION['logado'] = md5($_POST['senha']);
        header("Location: ../tesouraria/index.php");
        exit();
    }
}

if ($logado != $senha_ && !isset($pagina_login)) {

    header("Location: ../tesouraria/login.php");

    exit();
}
?>
