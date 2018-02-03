<?php
require_once "BaseCarousel.class.php";

class Carousel extends BaseCarousel {
  static function findAll() {
    global $mysqli;
    $query = "SELECT * FROM carousel ORDER BY weight ASC";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Carousel();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
}
