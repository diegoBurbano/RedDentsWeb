<?php

class Paciente{
    
    /**
	 * Método para obtener la lista de Pacientes desde el WebService
	 * @return arreglo con objetos std_class
	 */
	public function listarPacientesModelo(){

		$listaPacientesurl = "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/pacientes";

		$listaPacientesjson = file_get_contents($listaPacientesurl);

		$listaPacientes = json_decode($listaPacientesjson);

		return $listaPacientes;
	}
	
	/**
	 * Método para obtener los datos de un paciente desde el WebService
	 * @return arreglo con objetos std_class
	 */
	public function buscarPacientesModelo($dato){

		$listaPacientesurl = "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/Pacientes/".$dato;

		$listaPacientesjson = file_get_contents($listaPacientesurl);

		$listaPacientes = json_decode($listaPacientesjson);

		return $listaPacientes;
	}
    
    /**
	 * Método para enviar a registrar un odontologo al WebService
	 * @param array asociativo con los datos a registrar
	 * @return boolean: true si se realizo el registro, false si no se pudo regiatrar en la BD
	 */
	public function registrarPacientesModelo($datos){

		$datosJson = json_encode($datos);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/pacientes/nuevo");

		curl_setopt($ch,CURLOPT_POST , TRUE);

		curl_setopt($ch,CURLOPT_POSTFIELDS , $datosJson);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

		$resultado = curl_exec($ch);

		curl_close($ch);

		return $resultado;

	}

	/**
	 * Método para actualizar un odontologo al WebService
	 * @param array recibe un array asociativo y un id con el registro actualizar
	 * @return boolean: true si se realizo la actualizacion, false si no se pudo actualizar en la BD
	 */

	public function actualizarPacientesModelo($datos,$id){

		$datosJson = json_encode($datos);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/pacientes/actualizar/".$id);
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT',);
		
		curl_setopt($ch,CURLOPT_POSTFIELDS , $datosJson);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

		$resultado = curl_exec($ch);

		curl_close($ch);

		return $resultado;
	}

	/**
	 * Método para eliminar un odontologo al WebService
	 * @param mixed $id recibe el id de registro a eliminar
	 * @return boolean: 
	 */
	
	public function eliminarPacientesModelo($id){

		$datosJson = json_encode($id);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/paciente/eliminar/".$id);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE',);
		curl_setopt($ch,CURLOPT_POSTFIELDS , $datosJson);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
		$resultado = curl_exec($ch);
		curl_close($ch);

		return $resultado;
	}
}



?>