<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 8/2/2017
 * Time: 12:49 PM
 */

namespace Expense;
class Expense
{
  private $_user_id;
  private $_name;
  private $_subcategory_id;
  private $_user_category_id;
  private $_category_id;
  private $_user_subcategory_id;
  private $_date;
  private $_price;
  private $_comment;
  public function __construct($data)
  {
    $this->_user_id = isset($data['user_id']) ? $data['user_id'] : false;
    $this->_name = isset($data['user_id']) ? $data['name'] : false;
    $this->_price = isset($data['price']) ? $data['price'] : false;
    $this->_date_entered = isset($data['date_entered']) ? $data['date_entered'] : false;
    $this->_date = isset($data['date']) ? $data['date'] : false;
    $this->_comment = isset($data['comment']) ? $data['comment'] : false;
    $this->_category_id = isset($data['category_id']) ? $data['category_id'] : false;
    $this->_user_category_id = isset($data['category_id']) ? $data['category_id'] : false;
    $this->_subcategory_id = isset($data['subcategory_id']) ? $data['subcategory_id'] : false;
    $this->_user_subcategory_id = isset($data['user_subcategory_id']) ? $data['user_subcategory_id'] : false;
  }

  public function getName()
  {
    return $this->_name;
  }

  public function getSubCategory_ID()
  {
    return $this->_subcategory_id;
  }

  public function getUserID()
  {
    return $this->_user_id;
  }

  public function getDate()
  {
    return $this->_price;
  }

  public function getComments()
  {
    return $this->_comments;
  }

  public function getPrice()
  {
    return $this->_price;
  }


  public static function getAllExpenses()
  {
    global $pdo_dbh;
    $q = ' SELECT *, ifnull(c.id, uc.id) as category_id, ifnull(s.id, us.id) as subcategory_id, 
ifnull(c.name, uc.name) as category_name, ifnull(s.name, us.name) as subcategory_name, ue.id as id,
ue.name as name, ue.user_id as user_id
 FROM chicheng.users_expense ue
left join chicheng.category c on ue.category_id = c.id
left join chicheng.subcategory s on ue.subcategory_id = s.id
left join chicheng.user_category uc on uc.id = ue.user_category_id
left join chicheng.user_subcategory us on ue.user_subcategory_id = us.id
where ue.user_id =3; ';
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

}