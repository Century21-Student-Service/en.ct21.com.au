<?php
/** $page has already been assigned by Page module **/


if (isset($_POST['submit'])) {
  $email = isset($_POST['contact']['email']) ? trim(strip_tags($_POST['contact']['email'])) : null;
  $name = isset($_POST['contact']['name']) ? trim(strip_tags($_POST['contact']['name'])) : null;
  $msg = isset($_POST['contact']['message']) ? trim(strip_tags($_POST['contact']['message'])) : null;

  /**  validation **/
  $messages = array();
  if (empty($name)) {
    $messages[] = new Message(Message::DANGER, i18n(array(
        'en' => 'Please enter your name',
        'zh' => '请填写您的姓名'
    )));
  }
  if (empty($email)) {
    $messages[] = new Message(Message::DANGER, i18n(array(
        'en' => 'Please enter your E-mail',
        'zh' => '请填写您的邮箱'
    )));
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $messages[] = new Message(Message::DANGER, i18n(array(
         'en' => 'Please enter a valid email address',
         'zh' => '请填写合法的邮箱地址'
     )));
  }
  if (empty($msg)) {
    $messages[] = new Message(Message::DANGER, i18n(array(
        'en' => 'Please enter your message',
        'zh' => '请填写您的留言'
    )));
  }

  if (!empty($messages)) {
    Message::register($messages);
    HTML::forward($_SERVER['HTTP_REFERER'].'#contact-form');
  }

  // check spam
  if (module_enabled('form') && !Form::checkSpamToken('global contact form')) {
    $message = new Message(Message::DANGER, i18n(array(
        'en' => 'Form login session expired. Please try again',
        'zh' => '表单提交时限过期，请重新尝试登录'
    )));
    Message::register($message);
    HTML::forward($_SERVER['HTTP_REFERER'].'#contact-form');
  }

  /** success action **/
  Message::register(new Message(Message::SUCCESS, i18n(array(
      'en' => 'Thank you for your contact ;) We will get back to you soon.',
      'zh' => '感谢您的留言 ;) 我们会及时和您沟通'
  ))));
  
  if (module_enabled('mail')) {
    $message = array();
    foreach ($_POST['contact'] as $key => $val) {
      $message[] = "<p><strong>$key</strong>:<br />".str_replace("\n", "<br />", $val)."</p><br />";
    }
    $message = implode("\n", $message);
    sendemailAdmin('Site contact form', $message);
  }
  HTML::forward($_SERVER['HTTP_REFERER'].'#contact-form');
}



$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => 'Contact',
    'body_class' => 'page page-template page-template-templates page-template-full-width page-template-templatesfull-width-php has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/contact', array(
    'pagetitle' => $page->getTitle(),
    'content' => $page->getContent(),
    'googlemap' => $html->render('site/components/googlemap', array(
        'latitude' => '-33.877348',
        'longitude' => '151.2079613'
    )),
    'full_page_sidebar_right' => $html->render('site/components/full_page_sidebar_right', array(
      'blocks' => array(
          Block::findByName('Get in Touch'),
          Block::findByName('Apply Now')
        )
    ))
));
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');


