<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = MenuItem::findById($id);
$ajax = isset($_GET['ajax']) ? true : false;

$error_flag = false;
if ($object) {
  if ($object->delete()) {
    if (!$ajax) {
      Message::register(new Message(Message::SUCCESS, i18n(array(
        'en' => 'Record deleted',
        'zh' => '记录删除成功'
      ))));
    }
  } else {
    $error_flag = true;
  }
} else {
  $error_flag = true;
}

if ($error_flag) {
  if (!$ajax) {
  Message::register(new Message(Message::DANGER, i18n(array(
    'en' => 'Record deletion failed',
    'zh' => '记录删除失败'
  ))));
  }
}

if ($ajax) {
  echo 'success';
} else {
  HTML::forwardBackToReferer();
}