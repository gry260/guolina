<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 7/25/2017
 * Time: 3:39 PM
 */


namespace Category\SubCategory;

class SubCategory
{
  private $_id;
  private $_name;
  private $_category_id;
  private $_user_category_id;

  public function __construct($array)
  {
    isset($array['id']) ? $this->_id = $array['id'] : false;
    isset($array['name']) ? $this->_id = $array['name'] : false;
    isset($array['category_id']) ? $this->_id = $array['category_id'] : false;
    isset($array['user_category_id']) ? $this->_id = $array['user_category_id'] : false;
  }

  public function getID()
  {
    return $this->_id;
  }

  public function getName()
  {
    return $this->_name;
  }

  public function getCategoryID()
  {
    return $this->_category_id;
  }

  public static function generateSubCategory($obj)
  {
    return new self($obj);
  }


}