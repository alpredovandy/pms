<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>History pasien <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Pasien <?php echo form_error('id_pasien') ?></label>
            <input type="text" class="form-control" name="id_pasien" id="id_pasien" placeholder="Id Pasien" value="<?php echo $id_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Dokter <?php echo form_error('id_dokter') ?></label>
            <input type="text" class="form-control" name="id_dokter" id="id_dokter" placeholder="Id Dokter" value="<?php echo $id_dokter; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Ruangan <?php echo form_error('id_ruangan') ?></label>
            <input type="text" class="form-control" name="id_ruangan" id="id_ruangan" placeholder="Id Ruangan" value="<?php echo $id_ruangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Infus <?php echo form_error('jumlah_infus') ?></label>
            <input type="text" class="form-control" name="jumlah_infus" id="jumlah_infus" placeholder="Jumlah Infus" value="<?php echo $jumlah_infus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ekg <?php echo form_error('ekg') ?></label>
            <input type="text" class="form-control" name="ekg" id="ekg" placeholder="Ekg" value="<?php echo $ekg; ?>" />
        </div>
	    <input type="hidden" name="id_history" value="<?php echo $id_history; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('history_pasien') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>