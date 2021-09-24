<body>

  <div id="app">

    <div class="main-wrapper">

      <div class="navbar-bg"></div>

      <nav class="navbar navbar-expand-lg main-navbar">

        <form class="form-inline mr-auto">

          <ul class="navbar-nav mr-3">

            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-list"></i></i></a></li>

           <!--  <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->

          </ul>

          <div class="search-element">

       

            <div class="search-backdrop"></div>

            <div class="search-result">

           

            </div>

          </div>

        </form>

        

          

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            <img alt="image" src="<?= base_url('assets/gambar/dashboard/avatar-1.png');?>" class="rounded-circle mr-1">

            <div class="d-sm-none d-lg-inline-block">Hi, <?= $nama1;?></div></a>

            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Hi, <?= $nama1;?></div>
              <div class="dropdown-title">Logged in <?=timespan(strtotime($this->session->userdata('last_login')),strtotime(date('Y-m-d H:i:s')),4)?>            </div>

              <div class="dropdown-divider"></div>

              <a href="<?= base_url('dashboard/Dashboard/logout');?>" class="dropdown-item has-icon text-danger">

                <i class="fas fa-sign-out-alt"></i> Logout

              </a>

            </div>

          </li>

        </ul>

      </nav>

      <?php $uri = $this->uri->segment('2');?>





      <div class="main-sidebar">
         <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-list"></i></a></li>
         
        <aside id="sidebar-wrapper">

          <div class="sidebar-brand">

          </div>
         <!--  <div class="sidebar-brand sidebar-brand-sm">
             <li class="menu-header">List</li>
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-list"><span>List</span></i></i></a></li>

          </div> -->

          <ul class="sidebar-menu">

              <li class="menu-header">Dashboard</li>

                <li class="nav-item dropdown <?php if($uri == "index"){ ?> active <?php } ?> ">

                  <a href="<?= base_url('dashboard/index');?>" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>

                </li>

              <li class="menu-header">Menu</li>

               <li class="nav-item dropdown <?php if($uri == "kategori"){ ?> active <?php } ?>">

                  <a href="<?= base_url('dashboard/kategori');?>" class="nav-link "><i class="fas fa-store"></i><span>Kategori Menu</span></a>

               </li>

               <li class="nav-item dropdown <?php if($uri == "produk"){ ?> active <?php } ?>">

                  <a href="<?= base_url('dashboard/produk');?>" class="nav-link "><i class="fas fa-drumstick-bite"></i><span>List Menu</span></a>

               </li>
               <li class="nav-item dropdown <?php if($uri == "help"){ ?> active <?php } ?>">

                  <a href="<?= base_url('dashboard/help');?>" class="nav-link "><i class="fas fa-question"></i><span>Bantuan</span></a>

               </li>




            

        </aside>

      </div>