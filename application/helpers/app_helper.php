<?php 
/**
 * Compendio de funciones generales
 *
 * Compendio de todas las funciones generales del proyecto reutilizadas a 
 * lo largo de todos los módulos, el uso de clases no está permitido en 
 * el helper solo, solo funciones, asegurandonos de que la función no 
 * se encuentre previamente declara  en algúna otra clase o helper del 
 * proyecto, para ello encapsulamos cada rutina con la función 
 * 'function_exists'
 * 
 * @since      1.0
 * @version    1.0
 * @internal   El acceso a este helper se realiza a través de la invocación del metodo
 *             ($this->load->helper) desde cualquier controlador que herede de CI_Controller 
 *             o bien desde el archivo de configuración './application/config/autoload.php'
 *             agregando este arhivo al arreglo global '$autoload['helper']'
 * @global     CI_Model $CI Crea una instancia de tipo inferida de una clase que hered ede CI_Model 
 * @package    application.helpers
 * @subpackage NA 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/models/*
 */

/**
 * Ajustamos la zona horaria
 * 
 * Ajustamos la zona horaria a la hora central de la Ciudad de México GMT-6, para realizar este ajuste 
 * solo es necesario invocar a este helper 'app_helper.php' o bien desde el archivo de configuración 
 * './application/config/autoload.php' agregando este arhivo al arreglo global '$autoload['helper']'
 * 
 * @since   1.0
 * @version 1.0
 * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @param   String $time_zone Cadena de texto que contenga la ubicación (continente/ciudad) de la 
 *          hora a la que se quiera ajustar
 * @return  void El ajuste al servidor con la zona horaria especificada
 */
date_default_timezone_set("America/Mexico_City");

/**
 * Título de la aplicación
 * 
 * Mostramos el título de la aplicación para resutilizarse en las etiquetas <title></title> 
 * y la propiedad 'alt' de las etiquetas <img /> y la propiedad 'title' de las etiquetas <a></a>
 * 
 * @since   1.0
 * @version 1.0
 * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @return  String Cadena de texto con el título para mostrar de la aplicación
 */
if(!function_exists("app_title")) {
	function app_title()
	{
		return "AIDE - SEDEQ";
	}
}

/**
 * Nombre de la aplicación
 * 
 * Mostramos el nombre de la aplicación para resutilizarse en las etiquetas <title></title> 
 * y la propiedad 'alt' de las etiquetas <img /> y la propiedad 'title' de las etiquetas <a></a>
 * 
 * @since   1.0
 * @version 1.0
 * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @return  String Cadena de texto con el nombre para mostrar de la aplicación
 */
if(!function_exists("app_name")) {
	function app_name()
	{
		return "Aplicación Integral de la Dirección de Educación, Secretaría de Educación del Estado de Querétaro";
	}
}