<?php
    // Definição para Acesso Local
    define("DB_HOSTI","localhost"); 
    define("DB_USERNAMEI","root");
    define("DB_PASSWORDI","sublime");
    // Definição da Base de Dados
    define("DB_DATABASEI","bd");

    class DataBaseConnection {
        private $dbi;
        private $query;

        function __construct() {
            $this->dbi;
            $this->query;
        }

        function __destruct() {
            $this->dbi;
            $this->query;
        }

        // starts MYSQL
        function open() {
            $this->dbi = new PDO('mysql:host='.DB_HOSTI.';dbname='.DB_DATABASEI.';charset=utf8mb4',DB_USERNAMEI,DB_PASSWORDI);
            $this->dbi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbi->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        //close connection
        function close() {
            $this->dbi = NULL;
        }

        // executes a SQL string
        function query($sql) {
            try {
                //connect as appropriate as above
                 $this->dbi->query($sql); //invalid query!

            } catch(PDOException $ex) {
                echo "An Error occured! $ex"; //user friendly message
            }
        }
            
        function fetchData($sql) {
            $stmt = $this->dbi->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        
        //função que retorna o id do ultimo elemento inserido no bd
        function lastId() {
            $lastId = $this->dbi->lastInsertId();
            return $lastId;
        }
    }
?>