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

		public function atualizarValoresDoAgendamento($codigo_objeto, $data, $horario){

			$sql = "
			UPDATE tagendamento SET
			codhor_thor='$this->codhor_thor',
			codobj_tobj='$this->codobj_tobj',
			codusu_tusu='$this->codusu_tusu',
			datage='$this->datage',
			desage='$this->desage',
			gerrec='$this->gerrec'
			WHERE codobj_tobj = '$codigo_objeto' AND datage = '$data'
			AND codhor_thor = '$horario';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
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
				SELECT *
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

		public function buscarAgendamento($codObjeto, $codHorario, $dataAgendamento){
			$sql = "
				  SELECT *
				  FROM tagendamento, tobjeto, thorario
				  WHERE tagendamento.codobj_tobj = '$codObjeto' AND tagendamento.codhor_thor='$codHorario'
				  AND tagendamento.datage='$dataAgendamento'
				  AND tagendamento.codobj_tobj = tobjeto.codobj AND tagendamento.codhor_thor = thorario.codhor
				  ";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta[0]; 

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
		public function deletarAgendamento($codObjeto, $codHorario, $dataAgendamento) {
			$sql = "
				DELETE FROM tagendamento
				WHERE tagendamento.codobj_tobj = '$codObjeto'
				AND tagendamento.codhor_thor = '$codHorario'
				AND tagendamento.datage= '$dataAgendamento';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
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
