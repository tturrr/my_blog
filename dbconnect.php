<?php
  $host = 'localhost';
  $user = 'root';
  $passWord = 'a1214511';
  $dbName = 'joeltestdb';

  $dbConnect = new mysqli($host,$user,$passWord,$dbName);
  $dbConnect->set_charset('utf8');
?>
