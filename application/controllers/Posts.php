<?php
class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->model('comment_model');
        $this->load->helper('url_helper');
    }



    public function index($offset = 0)
    {
        // Pagination Config	
		$config['base_url'] = base_url() . 'posts/index/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');

		// Init Pagination
		$this->pagination->initialize($config);

        $data['title'] = 'Latest Posts';
        $data['posts'] = $this->posts_model->get_posts(FALSE, $config['per_page'], $offset);
        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['post'] = $this->posts_model->get_posts($slug);
        $post_id = $data['post']['id'];
        //get comments for this post
        $data['comments'] = $this->comment_model->get_comments($post_id);
        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        //check if user is logged in first
        if(!$this->session->userdata('logged_in')){
           redirect('user/login');
        }
        $data['title'] = 'Create Post';
        $data['categories'] = $this->posts_model->get_categories();
        //form validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            //upload image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2048';
            $config['max_height'] = '2048';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->posts_model->create_post($post_image);

            // Set message
				$this->session->set_flashdata('post_created', 'Your post has been created');
            redirect('posts');
        }
    }

    public function edit($slug)
    {
        //check if user is logged in first
        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }

        $data['title'] = 'Edit Post';
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        $data['post'] = $this->posts_model->get_posts($slug);
        $data['categories'] = $this->posts_model->get_categories();

        // Check user
        if($this->session->userdata('user_id') != $data['post']['user_id']){
            redirect('posts');
        }


        if (empty($data['post'])) {
            show_404();
        }

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->posts_model->edit_post();
            redirect('posts');
        }
    }

    public function delete($id)
    {
        //check if user is logged in first
        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }

        $this->posts_model->delete_post($id);
        // Set message
			$this->session->set_flashdata('post_deleted', 'Your post has been deleted');
        redirect('posts');
    }

    public function update()
    {
        //check if user is logged in first
        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }
        $this->posts_model->update_post();

        // Set message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');
        redirect('posts');
    }
}
