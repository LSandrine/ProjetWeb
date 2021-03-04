<?php
/*
* @class Database
* @author  Latour Renut Timimi
*/
require_once 'Configuration.php';

class Database{
  private static $_pdo = null;

  private function __construct(){
    $conf = Configuration::getInstance();
    if(!isset($conf->db_driver)){
      die("Database : driver non renseigné.");
    }
    switch($conf->db_driver){
      case 'pdo_mysql':
        $this->makePDOMySQL($conf);
        break;
      default:
        die("Database : driver non pris en compte.");
    }
    self::$_pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    self::$_pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);
  }

  public static function getInstance(){
    if(is_null(self::$_pdo)){
      new Database();
    }
    return self::$_pdo;
  }

  private function makePDOMySQL(Configuration $conf){
    $expectedKeys = ['db_host','db_login','db_password','db_base'];
    foreach($expectedKeys as $key){
      if(!isset($conf->$key)){
        die("Database : $key manquant dans le fichier ini.");
      }
    }

    try{
        self::$_pdo = new \PDO(
          "mysql:host={$conf->db_host};dbname={$conf->db_base};charset=utf8",
          $conf->db_login,
          $conf->db_password
        );
      }catch(\PDOException $ex){
        die("Database : erreur connexion MySQL ".$ex->getMessage());
      }
    }


}
