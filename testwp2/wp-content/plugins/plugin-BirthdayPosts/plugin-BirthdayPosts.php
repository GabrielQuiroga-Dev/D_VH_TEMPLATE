<?php
/*
Plugin Name: BirthdayPosts
Description: Posts de cumpleaños
Version: 1.0
Author: Yo
License: GPL2
*/


function programar_hook_cumpleanios() {
  
  error_log('INICIO EJECUCION programar_hook_cumpleanios');
 // Verifica si el hook 'nombre_del_hook' ya está programado
 if (!wp_next_scheduled('nombre_del_hook')) {
  // Si el hook no está programado, lo programa para que se ejecute a las 09:00 am todos los días
  wp_schedule_event(strtotime('12:00 am'), 'daily', 'nombre_del_hook');
 }
}
add_action('wp', 'programar_hook_cumpleanios');

function crear_publicaciones_cumpleanios() {
  error_log('INICIO EJECUCION crear_publicaciones_cumpleanios');
  $image_url = 'http://localhost/testwp3/wp-content/uploads/2023/01/fs.jpg'; 
  $image_id = attachment_url_to_postid( $image_url );
	   error_log('$image_id :' . $image_id );

  $cat=get_cat_ID( 'Cumpleaños' );
  $hoy = date('Y-m-d');
 // Obtén la lista de empleados que cumplen años hoy
 $empleados_cumpleanios = obtener_empleados_cumpleanios($hoy);


 // Recorre la lista de empleados que cumplen años hoy
 if (is_array($empleados_cumpleanios)) {
 foreach ($empleados_cumpleanios as $empleado) {
   
  $publicacion = array(
      'post_title' => get_option('birthdayposts_field') . $empleado['nombre'] . '!!', 
   'post_content' => '¡Feliz cumpleaños, ' . $empleado['nombre'] . '! De parte de todo el equipo de Witbor esperamos que tengas un día maravilloso lleno de alegría.',
   'post_status' => 'publish',
   'post_author' => 1, 
   'post_type' => 'post',
   'post_category' => array($cat),
  );
  $post_id = wp_insert_post($publicacion);
   error_log('POST ID:' . $post_id );

  set_post_thumbnail( $post_id, $image_id );
error_log('set_post_thumbnail' . set_post_thumbnail( $post_id, $image_url ) );
 }
}
}
  function obtener_empleados_cumpleanios($fecha) {
    
  error_log('FECHA: ' . $fecha);

 // Obtén la lista de todos los usuarios de WordPress
 $usuarios = get_users();

 // Inicializa el array de empleados que cumplen años hoy
 $empleados = array();

 // Recorre la lista de usuarios
 foreach ($usuarios as $usuario) {
     error_log('Inicio bucle');

  // Obtén el campo 'cumpleaños' del perfil extendido del usuario
  $cumpleanios = xprofile_get_field_data('cumple', $usuario->ID );
  
   error_log('usuario: ' . $usuario->ID);
   error_log('cumpleanios: ' . $cumpleanios );

  // Si el campo 'cumpleaños' del perfil extendido es igual a la fecha de hoy, añade al usuario al array de empleados que cumplen años hoy
  $dia_actual = date('d');
  $mes_actual = date('m');
  $dia_cumpleanios = date('d', strtotime($cumpleanios));
  $mes_cumpleanios = date('m', strtotime($cumpleanios));

  if ($dia_actual == $dia_cumpleanios && $mes_actual == $mes_cumpleanios) {
   $empleados[] = array(
    'nombre' => $usuario->display_name,
   );
  }
   error_log('fin bucle');
 }

 return $empleados;
}

function borrar_publicaciones_cumpleanios() {
  
  $cat=get_cat_ID( 'Cumpleaños' );
  $hoy = date('Y-m-d');
 // Obtén la lista de todas las publicaciones de cumpleaños
 $publicaciones_cumpleanios = get_posts(array(
  'post_type' => 'post',
  'post_category' => array($cat),
  'date_query' => array(
   array(
    'before' => $hoy,
   ),
  ),
 ));

 // Recorre la lista de publicaciones de cumpleaños y borra las publicaciones
 foreach ($publicaciones_cumpleanios as $publicacion) {

  wp_delete_post($publicacion->ID, true);
 }
}

add_action('nombre_del_hook', 'crear_publicaciones_cumpleanios');
add_action('nombre_del_hook', 'borrar_publicaciones_cumpleanios');