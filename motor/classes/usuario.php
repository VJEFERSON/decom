<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Usuario {
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_usuario;
		private $nome;
		private $email;
		private $senha;
		private $funcao;
		private $tipo_usuario;


		function __construct() { 
			$this->$id_usuario;
			$this->$nome;
			$this->$email;
			$this->$senha;
			$this->$funcao;
			$this->$tipo_usuario;
		}
		
		public function setarValoresDaInstancia($nome,$email,$senha,$funcao,$tipo_usuario){
			$this->$nome=$nome;
			$this->$email=$email;
			$this->$senha=$senha;
			$this->$funcao=$funcao;
			$this->$tipo_usuario=$tipo_usuario;			
		}

		public function inserirUsuarioNoBanco() {
			$sql = "
				INSERT INTO usuario(
					nome,email,senha,funcao,tipo_usuario)  
				VALUES(
					'$this->$nome',
					'$this->$email',
					'$this->$senha',
					'$this->$funcao',
					'$this->$tipo_usuario'
				);
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}
		
		public function buscarUsuarioCadastradoPeloId($id_para_busca) {
			$sql = "
				SELECT
					id_usuario,
					nome,
					email,
					senha,
					funcao,
					tipo_usuario
				FROM
					usuario
				WHERE
					id_usuario  = '$id_para_busca'
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
				FROM usuario;
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
		
		public function buscarUsuarioCadastradoPeloEmail($email_para_busca){
			$sql = "
				SELECT *
				FROM
					usuario
				WHERE
					email = '$email_para_busca'
			";
	
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$Data = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $Data[0]; 
		}
		
		public function alterarInformacoesDoUsuario($id_usuario_para_alterar) {
			$sql = "
				UPDATE usuario SET
				   nome='$this->$nome',
				   email='$this->$email',
				   senha='$this->$senha',
				   funcao='$this->$funcao',
				   tipo_usuario='$this->$tipo_usuario'

				WHERE id_usuario = '$id_usuario_para_alterar';	
			";
		
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function deletarUsuario($id_usuario_para_deletar) {
			$sql = "
				DELETE FROM usuario
				WHERE id_usuario = '$id_usuario_para_deletar';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		function __destruct() {
			$this->$id_usuario;
			$this->$nome;
			$this->$email;
			$this->$senha;
			$this->$funcao;
			$this->$tipo_usuario;
		}	
	};

?>
