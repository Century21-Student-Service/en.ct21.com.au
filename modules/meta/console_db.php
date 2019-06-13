<?php
  //-- Meta:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "meta") {
      echo " - Drop table 'meta' ";
      echo Meta::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Meta:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "meta") ) {
  //- create tables if not exits
  echo " - Create table 'meta' ";
  echo Meta::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  