<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam_model extends CI_Model {

	public function join_plan($id){
		$this->db->insert('group_plan', array('users_id' => $this->session->userdata('current_user'), 'plans_id' => $id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')));
	}

	public function get_destination_user($id){
		return $this->db->query("SELECT users.name, plans.destination, description, start_date, end_date FROM users LEFT JOIN group_plan ON users.id = group_plan.users_id LEFT JOIN plans ON group_plan.plans_id = plans.id WHERE plans.id ={$id}")->row_array();
	}

	public function get_destination_others($id){
		return $this->db->query("SELECT users.name FROM users LEFT JOIN group_plan ON users.id = group_plan.users_id LEFT JOIN plans ON group_plan.plans_id = plans.id WHERE plans.id = {$id} AND users.id <> {$id}")->result_array();
	}

	public function add_new_plan(){
		$this->db->insert('plans', array('destination' => $this->input->post('destination'), 'start_date' => $this->input->post('start_date'), 'end_date' => $this->input->post('end_date'), 'description' => $this->input->post('description'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'users_id' => $this->session->userdata('current_user')));
		$plan_id = $this->db->get_where("plans", array('description' => $this->input->post('description')))->row_array();
		$this->db->insert('group_plan', array('users_id' => $this->session->userdata('current_user'), 'plans_id' => $plan_id['id'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')));
	}

	public function get_current_user_plans(){
		return $this->db->query("SELECT DISTINCT plans.users_id, destination, start_date, end_date, description FROM group_plan LEFT JOIN plans ON group_plan.plans_id = plans.id WHERE group_plan.users_id = {$this->session->userdata('current_user')}")->result_array();
	}

	public function get_other_users_plans(){
		return $this->db->query("SELECT plans.id, name, destination, start_date, end_date FROM users LEFT JOIN group_plan ON users.id = group_plan.users_id LEFT JOIN plans ON group_plan.plans_id = plans.id WHERE group_plan.users_id <> {$this->session->userdata('current_user')}")->result_array();
	}

	//get user from db by ID
	public function get_user($id){
		return $this->db->query("SELECT name, username, created_at FROM users WHERE id = {$id}")-> row_array();
	}

	public function login_user(){
		$user_query = $this->db->get_where('users', array('username' => $this->input->post('login_username')))->row_array();
		//if the query finds the username
 		if($user_query != null){
 			$encrypted_password = md5($this->input->post("login_password").''.$user_query['salt']);
 			if($user_query['password'] == $encrypted_password){
 				//get users id to log into session
 				return $user_query['id'];
 			}else{
 				//incorrect password
 				return false;
 			}
 		}else{
 			//no matching username
 			return false;
 		}
	}

	public function register_user(){
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encrypted_password=md5($this->input->post('password')."".$salt);
		$query = $this->db->get_where("users", array('username' => $this->input->post('username')))->row_array();
	//if user is not already in the database
		if($query == null){
			$this->db->insert('users', array('name' => $this->input->post('name'), 'username' => $this->input->post('username'), 'password' => $encrypted_password, 'salt' => $salt, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')));
			//insert user into db, return true
			return true;
		}
		else{
			//user already exists, return false
			return false;
		}
	
	}
}
