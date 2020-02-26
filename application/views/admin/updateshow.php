<?php $this->load->view('admin/include/head.php') ?>

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  
                  <button type="button" class="btn btn-primary">
                    Update Pegawai
                  </button>

                  
                  <br><br>

                  <div class="row justify-content-center">
                        <div class="col-6">
                        <form action="<?php base_url()?>/ekepegawaian/departement/dashboard/update" method="POST">
                            <div class="modal-body">   

                              <div class="form-group">
                                <label>Nomor Induk Kepegawaian</label>
                                <input type="text" class="form-control" name="nik" value="<?php echo $detail->nik  ?>">
                              </div>

                              <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" name="nm_pegawai" value="<?php echo $detail->nm_pegawai  ?>">
                              </div>

                              <div class="form-group">
                                <label> Password</label>
                                <input type="text" class="form-control" name="password" value="<?php echo $detail->password ?>">
                              </div>

                              <div class="form-group">
                                <label>departement</label>
                                <input type="text" class="form-control" name="departement_id" value="<?php echo $detail->departement_id  ?>">
                              </div>
                                
                              <div class="form-group">
                                <label>departement</label>
                                <input type="text" class="form-control" name="jabatan_id" value="<?php echo $detail->jabatan_id  ?>">
                              </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>

                        </div>


                        </div>


                </div>

                 


  <!-- Button trigger modal -->

              </div>
            </div>
           
          </div>
        </div>
        
      </div>
      
    </div>
  </div>



  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url() ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->

  <script src="<?php echo base_url() ?>assets/js/argon.js?v=1.2.0"></script>
</body>

</html>

