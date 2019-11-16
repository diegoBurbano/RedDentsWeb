<?php 

	require_once 'modelos/consultorio_modelo.php';
	
	class ConsultorioControl
	{
	    /**
	     * Atributos de la clase
	     */
	    private $consModelo;

	    public function __construct()
	    {
	        $this->consModelo = new ConsultorioModelo();
	    }


	    /**
	     * Método para determinar que modulo de la vista se imprime en la 
	     * @param int id del usuario administrador del consultorio
	     * @return int :  0 si el registro es correcto
	     *				  1 en caso de que alguna variable $_POST este vacia 
	     */
	    public function registrarConsultorioControl($idUsuario)
	    {
	    	if (!empty($_POST['nitConsultorio']) && !empty($_POST['nombreConsultorio']) &&
	    		!empty($_POST['direccionConsultorio']) && !empty($_POST['telefonoConsultorio'])) 
	    	{
	    		$datos = [
	    		    'nitConsultorio' 		=> $_POST['nitConsultorio'],
	    		    'nombreConsultorio' 	=> $_POST['nombreConsultorio'],
	    		    'direccionConsultorio' 	=> $_POST['direccionConsultorio'],
	    		    'telefonoConsultorio' 	=> $_POST['telefonoConsultorio'],
	    		    'idUsuario' 			=> $idUsuario
	    		];

	    		$rta = $this->consModelo -> registrarConsultorioModelo($datos);

	    		if ($rta) {
	    			return 0;
	    		}
	    	}
	    	else{
	    		return 1;
	    	}
	    }


	}

?>