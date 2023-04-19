<?php
/**
 * Clase encargada de realizar la conexión con la BBDD.
 * 
 * @author Manuel Santiago Cabeza
 * @version 1.2
 * Hace uso de {@link Conexion/ConexionPDO.php#conectar()}
 * @throws Exception lanzada cuando no pueda realizarse la conexión.
 */
class Login {

    public function __construct() {
        try {
            $this->conexion = conexion::conectar();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}
