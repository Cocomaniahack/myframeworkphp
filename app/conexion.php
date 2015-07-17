<?php


 $con = new conexion($confi['server'],$confi['usuario'],$confi['clave'],$confi['db']);


class conexion{
    
       public $enlace;

       function __construct($server,$usuario,$clave,$db){
            
            $this->enlace = @mysql_connect($server,$usuario,$clave)or die("no se conecto a la base de datos");
            mysql_select_db($db) or die ("no se conecto a la tabla");

       }

       function __destruct(){

            mysql_close($this->enlace);
       }


}