<?php

class Conexion {
    private const DB_SERVER = "localhost:3306";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "bellus_velez";

   public const DB_DSN = "mysql:host=".self::DB_SERVER.";dbname=".self::DB_NAME.";charset=utf8mb4";

    protected PDO $db;

    public function __construct(){
        try {
            $this->db = new PDO(self::DB_DSN,self::DB_USER,self::DB_PASS);
        } catch (Exception $e) {
            echo "No se puede conectar a la base de datos, estamos trabajando para solucionarlo";
            die;
        }
    }

    public function getConexion() : PDO {
        return $this->db;
    }

}

?>
