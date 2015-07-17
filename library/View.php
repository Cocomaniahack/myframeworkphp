<?php


class View extends Response {
	protected $template;
	protected $vars = array();


    public function __construct($template, $vars = array())

     {
           $this->template = $template;
           $this->vars     = $vars;

     }
      //---------------generar add prar las variables y sus valores

     public function add($var, $value)
     {

            $this->vars[$var] = $value;

     }
    
      //--------------- generar los geeters-----------------------

     public function getVars()
     {
           return $this->vars;
     }
     
     public function getTemplate()
     {
            return $this->template;
     }
     //............................................................

      public function execute()
      {

	       $template = $this->getTemplate();
	       $vars     = $this->getVars();

	        call_user_func(function() use ($template, $vars){
             
             extract($vars);  //extrae todos los valores que llegan con el array
            require "views/$template.tpl.php";

	        });

	        

      }

}