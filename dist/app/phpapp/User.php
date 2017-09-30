<?php

namespace User;


class User
{
  private $_expenses = array();
  private $_user_id;

  public function __construct($user_id)
  {
    $this->_user_id = $user_id;
  }

  public function getID()
  {

  }

  public function getFirstName()
  {

  }

  public function getLastName()
  {

  }

  public function getEmail()
  {

  }

  public static function AddUser($data, $types)
  {
    return \Db\DbLayer\DbLayer::insert('chicheng.users', $data, $types);
  }



  public function UpdateProfile($table, $data, $where, $type)
  {
    \Db\DbLayer\DbLayer::update($table, $data, $where, $type);
  }

  public function UpdateExpense($table, $data, $type, $where)
  {
    \Db\DbLayer\DbLayer::update('chicheng.users_expense', $data, $where, $type);
  }

  public function AddExpense($data, $type)
  {
    $id = \Db\DbLayer\DbLayer::insert('chicheng.users_expense', $data, $type);
    $this->_expenses[] = new \Expense\Expense($data);
    return $id;
  }

  public function DeleteCategory($id)
  {
    global $pdo_dbh;
    $q = ' delete FROM chicheng.user_category
where id = '.$id;
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    return true;
  }

  public function DeleteSubCategory($id)
  {
    global $pdo_dbh;
    $q = ' delete FROM chicheng.user_subcategory
where id = '.$id;
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    return true;
  }

  public function getAllExpenses()
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
where ue.user_id ='.$this->_user_id;
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

  public function getAllCategory()
  {
    global $pdo_dbh;
    $q = 'SELECT id, name, "c" as t  FROM chicheng.category
union SELECT id, name, "u" as t FROM  chicheng.user_category
where user_id = '.$this->_user_id;
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

  public function getTotalMoneySpent()
  {
    global $pdo_dbh;
    $q = 'SELECT sum(price) as price FROM chicheng.users_expense
where user_id = '.$this->_user_id;
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    $count = $sth->rowCount();
    if($count > 0)  {
      return $sth->fetch(\PDO::FETCH_ASSOC);
    }
  }

  public function getTotalNumberofRecords()
  {
    global $pdo_dbh;
    $q = 'SELECT count(*) as records FROM chicheng.users_expense
where user_id = '.$this->_user_id;
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    $count = $sth->rowCount();
    if($count > 0)  {
      return $sth->fetch(\PDO::FETCH_ASSOC);
    }
  }

  public function getUserCategory()
  {
    global $pdo_dbh;
    $q = 'SELECT id, name FROM  chicheng.user_category
where user_id = '.$this->_user_id;
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

  public function getAllUsersParamters()
  {
    global $pdo_dbh;
    $q = 'SELECT c.id as category_id, c.name,  group_concat(distinct ue.subcategory_id) as subcategory_ids, group_concat(distinct sc.name) as subcategory_names, 
	group_concat(distinct ue.user_subcategory_id) as user_subcategories, group_concat(distinct uc.name) as user_subcategories_ids
FROM chicheng.users_expense ue
join chicheng.category c on c.id = ue.category_id
left join chicheng.subcategory sc on sc.id = ue.subcategory_id
left join chicheng.user_subcategory uc on uc.id = ue.user_subcategory_id
where ue.user_id = '.$this->_user_id.' and ue.category_id is not null
group by ue.category_id;';
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    $count = $sth->rowCount();
    if($count > 0)  {
      $res = array();
      $res4 = array();
      for($i=0; $i<$count; $i++)  {
        $p = array();
        $p4 = array();
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        if(!empty($result['subcategory_ids']) && !empty($result['subcategory_names'])){
          if(strpos($result['subcategory_ids'], ",") > -1) {
            $ids = explode(',', $result['subcategory_ids']);
            $names = explode(',', $result['subcategory_names']);
            $keys = array_keys($ids);
            foreach ($keys as $k => $value) {
              $p[$ids[$value]] = $names[$value];
            }
          }
          else{
            $p[$result['subcategory_ids']] = $result['subcategory_names'];
          }
          $res[$i][0]['type'] = 's';
          $res[$i][0]['name'] = $result['name'];
          $res[$i][0]['data'] = $p;
        }
        if(!empty($result['user_subcategories']) && !empty($result['user_subcategories_ids'])) {
          if(strpos($result['user_subcategories_ids'], ",") > -1){
            $ids = explode(',', $result['user_subcategories_ids']);
            $names = explode(',', $result['user_subcategories']);
            $keys = array_keys($ids);
            foreach($keys as $k => $value){
              $p4[$names[$value]] = $ids[$value];
            }
          }
          else{
            $p4[$result['user_subcategories']] = $result['user_subcategories_ids'];
          }

          $res[$i][1]['type'] = 'us';
          $res[$i][1]['name'] = $result['name'];
          $res[$i][1]['data'] = $p4;
        }
        $res[$i]['category_id'] = $result['category_id'];
        $res[$i]['name'] = $result['name'];
      }
    }

    $last_counter = $count;

    $q = 'SELECT uc.id as user_category_id, uc.name, group_concat(us.id) as sub_ids, group_concat(us.name) as sub_names FROM chicheng.users_expense ue
join chicheng.user_category uc on uc.id = ue.user_category_id
left join chicheng.user_subcategory us on us.id = ue.user_subcategory_id
where ue.user_id = '.$this->_user_id.' and ue.user_category_id is not null
group by ue.user_category_id;';
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    $count = $sth->rowCount();
    if($count > 0)  {
      $res2 = array();
      for($i=0; $i<$count; $i++)  {
        $c = 0;
        $p = array();
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        if(!empty($result['sub_ids']) && !empty($result['sub_names'])){
          if(strpos($result['sub_ids'], ",") > -1){
            $ids = explode(',', $result['sub_ids']);
            $names = explode(',', $result['sub_names']);
            $keys = array_keys($ids);
            foreach($keys as $k => $value){
              $p[$ids[$value]] = $names[$value];
            }
          }
          else{
            $p[$result['sub_ids']] = $result['sub_names'];
          }
        }
        $res[$last_counter][0]['type'] = 'us';
        $res[$last_counter]['user_category_id'] = $result['user_category_id'];
        $res[$last_counter]['name'] = $result['name'];
        $res[$last_counter][0]['data'] = $p;
        $last_counter++;
      }
    }
    if(!empty($res))
    return $res;

  }


  public function SearchCategoryKeywords($cid)
  {
    global $pdo_dbh;
    $q = 'SELECT trim(word) as word FROM chicheng.keywords_by_category where category_id ='.$cid;
    $res = array();
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    $count = $sth->rowCount();
    if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res[] = $result['word'];
      }
      return $res;
    }
  }

  public function getUserSubCategory()
  {
    global $pdo_dbh;
    $q = 'SELECT a.*, b.name as category_name FROM chicheng.user_subcategory a
join chicheng.category b on a.category_id = b.id
where a.user_id = '.$this->_user_id.'
union
SELECT a.*, c.name as category_name  FROM chicheng.user_subcategory a
join chicheng.user_category c on a.user_category_id = c.id 
where a.user_id = '.$this->_user_id;
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    $count = $sth->rowCount();
    if($count > 0)  {
      $res = array();
      for($i=0; $i<$count; $i++)  {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res[$result['category_name']][] = $result;
      }
      return $res;
    }
  }

  public function getExpense()
  {
    return $this->_expenses;
  }

  public function RemoveExpense($id)
  {
    global $pdo_dbh;
    $q = ' delete from chicheng.users_expense where id = '.$id .' and user_id ='.$this->_user_id;
    $sth = $pdo_dbh->prepare($q);
    $sth->execute();
    return;
  }

  public static function authenticate($username, $password)
  {
    global $pdo_dbh;
    $q = 'select * from chicheng.users where username = :USERNAME and password = :PASSWORD';
    $sth = $pdo_dbh->prepare($q);
    $sth->bindValue(':USERNAME', $username, \PDO::PARAM_STR);
    $sth->bindValue(':PASSWORD', $password, \PDO::PARAM_STR);
    $sth->execute();
    $count = $sth->rowCount();
    $result = $sth->fetch(\PDO::FETCH_ASSOC);
    return $count > 0 ? array('id'=>$result['id'],'user_key'=>$result['user_key']) : false;
  }
}



