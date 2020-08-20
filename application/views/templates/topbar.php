<div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="#" style="width: 200px; height: 70px;">
              <img src="<?= base_url('assets/img/ikbal2.png'); ?>" alt="logo" style="width: 180px; height: 53px;" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="#" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Selamat Datang di BelON!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">                        
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="<?= base_url('assets/img/profil/') . $userAktif['gambar']; ?>" alt="Profile image"> <span class="font-weight-normal"><?= $this->session->userdata('username'); ?></span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="<?= base_url('assets/img/profil/') . $userAktif['gambar']; ?>" alt="Profile image" width="85px" height="85px">
                  <p class="mb-1 mt-3"><?= $this->session->userdata('username'); ?></p>
                  <p class="font-weight-light text-muted mb-0"><?= $this->session->userdata('email'); ?></p>
                </div>  
                <a class="dropdown-item" href="<?=base_url('user')?>"><i class="dropdown-item-icon icon-user text-primary"></i>Profil</a>              
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->