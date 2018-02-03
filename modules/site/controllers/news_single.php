<?php

$nid = isset($vars[1]) ? strip_tags($vars[1]) : null;
$news = News::findById($nid);

$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => $news->getTitle(),
    'body_class' => 'single single-post single-format-standard has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/news_single', array(
    'news' => $news,
    'sidebar_right' => $html->render('site/components/sidebar_right', array(
        'blocks' => array(
            $html->render('site/components/sidebar_block_countries'),
            $html->render('site/components/sidebar_block_recent_news'),
            $html->render('site/components/sidebar_block_apply')
        )
    ))
));
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');