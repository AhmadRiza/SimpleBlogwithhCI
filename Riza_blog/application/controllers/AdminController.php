<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url', 'form', 'slug', 'cookie'));
        $this->load->model('post');
        $this->load->model('category');
        $this->load->model('user');

        $this->load->library('session');

        define('LOGIN_EXP', 3600*24*7);

    }

    public function post()
    {
        $this->validate_user();

        $data['cat'] = $this->category->get();
        $this->load->view('admin_post.php', $data);
    }

    public function man_post()
    {

        $this->validate_user();
        $id = $this->session->userdata('id');

        $params['select'] = 'title, slug, category_slug, category, views, name';
        $params['from']   = 'post,category,author';
        $params['where']  = "author_id = $id";

        if ($this->input->get('search')) {
            $params['like'] = array('title' => $this->input->get('search'));
        }
        if ($this->input->get('order')) {
            $order = $this->input->get('order');
            switch ($order) {
                case 'latest':
                    $params['order'] = 'date DESC';
                    break;
                case 'oldest':
                    $params['order'] = 'date ASC';
                    break;
                case 'mostviews':
                    $params['order'] = 'views DESC';
                    break;
                case 'leastviews':
                    $params['order'] = 'views ASC';
                    break;
                default:
                    $params['order'] = 'date DESC';
            }
        } else {
            $params['order'] = 'date DESC';
        }

        $data['posts'] = $this->post->get_params($params);
        $this->load->view('admin_postlist.php', $data);
    }

    public function posting()
    {
        $this->validate_user();

        $id = $this->session->userdata('id');

        if ($data = $this->upload('img')) {

            $params['data'] = array(
                'title'       => $this->input->post('title'),
                'slug'        => $this->make_slug($this->input->post('title')),
                'category_id' => $this->input->post('category'),
                'content'     => $this->input->post('content'),
                'img'         => $data['file_name'],
                'author_id'   => $id,
            );

            $this->post->insert($params);
            redirect(base_url('admin'));
        }

    }

    public function edit($slug)
    {

        $this->validate_user();
        $data['cat'] = $this->category->get();

        $params['where'] = "slug = '$slug'";
        if ($res = $this->post->get_params($params)) {
            $data['post'] = $res[0];
            $this->load->view('admin_post.php', $data);
        } else {
            redirect(base_url('admin'));
        }

    }

    public function editing($slug)
    {
        $this->validate_user();

        // todo upload
        $params['where'] = "slug = '$slug'";
        $post            = array(
            'title'       => $this->input->post('title'),
            'category_id' => $this->input->post('category'),
            'content'     => $this->input->post('content'),
        );

        if ($data = $this->upload('img')) {
            $post += array('img' => $data['file_name']);
        }

        $params['set'] = $post;
        $this->post->update($params);
        redirect(base_url('admin/edit-post/' . $slug));
    }

    public function delete($slug)
    {
        $this->validate_user();

        $where = array('slug' => $slug);
        if ($data = $this->post->delete($where)) {
            $this->deletefile($data['img']);
        }
        redirect(base_url('admin'));
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function setlogin()
    {

        if ($user = $this->user->verify()) {
            $data = array(
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
                'pict'  => $user['pict'],
            );
            $cookie = array(
                'name'   => 'id',
                'value'  => $user['id'],
                'expire' => LOGIN_EXP,

            );

            $this->session->set_userdata($data);
            $this->input->set_cookie($cookie);

            redirect(base_url('admin'));
        } else {
            $data['msg'] = "Email atau password salah!";
            $this->load->view('login', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id', 'name', 'email', 'img');
        delete_cookie('id');
        redirect(base_url('admin'));

    }

    // ====================utils=================

    public function validate_user()
    {
        if (!$this->session->has_userdata('id')) {
            if ($id = $this->input->cookie('id')) {

                $this->session->set_userdata(array('id' => $this->input->cookie('id')));

            } else {
                redirect(base_url('admin/login'));
            }
        }
    }

    public function upload($name)
    {
        $config['upload_path']   = './resources/img';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 2000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($name)) {
            $error = array('error' => $this->upload->display_errors());

            return false;

        } else {
            $data = $this->upload->data();

            return $data;
        }
    }

    public function deletefile($filename)
    {
        return unlink('./resources/img/' . $filename);
    }

    public function make_slug($param)
    {
        $slug = slug($param);
        $n    = $this->post->get_count("slug='$slug'");
        if ($n == 0) {
            return $slug;
        } else {
            return $slug . ($n + 1);
        }
    }

    public function test()
    {
        echo $this->input->cookie('name');
    }

}
