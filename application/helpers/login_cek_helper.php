<?php  

function cek_login()
{
	$ci = get_instance();

	$v_username = $ci->session->userdata('id_username');
	if (!$v_username) {
		redirect('c_login');
	}else {
		$role_bidang = $ci->session->userdata('role');
		$menu = $ci->uri->segment(1);

		if ($role_bidang == 2 && ($menu == 'c_admin' || $menu == 'c_bidang')) {
			redirect('c_login/blocked');
		}

		
	}

}