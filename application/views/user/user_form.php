<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>User <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Perawat</h1>
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
                  <form action="<?php echo $action; ?>" method="POST">
                  <input type="hidden" value="<?php if(isset($role)){echo $role;} ?>" name="role">
                  <input type="hidden" value="<?php if(isset($id_user)){echo $id_user;} ?>" name="id_user">
                <div class="alert alert-info">
                  Masukkan data dengan baik dan benar
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?php if(isset($nama)){echo $nama;} ?>" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" value="<?php if(isset($no_hp)){echo $no_hp;} ?>" class="form-control">
                      </div></div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php if(isset($email)){echo $email;} ?>" class="form-control">
                      </div> </div>
                </div>     
                <div class="form-group">
                  <label class="d-block">Jenis Kelamin</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" checked="">
                    <label class="form-check-label" for="exampleRadios1">
                      Laki-laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" checked="">
                    <label class="form-check-label" for="exampleRadios2">
                      Perempuan
                    </label>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>" class="form-control">
                          </div> 
                    </div>
                    <div class="col-md-6"><div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php if(isset($password)){echo $password;} ?>" class="form-control">
                      </div> </div>
                </div>
                <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" value="<?php if(isset($foto)){echo $foto;} ?>" class="form-control">
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
      </div>
	<?php $this->load->view('templates/footer');?>