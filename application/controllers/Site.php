<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model'); 
	}
	
	public function index()
	{
		$this->load->helper('URL');
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(isset($is_logged_in) && $is_logged_in ==true ) { redirect(BASE.'site/action/');}
		else {redirect(BASE.'site/login/');}
	}
	public function login($pg="",$id="")
	{
		$data['title']="Login | ".APPNAME;
		$data['message']="";
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(isset($is_logged_in) && $is_logged_in ==true ) { redirect(BASE);}
		if($this->input->post('sign_in')) 
		{
			$query=$this->site_model->login('at_users');
			if(!isset($_POST["email"]) || !isset($_POST["password"]) ) {die;}
			$pass=md5($_POST["password"]);
			$q=$this->db->query("SELECT *FROM at_users where (email='$_POST[email]' and password='$pass') OR (username='$_POST[email]' and password='$pass') ");
			foreach ($q->result() as $row)
			{
				$user_id=$row->user_id;
				$application_id=1;
				$fullname=$row->firstname." ".$row->lastname;
				$fistname=$row->firstname;
				$lastname=$row->lastname;
				$email=$row->email;
				$query=TRUE;
			}
			if($query==TRUE) {
				$data_session=array (
					'email'=>$email,
					'is_logged_in'=>true,
					'fullname'=>$fullname,
					'user_id'=>$user_id
				);
				$this->session->set_userdata($data_session);
				$this->load->helper('URL');
				redirect(BASE.'site/action/');
			} else{
				$this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'><b>Oops! Something wrong.</b> Invalid username or password.</div>");
				redirect(BASE.'site/login');
			}
		} 
		
		$this->load->view('header',$data);
		$this->load->view('login',$data);
		$this->load->view('footer',$data);
	}
	
	public function ajax($pg="",$q="")
	{
		if($pg=="campus"){
			$term = $this->input->get('q');
			$q=$this->db->query("SELECT campus_id,campus_name FROM st_campus WHERE campus_name LIKE '%$term%';")->result();
			echo json_encode($q);
		}
	}

	public function tracker($action_id="")
	{
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)) {redirect(BASE.'site/login/');}
		
		$data['title']="Visitor Behavior | ".APPNAME;
		$data['action_id']=$action_id;
		$data['action_list']=$this->db->query("SELECT * FROM at_actions")->result();
		$user_id=$this->session->userdata('user_id');
		$this->load->view('header',$data);
		//if($this->session->userdata('level')!="admin"){ die; }
		$this->load->view('behavior/visitor_activity',$data);
		$this->load->view('footer',$data);
	}
	
	public function action($action_id="")
	{
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)) {redirect(BASE.'site/login/');}
		
		$data['title']="Action | ".APPNAME;
		$user_id=$this->session->userdata('user_id');
		$this->load->view('header',$data);
		$this->load->view('behavior/action',$data);
		$this->load->view('footer',$data);
	}
	
	public function track($action_code="")
	{
		if($action_code==""){ echo "invalid parameter"; die;}
		$action_id="";
		$action=$this->db->query("SELECT *FROM at_actions where action_code='$action_code'")->row();
		if($action==""){ echo "invalid parameter"; die;}
		else { $action_id=$action->action_id; }
		
		
		$ipaddress=$platform=$country=$city=$org=$isp="";
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
	
		if($ipaddress="212.34.22.177"){ die;}
		
		$geo = unserialize(file_get_contents("http://ip-api.com/php/$ipaddress"));
		if($geo && $geo['status'] == 'success') {
			$country = $geo["country"];
			$city = $geo["regionName"].", ".$geo["city"];
			$org = $geo["org"];
		}

		if(!$this->agent->is_robot()) {
			if ($this->agent->is_browser()){ $agent = $this->agent->browser().' '.$this->agent->version(); }
			elseif ($this->agent->is_mobile()){ $agent = $this->agent->mobile(); }
			else {$agent = 'Unidentified User Agent'; }
			
			$platform=$this->agent->platform(); 
			if($platform!="Unknown Platform"){
				$is_logged_in=$this->session->userdata('is_logged_in');
				if(!isset($is_logged_in) || $is_logged_in !=true ) { $log_user_id=0; } 
				else { $log_user_id=$this->session->userdata('user_id'); }
				
				if($log_user_id!=18 && $log_user_id!=2) {
					$category=ltrim($_SERVER['REQUEST_URI'], '/');
					$full_url=base_url().ltrim($_SERVER['REQUEST_URI'], '/');
					
					$created_date=date('Y-m-d H:i:s');
					$behaviour_log = array(
					   'action_id' => $action_id,
					   'created_date' => $created_date,
					   'ip_address' => $ipaddress,
					   'platform' => $platform,
					   'browser' => $agent,
					   'country' => $country,
					   'city' => $city,
					   'org' => $org
					);
					$this->db->insert('at_tracks', $behaviour_log);
				}
			}
		}
	}
	
	
	public function data_table($option=null,$id=null,$additional=null)
	{
		$this->load->library('Datatables');
		$user_id=$this->session->userdata('user_id');
		$sWhere="";
		if($option=="visitor_activity") {
			if($id!=""){
				$sWhere=" WHERE ac.action_id='$id' "; 
			}
			$sql="
				SELECT 
					tr.*,
					ap.application_name,
					ac.action_name,
					ac.action_category
				FROM at_tracks tr
				JOIN at_actions ac ON ac.action_id=tr.action_id
				JOIN at_applications ap ON ap.application_id=ac.application_id
					$sWhere 
				ORDER BY track_id DESC";
			$this->datatables->set_custom_query($sql);
			$this->datatables->select( 'created_date, action_category, action_name, ip_address, platform, browser, country, city, org, track_id as action' );
			echo $this->datatables->generate();
		}
		else if($option=="action") {
			if($additional!=""){
				$sWhere=" WHERE application_id='$application_id' "; 
			}
			$sql="
				SELECT 
					ac.*,
					ap.application_name,
					(SELECT count(*) FROM at_tracks at WHERE at.action_id=ac.action_id) hits
				FROM at_actions ac 
				JOIN at_applications ap ON ap.application_id=ac.application_id
					$sWhere 
				ORDER BY ac.action_id DESC";
			$this->datatables->set_custom_query($sql);
			$this->datatables->select( 'action_category, action_name, action_desc, hits, action_id' );
			echo $this->datatables->generate();
		}
	}
	
	public function logout()
	{	$this->session->sess_destroy();
		redirect(BASE);
	}

	public function is_logged_in()
	{	$is_logged_in=$this->session->userdata('is_logged_in');
		$level=$this->session->userdata('level');
		
		if(!isset($is_logged_in) || $is_logged_in !=true )
		{
			$this->session->sess_destroy();
			$data['heading']="Access denied";
			$data['message']="You must login to access this page.  
			<a href='".BASE."'>login</a>";
			show_error($data);
			die();
		}
	}
}