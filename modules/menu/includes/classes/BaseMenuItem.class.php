<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - name
 * - uri
 * - menu_id
 * - parent_id
 * - weight
 * - display
 */
class BaseMenuItem extends DBObject {
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
    $this->table_name = 'menu_item';
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
   public function setUri($var) {
     $this->setDbFieldUri($var);
   }
   public function getUri() {
     return $this->getDbFieldUri();
   }
   public function setMenuId($var) {
     $this->setDbFieldMenu_id($var);
   }
   public function getMenuId() {
     return $this->getDbFieldMenu_id();
   }
   public function setParentId($var) {
     $this->setDbFieldParent_id($var);
   }
   public function getParentId() {
     return $this->getDbFieldParent_id();
   }
   public function setWeight($var) {
     $this->setDbFieldWeight($var);
   }
   public function getWeight() {
     return $this->getDbFieldWeight();
   }
   public function setDisplay($var) {
     $this->setDbFieldDisplay($var);
   }
   public function getDisplay() {
     return $this->getDbFieldDisplay();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('menu_item');
  }
  
  static function tableExist() {
    return parent::tableExistByName('menu_item');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(31) NOT NULL ,
  `uri` VARCHAR(512) NOT NULL ,
  `menu_id` INT NOT NULL ,
  `parent_id` INT ,
  `weight` TINYINT DEFAULT 99 ,
  `display` TINYINT DEFAULT 1 ,
  PRIMARY KEY (`id`)
 ,
INDEX `fk-menu_item-menu_id-idx` (`menu_id` ASC),
CONSTRAINT `fk-menu_item-menu_id`
  FOREIGN KEY (`menu_id`)
  REFERENCES `menu` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE ,
INDEX `fk-menu_item-parent_id-idx` (`parent_id` ASC),
CONSTRAINT `fk-menu_item-parent_id`
  FOREIGN KEY (`parent_id`)
  REFERENCES `menu_item` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'MenuItem') {
    global $mysqli;
    $query = 'SELECT * FROM menu_item WHERE id=' . $id;
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
    $query = "SELECT * FROM menu_item";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new MenuItem();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM menu_item LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new MenuItem();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM menu_item";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE menu_item";
    return $mysqli->query($query);
  }
}