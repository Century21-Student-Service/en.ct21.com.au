<?php
$id = isset($vars[1]) ? $vars[1] : null;
$institution = Institution::findById($id);
$country = $institution->getCountry();
if (is_null($institution)) {
  dispatch('site/404');
  exit;
}

$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => 'Institution - ' . $institution->getTitle(),
    'body_class' => 'single single-ib_educator_course has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/institution', array(
    'breadcrumb' => $html->render('site/components/breadcrumb', array(
        'items' => array(
            'Home' => uri(''),
            $country->getName() => uri('country/' . $country->getId()),
            $institution->getTitle() => false
        )
    )),
    'institution' => $institution,
    'sidebar_right' => $html->render('site/components/sidebar_right', array(
        'blocks' => array(
            $html->render('site/components/sidebar_block_institutions', array(
                'institution' => $institution
            )),
            $html->render('site/components/sidebar_block_recent_news'),
            $html->render('site/components/sidebar_block_apply')
        )
    ))
));
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');

