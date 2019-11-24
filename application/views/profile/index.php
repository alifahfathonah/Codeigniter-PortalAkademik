
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profile</h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small></small></h2>
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
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php foreach($foto as $row){ ?>
                            <?php if(empty($row['photo'])){ ?>
                              <img class="img-responsive avatar-view" src="<?= base_url().'assets/' ?>images/user.png" alt="Avatar" title="Change the avatar">
                            <?php }else{ ?>
                              <img class="img-responsive avatar-view" src="<?= base_url().'assets/' ?>images/<?= $row['photo']; ?>" alt="Avatar" title="Change the avatar">
                            <?php } ?>
                        </div>
                      </div>
                      <h3><?= $row['nama_dosen'] ?></h3>
                      <?php } ?>

                      <!-- <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> 
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> 
                        </li>
                      </ul> -->
                      <?php if( $this->session->flashdata('sukses') ){ ?>
                      <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('sukses'); ?>
                      </div>
                      <?php } ?>
                      <?php if( $this->session->flashdata('msg') ){ ?>
                      <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('msg'); ?>
                      </div>
                      <?php } ?>
                      <br />
                      <br><br><br><br>
                      
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Change Password</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Change Picture</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                           <div class="col-md-12">
                               <table width="100%">
                                    <?php foreach($foto as $row){ ?>
                                    <tr style="border-bottom:1px solid #eee;">
                                        <th style="padding:10px;">NIDN</th>
                                        <td><?= $row['NIDN'] ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #eee;">
                                        <th style="padding:10px;">Nama  Dosen</th>
                                        <td><?= $row['nama_dosen'] ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #eee;">
                                        <th style="padding:10px;">Email</th>
                                        <td><?= $row['email'] ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #eee;">
                                        <th style="padding:10px;">Jabatan</th>
                                        <td>
                                            <?php if( $row['role'] == 1 ){ ?>
                                                Dosen Admin
                                            <?php }else{ ?>
                                                Dosen Pengajar
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?> 
                               </table>
                           </div>
                          
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <form action="<?= base_url().'siakad/gantipassworddosen/' ?>" method="post">
                           <!-- start user projects -->
                           <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Password Baru <span class="required" style="margin-bottom:20px;">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="password" name="password" required="required" placeholder="Input Password" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group"style="margin-top:20px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"style="margin-top:10px;" for="email">Konfirmasi Password<span class="required" >*</span>
                                </label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-top:10px;">
                                    <input type="password" name="password2" required="required" placeholder="Input Password" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <button id="send" name="submit" type="submit" class="btn btn-success" style="margin-left:230px; margin-top:10px;">Submit</button>
                            <!-- end user projects -->
                          </div>
                          </form>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                              <form action="<?= base_url().'siakad/updatephotodosen' ?>" method="post" enctype="multipart/form-data">
                                <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Photo<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="foto" required="required" type="file">
                                  </div>
                                </div>
                                <button id="send" name="submit" type="submit" class="btn btn-success">Submit</button>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->