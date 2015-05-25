<?php


class Inflector {

	public static function camel($value)
	{
		$segments = explode('_', $value);

		array_walk($segments, function(&$item){  //array_walk  va item por item del array
			$item = ucfirst($item);              //ucfirst me convierte la primera letra en mayuscula
		});
     return implode('', $segments);

	}



	public static function lowerCamel($value)
	{
		
		return lcfirst(static::camel($value));  //como se usa metodo estatico ya no se usa el this sino momnre de la calse
        
	}

}