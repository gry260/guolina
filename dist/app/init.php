<?php
session_start();
require_once( __DIR__ .'/Psr4AutoloaderClass.php');

$loader = new Psr4AutoloaderClass();
$loader->register();

$loader->addNamespace('\Db', $_SERVER['DOCUMENT_ROOT'].'/dist/app/db');
$loader->loadClass("Db\Db");

$loader->addNamespace('\Form', $_SERVER['DOCUMENT_ROOT'].'/dist/app/Form');
$loader->loadClass("Form\FormBuilder");

$loader->addNamespace('\Category', $_SERVER['DOCUMENT_ROOT'].'/dist/app/phpapp');
$loader->loadClass("Category\Category");

$loader->addNamespace('\User', $_SERVER['DOCUMENT_ROOT'] . '/dist/app/phpapp');
$loader->loadClass("\User");

$loader->addNamespace('\Expense', $_SERVER['DOCUMENT_ROOT'] . '/dist/app/phpapp');
$loader->loadClass("\Expense");

$instance = \Db\DB::getInstance();
$pdo_dbh = $instance->getConnection();


if(!empty($_SESSION['login']['id'])){
  $user_id = $_SESSION['login']['id'];
  $user = new \User\User($user_id);
  $categories = $user->getAllCategory();
  $usercategories = $user->getUserCategory();
  $usersubcategories = $user->getUserSubCategory();
  $userparameters = $user->getAllUsersParamters();
  $expenses = $user->getAllExpenses();
  $totalMoney = $user->getTotalMoneySpent();
  $totalRecords = $user->getTotalNumberofRecords();
}
else{
  $nTags = \Expense\Expense::getAllTags();
  $nUsers = \Expense\Expense::getAllUsers();
  $nExpenses  = \Expense\Expense::getExpenses();
  $nRecords = \Expense\Expense::getRecords();
}












