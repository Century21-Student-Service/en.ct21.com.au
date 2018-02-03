<?php
$id = isset($vars[1]) ? $vars[1] : null;
$course = Course::findById($id);
$country = $course->getCountry();
if (is_null($course)) {
  dispatch('site/404');
  exit;
}

$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => 'Course - ' . $course->getTitle(),
    'body_class' => 'single single-ib_educator_course has-toolbar'
));

$html->output('<div id="page-container">');
//$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/course', array(
    'breadcrumb' => $html->render('site/components/breadcrumb', array(
        'items' => array(
            'Home' => uri(''),
            $country->getName() => uri('country/' . $country->getId()),
            $course->getTitle() => false
        )
    )),
    'course' => $course,
    'sidebar_right' => $html->render('site/components/sidebar_right', array(
        'blocks' => array(
            $html->render('site/components/sidebar_block_courses', array(
                'course' => $course
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

