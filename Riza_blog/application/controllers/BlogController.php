<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BlogController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post');
		$this->load->helper(array('url','date','dating'));

	}


	public function index()
	{
		$select ='title, slug, date, img, category_slug';
		$data['headline'] = $this->post->get_posts($select, false,1)[0];
		$data['stories'] = $this->post->get_posts($select, array('post.category_id'=>'stories'),3);
		$data['tutorials'] = $this->post->get_posts($select, "post.category_id = 'web' OR post.category_id = 'android' OR post.category_id = 'cs'",3);
		$side = $this->get_side_data(); 
		
		$this->load->view('partials/header.php');
		$this->load->view('index.php',$data);
		$this->load->view('partials/sidebar.php',$side);
		$this->load->view('partials/footer.php');
	}
	

	/* READ */

	public function read($slug)
	{
		$article = $this->post->get_article($slug);
		
		if($article = $this->post->get_article($slug)){
			$this->post->view($slug);
			$data['article'] = $article;
			$data['comments'] = $this->post->get_comments($slug);
			$side = $this->get_side_data();
			$head['title']=$article['title'];

			$this->load->view('partials/header.php',$head);
			$this->load->view('pages/read.php', $data);
			$this->load->view('partials/sidebar.php',$side);
			$this->load->view('partials/footer.php');
		}else{
			show_404();
		}

	}

	public function coment($slug)
	{
		if($this->input->post('coment')){
			$data = array(
				'slug'=>$slug,
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'text'=>$this->input->post('coment'),
			);
			$this->post->set_comments($data);
		}
		$this->read($slug);
	}


	/* ABOUT */

	public function about()
	{
		$side = $this->get_side_data();
		$head['title']='About Me';
		$this->load->view('partials/header.php',$head);
		$this->load->view('pages/about.html');
		$this->load->view('partials/sidebar.php',$side);
		$this->load->view('partials/footer.php');
	}


	/*
	STORIES
	*/
	public function gallery($url)
	{
		$select ='title, slug, date, img, category_slug';
		$side = $this->get_side_data(); 
		$head['title'] = 'Riza Blog';
		
		switch($url){
			case 'stories':
				$head['title'] = "Developer Stories";
				$data['heading']='Latest Stories';
				$data['items'] = $this->post->get_posts($select, array('post.category_id'=>'stories'),6);
				break;
			case 'android':
				$head['title'] = 'Android Tutorials';
				$data['heading']='Android Tutorials';
				$data['items'] = $this->post->get_posts($select, array('post.category_id'=>'android'),6);
				break;
			case 'web':
				$head['title'] = 'Web Tutorials';
				$data['heading']='Web Tutorials';
				$data['items'] = $this->post->get_posts($select, array('post.category_id'=>'web'),6);
			break;
			case 'cs':
				$head['title'] = 'Computer Science Tutorials';
				$data['heading']='Computer Science Tutorials';
				$data['items'] = $this->post->get_posts($select, array('post.category_id'=>'cs'),6);
				break;
			case 'search':
				$key = $this->input->get('s');
				$where = "title like '%$key%'";
				$head['title'] = 'Search for '.$key;
				if($data['items'] = $this->post->get_posts($select, $where,6)){
					$data['heading']="Showing Result for '".$key."'";
				}else{
					$data['heading']="No Result for '" . $key."'";
				}
				break;
			default:
				show_404();

		}

		$this->load->view('partials/header.php',$head);
		$this->load->view('pages/gallery.php',$data);
		$this->load->view('partials/sidebar.php',$side);
		$this->load->view('partials/footer.php');
	}


	/*
	TUTORIALS
	*/
	public function tutorials()
	{
		$select ='title, slug, date, img, category_slug';
		$data['android'] = $this->post->get_posts($select, "post.category_id = 'android'",3);
		$data['web'] = $this->post->get_posts($select, "post.category_id = 'web'",3);
		$data['cs'] = $this->post->get_posts($select, "post.category_id = 'cs'",3);
		$side = $this->get_side_data(); 
		$head['title'] = 'Software Development Tutorials';
		
		$this->load->view('partials/header.php');
		$this->load->view('pages/tutorials.php',$data);
		$this->load->view('partials/sidebar.php',$side);
		$this->load->view('partials/footer.php');
	}


	/*
	//utiils
	*/ 
	public function get_side_data()
	{
		$android = $this->post->get_count("category_id = 'android'");
		$web = $this->post->get_count("category_id = 'web'");
		$cs = $this->post->get_count("category_id = 'cs'");

		$total_post =  array('android'=>$android,'web'=>$web,'cs'=>$cs);

		$side['trending'] = $this->post->get_trending();
		$side['total_post'] = $total_post;

		return $side;
	}


	public function test()
	{
		echo md5('admin');
	}
}
