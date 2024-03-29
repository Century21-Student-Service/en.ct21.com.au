<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - country_id
 * - name
 * - root_menu_item_id
 * - reserved
 */
class BaseMenu extends DBObject {
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
    $this->table_name = 'menu';
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
   public function setName($var) {
     $this->setDbFieldName($var);
   }
   public function getName() {
     return $this->getDbFieldName();
   }
   public function setRootMenuItemId($var) {
     $this->setDbFieldRoot_menu_item_id($var);
   }
   public function getRootMenuItemId() {
     return $this->getDbFieldRoot_menu_item_id();
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
    return parent::dropTableByName('menu');
  }
  
  static function tableExist() {
    return parent::tableExistByName('menu');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `menu` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country_id` INT ,
  `name` VARCHAR(255) NOT NULL ,
  `root_menu_item_id` INT DEFAULT NULL ,
  `reserved` TINYINT DEFAULT 0 ,
  PRIMARY KEY (`id`)
 ,
INDEX `menu-root_menu_item_id` (`root_menu_item_id`) ,
INDEX `menu-country_id` (`country_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Menu') {
    global $mysqli;
    $query = 'SELECT * FROM menu WHERE id=' . $id;
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
    $query = "SELECT * FROM menu";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Menu();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM menu LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Menu();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM menu";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE menu";
    return $mysqli->query($query);
  }
}