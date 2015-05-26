<?php


class conexion{
    
   public $enlace;

   function __construct($server,$usuario,$clave,$db){

   	$this->enlace = mysql_connect($server,$usuario,$clave);
   	mysql_select_db($db);


   }

   function __destruct(){

        mysql_close($this->enlace);
   }


}