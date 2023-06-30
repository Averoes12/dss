<?php 

include "../conf/conn.php";

// simpan kategori
if(isset($_POST['category'])){
  $category = $_POST['category'];

  $query = ("insert into category values ('', '$category')");
  if(!mysqli_query($link,$query)){
    echo "Error insert data";
    header('location: ../index.php?page=category', true, 301);
  }else{
    header('location: ../index.php?page=category', true, 301);
  }
}

// hapus kateogori
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "";
    $query = ("delete from category where idcategory='$id'");
    mysqli_query($link, $query);
    if(!mysqli_query($link,$query)){
      echo mysqli_error($link);
      header('location: ../index.php?page=category', true, 301);
    }else{
      header('location: ../index.php?page=category', true, 301);
    }
  }

  // detail kategori

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "";
    $query = ("select idcategory, name from category where idcategory='$id'");
    $result = mysqli_query($link, $query);
    if(!mysqli_query($link, $query)){
      mysqli_error($link);
      die();
    }else{
      while ($res = mysqli_fetch_assoc($result)) {
        echo '
        <form action="pages/category_process.php" id="form-edit" method="post">
          <div class="form-group">
            <label for="category-name">id <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="id-category" name="id" value="'.$res['idcategory'].'" readonly>
          </div>
          <div class="form-group">
            <label for="category-name">Category <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="category-name-edit" name="category_edit" value="'.$res['name'].'" maxlength="200">
          </div>
        </form>
        ';
      }
    }

  }

  // edit kategori
  if(isset($_POST['category_edit'])){
    $id = $_POST['id'];
    $category = $_POST['category_edit'];
    $query = "";
    $query = "update category set name='$category' where idcategory='$id'";
    mysqli_query($link, $query);
    if(!mysqli_query($link, $query)){
      echo mysqli_error($link);
      die();
    }else {
      header('location: ../index.php?page=category', true, 301);
    }
  }
?>