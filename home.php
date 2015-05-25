<?php


$confidential = "this is Private com_message_pump()";
$language = 'php';
$titulo = 'FrameWork PHP';


 //se llama a la funcion 

// view('view', ['language' => $language,'confidential'=> $confidential,'titulo'=>$titulo]);

 //compactar la cadena con COMPACT
view('home', compact('language','confidential','titulo'));