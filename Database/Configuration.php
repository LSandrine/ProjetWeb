<?php
/*
* @class Configuration
* @author Sandrine Latour
*/


class Configuration{
  private static $_instance = null;
  private static $_inifile = null;
  private $data;


  private function __construct(){
    if(is_null(self::$_inifile)){
      die("Fichier ini non renseigné.");
    }
    if(!is_readable(self::$_inifile)){
      die("Fichier ini non lisible.");
    }
    $this->data = parse_ini_file(self::$_inifile);
    if(!$this->data){
      die("Erreur lecture fichier ini.");
    }
  }

  public static function getInstance(){
    if(is_null(self::$_instance)){
      self::$_instance = new Configuration();
    }
    return self::$_instance;
  }

  public static function setConfigurationFile($inifile){
    self::$_inifile = $inifile;
  }
  public function __get($item){
    if(!isset($this->data[$item])){
      die("Erreur configuration : $item n'existe pas.");
    }
    return $this->data[$item];
  }

  public function __isset($item){
    return isset($this->data[$item]);
  }
}
