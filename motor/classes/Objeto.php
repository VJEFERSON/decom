<?php
	class Objeto {
		//Variaveis da classe
		//nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $codob;
		private $coddep_tdep;
		private $nomobj;
		private $desobj;
		private $camobj;
		private $staobj;
		private $conresobj;

		function __construct() { 
            $this->codob;
            $this->coddep_tdep;
            $this->nomobj;
            $this->desobj;
            $this->camobj;
            $this->staobj;
            $this->conresobj;
		}
		
		public function setarValoresDaInstancia($coddep_tdep,$nomobj,$desobj,$camobj,$staobj){
			$this->coddep_tdep=$coddep_tdep;
			$this->nomobj=$nomobj;
            $this->desobj=$desobj;
            $this->camobj=$camobj;
            $this->staobj=$staobj;			
		}

		public function inserirObjetoNoBanco() {
			$sql = "
				INSERT INTO tobjeto ( coddep_tdep,nomobj,desobj,camobj,staobj)  
				VALUES (
					'$this->coddep_tdep',
                    '$this->nomobj',
                    '$this->desobj',
                    '$this->camobj',
                    '$this->staobj'
				);
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}
		
		public function buscarObjetoCadastradoPeloId($id_para_busca) {
			$sql = "
				SELECT
					*
				FROM
					tobjeto
				WHERE
					codobj = '$id_para_busca'
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta[0]; 
		}

		public function buscarObjetosRetornandoComVetor() {
			$sql = "
				SELECT tobjeto.codobj,tobjeto.coddep_tdep,tobjeto.nomobj,tobjeto.desobj,tobjeto.camobj,tobjeto.staobj,
						tobjeto.conresobj,tdepartamento.nomdep
				FROM tobjeto,tdepartamento
				WHERE tdepartamento.coddep = tobjeto.coddep_tdep;
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
		
		public function alterarInformacoesDoObjeto($cod_para_alterar) {
			$sql = "
				UPDATE tobjeto SET
                	coddep_tdep = '$this->coddep_tdep',
                	nomobj = '$this->nomobj',
                	desobj = '$this->desobj',
                	camobj = '$this->camobj'
				WHERE codobj = '$cod_para_alterar';	
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function deletarObjeto($cod_para_deletar) {
			$sql = "
				DELETE FROM tobjeto
				WHERE codobj = '$cod_para_deletar';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		function __destruct() {
			$this->codob;
            $this->coddep_tdep;
            $this->nomobj;
            $this->desobj;
            $this->camobj;
            $this->staobj;
            $this->conresobj;
		}	
	};
?>
