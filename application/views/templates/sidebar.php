<div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile mb-0">
              <a href="#" class="nav-link">                
                <div class="text-wrapper">
                  <p class="profile-name"><?= $userAktif['username']; ?></p>
                  <p class="designation"><?php 
                  if ($this->session->userdata('role_id') == '1') {
                    echo "Pengelola";
                  }elseif ($this->session->userdata('role_id') == '2') {
                    echo "Instruktur";
                  }else {
                    echo "Siswa";
                  } ?></p>
                </div>
                
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin'); ?>">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>            
              <li class="nav-item nav-category">
              <span class="nav-link">Data Master</span>
            </li>
            <?php if ($this->session->userdata('role_id') == '1') {?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/getUser'); ?>">
                <span class="menu-title">Data User</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('genre'); ?>">
                  <span class="menu-title">Genre Kursus</span>
                  <i class="icon-list menu-icon"></i>
                </a>
            </li>   
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == '2') : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('course'); ?>">
                  <span class="menu-title">Data Kursus</span>
                  <i class="icon-book-open menu-icon"></i>
                </a>
              </li>                                        
          <?php endif; ?>
          </ul>
        </nav>
        <!-- partial -->