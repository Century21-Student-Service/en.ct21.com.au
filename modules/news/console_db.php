<?php
  //-- News:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "news") {
      echo " - Drop table 'news' ";
      echo News::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- News:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "news") ) {
  //- create tables if not exits
  echo " - Create table 'news' ";
  echo News::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  