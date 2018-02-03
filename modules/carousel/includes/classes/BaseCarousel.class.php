<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - title
 * - image
 * - content
 * - button_text
 * - button_link
 * - weight
 */
class BaseCarousel extends DBObject {
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
    $this->table_name = 'carousel';
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
   public function setContent($var) {
     $this->setDbFieldContent($var);
   }
   public function getContent() {
     return $this->getDbFieldContent();
   }
   public function setButtonText($var) {
     $this->setDbFieldButton_text($var);
   }
   public function getButtonText() {
     return $this->getDbFieldButton_text();
   }
   public function setButtonLink($var) {
     $this->setDbFieldButton_link($var);
   }
   public function getButtonLink() {
     return $this->getDbFieldButton_link();
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
    return parent::dropTableByName('carousel');
  }
  
  static function tableExist() {
    return parent::tableExistByName('carousel');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `carousel` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(31) NOT NULL ,
  `image` VARCHAR(127) NOT NULL ,
  `content` VARCHAR(255) ,
  `button_text` VARCHAR(127) ,
  `button_link` VARCHAR(255) ,
  `weight` TINYINT DEFAULT 0 ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Carousel') {
    global $mysqli;
    $query = 'SELECT * FROM carousel WHERE id=' . $id;
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
    $query = "SELECT * FROM carousel";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Carousel();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM carousel LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Carousel();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM carousel";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE carousel";
    return $mysqli->query($query);
  }
}