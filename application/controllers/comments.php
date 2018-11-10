<?php
class Comments extends CI_Controller
{
    public function create($post_id){
  	$slug = $this->input->post('slug');
  	$data['post'] = $this->post_model->get_posts($slug);
    $data['comments'] = $this->comment_model->get_comments($post_id);

  	$this->form_validation->set_rules('name', 'Name', 'required');
  	$this->form_validation->set_rules('email', 'Email', 'required');
  	$this->form_validation->set_rules('email', 'Email', 'valid_email');
  	$this->form_validation->set_rules('body', 'Body', 'required');

  	if ($this->form_validation->run() === FALSE) {
  		 $this->load->view('templetes/header');
		   $this->load->view('posts/view', $data);
		   $this->load->view('templetes/footer');
  	   }else{
  	  	$this->comment_model->create_comment($post_id);
  		  redirect('posts/'.$slug);
  	}
  }
}