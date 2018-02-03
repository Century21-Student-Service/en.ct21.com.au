<?php
  //-- Carousel:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "carousel") {
      echo " - Drop table 'carousel' ";
      echo Carousel::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Carousel:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "carousel") ) {
  //- create tables if not exits
  echo " - Create table 'carousel' ";
  echo Carousel::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  