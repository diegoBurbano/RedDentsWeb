<?php
require_once 'modelos/odontologo.php';

class OdontologoControl{

     /**
	     * atributos de la clase controlador
	     */
		private $odontologoModelo;

	    public function __construct()
	    {
			$this->odontologoModelo = new Odontologo();
			
        }

    /**
     *			Métodos para controlar el CRUD Odontologos
        *--------------------------------------------------------------------------
        *
        * 
        */
    /*--------------------------------------------------------------------------*/ 

     /**
     * Método para listar los datos del odontologo
     * @param  
     * @return arreglo con objetos std_class 
     */



    public function listarOdontologosControl(){

        $arOdontologos = $this->odontologoModelo->listarOdontologosModelo();

        if ($arOdontologos) {

            foreach ($arOdontologos as $odontologo) {
                    echo '
                    <tr>
                        <td>'.$odontologo->ODO_ID.'</td>
                        <td>'.$odontologo->ODO_TIPO_ID.'</td>
                        <td>'.$odontologo->ODO_PRIMER_NOMBRE.'</td>
                        <td>'.$odontologo->ODO_SEGUNDO_NOMBRE.'</td>
                        <td>'.$odontologo->ODO_PRIMER_APELLIDO.'</td>
                        <td>'.$odontologo->ODO_SEGUNDO_APELLIDO.'</td>
                        <td>'.$odontologo->ODO_DIRECCION.'</td>
                        <td>'.$odontologo->ODO_TELEFONO.'</td>
                        <td>'.$odontologo->ODO_ESPECIALIDAD.'</td>
                        <td>'.$odontologo->ODO_FECNACIMIENTO.'</td>
                        <td>'.$odontologo->ODO_FECREGISTRO.'</td>
                        <td>'.$odontologo->ODO_GENERO.'</td>
                        <td>'.$odontologo->ODO_FOTO.'</td>
                        <td>
                            <a class="botones" href="index.php?p=buscarOdontologo&id='.$odontologo->ODO_ID.'">
                                <acronym lang="es" title="Actualizar">
                                <img src="vistas/img/editar.png" class="acciones">
                                </acronym>
                            </a>
                            <a class="botones" href="index.php?p=buscarOdontologo&id='.$odontologo->ODO_ID.'">
                                <acronym lang="es" title="Eliminar">
                                <img src="vistas/img/eliminar.png" class="acciones">
                                </acronym>
                        </td>
                    </tr>';
            }
        }
        else{
            echo "<h3 style='color:red;'>No Hay Odontologos Registrados</h3>";
        }
        
    }

    /*--------------------------------------------------------------------------*/ 

    /**
	 * Método para buscar un registro de Odontologos 
	 * @param  variable: GET para buscar por el id del odontologo
	 * @return arreglo: con objetos std_class
	 */

    
    public function buscarOdontologosControl(){
        $dato = $_GET['id'];
        $arOdontologo = $this->odontologoModelo->buscarOdontologoModelo($dato);
        return $arOdontologo;
    }

    /*--------------------------------------------------------------------------*/ 

    /**
	 * Método para enviar a registrar un odontologo 
	 * @param  variable:s POST con los datos del Formulario
	 * @return boolean: true si se realizo el registro, false si no se pudo registrar en la BD
	 */
   
    
    public function registrarOdontologosControl($datos)
    {
        if (!empty($_POST['documento']) && !empty($_POST['primer_nombre']) &&
        !empty($_POST['segundo_nombre']) && !empty($_POST['primer_apellido'])&& !empty($_POST['segundo_apellido'])) {

            $datos = [
                'tipoDocumento' => $_POST['tipoDocumento'],
                'documento' => $_POST['documento'],
                'segundo_nombre' => $_POST['segundo_nombre'],
                'primer_nombre' => $_POST['primer_nombre'],
                'primer_apellido' => $_POST['primer_apellido'],
                'segundo_apellido' => $_POST['segundo_apellido'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'especialidad' => $_POST['especialidad'],
                'fecnacimiento' => $_POST['fecnacimiento'],
                'fecregistro' => $_POST['fecregistro'],
                'genero' => $_POST['genero'],
                'foto' => $_POST['foto'],

            ];

            $rta = $this->odontologoModelo->registrarOdontologosModelo($datos);
            return $rta;
            
        }	
    }

    /*--------------------------------------------------------------------------*/ 

    /**
     * Método para actualizar los datos de un Usuario
     * @param int id de usuario
     * @return boolean true en caso de que la atualización sea correcta o false: en caso de que no 
     * 		   se atualice
     */
        public function actualizarOdontologosControl($id)
	    {
	    	$datos = [
                'tipoDocumento' => $_POST['tipoDocumento'],
                'documento' => $_POST['documento'],
                'segundo_nombre' => $_POST['segundo_nombre'],
                'primer_nombre' => $_POST['primer_nombre'],
                'primer_apellido' => $_POST['primer_apellido'],
                'segundo_apellido' => $_POST['segundo_apellido'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'especialidad' => $_POST['especialidad'],
                'fecnacimiento' => $_POST['fecnacimiento'],
                'fecregistro' => $_POST['fecregistro'],
                'genero' => $_POST['genero'],
                'foto' => $_POST['foto'],
	    			];
	    	$rta = $this->odontologoModelo->actualizarOdontologosModel($id, $datos);
	    	$result = $rta[0];
	    	return $result;
        }
        
    /*--------------------------------------------------------------------------*/ 
    
    /**
     * Método para Eliminar un odontologo
     * @param int id de usuario
     * @return boolean true en caso de que la atualización sea correcta o false: en caso de que no 
     * 		   se atualice
     */

        public function eliminarOdontologosControl($id)
        {
            //$datos = ['documento' => $_POST['documento']];

            $rta = $this->odontologoModelo->eliminarOdontologosModelo($id);
        }
        

}


?>