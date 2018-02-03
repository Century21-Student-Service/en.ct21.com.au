<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = News::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

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
  
  // validation for $summary
  $summary = isset($_POST["summary"]) ? $_POST["summary"] : null;
  if (empty($summary)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "summary is required.", "zh" => "请填写summary"))));
    $error_flag = true;
  }
  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;
  if (empty($content)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "content is required.", "zh" => "请填写content"))));
    $error_flag = true;
  }
  
  // validation for $thumbnail
  $thumbnail = isset($_POST["thumbnail"]) ? strip_tags(trim($_POST["thumbnail"])) : null;
  if (empty($thumbnail)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "thumbnail is required.", "zh" => "请填写thumbnail"))));
    $error_flag = true;
  }
  
  // validation for $image
  $image = isset($_POST["image"]) ? strip_tags(trim($_POST["image"])) : null;
  if (empty($image)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "image is required.", "zh" => "请填写image"))));
    $error_flag = true;
  }
  
  // validation for $date
  $date = isset($_POST["date"]) ? strip_tags($_POST["date"]) : null;
  if (empty($date)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "date is required.", "zh" => "请填写date"))));
    $error_flag = true;
  }
  /// proceed submission
  
  // proceed for $title
  $object->setTitle($title);
  
  // proceed for $summary
  $object->setSummary($summary);
  
  // proceed for $content
  $object->setContent($content);
  
  // proceed for $thumbnail
  $object->setThumbnail($thumbnail);
  
  // proceed for $image
  $object->setImage($image);
  
  // proceed for $date
  $object->setDate($date/1000);
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
  'en' => 'Edit News',
  'zh' => 'Edit News',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('news/backend/news_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

