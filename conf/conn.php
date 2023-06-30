<?php
  $link = new mysqli("localhost","root","","dss");

  if ($link -> connect_errno) {
    echo "Failed to connect to MySQL: " . $link -> connect_error;
    exit();
  }

  define('BASE_URL', 'http://192.168.76.3/dss');
?>