<?php
    header("Pragma: no-cache");
    header("Cache-Control: no-store, no-cache, must-revalidate");

	
    include '../view/includes/rutaConstante.php';
    include("../view/includes/global.php");
    include('../view/includes/radius.class.php');

    class loginController{
        
        public function __construct(){
            
            if(isset($_POST['accion']) == 'login'){
                $this->login(strtolower($_POST['username']), $_POST['password']);
                
            }
        }

        public function login($username, $password){
            
           

            $ip_radius_server = RADIUS_IP;
            $shared_secret = "testing123";
            
            $radius = new Radius($ip_radius_server, $shared_secret);
            //$result = $radius->AccessRequest($username, $password);
            $result = true;
            
            if ($result) {
                session_start();
                $_SESSION["usuario"] = $username;
                echo 'Se validaron correctamete los datos';
                $_SESSION['loggedin'] = 'true';
                ?>
                <script>
                    window.location.href = '<?php echo RUTA; ?>';
                </script>
                <?php
                //header('Location:' . RUTA);
                /*
                $response["error"] = false;
                $response["mensaje"] = "Se validaron correctamente los datos.";
                
                $response["data"] = array(
                    "IS_AUTH" => true,
                    "ERROR" => false,
                    "DATA" => array(
                        "nombre" => utf8_encode($usuario->nombre),
                        "paterno" => utf8_encode($usuario->paterno),
                        "materno" => utf8_encode($usuario->materno),
                        "nombre_completo" => $usuario->nombre . " " . $usuario->paterno . " " . $usuario->materno,
                        "url_foto" => "http://intranet.ufd.mx/crm/img/0.jpg"
                    ),
                    "MENSAJE" => utf8_encode("Se validó la información correctamente.")
                );
                
                $resp = $response["data"]["DATA"];
                $response["id_personal"] = $usuario->id_personal;
                $response["session_data"] = $resp;
                $response["config"] = json_encode($config);
                
                
                $_SESSION["session_data"] = $resp;
                $_SESSION["idcg_usuarios"] = $usuario->idcg_usuario;
                $_SESSION["idcg_rol"] = $usuario->idcg_rol;
                $_SESSION["iddt_rol"] = $usuario->iddt_rol;
                $_SESSION["idcg_area"] = $usuario->idcg_area;
                $_SESSION["prioridad"] = $usuario->prioridad;
                $_SESSION["rol"] = $usuario->rol;
                $_SESSION["area"] = utf8_encode($usuario->area);	
                $_SESSION["username"] = $username;
                $_SESSION["idms_campus"] = $campus->idms_campus;
                $_SESSION["config"] = json_encode($config);
                
                $sql->query("select top 1 * from rh..vw_empleado where id_personal = '" . $usuario->id_personal . "'");
                $rh = $sql->cargarArray();
                $rh->DES_DEPTO = utf8_encode($rh->DES_DEPTO);
                $rh->DES_DIRECCION = utf8_encode($rh->DES_DIRECCION);
                $rh->nombre_sede = utf8_encode($rh->nombre_sede);
                $rh->des_puesto = utf8_encode($rh->des_puesto);
                $rh->CALLE = utf8_encode($rh->CALLE);
                $rh->COLONIA = utf8_encode($rh->COLONIA);
                $rh->ES_NOMBRE_ESCUELA = utf8_encode($rh->ES_NOMBRE_ESCUELA);
                $rh->EMP_EMPRESA = utf8_encode($rh->EMP_EMPRESA);
                $rh->EMP_JEFE_INMEDIATO = utf8_encode($rh->EMP_JEFE_INMEDIATO);
                $rh->ES_DES_TITULO = utf8_encode($rh->ES_DES_TITULO);
                $_SESSION["rh"] = json_encode($rh);
                $_SESSION["foto"] = (sizeof($rh) > 0) ? "http://intranet.ufd.mx/rh/fotos_empleados/" . $rh->str_no_credencial . ".jpg" : "http://intranet.ufd.mx/crm/img/0.jpg";*/
            }else{
                echo "USUARIO y/o CONTRASEÑA incorrecta, verifique los datos que ingresó.";
                /*$response["error"] = true;
                $response["mensaje"] = "USUARIO y/o CONTRASEÑA incorrecta, verifique los datos que ingresó.";
                $response["radius"] = RADIUS_IP;*/
            }


        }

    }

    $loginControl = new loginController();
?>