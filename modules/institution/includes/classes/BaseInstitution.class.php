<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - country_id
 * - title
 * - image
 * - url
 * - content
 * - weight
 */
class BaseInstitution extends DBObject {
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
    $this->table_name = 'institution';
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
   public function setCountryId($var) {
     $this->setDbFieldCountry_id($var);
   }
   public function getCountryId() {
     return $this->getDbFieldCountry_id();
   }
   public function setTitle($var) {
     $this->setDbFieldTitle($var);
   }
   public function getTitle() {
     return $this->getDbFieldTitle();
   }
   public function setImage($var) {
     $this->setDbFieldImage($var);
   }
   public function getImage() {
     return $this->getDbFieldImage();
   }
   public function setUrl($var) {
     $this->setDbFieldUrl($var);
   }
   public function getUrl() {
     return $this->getDbFieldUrl();
   }
   public function setContent($var) {
     $this->setDbFieldContent($var);
   }
   public function getContent() {
     return $this->getDbFieldContent();
   }
   public function setWeight($var) {
     $this->setDbFieldWeight($var);
   }
   public function getWeight() {
     return $this->getDbFieldWeight();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('institution');
  }
  
  static function tableExist() {
    return parent::tableExistByName('institution');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `institution` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country_id` INT NOT NULL ,
  `title` VARCHAR(127) ,
  `image` VARCHAR(127) ,
  `url` VARCHAR(512) ,
  `content` TEXT ,
  `weight` INT DEFAULT 0 ,
  PRIMARY KEY (`id`)
 ,
INDEX `fk-institution-country_id-idx` (`country_id` ASC),
CONSTRAINT `fk-institution-country_id`
  FOREIGN KEY (`country_id`)
  REFERENCES `country` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Institution') {
    global $mysqli;
    $query = 'SELECT * FROM institution WHERE id=' . $id;
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
    $query = "SELECT * FROM institution";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Institution();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM institution LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Institution();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM institution";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE institution";
    return $mysqli->query($query);
  }
}