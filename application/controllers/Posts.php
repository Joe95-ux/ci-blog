<?php
class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->helper('url_helper');
    }



    public function index()
    {
        $data['title'] = 'Latest Posts';
        $data['posts'] = $this->posts_model->get_posts();
        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['post'] = $this->posts_model->get_posts($slug);
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
            redirect('posts');
        }
    }

    public function edit($slug)
    {

        $data['title'] = 'Edit Post';
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        $data['post'] = $this->posts_model->get_posts($slug);
        $data['categories'] = $this->posts_model->get_categories();
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
        $this->posts_model->delete_post($id);
        redirect('posts');
    }

    public function update()
    {
        $this->posts_model->update_post();
        redirect('posts');
    }
}
