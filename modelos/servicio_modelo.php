<?php
class Servicio{

    /**
	 * Método para obtener la lista de servicios desde el WebService
	 * @return arreglo con objetos std_class
	 */
	public function listarServiciosModelo(){

		$listaServiciosurl = "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/servicios";

		$listaServiciosjson = file_get_contents($listaServiciosurl);

		$listaServicios = json_decode($listaServiciosjson);

		return $listaServicios;
		
	}
	/**
	 * Método para obtener los datos de un servicio desde el WebService
	 * @return arreglo con objetos std_class
	 */
	public function buscarPacientesModelo($dato){

		$listaPacientesurl = "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/Pacientes/".$dato;

		$listaPacientesjson = file_get_contents($listaPacientesurl);

		$listaPacientes = json_decode($listaPacientesjson);

		return $listaPacientes;
	}


    /**
	 * Método para enviar a registrar un servicio al WebService
	 * @param array asociativo con los datos a registrar
	 * @return boolean: true si se realizo el registro, false si no se pudo regiatrar en la BD
	 */
	public function registrarServiciosModelo($datos){

		$datosJson = json_encode($datos);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/public/servicios/nuevo");

		curl_setopt($ch,CURLOPT_POST , TRUE);

		curl_setopt($ch,CURLOPT_POSTFIELDS , $datosJson);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

		$resultado = curl_exec($ch);

		curl_close($ch);

		return $resultado;

	}

	/**
	 * Método para actualizar un servicios al WebService
	 * @param array asociativo con los datos a actualizar
	 * @return boolean: true si se realizo la actualizacion, false si no se pudo actualizar en la BD
	 */

	public function actualizarServiciosModelo($datos,$id){

		$datosJson = json_encode($datos);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/servicios/actualizar/".$id);

		//curl_setopt($ch,CURLOPT_PUT , TRUE);
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT',);
		
		curl_setopt($ch,CURLOPT_POSTFIELDS , $datosJson);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

		$resultado = curl_exec($ch);

		curl_close($ch);

		return $resultado;
	}

	/**
	 * Método para eliminar un servicio al WebService
	 * @param array 
	 * @return boolean: 
	 */
	
	public function eliminarServiciosModelo($id){

		$datosJson = json_encode($id);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://localhost/PROYECTOREDDENTS/WEBSERVICES_REDDENTS/public/servicios/eliminar/".$id);
		//curl_setopt($ch,CURLOPT_PUT , TRUE);
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