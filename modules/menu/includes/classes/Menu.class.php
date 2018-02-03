<?php
require_once "BaseMenu.class.php";

class Menu extends BaseMenu {
  
  public function getRootItem($level = 1, $display = null) {
    $item = MenuItem::findById($this->getRootMenuItemId());
    $item->populateChildren($level, $display);
    return $item;
  }
  
  static function findByName($name) {
    global $mysqli;
    $query = 'SELECT * FROM menu WHERE name=' . DBObject::prepare_val_for_sql($name);
    $result = $mysqli->query($query);

    if ($result && $b = $result->fetch_object()) {
      $obj = new Menu();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  
  static function findAllByCountryId($cid) {
    global $mysqli;
    $query = 'SELECT * FROM menu WHERE country_id=' . DBObject::prepare_val_for_sql($cid);
    $result = $mysqli->query($query);

    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Menu();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    return $rtn;
  }
  
  public function clear() {
    $items = MenuItem::findAllByMenuId($this->getId());
    foreach ($items as $item) {
      if ($item->getParentId()) {
        $item->delete();
      }
    }
  }
  
  public function getCountry() {
    return Country::findById($this->getCountryId());
  }
}
