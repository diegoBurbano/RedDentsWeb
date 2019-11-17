<?php 
require_once 'modelos/servicio_modelo.php';

class ServicioControl{
    /**
     * atributos de la clase controlador
     */
    private $serviciosModelo;

    public function __construct()
    {
        $this->serviciosModelo = new Odontologo();
        
    }

     /**
    *			Métodos para controlar el CRUD Servicios
    *----------------------------------------------------------------------------
    */
    /*--------------------------------------------------------------------------*/ 


    /**
     * Método para listar los datos del servicios
     * @param  
     * @return arreglo con objetos std_class 
     */

    public function listarServiciosControl(){

        $arServicios = $this->serviciosModelo->listarServiciosModelo();

        if ($arServicios) {

            foreach ($arServicios as $servicios) {
                    echo '
                    <tr>
                        <td>'.$servicios->SER_ID.'</td>
                        <td>'.$servicios->SER_NOMBRE.'</td>
                        <td>'.$servicios->SER_DESCRIPCION.'</td>
            
                        <td>
                            <a class="botones" href="index.php?p=buscarOdontologo&id='.$servicios->SER_ID.'">
                                <acronym lang="es" title="Actualizar">
                                <img src="vistas/img/editar.png" class="acciones">
                                </acronym>
                            </a>
                            <a class="botones" href="index.php?p=buscarservicios&id='.$servicios->SER_ID.'">
                                <acronym lang="es" title="Eliminar">
                                <img src="vistas/img/eliminar.png" class="acciones">
                                </acronym>
                        </td>
                    </tr>';
            }
        }
        else{
            echo "<h3 style='color:red;'>No Hay Servicios Registrados</h3>";
        }

    }
    /*--------------------------------------------------------------------------*/ 

    /**
	 * Método para buscar un registro de Servicios 
	 * @param  variable: GET para buscar por el id del servicio
	 * @return arreglo: con objetos std_class
	 */

    
    public function buscarServiciosControl(){
        $dato = $_GET['id'];
        $arServicios = $this->serviciosModelo->buscarServiciosModelo($dato);
        return $arServicios;
    }

    /*--------------------------------------------------------------------------*/ 

    /**
	 * Método para enviar a registrar un servicio 
	 * @param  variable: POST con los datos del Formulario
	 * @return boolean: true si se realizo el registro, false si no se pudo registrar en la BD
	 */
   
    
    public function registrarServiciosControl($datos)
    {
        if (!empty($_POST['servicio_nombre']) && !empty($_POST['servicio_descripcion'])) {

            $datos = [
                'servicio_nombre' => $_POST['servicio_nombre'],
                'servicio_descripcion' => $_POST['servicio_descripcion'],

            ];

            $rta = $this->serviciosModelo->registrarServiciosModelo($datos);
            return $rta;
            
        }	
    }

    /*--------------------------------------------------------------------------*/ 

    /**
     * Método para actualizar los datos de un servicio
     * @param int id de servicio
     * @return boolean true en caso de que la atualización sea correcta o false: en caso de que no 
     * 		   se atualice
     */
    public function actualizarServiciosControl($id)
    {
        $datos = [
            'servicio_nombre' => $_POST['servicio_nombre'],
            'servicio_descripcion' => $_POST['servicio_descripcion'],
                ];
        $rta = $this->serviciosModelo->actualizarServiciosModel($id, $datos);
        $result = $rta[0];
        return $result;
    }

    /*--------------------------------------------------------------------------*/ 
    
    /**
     * Método para Eliminar un servicio
     * @param int id de servicio
     * @return boolean true en caso de que la atualización sea correcta o false: en caso de que no 
     * 		   se atualice
     */

    public function eliminarServiciosControl($id)
    {
        //$datos = ['documento' => $_POST['documento']];

        $rta = $this->serviciosModelo->eliminarServiciosModelo($id);
    }

        
    


}

?>