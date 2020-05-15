
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
        if( empty(trim($this->datos['codigo'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el codigo del producto.';
        }
        if( empty(trim($this->datos['nombre'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el nombre del producto.';
        }
        if( empty(trim($this->datos['cantidad'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la cantidad del producto.';
        }
        if( empty(trim($this->datos['tipo'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el tipo del producto.';
        }
        if( empty(trim($this->datos['fecha'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la caducidad del producto.';
        }
        if( empty(trim($this->datos['registro'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la fecha de registro del producto.';
        }
        $this->almacenar_producto();
    }
    private function almacenar_producto(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO productos (codigo,nombre,cantidad,tipo,fecha,registro) VALUES(
                        "'. $this->datos['codigo'] .'",
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['cantidad'] .'",
                        "'. $this->datos['tipo'] .'",
                        "'. $this->datos['fecha'] .'",
                        "'. $this->datos['registro'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE productos SET
                        codigo     = "'. $this->datos['codigo'] .'",
                        nombre     = "'. $this->datos['nombre'] .'",
                        cantidad   = "'. $this->datos['cantidad'] .'",
                        tipo   = "'. $this->datos['tipo'] .'",
                        fecha      = "'. $this->datos['fecha'] .'"
                        registro    = "'. $this->datos['registro'] .'"
                    WHERE idProducto = "'. $this->datos['idProducto'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarProducto($valor = ''){
        $this->db->consultas('
            select productos.idProducto, productos.codigo, productos.nombre, productos.cantidad, productos.tipo, productos.fecha, productos.registro
            from productos
            where productos.codigo like "%'. $valor .'%" or productos.nombre like "%'. $valor .'%" or productos.tipo like "%'. $valor .'%"
            order by fecha
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