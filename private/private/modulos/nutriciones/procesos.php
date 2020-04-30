<?php 
include('../../Config/Config.php');
$nutricion = new nutricion($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$nutricion->$proceso( $_GET['nutricion'] );
print_r(json_encode($nutricion->respuesta));

class nutricion{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($nutricion){
        $this->datos = json_decode($nutricion, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['usuario']['id']) ){
            $this->respuesta['msg'] = 'por favor ingrese el usuario';
        }
        if( empty($this->datos['receta']['id']) ){
            $this->respuesta['msg'] = 'por favor ingrese la receta';
        }
        if( empty($this->datos['hora']['id']) ){
            $this->respuesta['msg'] = 'por favor ingrese la hora';
        }
        $this->almacenar_nutricion();
    }
    private function almacenar_nutricion(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO nutriciones (idUsuario,idReceta,idHora,fecha) VALUES(
                        "'. $this->datos['usuario']['id'] .'",
                        "'. $this->datos['receta']['id'] .'",
                        "'. $this->datos['hora']['id'] .'",
                        "'. $this->datos['fecha'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE nutriciones SET
                        idUsuario     = "'. $this->datos['usuario']['id'] .'",
                        idReceta      = "'. $this->datos['receta']['id'] .'",
                        idHora      = "'. $this->datos['hora']['id'] .'",
                        fecha         = "'. $this->datos['fecha'] .'"
                    WHERE idNutricion = "'. $this->datos['idNutricion'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarNutricion($valor = ''){
        if( substr_count($valor, '-')===2 ){
            $valor = implode('-', array_reverse(explode('-',$valor)));
        }
        $this->db->consultas('
            select nutriciones.idNutricion, nutriciones.idUsuario, nutriciones.idReceta,nutriciones.idHora, 
                date_format(nutriciones.fecha,"%d-%m-%Y") AS fecha, nutriciones.fecha AS f, 
                usuarios.codigo, usuarios.nombre,
                recetas.codigo, recetas.nombres, 
                horas.numero, horas.tiempo
            from nutriciones
                inner join recetas on(recetas.idReceta=nutriciones.idReceta)
                inner join usuarios on(usuarios.idUsuario=nutriciones.idUsuario)
                inner join horas on(horas.idHora=nutriciones.idHora)
            where recetas.nombres like "%'. $valor .'%" or 
                usuarios.nombre like "%'. $valor .'%" or 
                horas.tiempo like "%'. $valor .'%" or
                nutriciones.fecha like "%'. $valor .'%"

        ');
        $nutriciones = $this->respuesta = $this->db->obtener_data();
        foreach ($nutriciones as $key => $value) {
            $datos[] = [
                'idNutricion' => $value['idNutricion'],
                'usuario'      => [
                    'id'      => $value['idUsuario'],
                    'label'   => $value['nombre']
                ],
                'receta'      => [
                    'id'      => $value['idReceta'],
                    'label'   => $value['nombres']
                ],
                'hora'      => [
                    'id'      => $value['idHora'],
                    'label'   => $value['tiempo']
                ],
                'fecha'       => $value['f'],
                'f'           => $value['fecha']

            ]; 
        }
        return $this->respuesta = $datos;
    }
    public function traer_nutri(){
        $this->db->consultas('
            select usuarios.nombre AS label, usuarios.idUsuario AS id
            from usuarios
        ');
        $usuarios = $this->db->obtener_data();
        $this->db->consultas('
            select recetas.nombres AS label, recetas.idReceta AS id
            from recetas
        ');
        $recetas = $this->db->obtener_data();
        $this->db->consultas('
        select horas.tiempo AS label, horas.idHora AS id
        from horas
    ');
    $horas = $this->db->obtener_data();
        return $this->respuesta = ['usuarios'=>$usuarios, 'recetas'=>$recetas, 'horas'=>$horas ];//array de php en v7+
    }
    public function eliminarNutricion($idNutricion = 0){
        $this->db->consultas('
            DELETE nutriciones
            FROM nutriciones
            WHERE nutriciones.idNutricion="'.$idNutricion.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';;
    }
}
?>