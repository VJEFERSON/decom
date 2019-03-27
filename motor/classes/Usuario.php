<?php
	class Usuario {
		//Variaveis da classe
		//nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $codusu;
		private $coddep_tdep;
		private $nomusu;
		private $logusu;
		private $senusu;
		private $funusu;
		private $nivusu;
		private $stausu;

		function __construct() { 
			$this->codusu;
			$this->coddep_tdep;
			$this->nomusu;
			$this->logusu;
			$this->senusu;
			$this->funusu;
			$this->nivusu;
			$this->stausu;
		}
		
		public function setarValoresDaInstancia($coddep_tdep,$nomusu,$logusu,$senusu,$funusu,$nivusu,$stausu){
			$this->coddep_tdep=$coddep_tdep;
			$this->nomusu=$nomusu;
			$this->logusu=$logusu;
			$this->senusu=$senusu;
			$this->funusu=$funusu;
			$this->nivusu=$nivusu;
			$this->stausu=$stausu;			
		}

		public function setarValoresProfile($coddep_tdep,$nomusu,$logusu,$funusu){
			$this->coddep_tdep=$coddep_tdep;
			$this->nomusu=$nomusu;
			$this->logusu=$logusu;
			$this->funusu=$funusu;			
		}

		public function inserirUsuarioNoBanco() {
			$sql = "
				INSERT INTO tusuario ( coddep_tdep,nomusu,logusu,senusu,funusu,nivusu,stausu )  
				VALUES (
					'$this->coddep_tdep',
					'$this->nomusu',
					'$this->logusu',
					'$this->senusu',
					'$this->funusu',
					'$this->nivusu',
					'$this->stausu'
				);
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}
		
		public function buscarUsuarioCadastradoPeloId($id_para_busca) {
			$sql = "
				SELECT
					*
				FROM
					tusuario
				WHERE
					codusu = '$id_para_busca'
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta[0]; 
		}

		public function buscarUsuariosRetornandoComVetor() {
			$sql = "
				SELECT *
				FROM tusuario;
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
		
		public function buscarUsuarioCadastradoPeloEmail($email_para_busca){
			$sql = "
				SELECT *
				FROM
					tusuario
				WHERE
					logusu = '$email_para_busca'
			";
	
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$Data = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $Data[0]; 
		}
		
		public function alterarInformacoesDoUsuario($cod_para_alterar) {
			$sql = "
				UPDATE tusuario SET
					coddep_tdep='$this->coddep_tdep',
					nomusu='$this->nomusu',
				   	logusu='$this->logusu',
				   	senusu='$this->senusu',
				   	funusu='$this->funusu',
				   	nivusu='$this->nivusu',
				   	stausu='$this->stausu'
				WHERE codusu = '$cod_para_alterar';	
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function alterarSenhaDoUsuario($cod_para_alterar,$senha_nova) {
			$sql = "
				UPDATE tusuario SET
					senusu = '$senha_nova'
				WHERE codusu = '$cod_para_alterar';	
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function alterarInformacoesProfileDoUsuario($cod_para_alterar) {
			$sql = "
				UPDATE tusuario SET
					coddep_tdep='$this->coddep_tdep',
					nomusu='$this->nomusu',
			   		logusu='$this->logusu',
			   		funusu='$this->funusu'
				WHERE codusu = '$cod_para_alterar';
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function desativarUsuario($cod_para_desativar) {
			$sql = "
				UPDATE tusuario SET 
					stausu = '0'
				WHERE codusu = '$cod_para_desativar';	
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function deletarUsuario($cod_para_deletar) {
			$sql = "
				DELETE FROM tusuario
				WHERE codusu = '$cod_para_deletar';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		function __destruct() {
			$this->codusu;
			$this->coddep_tdep;
			$this->nomusu;
			$this->logusu;
			$this->senusu;
			$this->funusu;
			$this->nivusu;
			$this->stausu;
		}	
	};
?>
