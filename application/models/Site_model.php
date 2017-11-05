<?php
class Site_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function convert_emoji($data){
		foreach(array_keys($data) as $key){
			//$data[$key] = iconv('UTF-8','ISO-8859-9', $data[$key]);
			//$data[$key] = utf8_encode($data[$key]);
			if($data[$key]!=NULL) {
				$data[$key]=preg_replace_callback('/./u', function (array $match) {
					return strlen($match[0]) >= 4 ? null : $match[0];
				}, $data[$key]);
			}
			//$data[$key]=iconv(mb_detect_encoding($data[$key], mb_detect_order(), true), "UTF-8", $data[$key]);

			//$data[$key] = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $data[$key]);
		}
		return ($data);
	}
	public function login($table){
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query=$this->db->get($table);
		if ($query->num_rows>0){
			return true;
		} else{
			return false;
		}
	}
	public function get_table_pg($table,$num, $offset,$order,$by){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($order,$by); 
		$this->db->limit($num,$offset);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_table_pg_where($table,$num, $offset,$order,$by, $col,$id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($col, $id); 
		$this->db->order_by($order,$by); 
		$this->db->limit($num,$offset);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_table($tabel){
		$this->db->select('*');
		$this->db->from($tabel);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_table_order($tabel,$order,$by){
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->order_by($order,$by); 
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_table_distict_order($tabel,$distinc,$order,$by){
		$this->db->select($distinc);
		$this->db->distinct();
		$this->db->from($tabel);
		$this->db->order_by($order,$by); 
		$query=$this->db->get();
		return $query->result();
	}
	
	public function insert_data($data,$tabel){
		$data = $this->convert_emoji($data);
		$this->db->trans_start();
		$this->db->insert($tabel,$data);
		$insert_id=$this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	public function get_data_by_id($tabel,$kolom,$id){
		$this->db->select('*');
		$this->db->where($kolom,$id);
		$this->db->from($tabel);
		$query=$this->db->get();
		return $query->result();
	}
	public function search_data_by_id($tabel,$kolom,$id){
		$this->db->select('*');
		$this->db->like($kolom,$id);
		$this->db->from($tabel);
		$query=$this->db->get();
		return $query->result();
	}
	public function update_data_by_id($tabel,$kolom,$id,$data){
		//$data = array_map("utf8_encode", $data );
		$data = $this->convert_emoji($data);
		$this->db->trans_start();
		$this->db->where($kolom,$id);
		$this->db->update($tabel,$data);
		$this->db->trans_complete();
	}
	public function delete_data_by_id($tabel,$kolom,$id){
		$this->db->where($kolom,$id);
		$this->db->delete($tabel);
	}
		
	public function send_email($s,$m,$to){
		$config['protocol']='smtp';  
		$config['smtp_host']='ssl://smtp.googlemail.com';  
		$config['smtp_port']='465';  
		$config['smtp_timeout']='30';  
		$config['smtp_user']='f@gmail.com';  
		$config['smtp_pass']='f'; 
		$config['charset']='ANSI';  
		$config['newline']="\r\n"; 
		$this->load->library('email',$config);
			
		$this->email->from('d@gmail.com', 'KOMINFO');
		$this->email->to($to);
		$this->email->subject($s);
		$this->email->message($m);
	   
		if($this->email->send()){
			return TRUE;
		}else{			
			//show_error($this->email->print_debugger());
		}
	}
}	
?>