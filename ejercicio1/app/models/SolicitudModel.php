<?php


namespace app\models;


class SolicitudModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function guardar($nombre, $correo, $dui, $monto, $tasa, $plazo, $cuota) {
        $query = "INSERT INTO solicitudes (nombre, correo, dui, monto, tasa, plazo, cuota) VALUES (:nombre, :correo, :dui, :monto, :tasa, :plazo, :cuota)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':dui', $dui);
        $stmt->bindParam(':monto', $monto);
        $stmt->bindParam(':tasa', $tasa);
        $stmt->bindParam(':plazo', $plazo);
        $stmt->bindParam(':cuota', $cuota);

        return $stmt->execute();
    }
}


?>
