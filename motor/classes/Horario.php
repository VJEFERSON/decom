<?php
	class Horario {
		//Variaveis da classe
		//nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $codhor;
		private $nomhor;
		private $deshor;

		function __construct() { 
			$this->codhor;
            $this->nomhor;
            $this->deshor;
		}
		
		public function setarValoresDaInstancia($nomhor, $deshor){
            $this->nomhor=$nomhor;
            $this->deshor=$deshor;			
		}

		public function inserirHorarioNoBanco() {
			$sql = "
				INSERT INTO thorario (nomhor, deshor)  
				VALUES (
					'$this->nomhor',
                    '$this->deshor'
				);
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}
		
		public function buscarHorarioCadastradoPeloId($id_para_busca) {
			$sql = "
				SELECT
					*
				FROM
					thorario
				WHERE
					codhor = '$id_para_busca'
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta[0]; 
		}

		public function buscarHorariosRetornandoComVetor() {
			$sql = "
				SELECT *
				FROM thorario;
			";
			
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$Data = $DB->fetchData($sql);
			$realData;
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
		
		public function alterarInformacoesDoHorario($cod_para_alterar) {
			$sql = "
				UPDATE thorario SET
                    nomhor = '$this->nomhor',
                    deshor = '$this->deshor'
				WHERE codhor = '$cod_para_alterar';	
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function deletarHorario($cod_para_deletar) {
			$sql = "
				DELETE FROM thorario
				WHERE codhor = '$cod_para_deletar';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		function __destruct() {
			$this->codhor;
            $this->nomhor;
            $this->deshor;
		}	
	};
?>
