   <!-- page content -->
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
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
                  <?php if( $this->session->flashdata('sukses') ){ ?>
                  <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('sukses'); ?>
                  </div>
                  <?php } ?>
                  <?php if( $this->session->flashdata('gagal') ){ ?>
                  <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('gagal'); ?>
                  </div>
                  <?php } ?>
                  <a href="<?= base_url().'siakad/set_krs/' ?>" type="submit" class="btn btn-success pull-right">Kembali</a>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nama Mata Kuliah</th>
                          <th>Kls</th>
                          <th>SKS</th>
                          <th>Jadwal</th>
                          <th width="10">Pilih</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($matkul as $row){ ?>
                        <tr>
                          <td><?= $row['nama_matakuliah']; ?></td>
                          <td><?= $row['kode_kelas']; ?></td>
                          <td><?= $row['sks']; ?></td>    
                          <td><?= $row['waktu']; ?></td>
                          <td width="10">
                            <form action="<?= base_url().'siakad/prosestambahperkuliahan' ?>" method="post">
                              <input type="hidden" name="perkuliahan" value="">
                              <input type="hidden" name="matkul" value="<?= $row['kode_matakuliah'] ?>">
                              <input type="hidden" name="id_kelas" value="<?= $row['id_kelas']; ?>">
                              <input type="hidden" name="nim" value="<?= $this->session->userdata('ses_id');?>">
                              <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
                              </form>
                          </td>
                          <?php } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /page content -->