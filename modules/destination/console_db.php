<?php
  //-- Country:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "destination") {
      echo " - Drop table 'country' ";
      echo Country::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Country:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "country") ) {
  //- create tables if not exits
  echo " - Create table 'country' ";
  echo Country::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  