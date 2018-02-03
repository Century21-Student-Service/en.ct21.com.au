<?php

$object = new Course();
  
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
  
  // validation for $country_id
  $country_id = isset($_POST["country_id"]) ? strip_tags($_POST["country_id"]) : null;
  if (empty($country_id)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "country_id is required.", "zh" => "请填写country_id"))));
    $error_flag = true;
  }
  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;
  if (empty($content)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "content is required.", "zh" => "请填写content"))));
    $error_flag = true;
  }
  
  // validation for $url
  $url = isset($_POST["url"]) ? strip_tags($_POST["url"]) : null;  
  // validation for $weight
  $weight = isset($_POST["weight"]) ? strip_tags($_POST["weight"]) : null;  /// proceed submission
  
  // proceed for $title
  $object->setTitle($title);
  
  // proceed for $country_id
  if (!empty($country_id)) {
    $object->setCountryId($country_id);
  }
  
  // proceed for $content
  $object->setContent($content);
  
  // proceed for $url
  $object->setUrl($url);
  
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
  'en' => 'Create Course',
  'zh' => 'Create 推荐课程',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('course/backend/course_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

