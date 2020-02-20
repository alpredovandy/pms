<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Ruangan Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Nama Ruangan</td><td><?php echo $nama_ruangan; ?></td></tr>
	    <tr><td>Nomor Ruangan</td><td><?php echo $nomor_ruangan; ?></td></tr>
	    <tr><td>Kapasitas</td><td><?php echo $kapasitas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ruangan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>