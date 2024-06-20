<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-lightblue elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" >
    <img src="image/logo_green.png" alt="Grenn Indaco Logo" class="brand-image-xl logo-xs" style="top : 18px; left: 10px;" width="80%">
    <img src="image/ic.png" alt="Grenn Indaco Logo" class="brand-image-xs logo-xl" style="left : 50px; margin-left : auto; margin-right : auto; display : block;" width="50%">
  </a>
  <div style="top : 0px;">
  <div class="horizontal-line"></div>
  </div>
  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM tb_menu WHERE menu_level = '' OR menu_level = 'user'");
        while ($row = $res->fetch_array()) {
        ?>
        <li class="nav-item">
          <a href="index.php?page=<?php echo $row['name']; ?>" class="nav-link <?php cekMenuActive($row['name']); ?>">
            <i class="nav-icon <?php echo $row['icon']; ?>"></i>
            <p>
            <?php echo $row['title']; ?>
            </p>
          </a>
        </li>
        <?php } ?>
        
        <?php
        if ($_SESSION['level'] == 'admin') {
        echo '<div class="horizontal-line"></div>';
        echo '<li class="nav-header">ADMIN MENU</li>';
        $res = mysqli_query($conn, "SELECT * FROM tb_menu WHERE menu_level = 'admin'");
        while ($row = $res->fetch_array()) {
        ?>
        <li class="nav-item">
          <a href="index.php?page=<?php echo $row['name']; ?>" class="nav-link <?php cekMenuActive($row['name']); ?>">
            <i class="nav-icon <?php echo $row['icon']; ?>"></i>
            <p>
            <?php echo $row['title']; ?>
            </p>
          </a>
        </li>
        <?php }} ?>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

</aside>
