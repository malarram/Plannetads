<?php
class Admin extends CI_Controller
{
/**************Planetads Functions start******************/
	
/*index function start*/
public function index()
{
  $this->load->view('home');
}	
/*index function end*/

/*****User List Function Start*******/
public function user_registeration()
{
	if($this->input->post())
	{
		$name=trim($this->input->post('name'));
		$email=trim($this->input->post('email'));
		$password=md5(trim($this->input->post('password')));
		$date=date('Y-m-d');
		$this->load->helper('string');
		$email_verification_code=random_string('alnum',20);
		$status='no';
			
			$data = array(
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'date' => $date,
			'email_verification_code' => $email_verification_code,
			'status' => $status
			);
		$this->load->model('admin_model');
		$is_valid=$this->admin_model->user_registeration_check($email);//it checks whether the given email is exist?or not?
		if($is_valid)
		{//already exist
			$msg = array("exist"=>"exist");
			echo json_encode($msg);die;
		}
		else
		{//New email id.Register function done here.
			$user_register=$this->admin_model->user_registeration($data);
			if($user_register==1)
			{
				$msg = array("success"=>"success");
				echo json_encode($msg);die;
			}
			else
			{
				$this->session->set_flashdata('error', 'The data not inserted');
			}
		}
	}
	
	  
	}
	/*****User List Function End*******/
  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   /*dashboard function  */
   public function dashboard()
   {
      
      $this->load->view('admin/dashboard');
   }
      
   
   /*profile function  */
   public function profile()
   {  
	 if($this->input->post())
     {
		$oldpassword = $this->__encrip_password($this->input->post('oldpassword'));
		$newpassword = $this->__encrip_password($this->input->post('newpassword'));
		$admin_id = $this->session->userdata('admin_id');
		$is_valid = $this->admin_model->checkoldpassword($admin_id,$oldpassword);
		if($is_valid)
		{
			$this->admin_model->updatepassword($admin_id,$newpassword);
			$this->session->set_flashdata('flashSuccess', 'Password updated successfully');
			redirect('admin/profile');
		}
		else
		{
			$this->session->set_flashdata('flashfailure', 'Invalid Old password');
			redirect('admin/profile');
		}
	  }
	  $this->load->view('admin/profile');
   }
   
   /*function to format date form dd/mm/yy to yy-mm-dd*/
   public function __format_date($src_date)
   {
	   if($src_date!='')
		{
			$explode = explode('/',$src_date);
			$res_date = $explode[2].'-'.$explode[1].'-'.$explode[0];
		}
		else{
			$res_date = '';
		}
		return $res_date;
	   
   }
   
   public function admin_entry(){
	   if($this->input->post())
      {
        $data = array(
			'game_type' => $this->input->post('game_type'),
			'date' => $this->__format_date($this->input->post('date')),
			'ball_1' => $this->input->post('ball_1'),
			'ball_2' => $this->input->post('ball_2'),
			'ball_3' => $this->input->post('ball_3'),
			'ball_4' => $this->input->post('ball_4')
        );
		$this->admin_model->add_admin_entry($data);
        $this->session->set_flashdata('msg', 'Added successfully');
        redirect('admin/admin_entry');
     }
     $this->load->view('admin/admin_entry');		
   }
   
   public function list_admin_entries()
   {   
	   $order = "DESC";
		if($this->input->post())
		 {
			 $game_type = $this->input->post('game_type');
			 $search_term = $this->input->post('search_term');
			 $data = array(
				'game_type' => $this->input->post('game_type'),
				'search_term' => $this->input->post('search_term'),
				'ball_no' => $this->input->post('ball_no')
			 );
			 $data1['details_result'] = $this->admin_model->list_admin_entries_filter($order,$data);
			 $data['details'] = $data1['details_result']->result_array();
		 }
		 else{
				
				$data['details'] = $this->admin_model->list_admin_entries($order);
		 }
	   
	   
	   $this->load->view('admin/list_admin_entry',$data);
   }
   public function pick3_entries()
   {   
	   $order = "DESC";
		if($this->input->post())
		 {
			// $game_type = $this->input->post('game_type');
			 $search_term_1 = $this->input->post('search_term_1');
			 $search_term_2 = $this->input->post('search_term_2');
			 $data = array(
				//'game_type' => $this->input->post('game_type'),
				'search_term_1' => $this->input->post('search_term_1'),
				'search_term_2' => $this->input->post('search_term_2')
			 );
			 $data1['details_result'] = $this->admin_model->pick3_entries_filter($order,$data);
			 //echo $this->db->last_query();
			
			 $data['details'] = $data1['details_result']->result_array();
		 }
		 else{
				
				$data['details'] = $this->admin_model->list_admin_entries($order);
		 }
	   
	   
	   $this->load->view('admin/list_admin_entry',$data);
   }
    public function pick4_entries()
   {   
	   $order = "DESC";
		if($this->input->post())
		 {
			 $game_type = $this->input->post('game_type');
			 $search_term = $this->input->post('search_term');
			 $data = array(
				//'game_type' => $this->input->post('game_type'),
				'search_term_1' => $this->input->post('search_term_1'),
				'search_term_2' => $this->input->post('search_term_2'),
				'search_term_3' => $this->input->post('search_term_3'),
				
			 );
			 $data1['details_result'] = $this->admin_model->pick4_entries_filter($order,$data);
			 $data['details'] = $data1['details_result']->result_array();
		 }
		 else{
				
				$data['details'] = $this->admin_model->list_admin_entries($order);
		 }
	   
	   
	   $this->load->view('admin/list_admin_entry',$data);
   }
   public function list_7_admin_entries_4_pick(){
	   $order = "DESC";
	   $limit = "7";
	   $game_type = '4pick';
	   $data['details'] = $this->admin_model->list_admin_entries_by_limit($order,$limit,$game_type);
	   $this->load->view('admin/list_admin_entry',$data);
	  // print_r($data);
	   
   }
   
   public function list_7_admin_entries_3_pick(){
	   $order = "DESC";
	   $limit = "7";	
	   $game_type = '3pick';
	   $data['details'] = $this->admin_model->list_admin_entries_by_limit($order,$limit,$game_type);
	   $this->load->view('admin/list_admin_entry',$data);
	  // print_r($data);
	   
   }
   
   /*logout*/
   public function logout()
   {
     $this->session->unset_userdata('logged_in');
     $this->session->sess_destroy();
     redirect('adminlogin', 'refresh');
   }


	
	
		

   
/**************Planet adds Functions End******************/
}
?>