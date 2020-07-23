<?php
require_once "../model/pdo.class.php";
require_once "../model/usuario.class.php";
$valor = new usuario();

	$conecta = DB::conexao();

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = $conecta->prepare("SELECT * FROM usuario WHERE `email` = '$email' AND `senha` = '$senha'");
	$sql->execute();
	$num = $sql->rowCount();
	
	
	if ($valor->validar($_POST["email"], $_POST["senha"]) === 0){
		echo ("<script>alert('Login incorreto'); location.href='../';</script>");
		//header('Location: ../index.php?erro=1');
	}else{
		session_start();
		$_SESSION["email"] = $email;
		$_SESSION["senha"] = $senha;

		$verifica = $conecta->query("SELECT * FROM usuario");
		while ($linha = $verifica->fetch(PDO::FETCH_ASSOC)) {
			if($linha['email'] == $email){
				$nivel = $linha['nivel'];
				switch ($nivel) {
					case '0':
						$_SESSION["logado"] = true;
						header('Location: ../view/sem_acesso.php');
						break;
					case '1':
						$_SESSION["logado"] = true;
						header('Location: ../tesouraria/index.php');
						break;
					case '2':
						$_SESSION["logado"] = true;
						header('Location: ../view/usuario_visitante.php');
						break;
					case '3':
						$_SESSION["logado"] = true;
						header('Location: ../tesouraria/index.php');
						break;	
					case '4':
						$_SESSION["logado"] = true;
						header('Location: ../tesouraria/index.php');
						break;
					} 
				}	
			}
		}
?>