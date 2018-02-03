<?php
/** $page has already been assigned by Page module **/

// forward 404 if not published
if (!$page->getPublished()) {
  dispatch('site/404');
  exit;
}

$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => $page->getTitle(),
    'body_class' => 'page page-template page-template-templates page-template-full-width page-template-templatesfull-width-php has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/page/default', array(
    'breadcrumb' => $html->render('site/components/breadcrumb', array(
        'items' => array(
            'Home' => uri(''),
            $page->getTitle() => false
        )
    )),
    'page' => $page,
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


