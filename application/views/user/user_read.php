<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>User Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Jk</td><td><?php echo $jk; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Nama Keluarga</td><td><?php echo $nama_keluarga; ?></td></tr>
	    <tr><td>Alamat Keluarga</td><td><?php echo $alamat_keluarga; ?></td></tr>
	    <tr><td>Email Keluarga</td><td><?php echo $email_keluarga; ?></td></tr>
	    <tr><td>No Hp Keluarga</td><td><?php echo $no_hp_keluarga; ?></td></tr>
	    <tr><td>Role</td><td><?php echo $role; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>