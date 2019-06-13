<?php
require_once "BaseMeta.class.php";

class Meta extends BaseMeta {

  static function findByUri($uri, $instance = 'Meta') {
    global $mysqli;
    $query = 'SELECT * FROM meta WHERE uri=' . DBObject::prepare_val_for_sql($uri);
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }

  static function autoCreateByUri($uri = false) {
    if ($uri == false) {
      $uri = self::getCurrentUri();
    }

    // create if not yet
    if (is_null(self::findByUri($uri))) {
      $meta = new Meta();
      $meta->setUri($uri);
      $meta->save();
    }
  }

  static function getCurrentUri() {
    return preg_replace('/\?.+$/', '', get_cur_page_url());
  }
}
