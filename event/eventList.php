<?php
  session_start();
  require "connection.php";
  $requery = 'SELECT * FROM event';
  foreach($dbh->query($requery) as $row)
  {
    $title = $row['title'];
    $desc = $row['description'];
    $img = $row['img'];
    $id = $row['id'];
    require "_event.php";
  }     
