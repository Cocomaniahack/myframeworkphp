<?php


//$confidential = "this is Private desde controlador de contactos";
//$titulo = 'contactos';
//$nombre = 'julian dario lopez';



//view('contactos', ['confidential'=> $confidential]);


//view('contactos', compact('confidential','titulo','nombre'));

class ContactosController {

       public function indexAction()
       {
         // exit('es indexAction');
        $confidential = "variable ";
        $nombre = 'juliansytem@gmail.com';
        $languaje = 'PHP';


         return new View('contactos', ['titulo' => 'desde contactos','confidential'=>$confidential,'nombre'=>$nombre,'language'=>$languaje]);
       	
       }
        
        public function nombreAction($nombre)
        {

           exit('Nombre de contactos '   .$nombre);

        }

}