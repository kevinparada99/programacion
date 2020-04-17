<?php 
include('../../Config/Config.php');
$enfermedad = new enfermedad($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$enfermedad->$proceso( $_GET['enfermedad'] );
print_r(json_encode($enfermedad->respuesta));

class enfermedad{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($enfermedad){
        $this->datos = json_decode($enfermedad, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['receta']['id']) ){
            $this->respuesta['msg'] = 'por favor ingrese la receta';
        }
        if( empty($this->datos['nombre']) ){
            $this->respuesta['msg'] = 'por favor ingrese el nombre de la enfermedad';
        }
        $this->almacenar_enfermedad();
    }
    private function almacenar_enfermedad(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO enfermedades (idReceta,nombre,tipo) VALUES(
                        "'. $this->datos['receta']['id'] .'",
                        "'. $this->datos['nombre'].'",
                        "'. $this->datos['tipo'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE enfermedades SET
                        idReceta     = "'. $this->datos['receta']['id'] .'",
                        nombre      = "'. $this->datos['nombre'] .'",
                        tipo         = "'. $this->datos['tipo'] .'"
                    WHERE idEnfermedad = "'. $this->datos['idEnfermedad'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarEnfermedad($valor = ''){
        $this->db->consultas('
            select enfermedades.idEnfermedad, enfermedades.codigo, enfermedades.nombre
            from enfermedades
            where enfermedades.codigo like "%'. $valor .'%" or enfermedades.nombre like "%'. $valor .'%"
        ');
        return $this->respuesta = $this->db->obtener_data();
    }
    public function traer_recetas(){
        $this->db->consultas('
            select recetas.nombre AS label, recetas.idReceta AS id
            from recetas
        ');
        $recetas = $this->db->obtener_data();
        return $this->respuesta = ['recetas'=>$recetas];
    }
    public function eliminarEnfermedad($idEnfermedad = 0){
        $this->db->consultas('
            DELETE enfermedades
            FROM enfermedades
            WHERE enfermedades.idEnfermedad="'.$idEnfermedad.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';;
    }
}
?>