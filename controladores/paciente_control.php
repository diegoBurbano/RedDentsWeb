<?php
 require_once 'modelos/paciente_modelo.php';

 class PacienteControl{
    /**
     * Atributos de la clase
     */
    private $pacienteModelo;

    public function __construct()
    {
        $this->pacienteModelo =new Paciente();
    }

    /**
     *			Métodos para controlar el CRUD Pacientes
    *-------------------------------------------------------------------------
    */
    /*--------------------------------------------------------------------------*/ 

     /**
     * Método para listar los datos del Paciente
     * @param  
     * @return arreglo con objetos std_class 
     */

    public function listarPacientesControl(){

        $arPacientes = $this->pacienteModelo->listarPacientesModelo();

        if ($arPacientes) {

            foreach ($arPacientes as $paciente) {
                    echo '
                    <tr>
                        <td>'.$paciente->PAC_ID.'</td>
                        <td>'.$paciente->PAC_TIPO_ID.'</td>
                        <td>'.$paciente->PAC_PRIMER_NOMBRE.'</td>
                        <td>'.$paciente->PAC_SEGUNDO_NOMBRE.'</td>
                        <td>'.$paciente->PAC_PRIMER_APELLIDO.'</td>
                        <td>'.$paciente->PAC_SEGUNDO_APELLIDO.'</td>
                        <td>'.$paciente->PAC_DIRECCION.'</td>
                        <td>'.$paciente->PAC_TELEFONO.'</td>
                        <td>'.$paciente->PAC_ESPECIALIDAD.'</td>
                        <td>'.$paciente->PAC_FECNACIMIENTO.'</td>
                        <td>'.$paciente->PAC_FECREGISTRO.'</td>
                        <td>'.$paciente->PAC_GENERO.'</td>
                        <td>'.$paciente->PAC_FOTO.'</td>
                        <td>
                            <a class="botones" href="index.php?p=buscarpaciente&id='.$paciente->PAC_ID.'">
                                <acronym lang="es" title="Actualizar">
                                <img src="vistas/img/editar.png" class="acciones">
                                </acronym>
                            </a>
                            <a class="botones" href="index.php?p=buscarpaciente&id='.$paciente->PAC_ID.'">
                                <acronym lang="es" title="Eliminar">
                                <img src="vistas/img/eliminar.png" class="acciones">
                                </acronym>
                        </td>
                    </tr>';
            }
        }
        else{
            echo "<h3 style='color:red;'>No Hay pacientes Registrados</h3>";
        }
        
    }

    /*--------------------------------------------------------------------------*/ 

    /**
	 * Método para buscar un registro de un paciente 
	 * @param  variable: GET para buscar por el id del paciente
	 * @return arreglo: con objetos std_class
	 */

    public function buscarPacientesControl(){
        $dato = $_GET['id'];
        $arPacientes = $this->pacienteModelo->buscarPacientesModelo($dato);
        return $arPacientes;
    }

    /*--------------------------------------------------------------------------*/ 

    /**
	 * Método para enviar a registrar un paciente 
	 * @param  variable:s POST con los datos del Formulario
	 * @return boolean: true si se realizo el registro, false si no se pudo registrar en la BD
	 */

    public function registrarPacientesControl($datos)
    {
        if (!empty($_POST['documento']) && !empty($_POST['primer_nombre']) &&
        !empty($_POST['segundo_nombre']) && !empty($_POST['primer_apellido'])&& !empty($_POST['segundo_apellido'])) {

            $datos = [
                'tipoDocumento' => $_POST['tipoDocumento'],
                'documento' => $_POST['documento'],
                'primer_nombre' => $_POST['primer_nombre'],
                'segundo_nombre' => $_POST['segundo_nombre'],
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

            $rta = $this->pacienteModelo->registrarOdontologosModelo($datos);
            return $rta;
            
        }
    }
        
    /*--------------------------------------------------------------------------*/ 

    /**
     * Método para actualizar los datos de un paciente
     * @param int id de usuario
     * @return boolean true en caso de que la atualización sea correcta o false: en caso de que no 
     * 		   se atualice
     */
    public function actualizarPacientesControl($id)
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
            'fecnacimiento' => $_POST['fecnacimiento'],
            'fecregistro' => $_POST['fecregistro'],
            'genero' => $_POST['genero'],
            'foto' => $_POST['foto'],
                ];
        $rta = $this->pacienteModelo->actualizarPacientesModelo($id, $datos);
        $result = $rta[0];
        return $result;
    }
    
    /*--------------------------------------------------------------------------*/   
    /**
     * Método para Eliminar un paciente
     * @param int id de paciente
     * @return boolean true en caso de que la atualización sea correcta o false: en caso de que no 
     * 		   se atualice
     */

    public function eliminarPacientesControl($id)
    {
        //$datos = ['documento' => $_POST['documento']];

        $rta = $this->pacienteModelo->eliminarPacientesModelo($id);
    }
     

 }


?>