<?php

try
{
	$objPdo = new PDO('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=gisonni2u_PHP' , 'gisonni2u_appli','Huntercraft57,');
}
catch( Exception $exception ){
								die($exception->getMessage());
							  }

?>