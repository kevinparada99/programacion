
<?php 
include('../../config/config.php');
$producto = new producto($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$producto->$proceso( $_GET['producto'] );
print_r(json_encode($producto->respuesta));

class producto{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($producto){
        $this->datos = json_decode($producto, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['codigo']) ){
            $this->respuesta['msg'] = 'por favor ingrese el codigo ';
        }
        if( empty($this->datos['nombre']) ){
            $this->respuesta['msg'] = 'por favor ingrese el nombre ';
        }
        if( empty($this->datos['cantidad']) ){
            $this->respuesta['msg'] = 'por favor ingrese la cantidad';
        }
        $this->almacenar_producto();
    }
    private function almacenar_producto(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO productos (codigo,nombre,cantidad,fecha) VALUES(
                        "'. $this->datos['codigo'] .'",
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['cantidad'] .'",
                        "'. $this->datos['fecha'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE productos SET
                        codigo     = "'. $this->datos['codigo'] .'",
                        nombre     = "'. $this->datos['nombre'] .'",
                        cantidad   = "'. $this->datos['cantidad'] .'",
                        fecha      = "'. $this->datos['fecha'] .'"
                    WHERE idProducto = "'. $this->datos['idProducto'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarProducto($valor = ''){
        $this->db->consultas('
            select productos.idProducto, productos.codigo, productos.nombre, productos.cantidad, productos.fecha
            from productos
            where productos.codigo like "%'. $valor .'%" or productos.nombre like "%'. $valor .'%" or productos.cantidad like "%'. $valor .'%"
        ');
        return $this->respuesta = $this->db->obtener_data();
    }


    public function eliminarProducto($idProducto = 0){

        $this->db->consultas('
            DELETE productos
            FROM productos
            WHERE productos.idProducto="'.$idProducto.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';
    }
}
?>