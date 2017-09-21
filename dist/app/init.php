<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

$categories = \Category\Category::getAllCategory();

$user = new \User\User();
$usercategories = $user->getUserCategory();
$usersubcategories = $user->getUserSubCategory();
$parameters = $user->getAllUsersParamters();

$expenses = \Expense\Expense::getAllExpenses();










