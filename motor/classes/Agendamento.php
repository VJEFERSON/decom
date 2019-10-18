<?php
	class Agendamento {
		//Variaveis da classe
		//nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
        private $codobj_tobj;
        private $codusu_tusu;
        private $codhor_thor;
		private $datage;
		private $desage;
		private $gerrec;

		function __construct() { 
			$this->codobj_tobj;
            $this->codusu_tusu;
            $this->codhor_thor;
            $this->datage;
            $this->desage;
            $this->gerrec;
		}
		
		public function setarValoresDaInstancia($codobj_tobj, $codusu_tusu, $codhor_thor, $datage, $desage, $gerrec){
            $this->codobj_tobj=$codobj_tobj;
            $this->codusu_tusu=$codusu_tusu;
            $this->codhor_thor=$codhor_thor;
            $this->datage=$datage;
            $this->desage=$desage;
            $this->gerrec=$gerrec;			
		}

		public function inserirAgendamentoNoBanco() {
			$sql = "
				INSERT INTO tagendamento (codobj_tobj, codusu_tusu, codhor_thor, datage, desage, gerrec)  
				VALUES (
					'$this->codobj_tobj',
                    '$this->codusu_tusu',
                    '$this->codhor_thor',
                    '$this->datage',
                    '$this->desage',
                    '$this->gerrec'
				);
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function buscarAgendamentosRetornandoComVetor($yearSearch) {
			$yearBefore = $yearSearch-1;
			$sql = "
                SELECT tagendamento.codobj_tobj,tagendamento.codusu_tusu,
                    tagendamento.datage, tagendamento.desage,
                    tobjeto.nomobj,thorario.nomhor,tusuario.nomusu
                FROM tagendamento,tobjeto,tusuario,thorario
                WHERE tagendamento.codobj_tobj = tobjeto.codobj AND
                    tagendamento.codusu_tusu = tusuario.codusu AND
					tagendamento.codhor_thor = thorario.codhor AND
					tagendamento.datage LIKE '%$yearSearch%';
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





		public function buscarHorariosDosAgendamentosRetornandoComVetor($codUsuario,$codObjeto,$dataAgendamento,$yearSearch){
			$sql = "
				SELECT thorario.nomhor,tagendamento.codusu_tusu,tagendamento.datage,
						tagendamento.codobj_tobj
                FROM tagendamento,tobjeto,tusuario,thorario
                WHERE tagendamento.codobj_tobj = '$codObjeto' AND
                    tagendamento.codusu_tusu = '$codUsuario' AND
					tagendamento.datage = '$dataAgendamento' AND
					tagendamento.codhor_thor = thorario.codhor AND
					tagendamento.datage LIKE '%$yearSearch%';
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
		
		function __destruct() {
			$this->codobj_tobj;
            $this->codusu_tusu;
            $this->codhor_thor;
            $this->datage;
            $this->desage;
            $this->gerrec;
		}	
	};
?>