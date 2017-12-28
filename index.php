<?php

require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

//Carrega um usuário
//$root = new Usuario();
//root->loadbyId(3);
//echo $root;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista pesquisando pelo login
//$busca = Usuario::search("ro");
//echo json_encode($busca);


//Carrega o usuário utilizando o login e senha
//$usuario = new Usuario();
//$usuario->login("john", "Passteste");
//echo $usuario;

//Inserindo um novo usuário
//$aluno = new Usuario("aluno1", "@lun0");
//$aluno->insert();
//echo $aluno;

//Update usuario pelo id
//$usuario = new Usuario();
//$usuario->loadbyId(8);
//$usuario->update("professor", "65422");
//echo $usuario;

//Deletando um usuário pelo id
//$usuario = new Usuario();
//$usuario->loadbyId(8);
//$usuario->delete();
//echo $usuario;

//Inserindo um chamado

$chamado = new Chamado();

$chamado->loadbyIdChamado(3);

print_r($chamado);

$chamado->updateChamado(4,5);

print_r($chamado);






/*
$tabela = "tb_chamados";

$login = 1;
$password = 2;

$colunas = array("id_situacao_chamado", "id_problema_chamado");

$dados = array(":PROBLEMA"=>"1",":SITUACAO"=>"2");

$stmt = $conexao->prepare("INSERT INTO $tabela(id_situacao_chamado, id_problema_chamado) VALUES (:PROBLEMA, :SITUACAO)");

foreach ($dados as $chave => $valor) {
	$stmt->bindParam("$chave",$valor);
}

$stmt->execute();

echo "Inserido OK"; 
*/

/*
$query = "tb_chamados(id_situacao_chamado, id_problema_chamado)";

$valores = array(":PROBLEMA"=>"1",":SITUACAO"=>"2");

insertbd($query, $valores); 

print_r($valores);

function insertbd($query, $valores = array()){

	try{
		$conexao = new PDO("mysql:dbname=bdsup;host=localhost", "root", "");

		$stmt = $conexao->prepare("INSERT INTO $query VALUES (:PROBLEMA, :SITUACAO)");

		foreach ($valores as $chave => $valor) 
		{
			$stmt->bindParam("$chave",$valor);
		}

		$stmt->execute();

		echo "Inserido OK"; 
	}

	catch(PDOException $e)
	{
		echo "Erro: " .$e->getMessage(); 
	}
}

*/

?>