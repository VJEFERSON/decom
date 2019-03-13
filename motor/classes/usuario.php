<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Usuario {
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_usuario;
		private $nome;
		private $usuario;
		private $email;
		private $senha;
		private $funcao;
		private $tipo_usuario;


		function __construct() { 
			$this->$id_usuario;
			$this->$nome;
			$this->$usuario;
			$this->$email;
			$this->$senha;
			$this->$funcao;
			$this->$tipo_usuario;
		}
		
		public function setarValoresDaInstancia($id_usuario,$nome,$usuario,$email,$senha,$funcao,$tipo_usuario){
			$this->$id_usuario=$id_usuario;
			$this->$nome=$nome;
			$this->$usuario=$usuario;
			$this->$email=$email;
			$this->$senha=$senha;
			$this->$funcao=$funcao;
			$this->$tipo_usuario=$tipo_usuario;			
		}

		public function inserirUsuarioNoBanco() {
			$sql = "
				INSERT INTO usuario(
					nome,usuario,email,senha,funcao,tipo_usuario)  
				VALUES(
					'$this->$nome',
					'$this->$usuario',
					'$this->$email',
					'$this->$senha',
					'$this->$funcao',
					'$this->$tipo_usuario'
				);
			";
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		public function buscarUsuarioCadastradoPeloId($id_para_busca) {
			$sql = "
				SELECT
					t1.id_usuario,
					t1.nome,
					t1.usuario,
					t1.email,
					t1.senha,
					t1.funcao,
					t1.tipo_usuario
				FROM
					usuario AS t1
				WHERE
					t1.id_usuario  = '$id_para_busca'
			";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$DB->close();
			return $Data[0]; 
		}

		public function buscarUsuariosRetornandoComVetor() {
			$sql = "
				SELECT
					t1.id_usuario,
					t1.nome,
					t1.usuario,
					t1.email,
					t1.senha,
					t1.funcao,
					t1.tipo_usuario
				FROM
					usuario;
			";
			
			$DB = new DB();
			$DB->open();
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
			$DB->close();
			return $realData; 
		}
		
		public function buscarUsuarioCadastradoPeloUsuario($usuario_para_busca){
			$sql = "
				SELECT *
				FROM
					usuario AS t1
				WHERE
					t1.usuario = '$usuario_para_busca'
			";
	
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$DB->close();
			return $Data[0]; 
		}
		
		public function alterarInformacoesDoUsuario() {
			$sql = "
				UPDATE usuario SET
				   nome='$this->$nome',
				   usuario='$this->$usuario',
				   email='$this->$email',
				   senha='$this->$senha',
				   funcao='$this->$funcao',
				   tipo_usuario='$this->$tipo_usuario'

				WHERE id_usuario = '$this->id_usuario';	
			";
		
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		public function deletarUsuario() {
			$sql = "
				DELETE FROM usuario
				WHERE id_usuario = '$this->id_usuario';
			";

			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		function __destruct() {
			$this->$id_usuario;
			$this->$nome;
			$this->$usuario;
			$this->$email;
			$this->$senha;
			$this->$funcao;
			$this->$tipo_usuario;
		}	
	};

?>
