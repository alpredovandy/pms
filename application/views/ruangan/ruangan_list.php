<?php $this->load->view('templates/header');?>
       <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Ruangan</h1>
            <div class="section-header-breadcrumb">
                
            <a href="<?php echo site_url('ruangan/create') ?>" class="btn btn-primary text-right">Tambah Ruangan</a>
              </div>
          </div>
          <table class="table table-hover table-resposive table-condensed">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">No Ruangan</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $users=$this->db->query("select * from ruangan")->result();
            foreach ($users as $key => $value) {
            ?>
              <tr>
                <th scope="row"><?php echo $key+1; ?></th>
                <td><?php echo $value->nama_ruangan;?></td>
                <td><?php echo $value->nomor_ruangan;?></td>
                <td><?php echo $value->kapasitas; ?></td>
                <td class="btext-white"><a href="<?php echo site_url('ruangan/update/'.$value->id_ruangan); ?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a> <a href="<?php echo site_url('ruangan/delete/'.$value->id_ruangan); ?>" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a></td>
              </tr>
            <?php } ?>
             
            </tbody>
          </table>   
        </section>
      </div><?php $this->load->view('templates/footer'); ?>