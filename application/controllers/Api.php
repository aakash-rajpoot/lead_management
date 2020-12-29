<?php

   require APPPATH . '/libraries/REST_Controller.php';
   //use Restserver\Libraries\REST_Controller;
     
class Api extends REST_Controller {
    
	public function index_get()
	{
        $data = array("message"=>"RESTFULL API");
        $this->response($data);

    }

    public function get_all_data(){
        
    }
    	
}