<?php

// este es el Frontend Controller



require 'config.php';
//require 'helpers.php';
require 'library/Request.php';
require 'library/Inflector.php';
require 'library/Response.php';
require 'library/View.php';
require 'library/Token.php';
require 'app/conf.php'; 
require 'app/conexion.php';
require 'app/database/login.php';
require 'app/database/entities/User.php';




//controller($_GET['url']);
/*if(empty($_GET['url']))
{

require "controller/home.php";

}else if($_GET['url'] == 'contactos')

{

require "controller/contactos.php";

}else{

	header("HTTP/1.0 404 Not Found");
	exit("Pagina no encontrada");

}*/


if (empty($_GET['url']))
{
	$url = "";

}else
{

$url = $_GET['url'];


}

//instanciar la case 
$request  = new Request($url);

$request->execute();

//var_dump($request->getParams());






