<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 7/20/2017
 * Time: 11:50 AM
 */


namespace DB;
class DB
{
  private static $_pdo_dbh;
  private $_connection;

  public function __construct()
  {
    try {
      $this->_connection = new \PDO('mysql:host=localhost; dbname=chicheng; charset=utf8mb4', 'root', '');
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }

  public function getConnection()
  {
    return $this->_connection;
  }

  public static function getInstance()
  {
    if (self::$_pdo_dbh == null) {
      self::$_pdo_dbh = new \DB\DB();
    }
    return self::$_pdo_dbh;
  }

}