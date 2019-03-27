<?php
	class Patrimonio {
		//Variaveis da classe
		//nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
        private $codpatri;
        private $coddep_tdep;
		private $nompatri;
        private $descpatri;
        private $stapatri;

		function __construct() { 
            $this->codpatri;
            $this->coddep_tdep;
            $this->nompatri;
            $this->despatri;
            $this->stapatri;
		}
		
		public function setarValoresDaInstancia($codpatri, $coddep_tdep, $nompatri, $descpatri, $stapatri){
            $this->codpatri=$codpatri;
            $this->coddep_tdep=$coddep_tdep;
            $this->nompatri=$nompatri;
            $this->descpatri=$descpatri;
            $this->stapatri=$stapatri;			
		}
		public function setarValoresDaInstanciaParaEdicao($coddep_tdep, $nompatri, $descpatri, $stapatri){
            $this->coddep_tdep=$coddep_tdep;
            $this->nompatri=$nompatri;
            $this->descpatri=$descpatri;
            $this->stapatri=$stapatri;			
		}

		public function inserirPatrimonioNoBanco() {
			$sql = "
				INSERT INTO tpatrimonio (codpatri, coddep_tdep, nompatri, descpatri, stapatri)  
				VALUES (
					'$this->codpatri',
                    '$this->coddep_tdep',
                    '$this->nompatri',
                    '$this->descpatri',
                    '$this->stapatri'
				);
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}
		
		public function buscarPatrimonioCadastradoPeloId($id_para_busca) {
			$sql = "
				SELECT
					codpatri
				FROM
					tpatrimonio
				WHERE
					codpatri = '$id_para_busca'
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta[0]; 
		}

		public function buscarPatrimoniosRetornandoComVetor() {
			$sql = "
                SELECT tpatrimonio.codpatri,tpatrimonio.coddep_tdep,tpatrimonio.nompatri,tpatrimonio.descpatri,
                        tpatrimonio.stapatri,tdepartamento.nomdep
				FROM tpatrimonio,tdepartamento
				WHERE tdepartamento.coddep = tpatrimonio.coddep_tdep;
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
		
		public function alterarInformacoesDoPatrimonio($cod_para_alterar) {
			$sql = "
				UPDATE tpatrimonio SET
                    coddep_tdep = '$this->coddep_tdep',
                    nompatri = '$this->nompatri',
                    descpatri = '$this->descpatri',
                    stapatri = '$this->stapatri'
				WHERE codpatri = '$cod_para_alterar';	
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function deletarPatrimonio($cod_para_deletar) {
			$sql = "
				DELETE FROM tpatrimonio
				WHERE codpatri = '$cod_para_deletar';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		function __destruct() {
			$this->codpatri;
            $this->coddep_tdep;
            $this->nompatri;
            $this->despatri;
            $this->stapatri;
		}	
	};
?>
