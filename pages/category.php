<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Category</title>

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
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/home">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-category">Add</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example2" class="table table-bordered table-hover"
                        aria-describedby="example2_info">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Category</th>
                            <th align="right">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result = mysqli_query($link, "SELECT * FROM category ORDER BY idcategory DESC"); 
                            $i = 0;
                            while ($value = mysqli_fetch_assoc($result)) {
                              $i++;
                          ?>
                          <tr class="odd">
                            <td><?= ($i) ?></td>
                            <td><?= $value['name'] ?></td>
                            <td align="right">
                              <a href="#edit-category" onclick="detail('<?= $value['idcategory'] ?>')" data-toggle="modal"><i class="fas fa-edit text-primary"></i></a>
                              <a href="pages/category_process.php?delete=<?= $value['idcategory'] ?>"><i class="fas fa-trash text-danger"></i></a>
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

  <div class="modal fade" id="add-category" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="pages/category_process.php" id="form-category" method="post" onsubmit="return validate();">
            <div class="form-group">
              <label for="category-name">Category <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="category-name" name="category" maxlength="200">
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="btn-submit">Submit</button>
        </div>
      </div>

    </div>

  </div>

  <div class="modal fade" id="edit-category" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Category</h4>
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
    let category = $("#category-name").val();
    if(category == ""){
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
    $("#form-category").submit();
  });
</script>
<!-- detail category -->
<script>
  function detail(id){
    $.ajax({
      url:'pages/category_process.php',
      method: 'POST',
      data: {
        "id": id
      },
      success(resp){
        $("#cnt-form-edit").html(resp);
        
        $("#btn-edit-save").click(function(){
          let category = $("#category-name-edit").val();
          if(category == ""){
            Swal.fire(
              'Warning',
              'Harap Lengkapi data',
              'warning',
            )
          }else {
            $("#form-edit").submit();
          }
        });
      }
    });
  }
</script>
</body>
</html>
