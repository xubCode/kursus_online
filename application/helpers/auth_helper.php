<?php 

function cek()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	}else{
		return true;	
	}	
}

