<?php

class DataBase{
  const DATABASEINFO = 'mysql:host=localhost;dbname=myWebSite;charset=utf8';
  
	public static function connect(){
		return new PDO(self::DATABASEINFO, 'root', '' ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  
}

?>