<?php $this->load->view('admin/include/head.php') ?>


<!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3> Daftar Departement </h3>
                  
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Departement
                  </button>

                  
                  <br><br>

                </div>
                <?php if($this->session->flashdata('edit')): ?>
                    <?php if($this->session->flashdata('edit') == TRUE): ?>
                          <div class="alert alert-success">Berhasil update data departement</div>
                    <?php elseif($this->session->flashdata('edit') == FALSE): ?>
                          <div class="alert alert-danger">Gagal update data departement</div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('tambah')): ?>
                    <?php if($this->session->flashdata('tambah') == TRUE): ?>
                          <div class="alert alert-success">Berhasil tambah data departement</div>
                    <?php elseif($this->session->flashdata('tambah') == FALSE): ?>
                          <div class="alert alert-danger">Gagal tambah data departement</div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('hapus')): ?>
                    <?php if($this->session->flashdata('hapus') == TRUE): ?>
                          <div class="alert alert-success">Berhasil hapus data departement</div>
                    <?php elseif($this->session->flashdata('hapus') == FALSE): ?>
                          <div class="alert alert-danger">Gagal hapus data departement</div>
                    <?php endif; ?>
                <?php endif; ?>

                  <table class="table">
                    <thead style="background: #5e72e4 !important; color: #fff;">
                      <tr>
                        <th scope="col">Id Departement</th>
                        <th scope="col">Nama Departement</th>
                        <th scope="col">Keterangan</th>
                        <th> Action </th>
                      </tr>
                    </thead>

                    <?php foreach ($depart as $d) {
                    

                        echo " 
                        <tbody>
                          <td> $d->id_departement </td>              
                          <td> $d->nm_departement</td>
                          <td> $d->keterangan </td>
                          
                          <td>
                            <a href='".site_url('admin/dashboard/delete_depart/'.$d->id_departement)."' class='btn btn-danger'> Hapus </a>
                            <a href='".site_url('admin/dashboard/updateshow_depart/'.$d->id_departement)."' class='btn btn-primary'> Edit </a>
                            
                          </td>
                          </tbody>
                        ";
                    
                    
                    
                  }  ?>
                  </table>


  <!-- Button trigger modal -->

              </div>
            </div>
           
          </div>
        </div>
        
      </div>
      
    </div>
  </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Departement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?php base_url()?>dashboard/tambah_depart" method="POST">
      <div class="modal-body">    
          <input type="text" class="form-control" name="nm_departement" placeholder="Nama Departement">
          <br>
          <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
          <br>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
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
  <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script>


  <script src="<?php echo base_url() ?>assets/js/argon.js?v=1.2.0"></script>
</body>

</html>

