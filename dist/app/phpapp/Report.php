<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 9/5/2017
 * Time: 6:15 PM
 */

namespace Report;
Class Report
{
  private static $_parameters;
  private static $_keys = array('category_ids', 'name', 'price', '');
  private static $_categories_ids = array();
  private static $_user_id;
  private static $_query;

  /*where e.user_id =*/
  public function __construct($user_id, $data)
  {
    self::$_user_id = $user_id;
    self::$_parameters = $data;
    self::$_categories_ids = array();
    self::BuildParamters();
  }

  public function Search($q)
  {
    echo self::$_user_id;
  }

  public function GetResults()
  {
    global $pdo_dbh;
    $category_query = 'SELECT c.id, c.name, count(*) as count  FROM chicheng.users_expense e left join chicheng.category 
c on e.category_id = c.id where e.user_id =' . self::$_user_id . ' ' . self::$_query . ' 
and e.category_id is not null group by category_id
union
SELECT uc.id, uc.name, count(*) as count FROM chicheng.users_expense e left join chicheng.user_category 
uc on e.user_category_id = uc.id
 where e.user_id =' . self::$_user_id . ' ' . self::$_query . '  and e.user_category_id is not null
 group by user_category_id';

    $res = array();
    $sth = $pdo_dbh->prepare($category_query);
    $sth->execute();
    $count = $sth->rowCount();
    if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res['By Category'][] = $result;
      }
    }

    $subcategory_query = 'SELECT s.id, s.name, count(*)  as count
FROM chicheng.users_expense e left join chicheng.subcategory 
s on s.id = e.subcategory_id where e.user_id =' . self::$_user_id . ' ' . self::$_query.'
and e.subcategory_id is not null group by e.subcategory_id
union
SELECT us.id, us.name, count(*) as count 
FROM chicheng.users_expense e 
left join chicheng.user_subcategory us on us.id = e.user_subcategory_id
where e.user_id =' . self::$_user_id . ' ' . self::$_query.' 
and e.user_category_id is not null
group by e.subcategory_id ';

    $sth = $pdo_dbh->prepare($subcategory_query);
    $sth->execute();
    $count = $sth->rowCount();
    if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res['By SubCategory'][] = $result;
      }
    }

    $name_query = 'SELECT e.name as name, count(*)  as count
FROM chicheng.users_expense e 
where e.user_id = '.self::$_user_id.' '.self::$_query.' group by SOUNDEX(name)';

    $sth = $pdo_dbh->prepare($name_query);
    $sth->execute();
    $count = $sth->rowCount();
    if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res['By Title'][] = $result;
      }
    }

    $price_query = 'SELECT concat("$", SUBSTRING(price, 1, 
(length(round(price))/2)), REPEAT(0,(length(round(price))/2)), "(s)") as name, COUNT(*) as count
FROM chicheng.users_expense e
where e.user_id = '.self::$_user_id.' '.self::$_query.'
GROUP BY concat(SUBSTRING(price, 1, (length(round(price))/2)), REPEAT(0,(length(round(price))/2)))
order by price asc';

    $sth = $pdo_dbh->prepare($price_query);
    $sth->execute();
    $count = $sth->rowCount();
    if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res['By Price'][] = $result;
      }
    }

    $date_query = ' SELECT concat(date_format(e.date, "%M"), ", ", year(e.date)) as name, count(*) as count
FROM chicheng.users_expense e
where e.user_id = '.self::$_user_id.' '.self::$_query.'
group by  concat(date_format(e.date, "%M"), ", ", year(e.date)) ';


    $sth = $pdo_dbh->prepare($date_query);
    $sth->execute();
    $count = $sth->rowCount();
    if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $res['By Date'][] = $result;
      }
      return $res;
    }

    return false;
  }

  private static function BuildParamters()
  {
    if (!empty(self::$_parameters['category_ids']) && is_array(self::$_parameters['category_ids'])) {
      self::$_query .= ' and (';
      foreach (self::$_parameters['category_ids'] as $key => $val) {
        self::$_query .= $key != 0 ? ' or ' : false;
        if ($val["type"] == "c") {
          self::$_query .= ' e.category_id=' . $val["id"];
        } else if ($val["type"] == "uc") {
          self::$_query .= ' e.user_category_id=' . $val["id"];
        }
        self::$_categories_ids[] = $val["id"];
      }
      self::$_query .= ')';
    }
    $l = false;
    $ll = false;
    if (!empty(self::$_parameters['subcategory_ids']) && is_array(self::$_parameters['subcategory_ids'])) {
      self::$_query .= ' and (';
      foreach (self::$_parameters['subcategory_ids'] as $key => $val) {
        if (!empty($val['category_id']) && in_array($val['category_id'], self::$_categories_ids)) {
          $ll = true;
          continue;
        }
        if (!empty($val['user_category_id']) && in_array($val['user_category_id'], self::$_categories_ids)) {
          $ll = true;
          continue;
        }
        $l = true;
        self::$_query .= $key != 0 && $ll == false ? ' or ' : false;
        self::$_query .= '(';
        self::$_query .= $val["type"] == 'us' ? ' e.user_subcategory_id=' . $val["id"] : false;
        self::$_query .= $val["type"] == 's' ? ' e.subcategory_id=' . $val["id"] : false;
        self::$_query .= ' and ';
        self::$_query .= !empty($val['category_id']) ? ' e.category_id=' . $val["category_id"] : false;
        self::$_query .= !empty($val['user_category_id']) ? ' e.user_category_id=' . $val["user_category_id"] : false;
        self::$_query .= ')';
        $ll = false;
      }
      self::$_query .= ')';
      if ($l == false) {
        self::$_query = substr(self::$_query, 0, -6);
      }
    }

    if (!empty(self::$_parameters['price']) && is_array(self::$_parameters['price'])) {
      self::$_query .= ' and (';
      foreach (self::$_parameters['price'] as $key => $val) {
        self::$_query .= $key != 0 ? ' or ' : false;
        $sign = $val['operator'] != "≈" ? $val['operator'] : false;
        $sign !== false ? self::$_query .= 'e.price' . $sign . $val["price"] : false;
        if ($val['operator'] == "≈") {
          $div = $val['price'] * 0.15;
          $min = $val['price'] - $div;
          $max = $val['price'] + $div;
          self::$_query .= ' e.price > ' . $min . ' and e.price < ' . $max;
        }
      }
      self::$_query .= ')';
    }

    if (!empty(self::$_parameters['name'])) {
      self::$_query .= ' and e.name like "%' . self::$_parameters['name'] . '%"';
    }

    if (!empty(self::$_parameters['last'])) {
      if (self::$_parameters['last'] == 'This Month') {
        self::$_query .= ' and YEAR(e.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) and MONTH(e.date) = MONTH(CURRENT_DATE()) ';
      } else if (self::$_parameters['last'] == 'Last Month') {
        self::$_query .= ' and YEAR(e.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) and MONTH(e.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)';
      } else if (self::$_parameters['last'] == 'Last 3 Months') {
        self::$_query .= ' and YEAR(e.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) and MONTH(e.date) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)';
      } else if (self::$_parameters['last'] == 'Last 6 Months') {
        self::$_query .= ' and YEAR(e.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) and MONTH(e.date) = MONTH(CURRENT_DATE - INTERVAL 6 MONTH)';
      } else if (self::$_parameters['last'] == 'This Year') {
        self::$_query .= ' and YEAR(e.date) = YEAR(CURDATE())';
      } else if (self::$_parameters['last'] == 'Last Year') {
        self::$_query .= ' and e.date >= DATE_SUB(NOW(),INTERVAL 1 YEAR);';
      }
    }

    if (!empty(self::$_parameters['from'])) {
      self::$_query .= ' and e.date >="' . self::$_parameters['from'].'"';
    }

    if (!empty(self::$_parameters['end'])) {
      self::$_query .= ' and e.date <="' . self::$_parameters['end'].'"';
    }

  }
}