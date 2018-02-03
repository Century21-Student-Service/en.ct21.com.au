<?php
require_once "BasePage.class.php";

class Page extends BasePage {
  static function findAllPublished() {
    global $mysqli;
    $query = "SELECT * FROM page WHERE published=1";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Page();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
}
