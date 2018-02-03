<?php
require_once "BaseInstitution.class.php";

class Institution extends BaseInstitution {
  static function findAllByCountryId($cid) {
    global $mysqli;
    $query = "SELECT * FROM institution WHERE country_id=$cid ORDER BY weight ASC";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Institution();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  public function delete() {
    // we delete image first, but not the default one
    if (is_file(WEBROOT . DS .$this->getImage()) && strpos($this->getImage(), 'site/assets') === false) {
      unlink(WEBROOT . DS . $this->getImage());
    }
    
    return parent::delete();
  }
  
  public function getCountry() {
    return Country::findById($this->getCountryId());
  }
}
