<?php
$site_module_controller_file = MODULESROOT . DS . 'site' . DS . 'controllers' . DS . 'page' . DS . 'default.php';
if (module_enabled('site') && is_file($site_module_controller_file)) {
  dispatch('site/page/default', array('page' => $page));
} else {
  echo "<h1>" . $page->getTitle() . "</h1>";
  echo $page->getContent();
}

