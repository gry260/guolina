<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 8/24/2017
 * Time: 5:08 PM
 */


$array = array('first_name', 'last_name', 'gender', 'email');
$types = array();

if(!empty($array)){
  foreach($array as $key => $value) {
    $data[$value] = $_POST[$value];
    $types[$value] = \PDO::PARAM_STR;
  }
}
$types["id"] = \PDO::PARAM_INT;
$where = array('id'=>3);
require_once('../init.php');

$loader->loadClass("Db\DbLayer");
$instance = \Db\DB::getInstance();
$pdo_dbh = $instance->getConnection();

$loader->addNamespace('\User', $_SERVER['DOCUMENT_ROOT'] . '/app/phpapp');
$loader->loadClass("\User");

$user = new \User\User();
$user->UpdateProfile('users', $data, $where, $types);

header('Location: '.'http://'.$_SERVER['SERVER_NAME']);
exit;