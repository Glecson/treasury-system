<!DOCTYPE html>
<?php
	require_once "../controller/seguranca.php";
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
		<title>Aréa administrativa</title>
		
		<link rel="stylesheet" type="text/css" href="../model/css/tela_admin.css">
		
		<script language="JavaScript" src="../model/js/tela_adm.js"></script>
		<style type="text/css">
    <!--
        body {
            padding:0px;
            margin:0px;
        }
 
        #menu ul {
            padding:0px;
            margin:0px;
            float: left;
            width: 100%;
            background-color:#EDEDED;
            list-style:none;
            font:100% Tahoma
            font-size: 30px;
        }
 
        #menu ul li { display: inline; }
 
        #menu ul li a {
            background-color:#EDEDED;
            color: #333;
            text-decoration: none;
            border-bottom:5px solid #EDEDED;
            padding: 2px 10px;
            float:left;
        }
 
        #menu ul li a:hover {
            background-color:#D6D6D6;
            color: #6D6D6D;
            border-bottom:5px solid #EA0000;
        }

    -->
    </style>
    </head>
    <body>
                    <div id="menu">
                        <ul>
							<li><a href="../view/administrador.php">Inicio</a></li>
							<li><a href="../relato/relatorio.php">Relatórios</a></li>
							<li><a href="../tesouraria/login.php">Dizímos e Ofertas</a></li>
                            <li><a href="../view/index.php">Cadastrar Usuário</a></li>
                            <li><a href="../view/usuarios_cadastrados.php">Usuários Cadastrados</a></li>
                            <li><a href="../controller/logoff.php">Sair</a></li>
                        </ul>
                    </div>
    </body>
</html>