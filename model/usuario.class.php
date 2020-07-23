<?php
require_once "../model/pdo.class.php";

class usuario
{
    public function listarUsuarios(){
		//armazena dentro da variavel pdo da conexao a funçao de conectar,fazendo que ele funcione
		$conMySQL = DB::conexao();
		//faz a conexao com a tabela do banco de dados via pdo que no caso é o select
        $stringSQL = "SELECT * FROM usuario ORDER BY idUsuario";     

        //echo $stringSQL;
	
        $sql = $conMySQL->prepare($stringSQL);
		//executa a funçao de cima
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function listarAlunos(){
		$conMySQL = DB::conexao();

        $stringSQL = "SELECT * FROM aluno;";     

        //echo $stringSQL;

        $sql = $conMySQL->prepare($stringSQL);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function listarDizimo(){
		$conMySQL = DB::conexao();

        $stringSQL = "SELECT * FROM dizimo ORDER BY tipo;";     

        //echo $stringSQL;

        $sql = $conMySQL->prepare($stringSQL);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

    public function listarOferta(){
        $conMySQL = DB::conexao();

        $stringSQL = "SELECT * FROM oferta ORDER BY tipo;";     

        //echo $stringSQL;

        $sql = $conMySQL->prepare($stringSQL);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function listarEcoe(){
		$conMySQL = DB::conexao();

        $stringSQL = "SELECT nomeEcoe FROM ecoe;";     

        //echo $stringSQL;

        $sql = $conMySQL->prepare($stringSQL);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function listarItens(){
		
		$conMySQL = DB::conexao();
		
        $stringSQL = "SELECT item1, item2, item3, item4, item5 FROM item";     

        //echo $stringSQL;

        $sql = $conMySQL->prepare($stringSQL);
		
		$sql->bindParam(':nomeEcoeF', $nomeEcoeF); 
		
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
	public function validar($usuario, $senha){
		$conMySQL = DB::conexao();

        $stringSQL = "SELECT * FROM usuario WHERE senha = '$senha' AND email = '$usuario'";     
		
        //echo $stringSQL;
		
        $sql = $conMySQL->prepare($stringSQL);
        $sql->execute();
		
		//var_dump(count($sql->fetchAll())) . "<br>";
		//exit;
		return count($sql->fetchAll());	
	}

    public function listaPessoasWeb($ativos = true)
    {
        $conMySQL = DB::conexao();

        $stringSQL = "SELECT * ";
        $stringSQL .= "FROM  ";
        $stringSQL .= " usuario ";
        $stringSQL .= " WHERE 1 = 1 ";

        if ($ativos) {
            $stringSQL .= " and  ativo = 'S' ";
        }

        $stringSQL .= "ORDER BY NOME ";

        //echo $stringSQL;

        $sql = $conMySQL->prepare($stringSQL);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    

    public function inserir()
    {
        if ($this) {
            $conMySQL = DB::conexao();
            
			$stringSQL = "INSERT INTO professor 
                          VALUES (:codigo, :nome, :email, :senha);";
						  
            $sql = $conMySQL->prepare($stringSQL);
            $sql->bindValue(":codigo", $this->getCodigo());
            $sql->bindValue(":nome", $this->getNome());
            $sql->bindValue(":email", $this->getEmail());
            $sql->bindValue(":senha", $this->getSenha());
            
            echo $stringSQL;
            exit;

            return $sql->execute();
        } else {
            return false;
        }
    }

    public function atualizar()
    {
        if ($this) {
            $conMySQL = DB::conexao();

            $stringSQL = " UPDATE pessoa SET
                            nome = :nome,
                            email = :email,
                            senha = :senha
                            WHERE codigo = :codigo;";

            $sql = $conMySQL->prepare($stringSQL);
            $sql->bindValue("codigo", $this->getCodigo());
            $sql->bindValue("nome", $this->getNome());
            $sql->bindValue("email", $this->getEmail());
            $sql->bindValue("senha", $this->getSenha());
            //echo $this->getBairro();
            //echo $stringSQL;
            //exit;

            return $sql->execute();
            // $sql->debugDumpParams();

            // exit;

        } else {
            return false;
        }
    }
}