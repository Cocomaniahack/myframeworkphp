<?php
//$confidential = "this is Private com_message_pump()";
//$language = 'php';
//$titulo = 'FrameWork PHP';
 //se llama a la funcion 
// view('view', ['language' => $language,'confidential'=> $confidential,'titulo'=>$titulo]);
 //compactar la cadena con COMPACT
//view('home', compact('language','confidential','titulo'));
class HomeController {
     
      
       public function indexAction()
       {

        
         
         

         $rand_part = Token::generate();

         

        $len = 'laracas';
        $confidential = "";

        $error = '';
        
         


          //devuelve a la clase Request-------------
         //return new ArrayObject();
        //return ['titulo' => 'desde HomeController']; //json
        //return 'Construyendo';                       //array
        return new View('home', ['titulo' => 'desde HomeController', 
                                 'language' => $len ,
                                 'confidential' => $confidential ,
                                 'error' => $error,
                                 'token' => $rand_part,
                                 
                                 ]);
        
        //require "views/home.tpl.php";
        //exit('estas en HomeController');
        //----ejecutamos el response-----------
        //$view->execute();
       }

     

    

}