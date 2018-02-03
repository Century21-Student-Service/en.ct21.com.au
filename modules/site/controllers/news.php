<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => 'News',
    'body_class' => 'blog has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');

$perpage = $settings['news_per_page'];
$total = News::countAll();
$total_page = ceil($total / $perpage);
$html->renderOut('site/news', array(
    'news' => News::findAllWithPage($page, $settings['news_per_page']),
    'sidebar_right' => $html->render('site/components/sidebar_right', array(
        'blocks' => array(
            $html->render('site/components/sidebar_block_countries'),
            $html->render('site/components/sidebar_block_apply')
//            $html->render('site/components/sidebar_block_recent_news')
        )
    )),
    'current_page' => $page,
    'total_page' => $total_page,
    'total' => $total,
    'pager' => $html->render('site/components/pagination', array('total' => $total_page, 'page' => $page)),
    'start_entry' => ($page - 1)*$perpage + 1,
    'end_entry' => min(array($total, $page*$perpage))
));


$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');