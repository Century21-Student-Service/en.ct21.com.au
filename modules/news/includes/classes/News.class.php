<?php
require_once "BaseNews.class.php";

class News extends BaseNews {
  static function findAll($limit = false) {
    global $mysqli;
    $query = "SELECT * FROM news ORDER BY date DESC" . ($limit ? " LIMIT $limit" : "");
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new News();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
}
