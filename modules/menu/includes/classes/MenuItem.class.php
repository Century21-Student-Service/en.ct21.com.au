<?php
require_once "BaseMenuItem.class.php";

class MenuItem extends BaseMenuItem {
  private $children;
  
  public function __construct() {
    parent::__construct();
    $this->children = array();
  }
  
  public function setChildren($c) {
    $this->children = $c;
  }
  public function getChildren() {
    return $this->children;
  }
  
  public function populateChildren($level = 1, $display = null) {
    if ($level <= 0) {
      return;
    } else {
      $level--;
      global $mysqli;
      $query = "SELECT * FROM menu_item WHERE parent_id=" . $this->getId() . " AND menu_id=" . $this->getMenuId() . ($display === null ? "" : " AND display=$display") . " ORDER BY weight ASC";
      $result = $mysqli->query($query);

      $rtn = array();
      while ($result && $b = $result->fetch_object()) {
        $obj= new MenuItem();
        DBObject::importQueryResultToDbObject($b, $obj);
        $rtn[] = $obj;
      }

      $this->setChildren($rtn);
      
      for ($i = 0; $i < sizeof($this->getChildren()); $i++) {
        $this->children[$i]->populateChildren($level, $display);
      }
    }

  }
  
  static function findAllByMenuId($menu_id) {
    global $mysqli;
    $query = "SELECT * FROM menu_item WHERE menu_id=$menu_id";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new MenuItem();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
}
