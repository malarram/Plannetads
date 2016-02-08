<?php
Class Admin_model extends CI_Model
{
/**************Planet adds Functions start******************/

/*****user registeration email check function Start*******/
function user_registeration_check($email)
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('email',$email);
	$query = $this->db->get();
	if ($query->num_rows() > 0)
	{
		return true;
	}
	else
	{
		return false;
    }
}
/*****user registeration email check function End*******/

/*****user registeration function start*******/
function user_registeration($data)
{
	 $query = $this->db->insert('users', $data);	 //insert data's of users, into user table
	 if($this->db->affected_rows() > 0)
	{
    // Code here after successful insert
    return true; // to the controller
	}
	 //echo $this->db->last_query(); exit;
}

/*****user registeration function End*******/
		
		
		

   
/**************Planet adds Functions End******************/   
}
?>