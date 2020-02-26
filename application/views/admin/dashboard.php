<?php $this->load->view('admin/include/head.php') ?>


<!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3> Daftar Staff </h3>
                  
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Register Staff
                  </button>

                  
                  <br><br>

                </div>
                <?php if($this->session->flashdata('edit')): ?>
                    <?php if($this->session->flashdata('edit') == TRUE): ?>
                          <div class="alert alert-success">Berhasil update data pegawai</div>
                    <?php elseif($this->session->flashdata('edit') == FALSE): ?>
                          <div class="alert alert-danger">Gagal update data pegawai</div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('register')): ?>
                    <?php if($this->session->flashdata('register') == TRUE): ?>
                          <div class="alert alert-success">Berhasil register data pegawai</div>
                    <?php elseif($this->session->flashdata('register') == FALSE): ?>
                          <div class="alert alert-danger">Gagal register data pegawai</div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('hapus')): ?>
                    <?php if($this->session->flashdata('hapus') == TRUE): ?>
                          <div class="alert alert-success">Berhasil hapus data pegawai</div>
                    <?php elseif($this->session->flashdata('hapus') == FALSE): ?>
                          <div class="alert alert-danger">Gagal hapus data pegawai</div>
                    <?php endif; ?>
                <?php endif; ?>

                  <table class="table">
                    <thead style="background: #5e72e4 !important; color: #fff;">
                      <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Jabatan</th>
                        <th> Action </th>
                      </tr>
                    </thead>

                    <?php foreach ($pegawai as $p) {
                    

                        echo " 
                        <tbody>
                          <td> $p->nik </td>              
                          <td> $p->nm_pegawai</td>
                          <td> $p->nm_departement </td>
                          <td> $p->jabatan </td>
                          
                          <td>
                            <a href='".site_url('departement/dashboard/delete/'.$p->nik)."' class='btn btn-danger'> Hapus </a>
                            <a href='".site_url('departement/dashboard/updateshow/'.$p->nik)."' class='btn btn-primary' > Edit </a>
                            
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
        <h5 class="modal-title" id="exampleModalLabel">Register Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?php base_url()?>dashboard/tambah_aksi" method="POST">
      <div class="modal-body">    
          <input type="number" class="form-control" name="nik" placeholder="Nik Pegawai">
          <br>
          <input type="text" class="form-control" name="nm_pegawai" placeholder="Nama Pegawai">
          <br>
          <input type="text" class="form-control" name="password" placeholder="Password Pegawai">
          <br>
          <select class="form-control" name="departement_id">
                  <option value=""> Pilih Departement </option>
                  <?php foreach ($depart as $d) { ?>
                    <option value="<?php echo $d->id_departement ?>"> <?php echo $d->nm_departement ?> </option>
                  <?php } ?>
          </select>
          <br>
          <select class="form-control" name="jabatan_id">
                  <option value=""> Pilih Jabatan </option>
                  <?php foreach ($jabatan as $j) { ?>
                    <option value="<?php echo $j->id_jabatan ?>"> <?php echo $j->jabatan ?> </option>
                  <?php } ?>
          </select>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Register</button>
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

