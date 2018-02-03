<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

$weight = 0;
if (is_cli()) {
  $testimonial = new Testimonial();
  $testimonial->setName('Peter Wang');
  $testimonial->setFrom('UNSW master student');
  $testimonial->setComment('Great service! I got my uni offer in just 20 days. Thumbs up!');
  $testimonial->setImage('files/testimonial/1.jpg');
  $testimonial->save();
  
  $testimonial = new Testimonial();
  $testimonial->setName('Helen White');
  $testimonial->setFrom('Staint George College');
  $testimonial->setComment('The staff at Century 21 are very open and helpful. Whenever I\'ve got any enquiry, they always respond me promptly. Nice job!');
  $testimonial->setImage('files/testimonial/2.jpg');
  $testimonial->save();
  
  $testimonial = new Testimonial();
  $testimonial->setName('Steven Tan');
  $testimonial->setFrom('English course student in UOW');
  $testimonial->setComment('I was an oversea student and not so good with my English. Century 21 assisted me finding the right English language instition and I now have got my college offer. All thanks to them!');
  $testimonial->setImage('files/testimonial/3.jpg');
  $testimonial->save();
  
  $testimonial = new Testimonial();
  $testimonial->setName('Mike Nash');
  $testimonial->setFrom('High school student at ACIIA');
  $testimonial->setComment('Very appreciated for the free consulation. Century 21 provided me all the school details free of charge. I choose their service and got the offer!');
  $testimonial->setImage('files/testimonial/4.jpg');
  $testimonial->save();
}