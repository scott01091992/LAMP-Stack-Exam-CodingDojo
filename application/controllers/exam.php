<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends CI_Controller {

//load views
	//default view
	public function main(){

		$this->load->view('index');

	}

	public function home(){
		$data = $this->Exam_model->get_user($this->session->userdata('current_user'));
		$data2 = $this->Exam_model->get_current_user_plans();
		$data3 = $this->Exam_model->get_other_users_plans();
		$this->load->view('travel_dashboard', array('user' => $data, 'users_plans' => $data2, 'other_plans' => $data3));
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function travels_add(){
		$this->load->view('add_plan');
	}

	public function destination($id){
		$data = $this->Exam_model->get_destination_user($id);
		$data2 = $this->Exam_model->get_destination_others($id);
		$this->load->view("destination", array('user' => $data, 'others' => $data2));
	}

	public function join($id){
		$this->Exam_model->join_plan($id);
		redirect('/home');
	}

	public function add_travel_plan(){
		$this->form_validation->set_rules('destination', 'destination', 'required|min_length[2]');
		$this->form_validation->set_rules('description', 'description', 'required|min_length[2]');
		$this->form_validation->set_rules('start_date', 'start_date', 'required');
		$this->form_validation->set_rules('destination', 'destination', 'required');
		
		$key   = $this->input->post('start_date');
		$regex = '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/';

		if (preg_match($regex, $key)) {
		   	$key2   = $this->input->post('end_date');
			$regex2 = '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/';
			if (preg_match($regex2, $key2)) {
				$pass = true;
			}else{
				$pass=false;
			}
		} else {
		    $pass=false;
		}
		
		$start = explode('/', $this->input->post('start_date'));
		$end = explode('/', $this->input->post('end_date'));
		$day = Date('d');
		$month = Date('m');
		$year = Date('Y');
		if($pass==true){
			if(intval($year) < intval($start[2])){
				echo 'start date before year';
				$pass = false;
			}else if(intval($month) > intval($start[0])){
				echo 'start date before month';
				$pass = false;
			}else if(intval($day) < intval($start[1])){
				echo 'start date before day';
				$pass = false;
			}else{
				if(intval($start[2]) > intval($end[2])){
					echo 'end date before start date1';
					echo $end[2];
					echo $start[2];
					$pass = false;
				}else if(intval($start[0]) > intval($end[0])){
					echo 'end date before start date2';
					$pass = false;
				}else if(intval($start[0]) == intval($end[0])){
					if(intval($start[1]) > intval($end[1])){
						$pass = false;
					}
					else{
						$pass = true;
					}
				}else{
					$pass = true;
				}
				
			}	
			
			}
			if($this->form_validation->run() == false){
				$this->load->view('add_plan');
			}else if($pass == false){
				$this->session->set_flashdata('error', 'date format or date times not valid');
				redirect('/travels/add');
			}else{
				$this->Exam_model->add_new_plan();
				redirect("/home");
			}
		
		}



//login/registeration

	public function login(){
		$this->form_validation->set_rules('login_username', 'login_username', 'required|max_length[45]');
		$this->form_validation->set_rules('login_password', 'login_password', 'required|min_length[8]|max_length[255]');
		if($this->form_validation->run() == false){
			$this->load->view('index');
		}else{
			$result = $this->Exam_model->login_user();
			if($result != false){
				$this->session->set_userdata('current_user', $result);
				redirect('home');
			}else{
				$this->session->set_flashdata('login_error', "<span class='error'>Email or password does not exist</span>");
				redirect('/');
			}
		}
	}

	public function register(){
		$this->form_validation->set_rules('name', 'name', 'required|max_length[45]|min_length[3]');
		$this->form_validation->set_rules('username', 'username', 'required|max_length[45]|min_length[3]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[255]');
		$this->form_validation->set_rules('confirm', 'confirm', 'required|matches[password]');
		if($this->form_validation->run() == false){
			$this->load->view('index');
		}
		else{
			$result = $this->Exam_model->register_user();
			if($result == true){
				$this->session->set_flashdata('error', "<span class='success'>Successfully registered</span>");
				redirect('/');
			}
			else{
				$this->session->set_flashdata('error', "<span class='error'>This user already exists</span>");
				redirect('/');
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */