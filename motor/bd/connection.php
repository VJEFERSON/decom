<?php
    // Definição para Acesso Local
    define("DB_HOSTI","localhost"); 
    define("DB_USERNAMEI","root");
    define("DB_PASSWORDI","sublime");
    // Definição da Base de Dados
    define("DB_DATABASEI","decomsisa");

    class DataBaseConnection {
        private $dbi;
        private $query;

        function __construct() {
            $this->dbi;
            $this->query;
        }

        function estabelerConexaoDataBase() {
            try{
                $this->dbi = new PDO('mysql:host='.DB_HOSTI.';dbname='.DB_DATABASEI.';charset=utf8mb4',DB_USERNAMEI,DB_PASSWORDI);
                $this->dbi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->dbi->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }catch(PDOException $e){
                echo 'Falha ao conectar com o Banco de Dados: '.$e->getMessage();
            } 
        }
        
        function query($sql) {
            try {
                //connect as appropriate as above
                 $this->dbi->query($sql); //invalid query!
            } catch(PDOException $ex) {
                echo 'Algum erro ocorreu!'.$ex->getMessage(); //user friendly message
            }
        }
            
        function fetchData($sql) {
            $stmt = $this->dbi->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        
        function buscarIdUltimoElementoInserido() {
            $lastId = $this->dbi->lastInsertId();
            return $lastId;
        }

        function encerrarConexaoDataBase() {
            $this->dbi = NULL;
        }

        function __destruct() {
            $this->dbi;
            $this->query;
        }
    }
?>