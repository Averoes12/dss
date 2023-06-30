<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
  switch ($page) {
    case 'category':
      include 'pages/category.php';
      break;
    case 'book':
      include 'pages/book.php';
      break;
  }
}else{
  include "pages/home.php";
}
?>