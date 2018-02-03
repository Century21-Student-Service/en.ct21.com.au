<?php
  //-- Application:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "application") {
      echo " - Drop table 'application' ";
      echo Application::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Application:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "application") ) {
  //- create tables if not exits
  echo " - Create table 'application' ";
  echo Application::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  