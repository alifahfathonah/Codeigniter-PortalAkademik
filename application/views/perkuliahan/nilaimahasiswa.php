   <!-- page content -->
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>DATA <small></small></h3>
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
                    <h2>Data Kelas <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        
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
                  <form action="<?= base_url().'siakad/prosesnilai/' ?>" method="post">
                  <?php if(empty($nilai)){ ?>
                    <button type="submit" name="insert" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan data</button>
                  <?php }else{ ?>
                    <button type="submit" name="update" class="btn btn-success pull-right"><i class="fa fa-save"></i>   Simpan data</button>
                  <?php } ?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Mahasiswa</th>
                          <th style="width:10px;">Nilai Absen</th>
                          <th style="width:10px;">Nilai Tugas</th>
                          <th style="width:10px;">Nilai UTS</th>
                          <th style="width:10px;">Nilai UAS</th>
                          <th >Nilai Akhir</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                            <?php if(empty($nilai)){ ?>
                                <?php $i = 0; foreach($perkuliahan as $row){ $i++; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <input type="hidden" value="<?= $row['id_kelas']; ?>" name="id">
                                        <td><?= $row['nama_mahasiswa']; ?><input type="hidden" name="id_kelas[]" value="<?= $row['id_kelas']; ?>"><input type="hidden" name="nim[]" value="<?= $row['NIM']; ?>"></td>
                                        <td><center><input type="text" name="absen[]" style="width:60px;" ></center></td>
                                        <td><center><input type="text" name="tugas[]" style="width:60px;"></center></td>    
                                        <td><center><input type="text" name="uts[]" style="width:60px;"></center></td>
                                        <td><center><input type="text" name="uas[]" style="width:60px;"></center></td>
                                        <td></td> 
                                    </tr>  
                                <?php } ?>
                            <?php }else{ ?>
                                <?php $i = 0; foreach($nilai as $row){ $i++; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <input type="hidden" value="<?= $row['id_kelas']; ?>" name="id">
                                        <td><?= $row['nama_mahasiswa']; ?><input type="hidden" name="id_kelas[]" value="<?= $row['id_kelas']; ?>"><input type="hidden" name="nim[]" value="<?= $row['NIM']; ?>"></td>
                                        <td><center><input type="text" name="absen[]" style="width:60px;" value="<?= $row['nilai_absen'] ?>" ></center></td>
                                        <td><center><input type="text" name="tugas[]" style="width:60px;" value="<?= $row['nilai_tugas'] ?>"></center></td>    
                                        <td><center><input type="text" name="uts[]" style="width:60px;" value="<?= $row['nilai_uts'] ?>"></center></td>
                                        <td><center><input type="text" name="uas[]" style="width:60px;" value="<?= $row['nilai_uas'] ?>"></center></td>
                                        <td><?= $row['nilai_akhir']; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </form>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /page content -->