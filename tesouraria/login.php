<?php
session_start();
set_time_limit(0);

$pagina_login = 1;

include '../tesouraria/config.php';
include '../tesouraria/functions.php';

if (isset($_GET['sair'])) {
    $_SESSION['logado'] = "";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title id='titulo'>Tesouraria <?php echo $lc_titulo ?></title>
        
        <meta charset="UTF-8">

        <link href="../tesouraria/styles.css" rel="stylesheet" type="text/css" />
        
        <script language="javascript" src="../tesouraria/scripts.js"></script>
    </head>
    <body style="padding:10px">


        <table cellpadding="1" cellspacing="10"  width="900" align="center" style="background-color:#033">

            <tr>
                <td colspan="11" style="background-color:#005B5B;">
                    <h2 style="color:#FFF; margin:5px">Tesouraria - <?php echo $lc_titulo ?></h2>
                </td>
                <td colspan="2" align="right" style="background-color:#005B5B;">
                    <a style="color:#FFF" href="?mes=<?php echo date('m') ?>&ano=<?php echo date('Y') ?>">Hoje:<strong> <?php echo date('d') ?> de <?php echo mostraMes(date('m')) ?> de <?php echo date('Y') ?></strong></a>&nbsp; 
                </td>
            </tr>
        </table>
        <br />
        <br />
        <table cellpadding="1" cellspacing="10"  width="900" align="center" >

            <tr>
                <td colspan="11" align="center" >
                    <label>Faça Login para entrar no sistema:</label>
                    <br><br>
                            <form action="" method="post">

                                Login: <input type='text' name='login'><br>
                                        Senha: <input type='password' name='senha'><br>
                                                <br>
                                                    <input type='submit' name='OK' value='Entrar'>

                                                        </form>
                                                        <br>

                                                            </td>
                                                            </tr>
                                                            </table>

                                                            <table cellpadding="5" cellspacing="0" width="900" align="center">
                                                                <tr>
                                                                    <td align="right">
                                                                        <hr size="1" />
                                                                        <em>Tesouraria - <strong><?php echo $lc_titulo ?></strong> - Desenvolvido por <a href="#">PHBS</a>. v1.0.0</em>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            </body>
                                                            </html>
