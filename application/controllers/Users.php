<?php
class Users extends CI_Controller
{
	//user register
  public function register(){
  	$data['title'] = 'Sign Up';
  	$this->form_validation->set_rules('name','Name', 'required');
  	$this->form_validation->set_rules('username','Username', 'required|callback_check_username_exists');
  	$this->form_validation->set_rules('email','Email', 'required');
  	$this->form_validation->set_rules('password','Password', 'required');
  	$this->form_validation->set_rules('password2','Confirm Password', 'matches[password]');

  	 if ($this->form_validation->run() === FALSE) {
  	 	$this->load->view('templetes/header');
  	 	$this->load->view('users/register', $data);
  	 	$this->load->view('templetes/footer');
  	 }else{
  	 	//encript password
  	 	$enc_password = md5($this->input->post('password'));
  	 	$this->user_model->register($enc_password);
  	 	//set message
  	 	$this->session->set_flashdata('user_registered','now you are registred now you can login it');
  	 	redirect('posts');
  	 }
  }
  //user login 
     public function login(){
     $data['title'] = 'Sign in';
      $this->form_validation->set_rules('username','Username', 'required');
      $this->form_validation->set_rules('password','Password', 'required');
     if ($this->form_validation->run() === FALSE) {
      $this->load->view('templetes/header');
      $this->load->view('users/login', $data);
      $this->load->view('templetes/footer');
     }else{
      //get username
      $username = $this->input->post('username');
      //get and encrypt the password
      $password = md5($this->input->post('password'));
      //login user
      $user_id = $this->user_model->login($username, $password);
      if ($user_id) {
          //create session
         $user_data = array(
          'user_id' => $user_id,
          'username' => $username,
          'logged_in' => true
         );
         $this->session->set_userdata($user_data);
         //set message
         $this->session->set_flashdata('user_loggedin','now you are logged in');
         redirect('posts');
       }else{
      //set messsge
      $this->session->set_flashdata('login-failed','login is invalid');
       redirect('users/login?failed');
   }
  }
}
// log user out
public function logout(){
  //unset user data
  $this->session->unset_userdata('logged_in');
  $this->session->unset_userdata('user_id');
  $this->session->unset_userdata('username');
  //set message
  $this->session->set_flashdata('user_loggedout','now you are logged out');
  redirect('users/login');
}
  //check if username exists
  function check_username_exists($username){
    $this->form_validation->set_message('check_username_exists','that username taken.please choose a different one');
    if ($this->user_model->check_username_exists($username)) {
      return true;
    }else{
      return false;
    }
  }
   //check if email exists
  function check_email_exists($email){
  	$this->form_validation->set_message('check_email_exists','that email taken.please choose a different one');
  	if ($this->user_model->check_email_exists($email)) {
  		return true;
  	}else{
  		return false;
  	}
  }
}
?>