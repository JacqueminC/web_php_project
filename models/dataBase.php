<?php

class DataBase{
  const DATABASEINFO = 'mysql:host=localhost;dbname=myWebSite;charset=utf8';
  const USER = 'root';
  const PSW = '';
  
	public static function connect(){
		return new PDO(self::DATABASEINFO, USER, PSW,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  
}

?>