<?php
	class Conexion{

		public function conectar(){

			$link = new PDO("mysql:host=localhost;dbname=proyecto","root","");//primer parámetro tipoBD, direccion y dbname, después usuario y por último contraseña

			/* para comprobar si funciona hacemos un var_dump*/
			// var_dump($link);
			/* Y nos debe salir esto: object(PDO)#2 (0) { }, que quiere decir que la conexión se realizó con éxito. Sino, saldría un error*/

			return $link;

		}
	}
?>