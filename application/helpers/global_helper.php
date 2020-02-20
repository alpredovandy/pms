<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '<li>
		<a href="'.site_url('checkup').'"><i class="fa fa-list fa-fw"></i> Checkup</a>
	</li><li>
		<a href="'.site_url('history_pasien').'"><i class="fa fa-list fa-fw"></i> History pasien</a>
	</li><li>
		<a href="'.site_url('ruangan').'"><i class="fa fa-list fa-fw"></i> Ruangan</a>
	</li><li>
		<a href="'.site_url('user').'"><i class="fa fa-list fa-fw"></i> User</a>
	</li>';
	}
