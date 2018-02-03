<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = Country::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

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
  
  // validation for $image
  $image = isset($_POST["image"]) ? strip_tags(trim($_POST["image"])) : null;
  if (empty($image)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "image is required.", "zh" => "请填写image"))));
    $error_flag = true;
  }
  
  // validation for $banner_image
  $banner_image = isset($_POST["banner_image"]) ? strip_tags(trim($_POST["banner_image"])) : null;
  if (empty($banner_image)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "banner_image is required.", "zh" => "请填写banner_image"))));
    $error_flag = true;
  }
  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;
  if (empty($content)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "content is required.", "zh" => "请填写content"))));
    $error_flag = true;
  }
  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $image
  $object->setImage($image);
  
  // proceed for $banner_image
  $object->setBannerImage($banner_image);
  
  // proceed for $content
  $object->setContent($content);
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
  'en' => 'Edit Country',
  'zh' => 'Edit 留学国家',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('destination/backend/country_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

