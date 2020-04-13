<?php
   
   defined('BASEPATH') OR exit('No direct script access allowed');

   use chriskacerguis\RestServer\RestController;


     
class Api extends RestController {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();

       header('Access-Control-Allow-Origin: *');
       header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
       header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
       $method = $_SERVER['REQUEST_METHOD'];
       if ($method == "OPTIONS") {
           die();
       }
   
    //    $this->load->database();
    $this->load->model('Member_model');

    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("member", ['id' => $id])->row_array();//如果是鍵入id會顯示一列聯絡人資料
        }else{
            $data = $this->db->get("member")->result(); //否則是顯示全部聯絡人資料
        }
     
        $this->response(["200" => "資料載入成功!",'data' => $data], RestController::HTTP_OK);

        if($data == null){
            $this->response(["404" => "無任何資料!"], RestController::HTTP_OK);
        }
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
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
        // echo json_encode(array("" => "TRUE"));
    
 

    

        // $input = $this->post();
        // $this->db->insert('member',$input);
     
        $this->response(["200" => "資料新增成功!"], RestController::HTTP_OK);
        
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
            $input = $this->put();
            $this->db->update('member', $input, array('id'=>$id));
            $this->response(["200"=>"資料修改成功!"], RestController::HTTP_OK);
       
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        
        $this->db->delete('member', array('id'=>$id));
       
        $this->response(["200"=>"資料刪除成功!"], RestController::HTTP_OK);
    }
    	
}