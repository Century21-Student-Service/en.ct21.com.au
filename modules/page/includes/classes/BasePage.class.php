<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - uri
 * - title
 * - controller
 * - content
 * - published
 * - reserved
 */
class BasePage extends DBObject {
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
    $this->table_name = 'page';
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
   public function setTitle($var) {
     $this->setDbFieldTitle($var);
   }
   public function getTitle() {
     return $this->getDbFieldTitle();
   }
   public function setController($var) {
     $this->setDbFieldController($var);
   }
   public function getController() {
     return $this->getDbFieldController();
   }
   public function setContent($var) {
     $this->setDbFieldContent($var);
   }
   public function getContent() {
     return $this->getDbFieldContent();
   }
   public function setPublished($var) {
     $this->setDbFieldPublished($var);
   }
   public function getPublished() {
     return $this->getDbFieldPublished();
   }
   public function setReserved($var) {
     $this->setDbFieldReserved($var);
   }
   public function getReserved() {
     return $this->getDbFieldReserved();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('page');
  }
  
  static function tableExist() {
    return parent::tableExistByName('page');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `page` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `uri` VARCHAR(31) NOT NULL UNIQUE ,
  `title` VARCHAR(127) NOT NULL ,
  `controller` VARCHAR(127) DEFAULT "page/default" ,
  `content` TEXT ,
  `published` TINYINT DEFAULT 1 ,
  `reserved` TINYINT DEFAULT 0 ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Page') {
    global $mysqli;
    $query = 'SELECT * FROM page WHERE id=' . $id;
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
    $query = "SELECT * FROM page";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Page();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM page LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Page();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM page";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE page";
    return $mysqli->query($query);
  }
}