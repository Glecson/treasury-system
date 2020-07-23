<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<?php
	require_once "../controller/seguranca.php";
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
		<title>Usuários Cadastrados</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		
		<link rel="stylesheet" type="text/css" href="../model/css/tela_admin.css">
		
		<script language="JavaScript" src="../model/js/tela_adm.js"></script>
		
    </head>
    <body>
        <div class="wrapper">
            <header>
                <nav>
                    <div class="menu-icon">
                        <i class="fa fa-bars fa-2x"></i>
                    </div>
                    <div class="logo">
                        <a href="../view/administrador.php"><img style="height: 50px; width: 50px;" src="../model/img/logos-cursos-ead-ifac-1.png"></a>
                    </div>
                    <div class="menu">
                        <ul>
							<li><a href="../view/administrador.php">Inicio</a></li>
                            <li><a href="../relato/relatorio_pdf.php">Relatórios</a></li>
                            <li><a href="../view/dizimos_ofertas.php">Dizímos e Ofertas</a></li>
                            <li><a href="../view/cadastrar_usuario.php">Cadastrar Usuário</a></li>
							<li><a href="../relato/usuarios_pdf.php">Gerar PDF</a></li>
                            <li><a href="../controller/logoff.php">Sair</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="content">
                <?php
                    $pdo = new PDO('mysql:host=localhost; dbname=igreja;', 'root', '');

                    $sql = $pdo->query('SELECT * FROM usuario');

                    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                       
                        echo $linha['idUsuario'] .'</td>';
                        echo $linha['nome'] .'</td>';
                        echo $linha['email'] .'</td>';
                        echo $linha['senha'] .'</td>';
                        echo $linha['cargo'] .'</td>';
                        echo $linha['nivel'] .'</td></tr>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>