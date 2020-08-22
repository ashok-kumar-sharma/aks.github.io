<?php
  session_start();
  if(empty($_SESSION["logged"])){
    header("Location: ../");
  }
  //code goes here
  echo "Dashboard is Active";
?>
