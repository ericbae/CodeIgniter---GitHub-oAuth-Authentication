<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
	}
	
	// get the github response and process
	public function gh_accept() {
		// get the code returned by github
		$code = $_GET['code'];
		
		// now let's post it to get the access token
		$response = $this->curl->simple_post('https://github.com/login/oauth/access_token', 
									 		  array('client_id' => $this->config->item('github_client_id'), 
									 	   	  		'client_secret' => $this->config->item('github_client_secret'), 
								 		   	  		'code' => $code));
		// get the access token value
		$access_token_arg = explode('&', $response);
		$access_token = explode('=', $access_token_arg[0]);
		$gh_res = json_decode($this->curl->simple_get('https://api.github.com/user?access_token='. $access_token[1]));
		print_r($gh_res);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */