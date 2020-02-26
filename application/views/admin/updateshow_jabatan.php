<?php $this->load->view('admin/include/head.php') ?>

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  
                  <button type="button" class="btn btn-primary">
                    Update Jabatan
                  </button>

                  
                  <br><br>

                  <div class="row justify-content-center">
                        <div class="col-6">
                        <form action="<?php base_url()?>/ekepegawaian/admin/dashboard/update_jabatan" method="POST">
                            <div class="modal-body">   

                                <input type="hidden" class="form-control" name="id_jabatan" value="<?php echo $detail->id_jabatan  ?>">


                              <div class="form-group">
                                <label>Nama Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="<?php echo $detail->jabatan  ?>">
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

