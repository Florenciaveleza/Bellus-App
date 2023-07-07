<?php

require_once 'conexion.php';
require_once 'usuarios.php'; 

class Facturacion {
    public function insertarFacturacion($userId, $totalPago) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO facturacion (usuario_id, total) VALUES (:userId, :totalPago)";
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':totalPago', $totalPago);

        try {
            $stmt->execute();
            echo "Datos de facturación insertados correctamente";
        } catch (PDOException $e) {
            echo "Error al insertar datos de facturación: " . $e->getMessage();
        }
    }
}

?>
