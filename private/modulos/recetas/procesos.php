<?php 
include('../../config/config.php');
$receta = new receta($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$receta->$proceso( $_GET['receta'] );
print_r(json_encode($receta->respuesta));

class receta{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($receta){
        $this->datos = json_decode($receta, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['codigo']) ){
            $this->respuesta['msg'] = 'por favor ingrese el codigo de la receta';
        }
        if( empty($this->datos['nombre']) ){
            $this->respuesta['msg'] = 'por favor ingrese el nombre de la receta';
        }
        if( empty($this->datos['ingrediente']) ){
            $this->respuesta['msg'] = 'por favor ingrese los ingredientes';
        }
        $this->almacenar_receta();
    }
    private function almacenar_receta(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO recetas (codigo,nombre,ingrediente,informacion) VALUES(
                        "'. $this->datos['codigo'] .'",
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['ingrediente'] .'",
                        "'. $this->datos['informacion'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE recetas SET
                        codigo     = "'. $this->datos['codigo'] .'",
                        nombre     = "'. $this->datos['nombre'] .'",
                        ingrediente  = "'. $this->datos['ingrediente'] .'",
                        informacion   = "'. $this->datos['informacion'] .'"
                    WHERE idReceta = "'. $this->datos['idReceta'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarReceta($valor = ''){
        $this->db->consultas('
            select recetas.idReceta, recetas.codigo, recetas.nombre, recetas.ingrediente, recetas.informacion
            from recetas
            where recetas.codigo like "%'. $valor .'%" or recetas.nombre like "%'. $valor .'%"  or recetas.ingrediente like "%'. $valor .'%"
        ');
        return $this->respuesta = $this->db->obtener_data();
    }
    public function eliminarReceta($idReceta = 0){
        $this->db->consultas('
            DELETE recetas
            FROM recetas
            WHERE recetas.idReceta="'.$idReceta.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';
    }
}
?>