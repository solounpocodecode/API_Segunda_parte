<?php
/**
 * Plugin name: API Tecnopolis wp_remote_get
 * Plugin URI: http://ginton.onlinewebshop.net
 * Description: Prueba de traer datos de api de tecnopolis con wp_remote_get
 * Author: Fran Mellado
 * Author URI: http://ginton.onlinewebshop.net
 * version: 0.1.0
 * License: GPL2 or later.
 */

defined( 'ABSPATH' ) or die( 'Acceso denegado' );

add_action('admin_menu', 'mostrar_informacionAPITecnopolis');


function mostrar_informacionAPITecnopolis(){
	add_menu_page(
		'Datos API',//page tittle
		'Datos API',//menu tittle
		'manage_options',//capability
		'datos-api',//menu slug
		'traer_informacionAPITecnopolis'//callback function
	);
}

function traer_informacionAPITecnopolis(){
	//echo "hola";
	$url='https://staging-o.ammarket.com/wp-json/wc/v3/customers/';
	//$url='https://staging-o.ammarket.com/wp-json/wc/v3/products/';
	//$url='https://staging-o.ammarket.com/wp-json/wc/v3/orders';
	$arguments=array(
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode( ck_1b91f0b63788ceb6da7923046c2e8024b984d3d1 . ':' . cs_a4049600477052fd58bf4139f503444bc840fd20 )
        )
	);
	
	//echo "Llego sano y salvo";
$response=wp_remote_get($url, $arguments);
	
	//echo "SIP";
if(is_wp_error($response)){
	//echo "Entro al error";
	$msg_error=$response->get_error_message();
	echo $msg_error;
}else{
	//echo "Llego";
	echo '<pre>';
	$body=wp_remote_retrieve_body($response);
	var_dump($body);
	//var_dump(wp_remote_retrieve_body(json_decode($response)));
	echo '</pre>';
	//Se podria realizar una tabla con los datos devueltos con un foreach pero 
	//para eso necesitariamos mencionar que datos queremos que se devuelvan
	}
}
?>