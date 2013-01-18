<?php
/**
* 
*/
class Main extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$data['main_content']='main_page';
		$this->load->view('includes/template',$data);
	}
}