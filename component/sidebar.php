<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/user.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Welcome !</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    
    <?php $url = $_SERVER['REQUEST_URI']; ?>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="http://192.168.76.3/dss/index.php" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/dss/index.php' ? 'active' : '') ?>" >
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="http://192.168.76.3/dss/index.php?page=category" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/dss/index.php?page=category' ? 'active' : '') ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="http://192.168.76.3/dss/index.php?page=book" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/dss/index.php?page=book' ? 'active' : '') ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Book
            </p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
