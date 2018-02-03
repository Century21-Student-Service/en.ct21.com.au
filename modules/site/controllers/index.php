<?php

// get youtube video url from block
$block = Block::findByName('Youtube video');
$matches = array();
preg_match('/www.youtube.com\/embed\/([^\<&]+)/', $block, $matches);
if (isset($matches[1])) {
  $youtube_id = $matches[1];
} else {
  preg_match('/www.youtube.com\/watch\?v=([^\<&]+)/', $block, $matches);
  $youtube_id = $matches[1];
}
$youtube_url = isset($youtube_id) ? "https://www.youtube.com/embed/$youtube_id" : 'https://www.youtube.com/embed/jiBxpdobg0E';



$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => $settings['sitename'],
    'body_class' => 'home page page-id-115 page-template-default has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/components/slider', array(
    'carousels' => Carousel::findAll()
));
$html->renderOut('site/components/latest_news', array(
    'youtube_url' => $youtube_url,
));
$html->renderOut('site/components/countries_block', array(
    'title' => 'Apply for oversea study',
    'countries' => Country::findAll()
));
$html->renderOut('site/components/testimonial');
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');