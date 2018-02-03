<?php
/** handle submission **/
if (isset($_POST['submit'])) {
  $content = "<table>";
  foreach ($_POST as $key => $val) {
    $tokens = explode("_", $key);
    $key = "";
    foreach ($tokens as $token) {
      $key .= ucfirst($token) . " ";
    }
    $content .= "<tr><th>$key</th><td>$val</td></tr>";
  }
  $content .= "</table>";
  
  sendemailAdmin($settings['sitename'] . " - Apply for course", $content);
  Message::register(new Message(Message::SUCCESS, 'Thank you for your application. We will contact you soon!'));
}


$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => 'Apply for a course',
    'body_class' => 'page page-template page-template-templates page-template-full-width page-template-templatesfull-width-php has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/apply', array(
    'full_page_sidebar_right' => $html->render('site/components/full_page_sidebar_right', array(
      'blocks' => array(
          Block::findByName('Get in Touch')
        )
    ))
));
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');


