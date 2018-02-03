<?php

$object = new Testimonial();
  
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
  
  // validation for $comment
  $comment = isset($_POST["comment"]) ? $_POST["comment"] : null;
  if (empty($comment)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "comment is required.", "zh" => "请填写comment"))));
    $error_flag = true;
  }
  
  // validation for $from
  $from = isset($_POST["from"]) ? strip_tags($_POST["from"]) : null;  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $image
  $object->setImage($image);
  
  // proceed for $comment
  $object->setComment($comment);
  
  // proceed for $from
  $object->setFrom($from);
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
  'en' => 'Create Testimonial',
  'zh' => 'Create 客户评语',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('testimonial/backend/testimonial_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

