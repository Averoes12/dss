<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book</title>

  <?php include "component/css.php" ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "component/header.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "component/sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 2080.32px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/home">Home</a></li>
              <li class="breadcrumb-item active">Book</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12 text-right">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-book">Add</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example2" class="table table-bordered table-hover"
                        aria-describedby="example2_info">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Stock</th>
                            <th align="right">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result = mysqli_query($link, "
                              select A.idbook, A.name, A.author, A.currentstock, B.name category from book A
                              inner join category B on A.idcategory = B.idcategory
                              order by A.idbook desc
                            "); 
                            $i = 0;
                            echo mysqli_error($link);
                            while ($value = mysqli_fetch_assoc($result)) {
                              $i++;
                          ?>
                          <tr class="odd">
                            <td><?= ($i) ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['category'] ?></td>
                            <td><?= $value['author'] ?></td>
                            <td><?= $value['currentstock'] ?></td>
                            <td align="right">
                              <a href="#edit-book" onclick="detail('<?= $value['idbook'] ?>')" data-toggle="modal"><i class="fas fa-edit text-primary"></i></a>
                              <a href="pages/book_process.php?delete=<?= $value['idbook'] ?>"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include "component/footer.php" ?>
  <!-- Control Sidebar -->

  <div class="modal fade" id="add-book" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Book</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="pages/book_process.php" id="form-book" method="post" onsubmit="return validate();">
                <div class="form-group">
                  <label for="title">Title <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="title" name="title" maxlength="500">
                </div>
                <div class="form-group">
                  <label>Category <span class="text-danger">*</span></label>
                  <select class="form-control select2" style="width: 100%;" name="category" id="category">
                    <option value="" disabled selected></option>
                    <?php
                      $query = "";
                      $query = "select idcategory, name from category order by idcategory desc";
                      $result = mysqli_query($link, $query);
                      echo mysqli_error($link);
                      while ($res = mysqli_fetch_assoc($result)) {
                        echo "<option class='p-1' value='".$res['idcategory']."'>".$res['name']."</option>";
                      }
                    ?>
                  </select>
                  <div class="form-group">
                    <label for="author">Author <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="author" name="author" maxlength="100">
                  </div>
                  <div class="form-group">
                    <label for="first-stock">First Stock <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="first-stock" name="first_stock" min="0">
                  </div>
                  <div class="form-group">
                    <label for="current-stock">Current Stock <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="current-stock" name="current_stock" min="0">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="btn-submit">Submit</button>
        </div>
      </div>

    </div>

  </div>

  <div class="modal fade" id="edit-book" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Book</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="cnt-form-edit">
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="btn-edit-save">Save</button>
        </div>
      </div>

    </div>

  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include "component/js.php" ?>

<script>
  function validate(){
    let category = $("#category").val();
    let title = $("#title").val();
    let author = $("#author").val();
    let firstStock = $("#first-stock").val();
    let currentStock = $("#current-stock").val();

    if(title == "" || category == "" || author == "" || firstStock == "" || currentStock == ""){
      Swal.fire(
        'Warning',
        "Harap lengkapi data",
        'warning'
      );
      return false;
    }else{
      return true;
    }
  }
  $("#btn-submit").click(function(){
    $("#form-book").submit();
  });
</script>
<!-- detail book -->
<script>
  function detail(id){
    $.ajax({
      url:'pages/book_process.php',
      method: 'POST',
      data: {
        "id": id
      },
      success(resp){
        $("#cnt-form-edit").html(resp);
        
        $("#btn-edit-save").click(function(){
          console.log("masuk");
          let category = $("#category-edit").val();
          let title = $("#title-edit").val();
          let author = $("#author-edit").val();
          let firstStock = $("#first-stock-edit").val();
          let currentStock = $("#current-stock-edit").val();

          console.log(category);
          console.log(title);
          console.log(author);
          console.log(firstStock);
          console.log(currentStock);

          if(title == "" || category == "" || author == "" || firstStock == "" || currentStock == ""){
            Swal.fire(
              'Warning',
              'Harap Lengkapi data',
              'warning',
            )
          }else {
            console.log("masuk sini");
            $("#form-edit").submit();
          }
        });
      }
    });
  }
</script>
</body>
</html>
