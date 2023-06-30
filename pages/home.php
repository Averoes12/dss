<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

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
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <a href="index.php?page=category">
              <div class="card bg-secondary">
                <i class="nav-icon fas fa-th p-4 text-center" style="font-size: 64px;"></i>
                <h4 class="text-center">Category</h6>
              </div>
            </a>
          </div>
          <div class="col-4">
            <a href="index.php?page=book">
              <div class="card bg-secondary">
                <i class="nav-icon fas fa-book p-4 text-center" style="font-size: 64px;"></i>
                <h4 class="text-center">Book</h6>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include "component/footer.php" ?>
  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include "component/js.php" ?>

</body>
</html>
