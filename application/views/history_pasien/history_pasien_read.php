<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>History pasien Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Id Pasien</td><td><?php echo $id_pasien; ?></td></tr>
	    <tr><td>Id Dokter</td><td><?php echo $id_dokter; ?></td></tr>
	    <tr><td>Id Ruangan</td><td><?php echo $id_ruangan; ?></td></tr>
	    <tr><td>Jumlah Infus</td><td><?php echo $jumlah_infus; ?></td></tr>
	    <tr><td>Ekg</td><td><?php echo $ekg; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('history_pasien') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>