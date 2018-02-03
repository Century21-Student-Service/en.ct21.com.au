<?php
require_once "BaseCourse.class.php";

class Course extends BaseCourse {
  static function findAllByCountryId($cid) {
    global $mysqli;
    $query = "SELECT * FROM course WHERE country_id=$cid ORDER BY weight ASC";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Institution();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  public function getCountry() {
    return Country::findById($this->getCountryId());
  }
}
