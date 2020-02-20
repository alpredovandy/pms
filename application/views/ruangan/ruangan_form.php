<?php $this->load->view('templates/header');?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Ruangan</h1>
            <div class="section-header-breadcrumb">
                
              </div>
          </div>
          <!-- //-------------------------Isi---------------------------------- -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tambah Data</h4>
              </div>
              <div class="card-body">
                <div class="alert alert-info">
                  <b>Data</b> Ruangan
                </div>
                <form action="<?php echo site_url('ruangan/create_action') ?>" method="POST">
                    
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">
                        <label>Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" value="<?php if(isset($nama_ruangan)){echo $nama_ruangan;} ?>" class="form-control">
                      </div></div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>No Ruangan</label>
                        <input type="text" name="nomor_ruangan" value="<?php if(isset($nomor_ruangan)){echo $nomor_ruangan;} ?>" class="form-control">
                      </div> </div>
                      <div class="col-md-4">
                            <div class="form-group">
                            <label>Kapasitas Ruangan</label>
                            <input type="text" name="kapasitas" value="<?php if(isset($kapasitas)){echo $kapasitas;} ?>" class="form-control">
                          </div> </div>
                </div>
                             
                   
              
              <div class="card-footer text-right">
                <input class="btn btn-primary mr-1" type="submit" value="Submit">
                <button class="btn btn-secondary" type="reset">Reset</button>
              </div>

              </form>
            </div>
           
          </div>
          
          <!-- //-------------------------End ISi------------------------------ -->
        </section>
      </div><?php $this->load->view('templates/footer');?>