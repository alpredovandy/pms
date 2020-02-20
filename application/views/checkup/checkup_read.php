<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Checkup Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Id Pasien</td><td><?php echo $id_pasien; ?></td></tr>
	    <tr><td>Keluhan</td><td><?php echo $keluhan; ?></td></tr>
	    <tr><td>Hasil Tensi</td><td><?php echo $hasil_tensi; ?></td></tr>
	    <tr><td>Suhu</td><td><?php echo $suhu; ?></td></tr>
	    <tr><td>Hasil Analisa</td><td><?php echo $hasil_analisa; ?></td></tr>
	    <tr><td>Sistol</td><td><?php echo $sistol; ?></td></tr>
	    <tr><td>Distol</td><td><?php echo $distol; ?></td></tr>
	    <tr><td>Denyut Jantung</td><td><?php echo $denyut_jantung; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('checkup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>