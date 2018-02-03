<?php
  //-- Page:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "page") {
      echo " - Drop table 'page' ";
      echo Page::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Page:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "page") ) {
  //- create tables if not exits
  echo " - Create table 'page' ";
  echo Page::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  