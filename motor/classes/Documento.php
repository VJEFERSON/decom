<?php
	class Documento {
		//Variaveis da classe
		//nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
        private $assuntodoc;
        private $caminhodoc;
        private $cod_sobredoc;
		private $cod_tipodoc;
		private $datadoc;
		private $numerodoc;

		function __construct() { 
			$this->assuntodoc;
            $this->caminhodoc;
            $this->cod_sobredoc;
            $this->cod_tipodoc;
            $this->datadoc;
            $this->numerodoc;
		}
		
		public function setarValoresDaInstancia($assunto, $caminho, $codigo_sobre_documento, $codigo_tipo_documento, $data_documento){
            $this->assuntodoc=$assunto;
            $this->caminhodoc=$caminho;
            $this->cod_sobredoc=$codigo_sobre_documento;
            $this->cod_tipodoc=$codigo_tipo_documento;
            $this->datadoc=$data_documento;		
		}

		public function atualizarValoresDoDocumento($codigo_sobre_documento, $codigo_tipo_documento, $numero_documento){

			$sql = "
			UPDATE tdocumento SET
			assuntodoc='$this->assuntodoc',
			caminhodoc='$this->caminhodoc',
			cod_sobredoc='$this->doc_sobredoc',
			cod_tipodoc='$this->cod_tipodoc',
			datadoc='$this->datadoc',
			numerodoc='$this->numerodoc'
			WHERE cod_sobredoc = '$codigo_sobre_documento' AND cod_tipodoc = '$codigo_tipo_documento'
			AND numerodoc = '$numero_documento';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}

		public function inserirDocumentoNoBanco() {
			
			
			echo $datadoc;
			
			$sql = " 
			INSERT INTO `tdocumento` (`numerodoc`, `datadoc`,
			`cod_sobredoc`, `assuntodoc`, `caminhodoc`, `cod_tipodoc`) 
			VALUES (
			NULL, 
			'$this->data_documento', 
			'$this->cod_sobredoc', 
			'$this->assuntodoc',
			'$this->caminhodoc', 
			'$this->cod_tipodoc'
			);
			";

			echo $sql;
			//'$this->numerodoc' (atributo serial, deve ser definido automaticamente. está aqui comentado caso dê merda)
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;

		}

		public function buscarDocumentosRetornandoComVetor($yearSearch) {
			$yearBefore = $yearSearch-1;
			$sql = "
				SELECT *
                FROM tdocumento
                WHERE datadoc LIKE '%$yearSearch%';
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

		public function buscarDocumento($codigo_sobre_documento, $codigo_tipo_documento, $numero_documento){
			$sql = "
				  SELECT *
				  FROM tdocumento
				  WHERE cod_sobredoc = '$codigo_sobre_documento' 
				  AND cod_tipodoc = '$codigo_tipo_documento'
				  AND numerodoc = '$numero_documento';
			";
			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta = $DB->fetchData($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta[0]; 

		}



		public function deletarDocumento($codigo_sobre_documento, $codigo_tipo_documento, $numero_documento) {
			$sql = "
				DELETE FROM tdocumento
				WHERE cod_sobredoc = '$codigo_sobre_documento' 
				AND cod_tipodoc = '$codigo_tipo_documento'
				AND numerodoc = '$numero_documento';
			";

			$DB = new DataBaseConnection();
			$DB->estabelerConexaoDataBase();
			$resultadoConsulta =$DB->query($sql);
			$DB->encerrarConexaoDataBase();
			return $resultadoConsulta;
		}
		
		function __destruct() {
			$this->assuntodoc;
            $this->caminhodoc;
            $this->cod_sobredoc;
            $this->cod_tipodoc;
            $this->datadoc;
            $this->numerodoc;
		}	
	};

?>
