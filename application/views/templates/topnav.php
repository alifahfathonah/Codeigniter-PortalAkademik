
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php if( $this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2 ){ ?>
                      <?php foreach($foto as $row){ ?>
                          <?php if( empty($row['photo']) ){ ?>
                             <img src="<?= base_url().'assets/' ?>images/user.png" alt=""><?= $this->session->userdata('ses_nama'); ?>
                          <?php }else{ ?>
                            <img src="<?= base_url().'assets/' ?>images/<?= $row['photo']; ?>" alt=""><?= $this->session->userdata('ses_nama'); ?>
                          <?php }?>
                      <?php } ?>
                    <?php }else{ ?>
                      <?php foreach($fotomahasiswa as $row){ ?>
                          <?php if( empty($row['foto']) ){ ?>
                          <img src="<?= base_url().'assets/' ?>images/user.png" alt=""><?= $this->session->userdata('ses_nama'); ?>
                          <?php }else{ ?>
                            <img src="<?= base_url().'assets/' ?>images/<?= $row['foto']; ?>" alt=""><?= $this->session->userdata('ses_nama'); ?>
                          <?php }?>
                      <?php } ?>
                    <?php } ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <?php if( $this->session->userdata('akses')== 1 || $this->session->userdata('akses')== 2 ){ ?>
                        <a href="<?= base_url().'siakad/data_dosen' ?>">
                          <!-- <span class="badge bg-red pull-right">50%</span> -->
                          <span>Edit Profile</span>
                        </a>
                      <?php }else{ ?>
                          <!-- <span class="badge bg-red pull-right">50%</span> -->
                          <a href="<?= base_url().'siakad/detail_mahasiswa/' ?>">
                           <!-- <span class="badge bg-red pull-right">50%</span> -->
                          <span>Edit Profile</span>
                         </a>
                      <?php }?> 
                    </li>
                    <li><a href="<?= base_url().'login/logout' ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!--<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?= base_url().'assets/' ?>images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?= base_url().'assets/' ?>images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?= base_url().'assets/' ?>images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>-->
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
