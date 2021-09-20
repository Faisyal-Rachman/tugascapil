<?php


class LoginWithGooglePlus extends MY_Controller{
	
	public function index(){
		$data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
        $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
       
		if (isset($_POST['submit']))
		{
			$username = $this->input->post('a',TRUE);
			$password = $this->input->post('b',TRUE);
			$cek = $this->Public_model->cek_login($username,$password,'ortu_kk');
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0){
			$this->session->set_userdata(array('kk_ortu'=>$row['kk_ortu']));
					redirect('profile');
			}else{
				echo $this->session->set_flashdata('message', '<div class="alert alert-danger"><center>Username dan Password Salah!!</center></div>');
				redirect('login/index');
			}
		}
	}
	
	public function profile(){
		if($this->session->userdata('kk_ortu') == true)
		{
			$showuser = $this->session->userdata('kk_ortu');
			$data['uinfo'] = $this->Public_html->usershow($showuser);
			$this->load->view('profile',$data);
		}
		else
		{
			redirect('');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('');
	}
}//class ends here
