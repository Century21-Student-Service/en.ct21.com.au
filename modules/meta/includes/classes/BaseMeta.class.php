<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - uri
 * - copyright
 * - description
 * - keywords
 */
class BaseMeta extends DBObject {
  /**
   * Implement parent abstract functions
   */
  protected function setPrimaryKeyName() {
    $this->primary_key = array(
      'id'
    );
  }
  protected function setPrimaryKeyAutoIncreased() {
    $this->pk_auto_increased = TRUE;
  }
  protected function setTableName() {
    $this->table_name = 'meta';
  }
  
  /**
   * Setters and getters
   */
   public function setId($var) {
     $this->setDbFieldId($var);
   }
   public function getId() {
     return $this->getDbFieldId();
   }
   public function setUri($var) {
     $this->setDbFieldUri($var);
   }
   public function getUri() {
     return $this->getDbFieldUri();
   }
   public function setCopyright($var) {
     $this->setDbFieldCopyright($var);
   }
   public function getCopyright() {
     return $this->getDbFieldCopyright();
   }
   public function setDescription($var) {
     $this->setDbFieldDescription($var);
   }
   public function getDescription() {
     return $this->getDbFieldDescription();
   }
   public function setKeywords($var) {
     $this->setDbFieldKeywords($var);
   }
   public function getKeywords() {
     return $this->getDbFieldKeywords();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('meta');
  }
  
  static function tableExist() {
    return parent::tableExistByName('meta');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `meta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `uri` VARCHAR(512) ,
  `copyright` VARCHAR(1024) ,
  `description` VARCHAR(1024) ,
  `keywords` VARCHAR(1024) ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Meta') {
    global $mysqli;
    $query = 'SELECT * FROM meta WHERE id=' . $id;
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  
  static function findAll() {
    global $mysqli;
    $query = "SELECT * FROM meta";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Meta();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM meta LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Meta();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM meta";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE meta";
    return $mysqli->query($query);
  }
}