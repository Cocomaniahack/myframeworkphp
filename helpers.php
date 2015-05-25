<?php
//declarar la funcion y encapsularlo

function view($template, $vars = array())

{
	extract($vars);  //extrae todos los valores que llegan con el array

	require "views/$template.tpl.php";


};


function controller($name)
{

	if(empty($name)){

    $name = 'home';
   
    
    
    var_dump($name);

	}
   $file = "controller/$name.php";
   
  

 if (file_exists($file))
 {
  


   require $file;


    if ($file == "controller/contactos.php" )
    {

   var_dump($file);
    	echo 'estas en contacto';
    }



 }else{

    header("HTTP/1.0 404 Not Found");
	exit("Pagina no encontrada");

 }

};
