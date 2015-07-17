<?php
//use  database\entities\User;


class SingUpController{
 
  protected $confidential;
  


     public function indexAction(){
             session_start();
          $name = $_POST['nombre'];
          if(empty($name)){
           header("Location: /myframeworkphp/");
           }

           $mail       = $_POST['mail'];
           $contrasena = $_POST['password'];
           $token      = $_POST['token'];
           $errorName  = '';
           $errorMail  = '';
            
           $tokenSession =  $_SESSION['token'];
           $checkToken = Token::check($token,$tokenSession);
           if($checkToken == true){
                $checkToken = $token;
           }else{
                header("Location: /myframeworkphp/");
           }

          // $rand_part = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());

           
           $request  = new usuarios($mail,$name,$contrasena);

           $confidential = $request->showPerson();
           
           
               
            if ($confidential == 1){

                $errorMail = 'This email address is considered invalid.';

            }else if($confidential == 2){
                      
             
               $errorName =  'This name is considered invalid.';

            }else if($confidential == 3){

                $errorMail = 'This username already exists. Try again';
              // $errorMail = 'Ya existe ese nombre de usuario';

            }else if($confidential == 4){

           // $checkToken1 = str_shuffle($name);
              $insert = new User;
              $checkToken = $insert->Insert($name,$mail,$contrasena);

              //$insert  = new User;
             // $respuesta->Select('usuarios','correo',$correo);
              //$checkToken1 = User::insert($name);

            // header("Location: /myframeworkphp/");
            }

           //require "views/home.tpl.php";
            

          //devuelve a la clase Request-------------
          //return new ArrayObject();
          //return ['titulo' => 'desde HomeController']; //json
          //return 'Construyendo';                       //array

            //header("Location: /myframeworkphp/",TRUE,301);
          return new View('sing-up', ['titulo'     => 'ghostchat',
                                        'name'     => $name,
                                        'mail'     => $mail,
                                        'errorName'=> $errorName,
                                        'errorMail'=> $errorMail,
                                        'token'    => $checkToken,
                                        'tokens'   => $checkToken,
                                        
                                        
                                    
                                      ]);
           //echo var_dump($mail);

          }





}
