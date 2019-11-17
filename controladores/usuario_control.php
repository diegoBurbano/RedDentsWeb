<?php  
	
	require_once 'modelos/odontologo.php';
	
	class UsuarioControl
	{
	    /**
	     * Atributos de la clase
	     */
	    private $usuModelo;

	    public function __construct()
	    {
	        $this->usuModelo = new UsuarioModelo();
	    }


	    /**
	     * Método para validar y almacenar los datos del formulario de registrar Usuario
	     * @param String especificar un rol ('usuario', 'administrador', 'odontologo')
	     * @return int :  0 si el registro es correcto
	     *				  1 si la contraseña no coincide
	     *				  2 en caso de que alguna variable $_POST este vacia 
	     */
	    public function registrarUsuarioControl($rol)
	    {
	    	if (!empty($_POST['nombreUsuario']) && !empty($_POST['telefonoUsuario']) &&
	    		!empty($_POST['emailUsuario']) && !empty($_POST['passUsuario']) &&
	    		!empty($_POST['confirmPassUsuario'])) 
	    	{
	    		if ($_POST['passUsuario'] === $_POST['confirmPassUsuario']) {

	    			$passEncriptado = crypt($_POST['passUsuario'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

	    			$datos = [
	    			    'nombreUsuario' => $_POST['nombreUsuario'],
	    			    'emailUsuario' => $_POST['emailUsuario'],
	    			    'telefonoUsuario' => $_POST['telefonoUsuario'],
	    			    'passUsuario' => $passEncriptado,
	    			    'rolUsuario' => $rol
	    			];

	    			$rta = $this->usuModelo->registrarUsuarioModelo($datos);
	    			if ($rta) {
	    				return 0;
	    			}

	    		}
	    		else {
	    			return 1;
	    		}
	    	}
	    	else{
	    		return 2;
	    	}
	    }

	     /**
	     * Método para actualizar los datos de un Usuario
	     * @param int id de usuario
	     * @return boolean true en caso de que la atualización sea correcta o false: en caso de que no 
	     * 		   se atualice
	     */
	    public function actualizarUsuarioControl($id)
	    {
	    	$datos = [
	    			    'nombreUsuario' => $_POST['nombreUsuario'],
	    			    'emailUsuario' => $_POST['emailUsuario'],
	    			    'telefonoUsuario' => $_POST['telefonoUsuario']
	    			];
	    	$rta = $this->usuModelo->actualizarUsuarioModelo($id, $datos);
	    	$result = $rta[0];
	    	return $result;
	    }

	    /**
	     * Método para el id de un Usuario
	     * @param String dirección de email valido
	     * @return int id
	     */
	    public function obtenerIdUsuarioControl($email)
	    {
	    	$email = trim($email);
	    	$rta = $this->usuModelo->obtenerUsuarioPorEmailModelo($email);
	    	if ($rta != false) {
	    		return $rta[0]->USU_ID;
	    	}
	    }

	    /**
	     * Método para los datos de un Usuario
	     * @param String dirección de email valido
	     * @return array con los datos del usuario o false en caso de no encontrar el usuario
	     */
	    public function obtenerUsuarioPorEmailControl($email)
	    {
	    	$email = trim($email);
	    	$rta = $this->usuModelo->obtenerUsuarioPorEmailModelo($email);
	    	if ($rta != false) {
	    		$datos = [
	    		    'id' => $rta[0]->USU_ID,
	    		    'nombre' => $rta[0]->USU_NOMBRE,
	    		    'email' => $rta[0]->USU_EMAIL,
	    		    'telefono' => $rta[0]->USU_TELEFONO,
	    		    'rol' => $rta[0]->USU_ROL,
	    		    'pass' => $rta[0]->USU_PASSWORD
	    		];
	    		return $datos;
	    	}
	    	else {
	    		return $rta;
	    	}
	    }


	}

?>