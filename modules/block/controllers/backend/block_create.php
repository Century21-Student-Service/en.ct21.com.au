<?php

$object = new Block();
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;
  if (empty($content)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "content is required.", "zh" => "请填写content"))));
    $error_flag = true;
  }
  /// proceed submission
  
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
  'en' => 'Create Block',
  'zh' => 'Create Content Block',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('block/backend/block_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

