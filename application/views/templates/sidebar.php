  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url(); ?>" class="site_title"><i class="glyphicon glyphicon-education"></i> <span>Portal Siakad</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php if( $this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2 ){ ?>
                  <?php foreach( $foto as $row ){ ?>
                    <?php if(empty($row['photo'])){ ?>
                      <img src="<?= base_url().'assets/' ?>images/user.png" alt="..." class="img-circle profile_img">
                    <?php }else{ ?>
                      <img src="<?= base_url().'assets/' ?>images/<?= $row['photo']; ?>" alt="..." class="img-circle profile_img">
                    <?php } ?>
                  <?php } ?>
                <?php }else{ ?>
                  <?php foreach( $fotomahasiswa as $row ){ ?>
                    <?php if(empty($row['foto'])){ ?>
                    <img src="<?= base_url().'assets/' ?>images/user.png" alt="..." class="img-circle profile_img">
                    <?php }else{ ?>
                      <img src="<?= base_url().'assets/' ?>images/<?= $row['foto'] ?>" alt="..." class="img-circle profile_img">
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $this->session->userdata('ses_nama'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url().'siakad/' ?>"><i class="fa fa-home"></i> Home <span class=""></span></a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Portal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					            <?php if($this->session->userdata('akses') == 1 ){ ?>
                        <li><a href="<?= base_url().'siakad/list_dosen' ?>">Data Dosen</a></li>
                        <li><a href="<?= base_url().'siakad/list_mahasiswa' ?>">Data Mahasiswa</a></li>
                        <li><a href="<?= base_url().'siakad/list_matakuliah' ?>">Data Mata Kuliah</a></li>
                        <li><a href="<?= base_url().'siakad/list_kelas/' ?>">Data Kelas</a></li>
                        <li><a href="<?= base_url().'siakad/list_perkuliahan/' ?>">Data Perkuliahan</a></li>
                      <?php }else if($this->session->userdata('akses') == 2){?>
                        <li><a href="<?= base_url().'siakad/data_dosen/' ?>">Data Dosen</a></li>
                        <li><a href="<?= base_url().'siakad/data_kelas/' ?>">Data Kelas</a></li>
                      <?php }else if($this->session->userdata('akses') == 3){?>
                        <li><a href="<?= base_url().'siakad/detail_mahasiswa/' ?>">Data Mahasiswa</a></li>
                        <li><a href="<?= base_url().'siakad/list_tagihanmhs/' ?>">Tagihan Mahasiswa</a></li>
                      <?php } ?>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Perkuliahan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($this->session->userdata('akses') == 3 ){ ?>
                      <li><a href="<?= base_url().'siakad/set_krs/' ?>">Kartu Rencana Studi</a></li>
                      <li><a href="<?= base_url().'siakad/kartu_hasilstudi/' ?>">Kartu Hasil Studi</a></li>
                      <li><a href="<?= base_url().'siakad/nilai_angkadetail/' ?>">Nilai Angka Detail</a></li>
                      <?php } ?>
                      <?php if($this->session->userdata('akses') == 1){ ?>
                      <li><a href="<?= base_url().'siakad/administrasi/' ?>">Administrasi</a></li>
                      <?php } ?>
                      <?php if($this->session->userdata('akses') == 2){ ?>
                        <li><a href="<?= base_url().'siakad/list_perkuliahandosen/' ?>">Input Nilai</a></li>
                      <?php } ?>
					         </ul>
                  </li>
                  <!-- <li><a><i class="fa fa-table"></i> Cetak <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Cetak KRS</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
           
            </div>
            <!-- /sidebar menu -->
		<!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>