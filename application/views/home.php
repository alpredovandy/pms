<?php $this->load->view('templates/header');?>
        <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <img alt="image" src="https://image.flaticon.com/icons/svg/145/145862.svg" style="width:30px; height:30px; margin-right: 10px;" class="icon-menu"> 
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Pasien</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $this->db->query("select * from user where role='Pasien'")->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                <img alt="image" src="https://image.flaticon.com/icons/svg/122/122454.svg" style="width:30px; height:30px; margin-right: 10px;" class="icon-menu">
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Dokter</h4>
                  </div>
                  <div class="card-body">
                    
                  <?php echo $this->db->query("select * from user where role='Dokter'")->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                <img alt="image" src="https://image.flaticon.com/icons/svg/119/119044.svg" style="width:30px; height:30px; margin-right: 10px;" class="icon-menu">
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Perawat</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $this->db->query("select * from user where role='Perawat'")->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                <img alt="image" src="https://image.flaticon.com/icons/svg/2059/2059695.svg" style="width:30px; height:30px; margin-right: 10px;" class="icon-menu"> 
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Ruangan</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $this->db->query("select * from ruangan")->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </section>
      </div>
<?php $this->load->view('templates/footer'); ?>