<?php
  //-- Testimonial:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "testimonial") {
      echo " - Drop table 'testimonial' ";
      echo Testimonial::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Testimonial:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "testimonial") ) {
  //- create tables if not exits
  echo " - Create table 'testimonial' ";
  echo Testimonial::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  