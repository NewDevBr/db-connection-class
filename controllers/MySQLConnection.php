<?php
    
    namespace Controllers;

    class MySQLConnection {

        const HOST = "localhost";
        const USER = "";
        const PASS = "";
        const DATABASE = "geography";

        private $connection;

        public function __construct(){
            try{
                $this->connection = new PDO(
                    "mysql:dbname=".MySQLConnection::DATABASE.
                    ";host=".MySQLConnection::HOST, 
                    MySQLConnection::USER,
                    MySQLConnection::PASS
                );
                echo "Database connection has been established with success". "<br>";
            }catch(Exception $error){
                echo "Some error occurred, details:" . $error . "<br>";
            }
        }

        public function select($query){
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>