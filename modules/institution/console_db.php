<?php
  //-- Institution:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "institution") {
      echo " - Drop table 'institution' ";
      echo Institution::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Institution:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "institution") ) {
  //- create tables if not exits
  echo " - Create table 'institution' ";
  echo Institution::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  