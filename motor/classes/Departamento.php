<?php
	class Departamento {
		//Variaveis da classe
		//nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $coddep;
		private $nomdep;
		private $desdep;
		private $locdep;
		private $ciddep;

		function __construct() { 
			$this->coddep;
            $this->nomdep;
            $this->desdep;
            $this->locdep;
            $this->ciddep;
		}
		
		public function setarValoresDaInstancia($nomdep, $desdep, $locdep, $ciddep){
            $this->nomdep=$nomdep;
            $this->desdep=$desdep;
            $this->locdep=$locdep;
            $this->ciddep=$ciddep;			
		}

		public function inserirDepartamentoNoBanco() {
			$sql = "
				INSERT INTO tdepartamento (nomdep,desdep,locdep,ciddep)  
				VALUES (
					'$this->nomdep',
                    '$this->desdep',
                    '$this->locdep',
                    '$this->ciddep'
				);
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}
		
		public function buscarDepartamentoCadastradoPeloId($id_para_busca) {
			$sql = "
				SELECT
					*
				FROM
					tdepartamento
				WHERE
					coddep = '$id_para_busca'
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta[0]; 
		}

		public function buscarDepartamentosRetornandoComVetor() {
			$sql = "
				SELECT *
				FROM tdepartamento;
			";
			
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$Data = $DB->fetchData($sql);
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->encerrarConexaoDataBase();
			return $realData; 
		}
		
		public function alterarInformacoesDoDepartamento($cod_para_alterar) {
			$sql = "
				UPDATE tdepartamento SET
                nomdep = '$this->nomdep',
                desdep = '$this->desdep',
                locdep = '$this->locdep',
                ciddep = '$this->ciddep'
				WHERE coddep = '$cod_para_alterar';	
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function deletarDepartamento($cod_para_deletar) {
			$sql = "
				DELETE FROM tdepartamento
				WHERE coddep = '$cod_para_deletar';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		function __destruct() {
			$this->coddep;
            $this->nomdep;
            $this->desdep;
            $this->locdep;
            $this->ciddep;
		}	
	};
?>
