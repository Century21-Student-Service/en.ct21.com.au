<?php

$cid = isset($vars[1]) ? strip_tags($vars[1]) : null;
$country = Country::findById($cid);

$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => 'Study in ' . $country->getName(),
    'body_class' => 'single single-ib_educator_course has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/components/banner', array(
    'country' => $country
));
$html->renderOut('site/country', array(
    'breadcrumb' => $html->render('site/components/breadcrumb', array(
        'items' => array(
            'Home' => uri(''),
            $country->getName() => false
        )
    )),
    'country' => $country,
    'institutions' => Institution::findAllByCountryId($country->getId()),
    'courses' => Course::findAllByCountryId($country->getId()),
    'sidebar_right' => $html->render('site/components/sidebar_right', array(
        'blocks' => array(
            $html->render('site/components/sidebar_block_countries'),
            $html->render('site/components/sidebar_block_recent_news'),
            $html->render('site/components/sidebar_block_apply')
        )
    ))
));
$html->renderOut('site/components/countries_block', array(
    'title' => 'Other countries to apply for',
    'countries' => Country::findAllExcluding($country->getId())
));
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');