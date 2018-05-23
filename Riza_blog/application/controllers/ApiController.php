<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('post');
	}

    public function response($data, $response_code = 200)
	{
		$this->output
			->set_content_type('application/json')
			->set_status_header($response_code)
			->set_output(json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		
		exit;
    }
    
    public function loadmore($url)
    {
        $params['select']='title, img, slug, category_slug, date';
        $params['from']='post, category';
        $params['order']='date DESC';
        
        if($this->input->get('page')){
            $params['limit']=[$this->input->get('page'), '6'];
        }

        switch($url){
            case 'android':
                $params['where']="post.category_id = 'android'";
                break;
            case 'web':
                $params['where']="post.category_id = 'web'";
                break;
            case 'cs':
                $params['where']="post.post.category_id = 'cs'";
                break;
            case 'stories':
                $params['where']="post.category_id = 'stories'";
                break;
        }

        $data = $this->post->get_params($params);
        return $this->response($data,200);
    }


}