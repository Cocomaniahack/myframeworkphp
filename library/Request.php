<?php


class Request {

      protected $url;                   //la declaramos como una propiedad o caracteristica /decalara una variable dentro de la clase
      protected $controller;
      protected $defaultController = 'home';
      protected $action;
      protected $defaultAction = 'index';
      protected $params = array();

      public function __construct($url)  //metodo que se llama automaticamente cada vez que se crea un metodo 
      { 

            $this->url = $url;
             
            //controlador/accion/parametros
            

            //home/contactos/juliandario
            //separar por segmentos

            $segments  = explode('/',  $this->getUrl()); //separa la cadena por segmentos con al funcion explode desde '/'
            
             $this->resolveController($segments);  //controlador

             $this->resolveAction($segments);  //action

             $this->resolveParams($segments);  //parametros

           

      }

       public function resolveController(&$segments)
       {
    
        $this->controller = array_shift($segments); //array_shift me devuelve el primer segmento del array
        
        if (empty($this->controller))
        	{
            
             $this->controller = $this->defaultController;  // devuleve el home

        	}
        }
        //-----------------declarar devuelve nuestra accion --------------------------------
         public function resolveAction(&$segments)
       {
    
       echo $this->action = array_shift($segments); //array_shift me devuelve el primer segmento del array
        
        if (empty($this->action))
        	{
            
            $this->action = $this->defaultAction;   //index

        	}
        }
        //-----------------declarar devuelve nuestra parametros --------------------------------
        
         public function resolveParams(&$segments)
       {
    
              $this->params = $segments; 
            
        }  
        //---------------------------------------------------------------

       public function getUrl()
       {
        
       return $this->url;
      
       
       }
            //--------------------segmento que contenga el nombre del controlador-----------
        public function getController()   //string(4) "home"
        {
         
         return $this->controller;

        }

            //---------------------  nombre de la clase del controlador  ------------
       public function getControllerClassName()  //"HomeController"
       {

         return Inflector::camel($this->getController()).'Controller'; //clase estatica NO se instancia 
       }
            //--------------------el archivo que contiene mi controlador------------------

       public function getControllerFileName()  // "controller/ContactosController.php"
       {

         return 'controller/' . $this->getControllerClassName().'.php';

       }

       public function getAction()
       {

        return $this->action;
       }
       public function getActionMethodName()
       {

        return Inflector::lowerCamel($this->getAction()).'Action'; //clase estatica NO se instancia 

       }

       public function getParams()
       {

        return $this->params;
       }

       //-------------EJECUTAR LA APLICATION------------


        public function execute()
        {
          $controllerClassName = $this->getControllerClassName();  //"HomeController" 0   RegisterController
          $controllerFileName  = $this->getControllerFileName();   // "controller/ContactosController.php"
          $actionMethodName    = $this->getActionMethodName();
          $params              = $this->getParams();
          
          if( ! file_exists($controllerFileName))
          {
            exit('controlador no existe');
          }

          require $controllerFileName;

          $controller = new $controllerClassName();



          $response = call_user_func_array([$controller, $actionMethodName], $params);
         // $controller->$actionMethodName();
          $this->executeResponse($response);

        }  

        public function executeResponse($response)
        {
          if($response instanceof Response)
          {
            $response->execute();
          }elseif(is_array($response)){

            echo json_encode($response);
            
          }elseif(is_string($response)){
          
            echo $response;

          }else{

            exit('Invalid Response');

          }
        }



}







