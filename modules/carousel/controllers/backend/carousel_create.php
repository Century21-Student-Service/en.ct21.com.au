<?php

$object = new Carousel();
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $title
  $title = isset($_POST["title"]) ? strip_tags($_POST["title"]) : null;
  if (empty($title)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "title is required.", "zh" => "请填写title"))));
    $error_flag = true;
  }
  
  // validation for $image
  $image = isset($_POST["image"]) ? strip_tags(trim($_POST["image"])) : null;
  if (empty($image)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "image is required.", "zh" => "请填写image"))));
    $error_flag = true;
  }
  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;
  if (empty($content)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "content is required.", "zh" => "请填写content"))));
    $error_flag = true;
  }
  
  // validation for $button_text
  $button_text = isset($_POST["button_text"]) ? strip_tags($_POST["button_text"]) : null;
  if (empty($button_text)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "button_text is required.", "zh" => "请填写button_text"))));
    $error_flag = true;
  }
  
  // validation for $button_link
  $button_link = isset($_POST["button_link"]) ? strip_tags($_POST["button_link"]) : null;
  if (empty($button_link)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "button_link is required.", "zh" => "请填写button_link"))));
    $error_flag = true;
  }
  
  // validation for $weight
  $weight = isset($_POST["weight"]) ? strip_tags($_POST["weight"]) : null;  /// proceed submission
  
  // proceed for $title
  $object->setTitle($title);
  
  // proceed for $image
  $object->setImage($image);
  
  // proceed for $content
  $object->setContent($content);
  
  // proceed for $button_text
  $object->setButtonText($button_text);
  
  // proceed for $button_link
  $object->setButtonLink($button_link);
  
  // proceed for $weight
  $object->setWeight($weight);
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
  'en' => 'Create Carousel',
  'zh' => 'Create 首页横幅',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('carousel/backend/carousel_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

