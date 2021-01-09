<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

/**
    * URL: http://localhost/CodeIgniter-JWT-Sample/auth/token
		* Method: GET
		
    * code method API response
    * https://restfulapi.net/http-methods/ 
*/

class Auth extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->config('jwt');
	}

	public function index_get()
	{
		# create token example
		$data['status'] = true;
		$data['message'] = 'success';

		$data['id'] = 1;
		$data['token'] = AUTHORIZATION::generateToken($data);

		$this->response($data);
	}

	public function index_post()
	{
		# example token data response
		$headers = $this->input->request_headers();
		if (array_key_exists('authorization', $headers) && !empty($headers['authorization'])) {
			$decodedToken = AUTHORIZATION::validateToken($headers['authorization']);
			if ($decodedToken != false) {
				$this->response($decodedToken, REST_Controller::HTTP_OK);
			}
		}

		$this->response("Unauthorised", REST_Controller::HTTP_UNAUTHORIZED);

	}

}

/* End of file Auth.php */
/* Location: ./application/modules/api/v1/controllers/Auth.php */