<?php

	class Chamado{
		private $problema;
		private $situacao;
		private $terminal;
		private $idChamado;

		public function getProblema(){
			return $this->problema;
		}
		public function setProblema($problema){
			return $this->problema = $problema;
		}

		public function getSituacao(){
			return $this->situacao;
		}
		public function setSituacao($situacao){
			return $this->situacao = $situacao;
		}

		public function getTerm(){
			return $this->terminal;
		}
		public function setTerm($terminal){
			return $this->terminal = $terminal;
		}

		public function getIdChamado(){
			return $this->idChamado;
		}
		public function setIdChamado($idChamado){
			return $this->idChamado = $idChamado;
		}

		//Inserir chamados

		public function insertChamado($problema, $situacao, $term){

			$duplicidade = $this->searchDuplicado($situacao, $term);

			if(!$duplicidade)
			{
				$this->setProblema($problema);
				$this->setSituacao($situacao);
				$this->setTerm($term);

				$sql = new Sql();

				$resultado = $sql->query("INSERT INTO tb_chamados(id_situacao_chamado, id_problema_chamado, id_terminal) VALUES(:PROBLEMA, :SITUACAO, :TERMINAL)", array(
					':PROBLEMA'=>$this->getProblema(),
					':SITUACAO'=>$this->getSituacao(),
					':TERMINAL'=>$this->getTerm(),
				));
				if(count($resultado) > 0)
				{
					echo "Cadastrado com sucesso!";
				}
				else
				{
					echo "Chamado não cadastrado!";
				}
			}else{
				echo "Já possuí chamado em aberto";
				//echo json_encode($duplicidade);
			}
		}

		//Pesquisa duplicidade

		public function searchDuplicado($situacao,$terminal){

		$sql = new Sql();
		
		return $resultado = $sql->select("SELECT * FROM tb_chamados WHERE id_situacao_chamado = :PESQSITUACAO AND id_terminal = :PESQTERM", array(
			':PESQSITUACAO'=>$situacao,
			':PESQTERM'=>$terminal,
		));	
		}

		//Update dos chamados

		public function updateChamado($problema, $situacao){

		$sql = new Sql();

		$sql->query("UPDATE tb_chamados SET id_situacao_chamado = :SITUACAO, id_problema_chamado = :PROBLEMA WHERE id_chamado = :ID", array(
			':SITUACAO'=>$this->setSituacao($situacao),
			':PROBLEMA'=>$this->setProblema($problema),
			':ID'=>$this->getIdChamado(),
		));

		}

		//Pesquisa via id de chamado

		public function loadByIdChamado($id){

		$sql = new Sql();

		$resultado = $sql->select("SELECT * FROM tb_chamados WHERE id_chamado = :ID", array(
			":ID"=>$id

		));

		if(count($resultado) > 0){

		$this->setData($resultado[0]);

		}

	}

		public function setData($dados){

		$this->setIdChamado($dados['id_chamado']);
		$this->setSituacao($dados['id_situacao_chamado']);
		$this->setProblema($dados['id_problema_chamado']);
		$this->setTerm($dados['id_terminal']);

	}
}