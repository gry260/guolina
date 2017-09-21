<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 7/25/2017
 * Time: 3:39 PM
 */


namespace Category;
class Category
{

  private $_id;
  private $_name;
  private $_subcategory_id = array();

  public function __construct($id, $name)
  {
    $this->_id = $id;
    $this->_name = $name;
  }

  public function getID()
  {
    return $this->_id;
  }

  public function getName()
  {
    return $this->_name;
  }

  public function getSubCategoryIDs()
  {
    return $this->_subcategory_id;
  }

  public static function getAllCategory()
  {
    global $pdo_dbh;
    $q = 'SELECT id, name, "c" as t  FROM chicheng.category
union SELECT id, name, "u" as t FROM  chicheng.user_category
where user_id =3 ';
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    $count = $sth->rowCount();
    if($count > 0)  {
      $res = array();
      for($i=0; $i<$count; $i++)  {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res[] = $result;
      }
      return $res;
    }
  }


  public static function getSubCategoryByID($category_id, $type)
  {
    global $pdo_dbh;
    if($type == 'c') {
      $q = 'select *, "c" as t from chicheng.subcategory  where category_id = :CATEGORY_ID
union SELECT id, name, category_id, "u" as t FROM chicheng.user_subcategory where user_id = 3 and category_id = :CATEGORY_ID';
      $sth = $pdo_dbh->prepare($q);
      $sth->bindValue(':CATEGORY_ID', $category_id, \PDO::PARAM_INT);
      $sth->execute();
      $count = $sth->rowCount();
    }
    else if($type == 'u'){
      $q = 'SELECT id, name, user_category_id, "u" as t FROM chicheng.user_subcategory where user_id = 3 and user_category_id = :CATEGORY_ID';
      $sth = $pdo_dbh->prepare($q);
      $sth->bindValue(':CATEGORY_ID', $category_id, \PDO::PARAM_INT);
      $sth->execute();
      $count = $sth->rowCount();
    }
    if($count > 0)  {
      $res = array();
      $objs = array();
      for($i=0; $i<$count; $i++)  {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $objs[] = \Category\SubCategory\SubCategory::generateSubCategory($result);
        $res[] = $result;
      }
      return $res;
    }
  }

}