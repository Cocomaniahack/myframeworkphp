<?php



 class Token{

  
    public static function generate()
          {

             session_start();
             $rand_part = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());
             return  $_SESSION['token'] = $rand_part;
          }

    public static function check($token,$tokenSession)
          {
              if($token == $tokenSession)
              {
                return true;
                 //session_destroy();

              }else{
                    return false;
                    session_destroy();
                   }

          }



 }