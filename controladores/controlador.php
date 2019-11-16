<?php  

	require_once 'modelos/paginas.php';
	require_once 'controladores/usuario_control.php';
	require_once 'controladores/consultorio_control.php';

	class Controlador
	{
	    /**
	     * Método para imprimir la plantilla en pantalla
	     */
	    public function mostrarPlantilla()
	    {
	    	include_once 'vistas/plantilla.php';
	    }

	    /**
	     * Método para imprimir un marco dentro de la plantilla
	     */
	    public function mostrarMarco()
	    {
	    	session_start();
	    	if (isset($_SESSION['usuario'])) {
	    		include_once 'vistas/modulos/marco_session.php';
	    	}
	    	else {
	    		include_once 'vistas/modulos/marco_inicial.php';
	    	}
	    }

	    /**
	     * Método para determinar que modulo de la vista se imprime en la 
	     * plantilla apartir de la variable GET 'p'
	     */
	    public function enlacePaginasControl()
	    {
	    	if (isset($_GET['p'])) {
	    		$pagina = $_GET['p'];
	    	}
	    	else {
	    		$pagina = "inicio";
	    	}
	    	$rta = Paginas::enlancePaginasModelo($pagina);
	    	include_once $rta;
	    }

	    
	    /**
	     * Método para mostrar un mensaje de tipo modal 
	     * @param String msj: el mensaje que se desea mostrar
	     * @param String titulo: el titulo del modal
	     * @param String tipo: por defecto tendra el valor 'correcto', 
	     * con este el color del titulo y el boton sera azul, si se 
	     * asigna el valor 'error', el color del titulo y el boton sera rojo
	     * @param String ruta: por defecto su valor es vacio, se puede especificar
	     * una ruta hacia la que se desee redirigir al cerrar el modal	  
	     */
	    public function imprimirMensajeModal($msj,$titulo,$tipo="correcto",$ruta="")
	    {
	    	$tipo = strtolower($tipo);	
	    	if ($tipo === "error") {
	    		$txtColor =  "text-danger";
	    		$btnColor = "btn-danger";
	    	}
	    	else{
	    		$txtColor =  "text-primary";
	    		$btnColor = "btn-primary";
	    	}
	    	echo '<!-- The Modal -->
					<div class="modal fade" id="myModal">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title '.$txtColor.'">'.$titulo.'</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					      <!-- Modal body -->
					      <div class="modal-body">
					        <p style="">'.$msj.'</p>
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn '.$btnColor.'" onclick="irA()" data-dismiss="modal">Cerrar</button>
					      </div>

					    </div>
					  </div>
					</div>
					<script>
						$("#myModal").modal("show");
						function irA(){
							location.href="'.$ruta.'";
						}
					</script>';
	    }

	    
	    /**
	     *		Método para controlar las acciones CRUD sobre el Usuario 
	     *--------------------------------------------------------------------------
	     *
	     * @param String accion con alguno de los siguientes valores: ''
	     */
	    public function controlUsuario($accion)
	    {
	    	$usuario = new UsuarioControl();

	    	switch ($accion) {
	    		case "registrar":
	    			$result = $usuario -> registrarUsuarioControl("usuario");
	    			if ($result == 1) {
	    				$msj = "El campo contraseña y confirmar contraseña no coinciden";
		    			$titulo = "Error";
		    			$tipo = "error";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    			}
	    			else if($result == 2) {
	    				$msj = "No pueden quedar campos vacios";
			    		$titulo = "Error";
		    			$tipo = "error";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    			}
	    			else {
	    				$msj = "Se registro correctamente";
		    			$titulo = "Éxito";
		    			$tipo = "";
		    			$ruta = "index.php";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo,$ruta);
	    			}
	    			break;

	    		case "actualizar":
	    			$user = $_SESSION['usuario'];
	    			// echo $user['id'];
	    			$result = $usuario -> actualizarUsuarioControl($user['id']);
	    			if ($result) {
	    				$datos = $usuario -> obtenerUsuarioPorEmailControl($_POST['emailUsuario']);
	    				$_SESSION['usuario'] = $datos;
	    				$msj = "Se actualizó correctamente";
		    			$titulo = "Éxito";
		    			$tipo = "";
		    			$ruta = "index.php";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo,$ruta);
	    			}
	    			else {
	    				$msj = "No se pudo actualizar";
			    		$titulo = "Error";
		    			$tipo = "error";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    			}
	    			break;
	    		
	    		default:
	    			// code...
	    			break;
	    	}
	    }


		/**
	     *		Método para controlar las acciones CRUD sobre el Usuario 
	     *--------------------------------------------------------------------------
	     *
	     * @param String accion con alguno de los siguientes valores: ''
	     */
	    public function controlConsultorio($accion)
	    {
	    	$consultorio = new ConsultorioControl();
	    	switch ($accion) {
	    		case "registrar":
	    			$usuario = new UsuarioControl();
	    			$result = $usuario -> registrarUsuarioControl("administrador");
	    			if ($result == 1) {
	    				$msj = "El campo contraseña y confirmar contraseña no coinciden";
		    			$titulo = "Error";
		    			$tipo = "error";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    			}
	    			else if($result == 2) {
	    				$msj = "No pueden quedar campos vacios";
			    		$titulo = "Error";
		    			$tipo = "error";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    			}
	    			else {
	    				$idUsuario = $usuario -> obtenerIdUsuarioControl($_POST['emailUsuario']);
	    				$result = $consultorio -> registrarConsultorioControl($idUsuario);
	    				if ($result == 1) {
	    					$msj = "No pueden quedar campos vacios";
			    			$titulo = "Error";
			    			$tipo = "error";
			    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    				}
	    				else {
	    					$msj = "Se registro correctamente";
			    			$titulo = "Éxito";
			    			$tipo = "";
			    			$ruta = "index.php";
			    			$this -> imprimirMensajeModal($msj,$titulo,$tipo,$ruta);
	    				}
	    			}
	    			break;
	    		
	    		default:
	    			// code...
	    			break;
	    	}
	    }

	    /**
	     *			Método para iniciar Sesión
	     *--------------------------------------------------------------------------
	     *
	     * 
	     */
	    public function iniciarSesion()
	    {
	    	$usuario = new UsuarioControl();
	    	if (!empty($_POST['emailSesion']) && !empty($_POST['passSesion'])) {
	    		$datos = $usuario -> obtenerUsuarioPorEmailControl($_POST['emailSesion']);
	    		if ($datos != false) {
	    			$passEncriptado = crypt($_POST['passSesion'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	    			if ($datos['pass'] === $passEncriptado) {
	    				// session_start();
	    				$_SESSION['usuario'] = $datos;
	    				header("Location: index.php");
	    			}
	    			else {
	    				$msj = "Contraseña incorrecta";
		    			$titulo = "Error";
		    			$tipo = "error";
		    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    			}
	    			
	    		}
	    		else {
	    			$msj = "Correo electrónico incorrecto";
	    			$titulo = "Error";
	    			$tipo = "error";
	    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    		}
	    		
	    	}
	    	else {
	    		$msj = "No pueden quedar campos vacios";
    			$titulo = "Error";
    			$tipo = "error";
    			$this-> imprimirMensajeModal($msj,$titulo,$tipo);
	    	}
	    }


	     /**
	     *			Método para cerrar Sesión
	     *--------------------------------------------------------------------------
	     *
	     * 
	     */
	    public function cerrarSesion()
	    {
			unset($_SESSION['usuario']);
			session_destroy();
			// header("Location: index.php");
			echo "<script>location.href='index.php';</script>";
	    }



	}


?>