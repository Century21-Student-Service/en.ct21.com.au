<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - name
 * - image
 * - comment
 * - from
 */
class BaseTestimonial extends DBObject {
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
    $this->table_name = 'testimonial';
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
   public function setName($var) {
     $this->setDbFieldName($var);
   }
   public function getName() {
     return $this->getDbFieldName();
   }
   public function setImage($var) {
     $this->setDbFieldImage($var);
   }
   public function getImage() {
     return $this->getDbFieldImage();
   }
   public function setComment($var) {
     $this->setDbFieldComment($var);
   }
   public function getComment() {
     return $this->getDbFieldComment();
   }
   public function setFrom($var) {
     $this->setDbFieldFrom($var);
   }
   public function getFrom() {
     return $this->getDbFieldFrom();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('testimonial');
  }
  
  static function tableExist() {
    return parent::tableExistByName('testimonial');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(31) NOT NULL ,
  `image` VARCHAR(127) NOT NULL ,
  `comment` VARCHAR(127) NOT NULL ,
  `from` VARCHAR(255) ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Testimonial') {
    global $mysqli;
    $query = 'SELECT * FROM testimonial WHERE id=' . $id;
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
    $query = "SELECT * FROM testimonial";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Testimonial();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM testimonial LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Testimonial();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM testimonial";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE testimonial";
    return $mysqli->query($query);
  }
}