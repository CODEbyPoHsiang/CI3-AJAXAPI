<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Member extends CI_Controller {

   /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * 		http://example.com/index.php/welcome
    *	- or -
    * 		http://example.com/index.php/welcome/index
    *	- or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Member_model');
    }
    public function index()
	{
 
		$data['member']=$this->Member_model->get_all();
        $this->load->view('member_view',$data);
        // echo json_encode($data);
    }
    public function add()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'ename' => $this->input->post('ename'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'sex' => $this->input->post('sex'),
                'city' => $this->input->post('city'),
                'township' => $this->input->post('township'),
                'postcode' => $this->input->post('postcode'),
                'address' => $this->input->post('address'),
                'notes' => $this->input->post('notes'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            );
        $insert = $this->Member_model->add($data);
        echo json_encode(array("status" => TRUE));
    }
    public function ajax_edit($id)
    {
        $data = $this->Member_model->get_by_id($id);
        echo json_encode($data);

    }
    public function update()
	{
		$data = array(
            'name' => $this->input->post('name'),
            'ename' => $this->input->post('ename'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'sex' => $this->input->post('sex'),
            'city' => $this->input->post('city'),
            'township' => $this->input->post('township'),
            'postcode' => $this->input->post('postcode'),
            'address' => $this->input->post('address'),
            'notes' => $this->input->post('notes'),
            'updated_at'=> date('Y-m-d H:i:s'),
        );
        
		$this->Member_model->update(array('id' => $this->input->post('id')), $data);
		echo json_encode($data);
    }
    public function delete($id)
	{
		$this->Member_model->delete($id);
		echo json_encode(array("status" => TRUE));
    }
}
?>