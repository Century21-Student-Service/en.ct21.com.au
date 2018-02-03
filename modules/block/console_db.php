<?php
  //-- Block:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "block") {
      echo " - Drop table 'block' ";
      echo Block::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Block:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "block") ) {
  //- create tables if not exits
  echo " - Create table 'block' ";
  echo Block::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  