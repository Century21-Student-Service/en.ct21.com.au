<?php
require_once "BaseCountry.class.php";

class Country extends BaseCountry {
  public function getSlideImagesArray() {
    $rtn = array();
    $slide_image_uris = explode("\n", $this->getSliderImages());
    foreach ($slide_image_uris as $uri) {
      $uri = trim($uri);
      if ($uri != "") {
        array_push($rtn, $uri);
      }
    }
    return $rtn;
  }

  public function delete() {
    // we delete image first, but not the default one
    if (is_file(WEBROOT . DS .$this->getImage()) && strpos($this->getImage(), 'site/assets') === false) {
      unlink(WEBROOT . DS . $this->getImage());
    }
    // delete slider images then
    foreach ($this->getSlideImagesArray() as $uri) {
      if (is_file(WEBROOT . DS . $uri)) {
        unlink(WEBROOT . DS . $uri);
      }
    }
//    if (is_file(WEBROOT . DS .$this->getBannerImage()) && strpos($this->getBannerImage(), 'site/assets') === false) {
//      unlink(WEBROOT . DS . $this->getBannerImage());
//    }
    
    // we then delete all institutions under it
    foreach (Institution::findAllByCountryId($this->getId()) as $i) {
      $i->delete();
    }
    
    // we then delete all menu related to it
    foreach (Menu::findAllByCountryId($this->getId()) as $menu) {
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
