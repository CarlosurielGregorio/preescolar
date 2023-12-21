<?php 



class Conexion {

	private $conn;
	private $servername;
	

	public function __construct(){
		$this->servername = "LAPTOP-77OF75GI\DESARROLLO";
		$connectionOptions = array(
			"Database" => "fichas_medicas",
			"Uid" => "sa",
			"PWD" => "123",
			"CharacterSet" => "UTF-8"
		);
		
		try {
			$this->conn = sqlsrv_connect($servername, $connectionOptions);
			if ($this->conn == false){
				throw new Exception("Error al establecer la conexión: " . print_r(sqlsrv_errors(), true));
			}
		} catch(Exception $e) {
			echo $e->getMessage();
		}

	}

	public function consultaRetorno($sql) {
		$result = mssql_query($sql, $this->conn);
		if ($result !== false) {
			return $result;
		} else {
			$error = mssql_get_last_message();
			return "Error en la consulta: " . $error;
			echo "Error en la consulta: " . $error;
		}
	}

	
	public function consultaActualiza($sql){
		$stmt = mssql_query($sql, $this->conn);
	
		if ($stmt === false) {
			$error = mssql_get_last_message();
			echo "Error en la consulta: " . $error;
		} else {
			return 'ok';
		}
	}
	

	public function insertar($query) {
		$result = mssql_query($query, $this->conn);
		if(!result){
			die('Error en la consulta: ' . mssql_get_last_message());
		}
	
		return "ok";
	}

	public function cerrarConexion(){
		mssql_close($this->conn);
	}



}


?>