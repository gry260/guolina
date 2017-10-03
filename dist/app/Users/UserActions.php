<?php
/**
 */


require_once('../Psr4AutoloaderClass.php');
$parameters = json_decode(file_get_contents('php://input'), true);
$loader = new Psr4AutoloaderClass();
$loader->register();

$loader->addNamespace('\User', $_SERVER['DOCUMENT_ROOT'] . '/dist/app/phpapp');
$loader->loadClass("\User");

require_once('../init.php');
$instance = \Db\DB::getInstance();
$pdo_dbh = $instance->getConnection();

if(!empty($parameters['type']) && $parameters['type'] == 'register'){
  $d = array('username', 'password', 'first_name', 'last_name');
  foreach($d as $key => $v){
    $data[$v] = htmlentities($parameters[$v], ENT_NOQUOTES);
    if (strpos($v, 'password') !== false) {
      $data[$v] = md5($data[$v]);
    }
  }
  $data['user_key']= hash('crc32', microtime(true) . mt_rand() . $data['username']);
  $loader->loadClass("Db\DbLayer");
  $types = array('username'=>PDO::PARAM_STR, 'password'=>PDO::PARAM_STR, 'last_name'=>PDO::PARAM_STR,
    'first_name'=>PDO::PARAM_STR, 'user_key'=>PDO::PARAM_STR);
  $_SESSION['login']['id'] = \User\User::AddUser($data, $types);
  echo  $_SESSION['login']['id'];
}

if(!empty($parameters['type']) && $parameters['type'] == 'login') {
  $d = array('username', 'password');
  foreach($d as $key => $v) {
    $data[$v] = htmlentities($parameters[$v], ENT_NOQUOTES);
    if (strpos($v, 'password') !== false) {
      $data[$v] = md5($data[$v]);
    }
  }
  echo json_encode($_SESSION['login'] = \User\User::authenticate($data['username'], $data['password']));
}

if(!empty($parameters['type']) && $parameters['type'] == 'logout') {
  if(isset($_SESSION['login'])) {
    unset($_SESSION['login']);
  }
}

if(!empty($parameters['type']) && $parameters['type'] == 'check') {
  $username = strip_tags($parameters['username']);
  echo \User\User::checkUser($username);
}

