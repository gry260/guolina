<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 7/26/2017
 * Time: 5:00 PM
 */

$parameters = json_decode(file_get_contents('php://input'), true);
require_once('../init.php');

$loader->addNamespace('\Category', $_SERVER['DOCUMENT_ROOT'] . '/app/phpapp');
$loader->loadClass("Db\DbLayer");
$instance = \Db\DB::getInstance();
$pdo_dbh = $instance->getConnection();

$loader->addNamespace('\User', $_SERVER['DOCUMENT_ROOT'] . '/app/phpapp');
$loader->loadClass("\User");

if (!empty($parameters['a']) && $parameters['a'] == 'addcategorytype') {
  $data = array('user_id' => $parameters['user_id'], 'name' => $parameters['name']);
  $types = array('user_id' => \PDO::PARAM_INT, 'name' => \PDO::PARAM_STR);
  echo \Db\DbLayer\DbLayer::insert('user_category', $data, $types);
  exit;
}

if (!empty($parameters['a']) && $parameters['a'] == 'addsubcategorytype') {
  if (empty($parameters['category_id']) || empty($parameters['name'])) {
    return;
  }
  $data = array('user_id' => $parameters['user_id'], 'name' => $parameters['name']);
  $parameters['type'] == "c" ? $data['category_id'] = $parameters['category_id'] : false;
  $parameters['type'] == "u" ? $data['user_category_id'] = $parameters['category_id'] : false;
  $types = array('user_id' => \PDO::PARAM_INT, 'name' => \PDO::PARAM_STR, 'category_id' => \PDO::PARAM_INT, 'user_category_id' => \PDO::PARAM_INT);
  $id = \Db\DbLayer\DbLayer::insert('user_subcategory', $data, $types);
  echo $id;
  return ;
}



if (!empty($parameters['a']) && $parameters['a'] == 'getsubcategory') {
  if (empty($parameters['category_id']) || !preg_match('/^[0-9]+$/', $parameters['category_id'])) {
    return;
  }
  if (empty($parameters['type']) || ($parameters['type'] !== 'u' && !empty($parameters['type'] !== 'c'))) {
    return;
  }
  $user_id = trim($parameters['user_id']);
  $category_id = trim($parameters['category_id']);
  $type = trim($parameters['type']);
  $loader->loadClass("Category");
  $loader->loadClass("Category\SubCategory");
  echo json_encode(\Category\Category::getSubCategoryByID($category_id, $type, $user_id));
}

if (!empty($parameters['a']) && ($parameters['a'] == 'addexpense' || $parameters['a'] == 'updateexpense')) {

  $data = array('user_id' => $parameters['user_id'],
    'name' => $parameters['name'], 'price' => $parameters['price'], 'date_entered'=>date('Y-m-d H:i:s'),
    'date' => $parameters['date'], 'comment' => $parameters['comment']);
  isset($parameters['category_id']) ? $data['category_id'] = $parameters['category_id'] : false;
  isset($parameters['subcategory_id']) ? $data['subcategory_id'] = $parameters['subcategory_id'] : false;
  isset($parameters['user_category_id']) ? $data['user_category_id'] = $parameters['user_category_id'] : false;
  isset($parameters['user_subcategory_id']) ? $data['user_subcategory_id'] = $parameters['user_subcategory_id'] : false;
  $loader->addNamespace('\Expense', $_SERVER['DOCUMENT_ROOT'] . '/app/phpapp');
  $loader->loadClass("\Expense");
  $types = array('user_id' => \PDO::PARAM_INT, 'name' => \PDO::PARAM_STR, 'price' => \PDO::PARAM_STR,
    'comment' => \PDO::PARAM_STR,  'date' => \PDO::PARAM_STR,    'subcategory_id' => \PDO::PARAM_INT,
    'id' => \PDO::PARAM_INT,
    'user_category_id' => \PDO::PARAM_INT, 'date_entered' => \PDO::PARAM_STR,
    'category_id' => \PDO::PARAM_INT, 'user_category_id' => \PDO::PARAM_INT, 'user_subcategory_id'=>\PDO::PARAM_INT);

  $u = new \User\User($parameters['user_id']);
  if($parameters['a'] == 'addexpense') {
    echo $u->AddExpense($data, $types);
  }

  if($parameters['a'] == 'updateexpense'){
    $where = array();
    isset($parameters['id']) ? $where['id'] = $parameters['id'] : false;
    $u->UpdateExpense('users_expense;', $data, $types, $where);
  }
}


if(!empty($parameters['deleteusercategoryid'])){
  $id = trim($parameters['deleteusercategoryid']);
  $u = new \User\User($_SESSION['id']);
  $u->DeleteCategory($parameters['deleteusercategoryid']);
}

if(!empty($parameters['deleteusersubcategoryid'])){
  $id = trim($parameters['deleteusersubcategoryid']);
  $u = new \User\User($_SESSION['id']);
  $u->DeleteSubCategory($id);
}

if(!empty($parameters['a']) && $parameters['a']  == 'removeexpenseid') {
  $id = trim($parameters['id']);
  $user_id = trim($parameters['user_id']);
  $u = new \User\User($user_id);
  $u->RemoveExpense($id);
}

if(!empty($parameters['cid'])){
  if(!preg_match('/^[0-9]+$/', $parameters['cid'])){
    return;
  }
  else{
    $cid = $parameters['cid'];
    $loader->addNamespace('\Report', $_SERVER['DOCUMENT_ROOT'].'/dist/app/phpapp');
    $loader->loadClass("Report\Report");
    $u = new \User\User($_SESSION['login']['id']);
    echo json_encode($u->SearchCategoryKeywords($cid));
  }
}



