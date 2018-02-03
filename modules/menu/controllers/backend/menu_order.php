<?php

$id = isset($vars[1]) ? $vars[1] : null;
$menu = Menu::findById($id);
if (is_null($menu)) {
  HTML::forward('core/404');
}

// handle form submission
$weight = 0;
if (isset($_POST['submit'])) {
  $json = $_POST['serialized'];
  $items = json_decode($json);
  if ($items && sizeof($items)) {
    // create new ones
    foreach ($items[0] as $item) {
      $menu_item = MenuItem::findById($item->id);
      $menu_item->setParentId($menu->getRootItem()->getId());
      $menu_item->setWeight($weight++);
      $menu_item->save();
      foreach ($item->children[0] as $i) {
        $menu_item = MenuItem::findById($i->id);
        $menu_item->setParentId($item->id);
        $menu_item->setWeight($weight++);
        $menu_item->save();
        foreach ($i->children[0] as $ii) {
          $menu_item = MenuItem::findById($ii->id);
          $menu_item->setParentId($i->getId());
          $menu_item->setWeight($weight++);
          $menu_item->save();
          foreach ($ii->children[0] as $iii) {
            $menu_item = MenuItem::findById($iii->id);
            $menu_item->setParentId($ii->getId());
            $menu_item->setWeight($weight++);
            $menu_item->save();
          }
        }
      }
    }
  }
}

// register extra js
HTML::registerHeaderLower('<script type="text/javascript" src="'.uri('modules/menu/assets/js/jquery-sortable-min.js').'"></script>');
// register extra css
HTML::registerHeaderLower('<style>
ol.default li {
  cursor: default !important;
}
ol.default li .fa-arrows,
ol.default li .actions a:hover {
  cursor: pointer !important;
}

body.dragging, body.dragging * {
  cursor: move !important;
}

.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

ol.example li.placeholder {
  position: relative;
  /** More li styles **/
}
ol.example li.placeholder:before {
  position: absolute;
  /** Define arrowhead **/
}

/** list styles **/
ol.vertical li {
  position: relative;
}
ol.vertical li .actions {
  display: block;
  position: absolute;
  right: 10px;
  top: 5px;
}
ol.vertical li .fields {
  position: absolute;
  left: 0px;
  top: 2px;
  z-index: 5;
  display: none;
}
ol.vertical {
    margin: 0 0 9px;
    min-height: 10px;
}
ol.vertical li {
    background: #eeeeee none repeat scroll 0 0;
    border: 1px solid #cccccc;
    color: #0088cc;
    display: block;
    margin: 5px;
    padding: 5px;
}
ol.vertical li.placeholder {
    border: medium none;
    margin: 0;
    padding: 0;
    position: relative;
}
ol.vertical li.placeholder::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: transparent -moz-use-text-color transparent red;
    border-image: none;
    border-style: solid none solid solid;
    border-width: 5px medium 5px 5px;
    content: "";
    height: 0;
    left: -5px;
    margin-top: -5px;
    position: absolute;
    top: -4px;
    width: 0;
}
ol {
    list-style-type: none;
}
ol i.icon-move {
    cursor: pointer;
}
ol li.highlight {
    background: #333333 none repeat scroll 0 0;
    color: #999999;
}
ol li.highlight i.icon-move {
    background-image: url("../img/glyphicons-halflings-white.png");
}
ol.nested_with_switch, ol.nested_with_switch ol {
    border: 1px solid #eeeeee;
}
ol.nested_with_switch.active, ol.nested_with_switch ol.active {
    border: 1px solid #333333;
}
ol.nested_with_switch li, ol.simple_with_animation li, ol.serialization li, ol.default li {
    cursor: pointer;
}
ol.simple_with_animation {
    border: 1px solid #999999;
}
.switch-container {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80px;
}
.navbar-sort-container {
    height: 200px;
}
ol.nav li, ol.nav li a {
    cursor: pointer;
}
ol.nav .divider-vertical {
    cursor: default;
}
ol.nav li.dragged {
    background-color: #2c2c2c;
}
ol.nav li.placeholder {
    position: relative;
}
ol.nav li.placeholder::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: red transparent -moz-use-text-color;
    border-image: none;
    border-style: solid solid none;
    border-width: 5px 5px medium;
    content: "";
    height: 0;
    margin-left: -5px;
    position: absolute;
    top: -6px;
    width: 0;
}
ol.nav ol.dropdown-menu li.placeholder::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: transparent -moz-use-text-color transparent red;
    border-image: none;
    border-style: solid none solid solid;
    border-width: 5px medium 5px 5px;
    left: 10px;
    margin-top: -5px;
    top: 0;
}

</style>');



$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Edit Menu',
  'zh' => '编辑菜单',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');

$html->renderOut('menu/backend/menu_order', array(
  'menu' => $menu
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

