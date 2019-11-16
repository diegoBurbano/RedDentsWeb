<?php  

	/**
	 * summary
	 */
	class UsuarioModelo
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        
	    }

	    /**
		 * Método para enviar a registrar un usuario al WebService
		 * @param array con los datos a registrar
		 * @return true si se realizo el registro, false si no se pudo regiatrar en la BD
		 */
	    public function registrarUsuarioModelo($datos)
	    {
	    	$datosJson = json_encode($datos);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/usuarios/insert");

			curl_setopt($ch,CURLOPT_POST , TRUE);

			curl_setopt($ch,CURLOPT_POSTFIELDS , $datosJson);

			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

			curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

			$resultado = curl_exec($ch);

			curl_close($ch);

			return $resultado;
	    }

	    /**
		 * Método para obtener los datos de un usuario desde el WebService
		 * @param String email del usuario del que se desea obtener los datos
		 * @return arreglo con objeto std_class
		 */
		public function obtenerUsuarioPorEmailModelo($email){

			$usuarioUrl = "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/usuarios/getForEmail/".$email;

			$usuarioJson = file_get_contents($usuarioUrl);

			$usuario = json_decode($usuarioJson);

			return $usuario;
		}


		/**
		 * Método para actualizar los datos de un usuario desde el WebService
		 * @param int id del usuario
		 * @return array con un valor true si se realizo la actualización o false si no se pudo 
		 *		   actualizar en la BD
		 */
		public function actualizarUsuarioModelo($id,$datos){


			$datosJson = json_encode($datos);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/usuarios/update/".$id);

			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

			curl_setopt($ch,CURLOPT_POSTFIELDS , $datosJson);

			curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

			$resultado = curl_exec($ch);

			curl_close($ch);

			var_dump($resultado);

			return $resultado;
		}
	}

?>