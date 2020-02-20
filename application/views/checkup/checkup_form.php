<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Checkup <?php echo $button ?></h2>
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
            <label for="keluhan">Keluhan <?php echo form_error('keluhan') ?></label>
            <textarea class="form-control" rows="3" name="keluhan" id="keluhan" placeholder="Keluhan"><?php echo $keluhan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Hasil Tensi <?php echo form_error('hasil_tensi') ?></label>
            <input type="text" class="form-control" name="hasil_tensi" id="hasil_tensi" placeholder="Hasil Tensi" value="<?php echo $hasil_tensi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Suhu <?php echo form_error('suhu') ?></label>
            <input type="text" class="form-control" name="suhu" id="suhu" placeholder="Suhu" value="<?php echo $suhu; ?>" />
        </div>
	    <div class="form-group">
            <label for="hasil_analisa">Hasil Analisa <?php echo form_error('hasil_analisa') ?></label>
            <textarea class="form-control" rows="3" name="hasil_analisa" id="hasil_analisa" placeholder="Hasil Analisa"><?php echo $hasil_analisa; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Sistol <?php echo form_error('sistol') ?></label>
            <input type="text" class="form-control" name="sistol" id="sistol" placeholder="Sistol" value="<?php echo $sistol; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Distol <?php echo form_error('distol') ?></label>
            <input type="text" class="form-control" name="distol" id="distol" placeholder="Distol" value="<?php echo $distol; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Denyut Jantung <?php echo form_error('denyut_jantung') ?></label>
            <input type="text" class="form-control" name="denyut_jantung" id="denyut_jantung" placeholder="Denyut Jantung" value="<?php echo $denyut_jantung; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_checkup" value="<?php echo $id_checkup; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('checkup') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>