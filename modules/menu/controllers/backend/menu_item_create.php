<?php

$object = new MenuItem();
  
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
  
  // validation for $uri
  $uri = isset($_POST["uri"]) ? strip_tags($_POST["uri"]) : null;
  if (empty($uri)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "uri is required.", "zh" => "请填写uri"))));
    $error_flag = true;
  }
  
  // validation for $menu_id
  $menu_id = isset($_POST["menu_id"]) ? strip_tags($_POST["menu_id"]) : null;
  if (empty($menu_id)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "menu_id is required.", "zh" => "请填写menu_id"))));
    $error_flag = true;
  }
  
  // validation for $parent_id
  $parent_id = isset($_POST["parent_id"]) ? strip_tags($_POST["parent_id"]) : null;
  if (empty($parent_id)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "parent_id is required.", "zh" => "请填写parent_id"))));
    $error_flag = true;
  }
  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $uri
  $object->setUri($uri);
  
  // proceed for $menu_id
  if (!empty($menu_id)) {
    $object->setMenuId($menu_id);
  }
  
  // proceed for $parent_id
  if (!empty($parent_id)) {
    $object->setParentId($parent_id);
  }
  if ($error_flag == false) {
    if ($object->save()) {
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
  'en' => 'Create Menu item',
  'zh' => 'Create 菜单项目',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('menu/backend/menu_item_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

