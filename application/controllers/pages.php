<?php 
class pages extends CI_controller
{
	
 public function view($page = 'home')
	{
	if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			show_404();
		}
		$data['title'] = ucfirst($page);
		$this->load->view('templetes/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templetes/footer');	
	}
}