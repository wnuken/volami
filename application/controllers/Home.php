<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('GeneralModel');
	}

	public function index()
	{
		$data["view"] = "home";
		$this->load->view('template',$data);
	}

	public function admin()
	{
		if(is_numeric($this->session->rol) && $this->session->rol == 1){
			$data["view"] = "adminhome";
			$this->load->view('admin',$data);
		}else{
			$data["view"] = "admin";
			$this->load->view('admin',$data);
		}
		
	}

	public function validatelogin()
	{
		$params = $this->input->get(NULL, TRUE);

		if((isset($params['user']) && $params['user'] != '') && (isset($params['password']) && $params['password'])){
			$result = $this->GeneralModel->userValidate($params);

			if($result != NULL){
				$this->session->rol = $result['rol'];
				$this->session->id_user = $result['id_user'];
			}

			var_dump($result);
		}	

	}

	public function leave()
	{
		$this->session->sess_destroy();
		redirect('home/admin');
	}

	public function getvoluntaries()
	{
		$result = $this->GeneralModel->getVoluntaries();
		$response = array();

		foreach ($result as $key => $value) {
			$response['contentString'][$key]['title'] = $value['title'];
			$response['contentString'][$key]['image'] = $value['image'];
			$response['contentString'][$key]['info'] = $value['info'];
			$response['contentString'][$key]['contact'] = $value['contact'];
			$response['contentString'][$key]['voluntaries'] = $value['voluntaries'];
			$response['locations'][$key] = array('lat' => floatval($value['lat']),'lng' => floatval($value['lng']));
		}

		$data["data"] = $response;
		$this->load->view('/template/jsonresponse',$data);

	}

	public function savevoluntaries()
	{

		$params = $this->input->post(NULL, FALSE);
		$image = '';
		$result = 0;

		if(!isset($params['id_voluntaries']))
			$params['id_voluntaries'] = 0;

		if(isset($params['imagebase64'])){
			$params['image'] = $params['imagebase64'];
			unset($params['imagebase64']);
		}

		$result = $this->GeneralModel->setVoluntaries($params);

		$response = array(
			'result' => intval($result),
			'status' => 'OK',
			'image' => $params
			);

		$data["data"] = $response;
		$this->load->view('/template/jsonresponse',$data);

	}

	public function getadminvoluntaries()
	{		
		if(is_numeric($this->session->rol) && $this->session->rol == 1){
			$result = $this->GeneralModel->getVoluntaries();
			$data["data"] = $result;
			$this->load->view('/template/jsonresponse',$data);
		}
	}
}
