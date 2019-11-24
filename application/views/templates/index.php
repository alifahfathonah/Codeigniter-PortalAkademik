 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
      <?php if($this->session->userdata('akses') == 3 ){ ?>
			<div class="alert alert-important alert-dismissable">
				<marquee><font color="#f4428f">
					<h2>Untuk mengikuti ujian UTS maka kartu ujian harus dicetak melalui menu : Perkuliahan - KRS atau link 
					<a href="<?= base_url(); ?>"> berikut</a></h2></font>
				</marquee>
			</div>
      <?php } ?>
      <?php if($this->session->userdata('akses') == 1){ ?>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <?php foreach($jumlahmhs as $row){ ?>
                  <div class="count"><?= $row['jumlahmhs']; ?></div>
                  <?php } ?>
                  <h3>Jumlah Mahasiswa</h3>
                  <a href="<?= base_url().'siakad/list_mahasiswa/' ?>"><p>Lihat Data</p></a>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <?php foreach($jumlahmatkul as $row){ ?>
                  <div class="count"><?= $row['jumlahmatkul']; ?></div>
                  <?php } ?>
                  <h3>Jumlah Dosen</h3>
                  <a href="<?= base_url().'siakad/list_dosen/' ?>"><p>Lihat Data</p></a>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <?php foreach($jumlahdosen as $row){ ?>
                  <div class="count"><?= $row['jumlahdosen']; ?></div>
                    <?php } ?>
                  <h3>Jumlah Matakuliah</h3>
                  <a href="<?= base_url().'siakad/list_matakuliah/' ?>"><p>Lihat Data</p></a>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <?php foreach($jumlahkelas as $row){ ?>
                  <div class="count"><?= $row['jumlahkelas']; ?></div>
                  <?php } ?>
                  <h3>Jumlah Kelas</h3>
                  <a href="<?= base_url().'siakad/list_kelas/' ?>"><p>Lihat Data</p></a>
                </div>
              </div>
            </div>
      <?php } ?>
      <?php if($this->session->userdata('akses') == 2){ ?>
        <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Monitoring <small>Perkuliahan</small></h2>
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
                  <table id="datatablee" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Kode Matakuliah</th>
                          <th>Nama Matakuliah</th>
                          <th>Jadwal</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($jadwaldosen as $row){ ?>
                        <tr>
                          <td><?= $row['kode_matakuliah']; ?></td>
                          <td><?= $row['nama_matakuliah']; ?> (<?= $row['kode_kelas']; ?>)</td>
                          <td><?= $row['waktu']; ?></td>
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
      <?php } ?>
      <?php if($this->session->userdata('akses') == 3){ ?>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jadwal Perkuliahan<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li> -->
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatablee" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Kode Matakuliah</th>
                          <th>Nama Matakuliah</th>
                          <th>Jadwal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($jadwal as $row){ ?>
                        <tr>
                          <td><?= $row['kode_matakuliah']; ?></td>
                          <td><?= $row['nama_matakuliah']; ?> (<?= $row['kode_kelas'] ?>)</td>
                          <td><?= $row['waktu']; ?></td>
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
      <?php } ?>