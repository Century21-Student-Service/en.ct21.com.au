<?php
require_once "BaseBlock.class.php";

class Block extends BaseBlock {
  public function __toString() {
    return $this->getContent();
  }
  
  static function findByName($name) {
    global $mysqli;
    $query = 'SELECT * FROM block WHERE name=' . DBObject::prepare_val_for_sql($name) . ' LIMIT 1';
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new Block();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
}
