<?php
    

    require '../model/Conexion.php';
	require '../model/ConexionHistoclin.php';
   
    require '../model/Historial.php';
    require '../model/Expediente.php';
    require '../model/Alergias.php';
    require '../model/Citas.php';
	require '../model/Histoclin.php';
	
	
    include '../view/includes/rutaConstante.php';

    

    class buscadorController{

        private $expediente;
        private $historial;
        private $alergias;
        private $citas;

        public function __construct(){
            $this->expediente = new Expediente();
            $this->historial = new Historial();
            $this->alergias = new Alergias();
            $this->citas = new Citas();
			$this->Histoclin = new Histoclin();


            if($_POST['accion'] == 'busqueda'){
				$this->buscador($_POST['argumento']);
			}else if($_POST['accion'] == 'datosHistoclin'){
				$this->datosHistoclin();
			}
        }

        public function buscador($arg){
			
			$this->expediente->set('ARGUMENTO', $arg);
			$resultados = $this->expediente->resultadoBusqueda();
			//if(mssql_num_rows($resultados) > 0){
			if(sqlsrv_has_rows($resultados)){
				$tabla_result = '<table id="dtResultados" class="table table-hover">';
				$tabla_result .= '<thead>'; 
				$tabla_result .= '<tr>';
				$tabla_result .= '<th>Matrícula</th>';
				$tabla_result .= '<th>Nombre</th>';
				$tabla_result .= '<th>Tipo usuario</th>';
				$tabla_result .= '<th></th>';

				$tabla_result .= '</tr>';
				$tabla_result .= '</thead>';
				//while($row = mssql_fetch_array($resultados)){//PHP < 5.3
				while($row = sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)){
					switch ($row['TIPO_PACIENTE']) {
						case 'A':
							$tipoUsuario = "Alumno";
							break;
						case 'E':
							$tipoUsuario = 'Empleado';
							break;
						default:
							$tipoUsuario = "Indefinido";
							break;
					}
					$tabla_result .= '<tr>';
					$tabla_result .= '<td>' . $row['MATRICULA'] .'</td>';
					$tabla_result .= '<td>' . $row['NOMBRE_COMPLETO'] .'</td>';
					$tabla_result .= '<td>' . $tipoUsuario .'</td>';
					$tabla_result .= '<td><a href="index.php?controller=admin&action=evaluacion&idHistorial='. $row["ID_HISTORIAL"] .'" class="btn btn-outline-dark">Nueva Evaluación</a></td>';
					$tabla_result .= '</tr>';
					
				}
				$tabla_result .= '</table>';
				$this->tablaResultado = $tabla_result;

				?>
				<script>
					
					
					console.log('Se ha efectuado la búsqueda');
					$("#resultDatos").html('<?php echo $tabla_result; ?>');
					$("#respDatos").text("resultado de la búsqueda");

				</script>
				<?php
			}else{
				$this->tablaResultado = 'vacio';
				?>
				<script>
					console.log('no hay resultados');
					$("#resultDatos").html('<a href="index.php?controller=admin&action=evaluacion&idExpediente=" class="btn btn-outline-dark">Evaluar ahora</a>');
					$("#respDatos").text("Sin resultados");
				</script>
				<?php
				
			}
			
			
			
		}

		public function datosHistoclin(){
			
			$resultados = $this->Histoclin->obtenerDatos();
			if(mysqli_num_rows($resultados) > 0){
				echo '<table class="table">'; 
				echo '<thead>'; 
				echo '<tr>'; 
				echo '<th></th>';
				echo '<th>Expediente</th>';
				echo '<th>Es activo</th>';
				echo '<th>Estatura</th>';
				echo '<th>Peso</th>';
				echo '<th>IMC</th>';
				echo '<th>Superficie</th>';
				echo '<th>Cintura</th>';
				echo '<th>fecha registro</th>';
				echo '</tr>';
				echo '<tbody>'; 
				$contador = 0;
				while($row = mysqli_fetch_assoc($resultados)){
					$contador = $contador + 1;
					echo '<tr>';
					echo '<td>' . $contador . '</td>';
					echo '<td>' . $row['inumexpediente'] . '</td>';
					echo '<td>'. $existeUsuario = $this->verificaExistencia($row['inumexpediente']) .'</td>';
					echo '<td>' . ($row['Estatura'] * 100) . '</td>';
					echo '<td>' . $row['Peso'] . '</td>';
					echo '<td>' . $row['IMC'] . '</td>';
					echo '<td>' . $row['Superficie'] . '</td>';
					echo '<td>' . $row['Cintura'] . '</td>';
					echo '<td>' . $row['Fecha'] . '</td>';
					echo '</tr>';
					
					if($existeUsuario > 0){
						$this->insertarUsuario($row['inumexpediente'], $row['Estatura'], $row['Peso'], $row['IMC'], $row['Superficie'], $row['Cintura'], $row['Fecha']);
					}
				}
				echo '</tbody>';
				echo '</thead>';
				echo '</table>';
			}
		}

		public function verificaExistencia($numExpediente){
			$tamExp = strlen($numExpediente);
			if($tamExp <= 4){
				//Usuario empleado
				$this->expediente->set('ARGUMENTO', $numExpediente);
				$totalEmpleado = $this->expediente->confirmaEmpleado();
				return  $totalEmpleado['TOTAL'];
				
			}else if($tamExp > 4){
				//Usuario Alumno
				$this->expediente->set('ARGUMENTO', $numExpediente);
				$totalAlumno = $this->expediente->confirmaAlumno();
				return $totalAlumno['TOTAL'];
			}

		}

		public function insertarUsuario($matricula, $estatura, $peso, $imc, $superficie, $cintura, $fecha){
			$tamExp = strlen($matricula);
			if($tamExp <= 4){
				//Usuario empleado
				$tipoUsuario = 'E';
			}else if($tamExp > 4){
				//Usuario Alumno
				$tipoUsuario = 'A';
			}

			
			if($estatura == "" || $estatura == " "){
				$estatura = 0;
			}

			if($peso == "" || $peso == " "){
				$peso = 0.0;
			}
			if($imc == "" || $imc == " "){
				$imc = 0.0;
			}
			if($superficie == "" || $superficie == " "){
				$superficie = 0.0;
			}
			if($cintura == "" || $cintura == " "){
				$cintura = 0;
			}




			$estaturaCM = $estatura * 100;
			$estaturaCM = intval($estaturaCM);

			$cintura = intval($estatura);

			$this->historial->set('MATRICULA', $matricula);
			$total = $this->historial->verificaExisteRegistro();
			if($total['EXISTE'] < 1){
				$this->historial->set('ID_CAMPUS', '1');
				$this->historial->set('TIPO_PACIENTE', $tipoUsuario);
				$this->historial->set('FECHA_EVALUACION', $fecha);
				$this->historial->set('PESO', $peso);
				$this->historial->set('ESTATURA', $estaturaCM);
				$this->historial->set('CINTURA', $cintura);
				$this->historial->set('IMC', $imc);
				$this->historial->set('SUPERFICIE_CORPORAL', $superficie);
				$this->historial->set('ID_GPO_KCAL', '10');
				$this->historial->insertaDatos();
			}
		}
        

    }

    $buscador = new buscadorController();
    ?>