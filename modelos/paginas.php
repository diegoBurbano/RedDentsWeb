<?php 
class Paginas{

	public static function enlancePaginasModelo($pagina){

		switch ($pagina) {
			case 'inicio':
      			if (isset($_SESSION['usuario'])) {
					$user = $_SESSION['usuario'];
					if ($user['rol'] == "administrador") {
						
					}
					elseif ($user['rol'] == "usuario") {
						$ruta = "vistas/modulos/usuario/inicio.php";
					}
				}
				else{
					$ruta = "vistas/modulos/inicio.php";
				}

				break;
			case 'menuRegistroUsuario':
				$ruta = "vistas/modulos/menu_registro_usuario.php";  
				break;
			case 'registroUsuario':
				$ruta = "vistas/modulos/form_registro_usuario.php";  
				break;
			case 'registroConsultorio':
				$ruta = "vistas/modulos/form_registro_consultorio.php";  
				break;
			case 'registroConsultorioAdmin':
				$ruta = "vistas/modulos/form_registro_consultorio_admin.php";  
				break;
			case 'perfilUsuario':
				$ruta = "vistas/modulos/usuario/perfil.php";  
				break;

			case 'listaOdontologos':
				$ruta = "vistas/modulos/administrador/odontologo_busqueda.php";  
				break;
			case 'registrarOdontologo':
				$ruta = "vistas/modulos/administrador/odontologo_registro.php";
				break;

			case 'actualizarOdontologo':
				$ruta = "vistas/modulos/administrador/odontologo_actualizar.php";
				break;

			case 'listaPacientes':
				$ruta = "vistas/modulos/administrador/listaPaciente.php"; 
				break;

			case 'registrarPacientes':
				$ruta = "vistas/modulos/administrador/registro_paciente.php"; 
				break;
			
			default:
				# code...
				break;
		}

		return $ruta;

	}
}

 ?>