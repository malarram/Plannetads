<?php 
/*Admin login */
class Adminlogin extends CI_Controller
{
	public function __construct()
   {
        parent::__construct();
        // Your own constructor code
         $this->load->model('admin_model','',TRUE);
         if ($this->session->userdata('logged_in'))
        { 
            redirect('admin/admin_entry');
        }
   }
   /*index*/
   public function index()
   {
        //If no session, redirect to login page
        $this->load->view('admin/login');    
   }
   /**
    * encript the password 
    * @return mixed
    */  
    function __encrip_password($password) {
        return md5($password);
    }
   /*check authentication */
   public function logincheck()
   { 
      if ($this->input->post())
      {
        $username=$this->input->post('username');
        $password = $this->__encrip_password($this->input->post('password'));
        $data['details'] = $this->admin_model->login($username, $password);
        if(!empty($data['details']))
        {
          $details_array = $data['details'];
          //print_r($data['details']);
          foreach ($details_array as $row)
          {
            $admin_id = $row->admin_id;
            $admin_name = $row->admin_name; 
          }
          $data = array(
          'admin_id' => $admin_id,
          'username' => $admin_name,
          'logged_in' => true
          );
          $this->session->set_userdata($data);
          redirect('admin/admin_entry');
        }
        else{
          $this->session->set_flashdata('msg', 'Invalid Username/password');
          redirect('adminlogin');
        }
      }
      else
      {
        redirect('adminlogin');
      }
   }
}
?>