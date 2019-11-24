<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>General Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-12 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            

              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Vertical Tabs <small>Float left</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab">Detail Kelas</a>
                        </li>
                        <?php foreach($perkuliahan as $row){ ?>
                        <li><a href="<?= base_url().'siakad/list_nilaimahasiswa/' ?><?= $row['id_kelas']; ?>/" data-toggle="">Input Nilai</a>
                        </li>
                        <?php } ?>
                        <!-- <li><a href="#messages" data-toggle="tab">Messages</a>
                        </li>
                        <li><a href="#settings" data-toggle="tab">Settings</a>
                        </li> -->
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <table class="detailkelas">
                                <?php foreach($perkuliahan as $row){ ?>
                                <tr>
                                    <td>Kode Kelas</td>
                                    <td>:</td>
                                    <td><?= $row['id_kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Dosen Pengajar</td>
                                    <td>:</td>
                                    <td><?= $row['nama_dosen']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Kelas</td>
                                    <td>:</td>
                                    <td><?= $row['nama_matakuliah'] ?> (<?= $row['kode_kelas'] ?>)</td>
                                </tr>
                                <tr>
                                    <td>Jadwal Kelas</td>
                                    <td>:</td>
                                    <td><?= $row['waktu']; ?></td>
                                </tr>
                                <?php } ?>
                               
                            </table>
                            
                            
                        </div>
                        <div class="tab-pane" id="profile">
                         
                        </div>
                        <div class="tab-pane" id="messages">Messages Tab.</div>
                        <div class="tab-pane" id="settings">Settings Tab.</div>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>



            
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /page content -->