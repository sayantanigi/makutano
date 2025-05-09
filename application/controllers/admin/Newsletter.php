<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends AI_Controller {

	public function __construct()
	{
		parent::__construct();
		$config['upload_path']          = './uploads/newsletter';
		$config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
        $this->data['title'] = '';
        $this->data['tab'] = '';
		$this->data['title'] = 'Newsletter';
		$this->data['tab'] = 'newsletter';
		$this->load->model('Newsletter_model');
	}
	public function index($page = 1) {	
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		$show_per_page = 5;
		$offset = ($page - 1) * $show_per_page;
		$this->data['title'] = 'Newsletter';
		$this->data['tab'] = 'newsletter';
		$this->data['main'] = admin_view('newsletter/index');
		$newsletter = $this->Newsletter_model->getAll($offset, $show_per_page,'newsletter');
		//echo $this->db->last_query();die();
		$this->data['newsletter'] = $newsletter['results'];
		$config['base_url'] = admin_url('newsletter/index');
		$config['num_links'] = 2;
		$config['uri_segment'] = 4;
		$config['total_rows'] = $newsletter['total'];
		$config['per_page'] = $show_per_page;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['use_page_numbers'] = true;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'page';
		$config['reuse_query_string'] = true;

		$this->pagination->initialize($config);
		$this->data['paginate'] = $this->pagination->create_links();
		$this->load->view(admin_view('default'),$this->data);
	}
	public function add($id = false){
		$this->data['title'] = 'Add Image';
		$this->data['tab'] = 'add_newsletter';
		$this->data['main'] = admin_view('newsletter/add');
		$this->data['newsletter'] = $this->Master_model->getNew('newsletter');
		if ($id) {
			$this->data['newsletter'] = $newsletter = $this->Master_model->getRow($id,'newsletter');
			if(!isset($newsletter)){
				redirect(site_url('404_override'));
				exit();
			}
		}
		
		if ($this->input->post()) {
			print_r($this->input->post());
			if (!empty($_FILES['image']['name'][0])) {
				$cpt = count($_FILES['image']['name']);
				for($i=0; $i<$cpt; $i++) {
					$src = $_FILES['image']['tmp_name'][$i];
					$avatar = str_replace(array('(', ')', ' '), '', rand(0000, 9999) . "_" . $_FILES['image']['name'][$i]);  echo "<br>"; 
					$dest = getcwd() . '/uploads/newsletter/' . $avatar;
					if (move_uploaded_file($src, $dest)) {
						$file  = $avatar;
						@unlink('uploads/newsletter/' . $_POST['image']);
					}
					if(!empty($file)) {
						$image = $file;
					} else {
						$link = "";
					}
					$data_image = array(
						'id' => @$id,
						'image' => $file,
						'title' => $this->input->post('title'),
						'status' => 1,
						'created_date' => date("Y-m-d H:i:s"),
					);
					//echo "<pre>"; print_r($data_image);
					$this->Newsletter_model->save($data_image, 'newsletter');
					$this->session->set_flashdata('message', 'Image added Successfully !');
				}
			} else {
				$data_image = array(
					'id' => @$id,
					'title' => $this->input->post('title'),
					'status' => 1,
					'created_date' => date("Y-m-d H:i:s"),
				);
				print_r($data_image);
				$this->Newsletter_model->save($data_image, 'newsletter');
				$this->session->set_flashdata('message', 'Data updated Successfully !');
			}
			$this->session->set_flashdata("success", "Image saved");
			redirect(admin_url('newsletter/index'));
		}		
		$this->load->view(admin_view('default'),$this->data);
	}
	function activate($id = false) {
		$redirect = isset($_GET['redirect_to']) ? $_GET['redirect_to'] : admin_url('newsletter');
		if ($id) {
			$c['id'] = $id;
			$c['status'] = 1;
			$this->Newsletter_model->save($c,'newsletter');
			$this->session->set_flashdata("success", "Image activated");
		}
		redirect($redirect);
	}
	function deactivate($id = false) {
		$redirect = isset($_GET['redirect_to']) ? $_GET['redirect_to'] : admin_url('newsletter');
		if ($id) {
			$c['id'] = $id;
			$c['status'] = 0;
			$this->Newsletter_model->save($c,'newsletter');
			$this->session->set_flashdata("success", "image deactivated");
		}
		redirect($redirect);
	}
	function delete($id){
		if ($id > 0) {
			$this->Newsletter_model->delete($id,'newsletter');
			$this->session->set_flashdata('success', 'Image deleted successfully ');
		}
		redirect(admin_url('newsletter'));
	}
}