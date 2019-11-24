 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form</h3>
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
                    <h2>Form Input Mahasiswa <small></small></h2>
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

                    <form method="post" action="<?= base_url().'siakad/prosestambahmahasiswa' ?>" class="form-horizontal form-label-left" novalidate>
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
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">NIM<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nim" placeholder="Input NIM" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Mahasiswa<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama" placeholder="Input Nama Mahasiswa" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" placeholder="Input Email"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Strata<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="email" name="strata" required="required" placeholder="Input Email"class="form-control col-md-7 col-xs-12">
                              <option value="">-- Pilih --</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jurusan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="email" name="jurusan" required="required" placeholder="Input Email"class="form-control col-md-7 col-xs-12">
                              <option value="">-- Pilih --</option>
                              <?php foreach($jurusan as $row){ ?>
                              <option value="<?= $row['nama_jurusan']; ?>"><?= $row['nama_jurusan']; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Angkatan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="email" name="angkatan" required="required" placeholder="Input Email"class="form-control col-md-7 col-xs-12">
                              <option value="">-- Pilih --</option>
                              <option value="<?= date('Y'); ?>"><?= date('Y'); ?></option>
                              <option value="2017">2017</option>
                              <option value="2016">2016</option>
                              <option value="2015">2015</option>
                              <option value="2014">2014</option>
                              <option value="2013">2013</option>
                              <option value="2012">2012</option>
                              <option value="2011">2011</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button id="send" name="submit" type="submit" class="btn btn-success">Submit</button>
                          <a href="<?= base_url().'siakad/list_mahasiswa/' ?>" id="send" class="btn btn-danger">Cancel</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
