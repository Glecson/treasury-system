<!DOCTYPE html>
<html lang="pt-br">
  	<head>
    	<title>Tesouraria - Relatório</title>
    	<meta charset="utf-8">
  	</head>
  <body>
  		<div class="wrap-login100">

    	<form id="pesquisa-modal" action="../relato/processar_pdf.php" method="post">
			<span class="login100-form-title p-b-32">
				Escolha o período
			</span>
				<div class="grid-8">
					<select class="select" name="mes">
						<option class="txt1 p-b-11" value="">Mês:</option>
							<?php
// Instancia o objeto PDO
							$pdo = new PDO('mysql:host=localhost;dbname=igreja', 'root', '');
							$consulta = $pdo->query("SELECT DISTINCT mes FROM lc_movimento;");
							while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
								$nome_curso = $linha['mes'];
								$curso_id = $linha['id'];
							?>
							    <option class="txt1 p-b-11" value="<?php echo $nome_curso ?>"><?php echo $nome_curso ?></option>
							<?php
							}
							?>
							?>
					</select>
				</div>
				<div class="grid-8">
					<select class="select" name="ano">
						<option class="txt1 p-b-11" value="">Ano:</option>
							<?php
// Instancia o objeto PDO
							$pdo = new PDO('mysql:host=localhost;dbname=igreja', 'root', '');
							$consulta = $pdo->query("SELECT DISTINCT ano FROM lc_movimento;");
							while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
								$nome_cidade = $linha['ano'];
								$cidade_id = $linha['id'];
							?>
							    <option class="txt1 p-b-11"value="<?php echo $nome_cidade ?>"><?php echo $nome_cidade ?></option>
							<?php
							}
							?>
							?>
					</select>
				</div>

				<div class="grid-8">
				<br>
					<button type="submit" target="_blank">Gerar PDF</button>
				</div>
			</form>
		</div>
  </body>
</html>