<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - name
 * - dob
 * - address
 * - postcode
 * - phone
 * - mobile
 * - qq
 * - email
 * - education
 * - graduate_institution
 * - ielts
 * - apply_country
 * - apply_institution
 * - apply_course
 * - comment
 * - passport
 * - graduation_certificate
 * - degree_certificate
 * - academic_transcripts
 * - ielts_transcripts
 * - created_at
 */
class BaseApplication extends DBObject {
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
    $this->table_name = 'application';
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
   public function setDob($var) {
     $this->setDbFieldDob($var);
   }
   public function getDob() {
     return $this->getDbFieldDob();
   }
   public function setAddress($var) {
     $this->setDbFieldAddress($var);
   }
   public function getAddress() {
     return $this->getDbFieldAddress();
   }
   public function setPostcode($var) {
     $this->setDbFieldPostcode($var);
   }
   public function getPostcode() {
     return $this->getDbFieldPostcode();
   }
   public function setPhone($var) {
     $this->setDbFieldPhone($var);
   }
   public function getPhone() {
     return $this->getDbFieldPhone();
   }
   public function setMobile($var) {
     $this->setDbFieldMobile($var);
   }
   public function getMobile() {
     return $this->getDbFieldMobile();
   }
   public function setQq($var) {
     $this->setDbFieldQq($var);
   }
   public function getQq() {
     return $this->getDbFieldQq();
   }
   public function setEmail($var) {
     $this->setDbFieldEmail($var);
   }
   public function getEmail() {
     return $this->getDbFieldEmail();
   }
   public function setEducation($var) {
     $this->setDbFieldEducation($var);
   }
   public function getEducation() {
     return $this->getDbFieldEducation();
   }
   public function setGraduateInstitution($var) {
     $this->setDbFieldGraduate_institution($var);
   }
   public function getGraduateInstitution() {
     return $this->getDbFieldGraduate_institution();
   }
   public function setIelts($var) {
     $this->setDbFieldIelts($var);
   }
   public function getIelts() {
     return $this->getDbFieldIelts();
   }
   public function setApplyCountry($var) {
     $this->setDbFieldApply_country($var);
   }
   public function getApplyCountry() {
     return $this->getDbFieldApply_country();
   }
   public function setApplyInstitution($var) {
     $this->setDbFieldApply_institution($var);
   }
   public function getApplyInstitution() {
     return $this->getDbFieldApply_institution();
   }
   public function setApplyCourse($var) {
     $this->setDbFieldApply_course($var);
   }
   public function getApplyCourse() {
     return $this->getDbFieldApply_course();
   }
   public function setComment($var) {
     $this->setDbFieldComment($var);
   }
   public function getComment() {
     return $this->getDbFieldComment();
   }
   public function setPassport($var) {
     $this->setDbFieldPassport($var);
   }
   public function getPassport() {
     return $this->getDbFieldPassport();
   }
   public function setGraduationCertificate($var) {
     $this->setDbFieldGraduation_certificate($var);
   }
   public function getGraduationCertificate() {
     return $this->getDbFieldGraduation_certificate();
   }
   public function setDegreeCertificate($var) {
     $this->setDbFieldDegree_certificate($var);
   }
   public function getDegreeCertificate() {
     return $this->getDbFieldDegree_certificate();
   }
   public function setAcademicTranscripts($var) {
     $this->setDbFieldAcademic_transcripts($var);
   }
   public function getAcademicTranscripts() {
     return $this->getDbFieldAcademic_transcripts();
   }
   public function setIeltsTranscripts($var) {
     $this->setDbFieldIelts_transcripts($var);
   }
   public function getIeltsTranscripts() {
     return $this->getDbFieldIelts_transcripts();
   }
   public function setCreatedAt($var) {
     $this->setDbFieldCreated_at($var);
   }
   public function getCreatedAt() {
     return $this->getDbFieldCreated_at();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('application');
  }
  
  static function tableExist() {
    return parent::tableExistByName('application');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `application` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(31) NOT NULL ,
  `dob` VARCHAR(31) ,
  `address` VARCHAR(255) ,
  `postcode` VARCHAR(15) ,
  `phone` VARCHAR(15) ,
  `mobile` VARCHAR(15) ,
  `qq` VARCHAR(15) ,
  `email` VARCHAR(15) ,
  `education` VARCHAR(255) ,
  `graduate_institution` VARCHAR(255) ,
  `ielts` VARCHAR(15) ,
  `apply_country` VARCHAR(15) ,
  `apply_institution` VARCHAR(255) ,
  `apply_course` VARCHAR(255) ,
  `comment` TEXT ,
  `passport` VARCHAR(128) ,
  `graduation_certificate` VARCHAR(128) ,
  `degree_certificate` VARCHAR(128) ,
  `academic_transcripts` VARCHAR(128) ,
  `ielts_transcripts` VARCHAR(128) ,
  `created_at` INT ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Application') {
    global $mysqli;
    $query = 'SELECT * FROM application WHERE id=' . $id;
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
    $query = "SELECT * FROM application";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Application();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM application LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Application();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM application";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE application";
    return $mysqli->query($query);
  }
}