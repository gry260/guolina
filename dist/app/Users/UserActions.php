<?php
/**
 */
require_once('../init.php');
$instance = \Db\DB::getInstance();
$pdo_dbh = $instance->getConnection();
session_start();

if(!empty($_POST['register'])){
  $d = array('username', 'password');
  foreach($d as $key => $v){
    $data[$v] = htmlentities($_POST[$v], ENT_NOQUOTES);
    if (strpos($v, 'password') !== false) {
      $data[$v] = md5($data[$v]);
    }
  }
  $data['user_key']= hash('crc32', microtime(true) . mt_rand() . $data['username']);
  $loader->loadClass("Db\DbLayer");
  $types = array('username'=>PDO::PARAM_STR, 'password'=>PDO::PARAM_STR, 'user_key'=>PDO::PARAM_STR);
  \Db\DbLayer\DbLayer::insert('chicheng.users', $data, $types);
}

if(!empty($_POST['Login'])) {
  $d = array('username', 'password');
  foreach($d as $key => $v) {
    $data[$v] = htmlentities($_POST[$v], ENT_NOQUOTES);
    if (strpos($v, 'password') !== false) {
      $data[$v] = md5($data[$v]);
    }
  }
  $loader->addNamespace('\User', $_SERVER['DOCUMENT_ROOT'].'/app/phpapp');
  $loader->loadClass("User\User");
  $_SESSION['login'] = \User\User::authenticate($data['username'], $data['password']);
}

header("Location:". $_SERVER['DOCUMENT_ROOT']);
exit;