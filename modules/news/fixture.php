<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $news = new News();
  $news->setTitle('Free consultation for Australia immigration');
  $news->setSummary('Century 21 Student Service has a free consultation for oversea students');
  $news->setContent('<p>Century 21 Student Service has a free consultation for oversea students ...</p>');
  $news->setThumbnail('files/fixture/news/thumbnail/consultation-education-flagship_572.jpg');
  $news->setImage('files/fixture/news/image/consultation-education-flagship_390.jpg');
  $news->setDate(1439215200);
  $news->save();
  
  $news = new News();
  $news->setTitle('News Year bonus program for $300 dollars');
  $news->setSummary('We are giving away $300 dollars free credit for students applying for Australian colleges');
  $news->setContent('<p>We are giving away $300 dollars free credit for students applying for Australian colleges...</p>');
  $news->setThumbnail('files/fixture/news/thumbnail/bonus_568.jpg');
  $news->setImage('files/fixture/news/image/bonus_915.jpg');
  $news->setDate(1439733600);
  $news->save();
  
  $news = new News();
  $news->setTitle('UNSW orientation program is on now!');
  $news->setSummary('From 3rd Sept to 5th Sept, Century 21 Student service will hold a special orientation session');
  $news->setContent('<p>From 3rd Sept to 5th Sept, Century 21 Student service will hold a special orientation session for future students who are planning to study in UNSW.</p>');
  $news->setThumbnail('files/fixture/news/thumbnail/unsw_via_stargate_778.jpg');
  $news->setImage('files/fixture/news/image/unsw_via_stargate_722.jpg');
  $news->setDate(1440079200);
  $news->save();
  
  $news = new News();
  $news->setTitle('Introduction to CT21 VIP program');
  $news->setSummary('Century 21 Student Service has a new VIP program just announced this Friday.');
  $news->setContent('<p>Century 21 Student Service has a new VIP program just announced this Friday.</p>');
  $news->setThumbnail('files/fixture/news/thumbnail/maxresdefault_797.jpg');
  $news->setImage('files/fixture/news/image/maxresdefault_310.jpg');
  $news->setDate(1440079200);
  $news->save();
}