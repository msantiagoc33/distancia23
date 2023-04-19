<?php
/**
 * Clase que se conecta a la BBDD y selecciona clientes por paises.
 * @author Manuel Santiago Cabeza
 * @version 1.2 
 */
class Clientes {

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    /**
     * Función encargada de seleccionar clientes y paises de la BBDD.
     * Se seleccionarán los clientes cuyo id de pais de la tabla pais 
     * coincida con el id de pais de la tabla clientes
     * @version 1.2
     * @return devuelve el conjunto de registros que cumple con las condiciones dadas.
     * Es llamada por {@link controlador#todosLosClientes()}
     * @param pais, parámetro recibido para buscar por el pais pasado por el mismo
     */
    public function todosLosClientes(String $pais) {
        $sqlClientes = "SELECT
    c.id_cliente,
    c.nombre as cliente,
    p.nombre as pais
FROM
    clientes AS c,
    paises AS p    
WHERE
    c.id_pais = $pais
ORDER BY c.id_cliente DESC";
        $resultado = $this->conexion->prepare($sqlClientes);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }
}
