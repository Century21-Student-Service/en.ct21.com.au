<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';
$settings = Vars::getSettings();

if (is_cli()) {
  // --------- footer left
  $block = new Block();
  $block->setName('Footer Left');
  $block->setContent('<p>Established in 1995, Century 21 Student Service Centre is a professional, well-established and highly reputable education consulting & student service company. </p><p><a href="/about">Learn more</a></p>');
  $block->save();
  
  // --------- footer right
  $block = new Block();
  $block->setName('Footer Right');
  $block->setContent('
<p>You can contact us by email or phone:<br>
<strong>Phone</strong>: +61 2 9267 6047<br>
<strong>Email</strong>: info@ct21.com.au</p>
<p><strong>Address:</strong>: Suite 1003, 370 Pitt St. Sydney, NSW 2000, Australia</p>
<p><strong>Business Hours:</strong><br>
Monday-Friday: 9AM to 5PM<br>
Saturday-Sunday: 9AM to 1PM</p>
');
  $block->save();
  
  // --------- get in touch
  $block = new Block();
  $block->setName('Get in Touch');
  $block->setContent('
<h3>Get in Touch</h3>
<p>You can contact us by email or phone:<br>
<strong>Phone</strong>: +61 2 9267 6047<br>
<strong>Email</strong>: info@ct21.com.au</p>
<p><strong>Address</strong>: Suite 1003, 370 Pitt St. Sydney, NSW 2000, Australia</p>
<p><strong>Business Hours:</strong><br>
Monday-Friday: 9AM to 5PM<br>
Saturday-Sunday: 9AM to 1PM</p>

');
  $block->save();
  
  // ------------ course search
  $block = new Block();
  $block->setName('Course search');
  $block->setContent('
<h2><a href="http://www.globecourse.com/sou.php">Search your course</a></h2>
                  <p>Search in our advanced course database for the course that suits you the most.</p>
');
  $block->save();
  
  // ------------ youtube video
  $block = new Block();
  $block->setName('Youtube video');
  $block->setContent('
  <p>https://www.youtube.com/watch?v=jiBxpdobg0E</p>
');
  $block->save();
  
}