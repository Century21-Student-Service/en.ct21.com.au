<?php

$id = strip_tags($_POST['menu_id']);
$menu = Menu::findById($id);
if ($menu) {
  $country_id = strip_tags($_POST['country_id']);
  $menu->setCountryId($country_id);
  $menu->save();
  Message::register(new Message(Message::SUCCESS, 'Menu updated successfully.'));
} else {
  Message::register(new Message(Message::DANGER, 'Menu update failed.'));
}
HTML::forwardBackToReferer();