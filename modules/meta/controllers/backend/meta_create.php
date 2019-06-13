<?php

$object = new Meta();

// bootstrap field widgets
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $copyright
  $copyright = isset($_POST["copyright"]) ? $_POST["copyright"] : null;  
  // validation for $description
  $description = isset($_POST["description"]) ? $_POST["description"] : null;  
  // validation for $keywords
  $keywords = isset($_POST["keywords"]) ? $_POST["keywords"] : null;  /// proceed submission
  
  // proceed for $copyright
  $object->setCopyright($copyright);
  
  // proceed for $description
  $object->setDescription($description);
  
  // proceed for $keywords
  $object->setKeywords($keywords);
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
  'en' => 'Create Meta tag',
  'zh' => 'Create Meta tag',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('meta/backend/meta_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

