<?php 

include "../conf/conn.php";

// simpan kategori
if(isset($_POST['title'])){
  $title = $_POST['title'];
  $category = $_POST['category'];
  $author = $_POST['author'];
  $first_stock = $_POST['first_stock'];
  $current_stock = $_POST['current_stock'];

  $query = ("insert into book values ('', '$title', $category, '$author', $first_stock, $current_stock)");

  if(!mysqli_query($link,$query)){
    echo "Error insert data". " ". mysqli_error($link);
    die();
    header('location: ../index.php?page=book', true, 301);
  }else{
    header('location: ../index.php?page=book', true, 301);
  }
}

// hapus kateogori
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "";
    $query = ("delete from book where idbook='$id'");
    mysqli_query($link, $query);
    if(!mysqli_query($link,$query)){
      echo mysqli_error($link);
      header('location: ../index.php?page=book', true, 301);
    }else{
      header('location: ../index.php?page=book', true, 301);
    }
  }

  // detail kategori

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "";
    $query = ("select idbook, name, idcategory, author, firststock, currentstock from book where idbook='$id'");
    $result = mysqli_query($link, $query);
    if(!mysqli_query($link, $query)){
      mysqli_error($link);
      die();
    }else{
      while ($res = mysqli_fetch_assoc($result)) {
        echo '
          <form action="pages/book_process.php" id="form-edit" method="post">
            <div class="form-group">
              <label for="title">ID <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="id" name="id" value="'. $res['idbook'] .'" readonly>
            </div>
            <div class="form-group">
              <label for="title">Title <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="title-edit" name="title_edit" maxlength="500" value="'. $res['name'] .'">
            </div>
            <div class="form-group">
              <label>Category <span class="text-danger">*</span></label>
              <select class="form-control select2" style="width: 100%;" name="category_edit" id="category-edit">
              ';
                  $query = "";
                  $query = "select idcategory, name from category order by idcategory desc";
                  $result_cat = mysqli_query($link, $query);
                  echo mysqli_error($link);
                  while ($cat = mysqli_fetch_assoc($result_cat)) {
                    $check = $cat['idcategory'] == $res['idcategory'] ? 'selected' : '' ;
                    echo "<option class='p-1' value='".$cat['idcategory']."' ".$check." >".$cat['name']."</option>";
                  }
              echo '
              </select>
              <div class="form-group">
                <label for="author">Author <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="author-edit" name="author_edit" maxlength="100" value="'. $res['author'] .'">
              </div>
              <div class="form-group">
                <label for="first-stock">First Stock <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="first-stock-edit" name="first_stock_edit" min="0" value="'. $res['firststock'] .'">
              </div>
              <div class="form-group">
                <label for="current-stock">Current Stock <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="current-stock-edit" name="current_stock_edit" min="0" value="'. $res['currentstock'] .'">
              </div>
            </div>
          </form>
        ';
      }
    }

  }

  // edit kategori
  if(isset($_POST['title_edit'])){
    $id = $_POST['id'];
    $title = $_POST['title_edit'];
    $category = $_POST['category_edit'];
    $author = $_POST['author_edit'];
    $first_stock = $_POST['first_stock_edit'];
    $current_stock = $_POST['current_stock_edit'];
    $query = "";
    $query = "update book set name='$title', idcategory=$category, author='$author', firststock=$first_stock, currentstock=$current_stock where idbook='$id'";
    mysqli_query($link, $query);
    if(!mysqli_query($link, $query)){
      echo mysqli_error($link);
      die();
    }else {
      header('location: ../index.php?page=book', true, 301);
    }
  }
?>