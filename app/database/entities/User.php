<?php 
    // namespace database\entities;

   class User{

        public function Select($tabla,$campo,$id){

         $query = mysql_query("select $campo from $tabla where $campo = '$id' ")or die("no se si hizo la consulta");
         $row = mysql_fetch_array($query);
        
        if($row['correo'] == true)
                    {
                     return 3;
                      // return 'Ya existe ese nombre de usuario';
                    }else{
                     return  4;
                       //return 'Bienvenido:'.$chek;
                     }
      }
       
        public function  Insert($name,$mail,$password)
        {

          $this->name = $name;
          $this->mail = $mail;
          $this->password = $password; 

              $ip = $_SERVER['REMOTE_ADDR']; // Esta información no es viable!
              $segments  = explode('@',  $this->getName());
              
              $tiempo = time();
              $random = rand(0,99999); 
              $carpeta = $random.$tiempo;


              $firts  =   $this->getNameFirts($segments);
              $second =   $this->getNameSecond($segments);
              $random =   str_shuffle($firts);
              $Second =   substr($random,1,3);

             $random1 = rand(0,99); 
             $codigo1 = time();
             $rand =  substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',20)),0,20);
             $cod =  ($rand.$codigo1.'-'.$random);
             $myUrl =$firts.'.'.$Second.$random1;
             /* mkdir("uploads/$carpeta");  //Crear mi Carpeta de imagenes
              mkdir("uploads/$carpeta/temp");  //Nuevo archivo temporario para imagenes 
              mkdir("uploads/$carpeta/bprofiles");  //Nuevo Archivo para Fotos imagenes normales
              $routeImage = "uploads/$carpeta/bprofiles/";  
              copy("./public/img/avatar.jpeg",$routeImage."avatar.jpeg");// foto de upload a nuevo archivo*/
              
            
             mysql_query("INSERT INTO usuarios(nombre,correo,clave,slug,ip,code,carpeta)VALUES( '$name','$mail','$password','$myUrl','$ip','$cod','$carpeta')");
             mysql_query("insert into imagen_perfil(fotoperfil,id_usuario,mail,folder) values ('avatar.jpeg','$password','$mail','$carpeta')");
             mysql_query("insert into contactos(usuario,contacto,activo,code_contacto,fecha_contacto,ip,oculto,leido,visto,filtro)values('$mail','$mail','si','$code','$tiempo','$ip','no','no','si','nad')");
             return  $checkToken1 = $myUrl.'  y el mail '.$mail.' el ip'. $carpeta;


           

        }
        public function getNameFirts(&$segments)
        {
     
             // return  $this->controller = Inflector::changeLetter($segments);
              
       // return  $this->controller = array_shift($segments);
           $var    = array_shift($segments);
        return  $this->controller = Inflector::changeLetter($var);

        }
        public function getNameSecond(&$segments)
        {
     
        return  $this->controller = array_shift($segments);


        }
        public function getName(){


          return  $this->mail; 

        }




}