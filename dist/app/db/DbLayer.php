<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 7/20/2017
 * Time: 11:51 AM
 */


namespace Db\DbLayer;


class DbLayer
{
  public static function insert($table, $data, $types)
  {
    if(empty($data))
      return false;

    global $pdo_dbh;

    $q = ' insert into '.$table.'(';
    $q2 = '';

    foreach($data as $key => $value){
      $q .= $key.', ';
      $q2 .= ':'.strtoupper($key).', ';
    }

    $q = substr_replace($q ,"",-2).')values(';
    $q2 = substr_replace($q2,"",-2).');';
    $q .= $q2;

    $sth = $pdo_dbh->prepare($q);

    foreach($data as $key => $value){
      $sth->bindValue(':'.strtoupper($key), $value, $types[$key]);
    }

    $sth->execute();
    if(!$sth){
      echo $pdo_dbh->errorInfo();
      exit;
      return false;
    }
    return $pdo_dbh->lastInsertId();
  }

  public static function update($table, $data, $where, $types)
  {
    if(empty($data)){
      return false;
    }
    global $pdo_dbh;

    $q = "update ".$table .' set ';

    foreach($data as $key=>$value){
      $q .=  $key."=:".strtoupper($key).', ';
    }

    $q = substr_replace($q ,"",-2).' where ';

    if(is_array($where) && !empty($where)){
      foreach($where as $key => $value){
        $q .=  $key .'=:'.strtoupper($key).' and ';
      }
      $q = substr_replace($q,"",-4);
    }


    $sth = $pdo_dbh->prepare($q);

    foreach($data as $key => $value){
      $sth->bindValue(':'.strtoupper($key), $value, $types[$key]);
    }

    if(!empty($where)){
      foreach($where as $key => $value){
        $sth->bindValue(':'.strtoupper($key), $value, $types[$key]);
      }
    }

    $sth->execute();
    if(!$sth){
      return false;
    }
    return true;
  }
}