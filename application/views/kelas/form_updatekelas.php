 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form </h3>
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
                    <h2>Form Input Kelas <small> </small></h2>
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

                    <form method="post" action="<?= base_url().'siakad/prosestambahkelas' ?>" class="form-horizontal form-label-left" novalidate>
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
                    
                    <?php foreach($kelas as $row){ ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">ID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="email" name="id" required="required" value="<?= $row['id_kelas']; ?>" readonly class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Kelas<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="kode" placeholder="Input Kode Kelas" required="required" >
                                <option value="<?= $row['kode_kelas']; ?>"><?= $row['kode_kelas']; ?></option>
                                <option value="">-- Pilih --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="MALAM">MALAM</option>
                            </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nama Dosen <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="dosen" required="required" class="form-control col-md-7 col-xs-12">
                                <option value="<?= $row['NIDN']; ?>"><?= $row['nama_dosen']; ?></option>
                                <option value="">-- Pilih --</option>
                                <?php foreach($dosen as $row){ ?>
                                <option value="<?= $row['NIDN']; ?>"><?= $row['nama_dosen']; ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nama Mata Kuliah <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="matkul" required="required" placeholder="Input Email"class="form-control col-md-7 col-xs-12">
                                <?php foreach($kelas as $row){ ?>
                                 <option value="<?= $row['kode_matakuliah']; ?>"><?= $row['nama_matakuliah']; ?></option>
                                <?php } ?>
                                <option value="">-- Pilih --</option>
                                <?php foreach($matkul as $row){ ?>
                                <option value="<?= $row['kode_matakuliah']; ?>"><?= $row['nama_matakuliah']; ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <?php foreach($kelas as $row){ ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Waktu <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="waktu" value="<?= $row['waktu']; ?>" required="required" placeholder="Input Waktu"class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button id="send" name="submit" type="submit" class="btn btn-success">Submit</button>
                            <a href="<?= base_url().'siakad/list_kelas/' ?>" id="send" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
