<?php
require_once "BaseCountry.class.php";

class Country extends BaseCountry {
  public function delete() {
    // we delete image first, but not the default one
    if (is_file(WEBROOT . DS .$this->getImage()) && strpos($this->getImage(), 'site/assets') === false) {
      unlink(WEBROOT . DS . $this->getImage());
    }
    if (is_file(WEBROOT . DS .$this->getBannerImage()) && strpos($this->getBannerImage(), 'site/assets') === false) {
      unlink(WEBROOT . DS . $this->getBannerImage());
    }
    
    // we then delete all institutions under it
    foreach (Institution::findAllByCountryId($this->getId()) as $i) {
      $i->delete();
    }
    
    // we then delete all menu related to it
    foreach (Menu::findByCountryId($this->getId()) as $menu) {
      $menu->delete();
    }
    
    return parent::delete();
  }
  
  static function findAllExcluding($cid) {
    $rtn = parent::findAll();
    for ($i = 0; $i < sizeof($rtn); $i++) {
      if ($rtn[$i]->getId() == $cid) {
        unset($rtn[$i]);
      }
    }
    return $rtn;
  }
}
