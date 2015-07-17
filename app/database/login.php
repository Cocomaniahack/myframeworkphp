<?php
 //use  database\entities\User;

class usuarios{
   protected $mail;
   protected $name;
   //protected $ip;
   public  $bien = 'buenivenido Aqui';
   public $correo;
   public $clave;
   public $nombre;
   public $ip;
   public $code;
   public $carpeta;
   public $update_at;

 // public function insertUser(){
   
   //      $query = mysql_query("INSERT INTO usuarios(nombre,correo,clave,ip,fechau,code,carpeta)VALUES( '{$nombre}','{$correo}','{$clave}','{$correo}','{192.168.0.2}','{123xqqweqw123}','{123c434}')")or die("Failed to Charge");
     
   //}
   public function __construct($mail,$name,$contrasena) 
           {

            $this->mail = $mail;
            $this->name = $name;
            $this->contrasena = $contrasena;
           }
        
    public function showPerson()
           { 
       
                $correo = $this->mail;
                $name = $this->name;
                $pass = $this->contrasena ;
               
          
                $chek = htmlentities(strip_tags($name));
                 //  <script>window.location ='http://google.com/';</script>
                 $sanitized_b = filter_var($correo, FILTER_SANITIZE_EMAIL);
                 
                 if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
                 } else {
                return 1;
                //return "This email address is considered invalid.\n";
                }
                if($chek == "")
                {   
                return 2;
                // return 'This name is considered invalid.\n';
                }else{

                     $respuesta  = new User;
                     return  $respuesta->Select('usuarios','correo',$correo);
                       

                     }
 
            }
    

}