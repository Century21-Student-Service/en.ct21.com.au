<?php
  //-- Course:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "course") {
      echo " - Drop table 'course' ";
      echo Course::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Course:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "course") ) {
  //- create tables if not exits
  echo " - Create table 'course' ";
  echo Course::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  