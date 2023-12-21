<?php
/*--------VARIABLES DE CONFIGURACION GLOBAL---------------*/

//$MODE = "PRODUCCION"; // --- [LOCAL][PRUEBAS][PRODUCCION]
$MODE = "PRUEBAS"; // --- [LOCAL][PRUEBAS][PRODUCCION]
$PROTOCOLO = "http"; //---- [http][https]

/*--------------------------------------------------------*/
	
if($MODE == "LOCAL"){
	
	define("NAMESPACE",$PROTOCOLO . "://10.10.10.127/crm/");
	define("DOMAIN",$PROTOCOLO . "://10.10.10.127/");
	$_NAMESPACE = $PROTOCOLO . "://10.10.10.127/crm/";
	
	define("RADIUS_IP","10.10.10.204");
	define("RADIUS_URL",$PROTOCOLO . "://intranet.ufd.mx:8080/portal/auth");
	
}else if($MODE == "PRUEBAS"){
	
	define("NAMESPACE",$PROTOCOLO . "://localhost/crm_ufd/");
	define("DOMAIN",$PROTOCOLO . "://localhost/");
	$_NAMESPACE = $PROTOCOLO . "://localhost/crm_ufd/";
	
	define("RADIUS_IP","10.10.10.204");
	define("RADIUS_URL",$PROTOCOLO . "://intranet.ufd.mx:8080/portal/auth");
	
}else if($MODE == "PRODUCCION"){
	
	define("DOMAIN",$PROTOCOLO . "://intranet.ufd.mx/");
	define("NAMESPACE",$PROTOCOLO . "://intranet.ufd.mx/crm/");
	$_NAMESPACE = $PROTOCOLO . "://intranet.ufd.mx/crm/";
	
	/*----COMENTADO TEMPORALMENTE-------*/
	define("RADIUS_IP","10.10.10.204");
	define("RADIUS_URL",$PROTOCOLO . "://intranet.ufdvirtual.mx:8080/portal/auth");
	
}

define("MYSQL_IP_ASTERISK","10.11.12.1"); // MYSQL ASTERISK PRODUCCIÓN
define("MYSQL_PORT_ASTERISK",null);
define("MYSQL_USER_ASTERISK","sistemas");
define("MYSQL_PASS_ASTERISK","Developer.16");
define("MYSQL_DB_ASTERISK","asteriskcdrdb");

define("MAIL_HOST",'mail.ufd.mx');
define("MAIL_USERNAME",'notificaciones@ufd.mx');
define("MAIL_PASSWORD",'Notificaciones.mpdy58');

define("RELATIVE_PATH_IMG","../../documentacion/");

define("LOGO_VIRTUAL","../img/ufd_logo.png");
//$logo =  NAMESPACE . "img/logo.png";
//define("LOGO_VIRTUAL",$logo);

/**----------------FICHA DE DEPÓSITO----------------*/
define("FICHA_DEPOSITO_CONVENIO_CIE","1429329");

?>