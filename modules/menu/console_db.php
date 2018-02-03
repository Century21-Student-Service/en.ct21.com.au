<?php
  //-- Menu:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "menu") {
      echo " - Drop table 'menu' ";
      echo Menu::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Menu:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "menu") ) {
  //- create tables if not exits
  echo " - Create table 'menu' ";
  echo Menu::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  
  //-- MenuItem:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "menu") {
      echo " - Drop table 'menu_item' ";
      echo MenuItem::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- MenuItem:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "menu_item") ) {
  //- create tables if not exits
  echo " - Create table 'menu_item' ";
  echo MenuItem::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  