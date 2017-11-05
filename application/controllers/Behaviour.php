<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Behavior extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model'); 
		$this->is_logged_in();
	}
	
	public function index()
	{
		redirect(BASE."manage/campus");
	}
	
	public function visitor_statistic($id="",$pg="")
	{
		$data['title']="Visitor Statistic | ".APPNAME;
		$user_id=$this->session->userdata('user_id');
		$this->load->view('header',$data);
		if($this->session->userdata('level')!="admin"){ die; }
		$this->load->view('behavior/visitor_statistic',$data);
		$this->load->view('footer',$data);
		
	
	}
	public function visitor_activity($week_number="")
	{
		$data['title']="Visitor Behavior | ".APPNAME;
		$data['week_number']=$week_number;
		$user_id=$this->session->userdata('user_id');
		$this->load->view('header',$data);
		if($this->session->userdata('level')!="admin"){ die; }
		$this->load->view('behavior/visitor_activity',$data);
		$this->load->view('footer',$data);
	}
	
	
	public function data_table($option=null,$id=null,$additional=null)
	{
		$this->load->library('Datatables');
		$user_id=$this->session->userdata('user_id');
		if($option=="visitor_activity") {
			if($additional!=""){
				$sWhere=" WHERE application_id='$application_id' "; 
			}
			$sql="
				SELECT 
					tr.*,
					ap.application_name,
					ac.action_name action_name
				FROM at_tracks tr
				JOIN at_actions ac ON ac.action_id=tr.action_id
				JOIN at_applications ap ON ap.application_id=ac.application_id
					$sWhere 
				ORDER BY track_id DESC";
			$this->datatables->set_custom_query($sql);
			
			
			//$this->datatables->set_custom_query("SELECT * FROM st_behavior ORDER BY behaviour_id DESC");
			$this->datatables->select( 'created_date, action_name,ip_address,platform,city,page, string_log, user_id,browser,org,country,behaviour_id as action' );
			echo $this->datatables->generate();
		}
	}
	
	public function is_logged_in()
	{	
		$is_logged_in=$this->session->userdata('is_logged_in');
		$level=$this->session->userdata('level');
		
		if(!isset($is_logged_in) || $is_logged_in !=true || $level!="admin")
		{
		$data['heading']="akses ditolak";
		$data['message']="maaf anda harus login terlebih dahulu 
		<a href='".BASE."site/login'>login</a>";
		show_error($data);
		die();}
	}
	
}
