<?php

$object = new Menu();
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $name
  $name = isset($_POST["name"]) ? strip_tags($_POST["name"]) : null;
  if (empty($name)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "name is required.", "zh" => "请填写name"))));
    $error_flag = true;
  }
  // validation for country_id
  $country_id = isset($_POST['country_id']) ? strip_tags($_POST['country_id']) : null;

  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  // proceed for $country_id
  $object->setCountryId($country_id);
  
  if ($error_flag == false) {
    if ($object->save()) {
      // create root menu_it
      $menu_item = new MenuItem();
      $menu_item->setWeight(0);
      $menu_item->setMenuId($object->getId());
      $menu_item->setName('root');
      $menu_item->setParentId(null);
      $menu_item->setUri('');
      $menu_item->save();
      
      $object->setRootMenuItemId($menu_item->getId());
      $object->save();
      
      Message::register(new Message(Message::SUCCESS, i18n(array("en" => "Record saved", "zh" => "记录保存成功"))));
      HTML::forwardBackToReferer();
    } else {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Record failed to save", "zh" => "记录保存失败"))));
    }
  }
}



$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Create Menu',
  'zh' => 'Create 菜单',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('menu/backend/menu_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

