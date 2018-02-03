<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = Page::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $uri
  $uri = isset($_POST["uri"]) ? strip_tags($_POST["uri"]) : null;
  if (empty($uri)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "uri is required.", "zh" => "请填写uri"))));
    $error_flag = true;
  } else if (preg_match('/[^a-zA-Z\-\/0-9]/', $uri)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "uri can only be letters, numbers and '-' or '/'.", "zh" => "uri必须为英文字母或者 -"))));
    $error_flag = true;
  }
  
  // validation for $title
  $title = isset($_POST["title"]) ? strip_tags($_POST["title"]) : null;
  if (empty($title)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "title is required.", "zh" => "请填写title"))));
    $error_flag = true;
  }
  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;
  if (empty($content)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "content is required.", "zh" => "请填写content"))));
    $error_flag = true;
  }
  
  // validation for $published
  $published = isset($_POST["published"]) ? 1 : 0;  /// proceed submission
  
  // proceed for $uri
  $object->setUri($uri);
  
  // proceed for $title
  $object->setTitle($title);
  
  // proceed for $content
  $object->setContent($content);
  
  // proceed for $published
  $object->setPublished($published);
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
  'en' => 'Edit Page',
  'zh' => 'Edit 基本页面',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('page/backend/page_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

