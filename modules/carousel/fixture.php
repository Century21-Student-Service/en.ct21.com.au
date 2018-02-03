<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

$weight = 0;
if (is_cli()) {
  $carousel = new Carousel();
  $carousel->setTitle('Professional visa applicaton service');
  $carousel->setContent('We have more than 20 years of experience in visa service. We have you covered.');
  $carousel->setImage('files/fixture/carousel/slider5.jpg');
  $carousel->setButtonText('Check more');
  $carousel->setButtonLink(uri('about'));
  $carousel->save();
  
  $carousel = new Carousel();
  $carousel->setTitle('VIP reward system');
  $carousel->setContent('Apply to become our VIP client. There\'s more than you deserve!');
  $carousel->setImage('files/fixture/carousel/slider6.jpg');
  $carousel->setButtonText('Check details');
  $carousel->setButtonLink(uri('about'));
  $carousel->save();
  
  $carousel = new Carousel();
  $carousel->setTitle('College application on you finger tips');
  $carousel->setContent('We have long term relationship with all the major education institutions in Australia');
  $carousel->setImage('files/fixture/carousel/slider7.jpg');
  $carousel->setButtonText('Apply now');
  $carousel->setButtonLink(uri('about'));
  $carousel->save();
  
  $carousel = new Carousel();
  $carousel->setTitle('Free eveluation service');
  $carousel->setContent('If you are in doubt, we can provide consulation for FREE!');
  $carousel->setImage('files/fixture/carousel/slider1.jpg');
  $carousel->setButtonText('How?');
  $carousel->setButtonLink(uri('about'));
  $carousel->save();
  
  $carousel = new Carousel();
  $carousel->setTitle('Full refund guarantee');
  $carousel->setContent('In case you are not happy with the service provided, we offer full refund in 7 days!');
  $carousel->setImage('files/fixture/carousel/slider2.jpg');
  $carousel->setButtonText('Check details');
  $carousel->setButtonLink(uri('about'));
  $carousel->save();
  
  $carousel = new Carousel();
  $carousel->setTitle('Up to date news in your mail box');
  $carousel->setContent('Sign up with our news letter, we deliver latest immigration news straight to your mail box!');
  $carousel->setImage('files/fixture/carousel/slider3.jpg');
  $carousel->setButtonText('Check details');
  $carousel->setButtonLink(uri('about'));
  $carousel->save();
  
  $carousel = new Carousel();
  $carousel->setTitle('Happy clients');
  $carousel->setContent('We are pround to say that our service is rated 5 stars by 85% of our clients!');
  $carousel->setImage('files/fixture/carousel/slider4.jpg');
  $carousel->setButtonText('Check details');
  $carousel->setButtonLink(uri('about'));
  $carousel->save();
}