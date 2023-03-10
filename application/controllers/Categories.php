<?php

class Categories extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('posts_model');
    }

    public function index()
    {
        $data['title'] = 'Categories';

        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }


    public function create()
    {
        //check if user is logged in first
        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }
        $data['title'] = 'Create a Category';
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->category_model->create_category();
            // Set message
				$this->session->set_flashdata('category_created', 'Your category has been created');
            redirect('categories');
        }
    }

    public function posts($id)
    {
        $data['title'] = $this->category_model->get_category($id)->name;
        $data['posts'] = $this->posts_model->get_posts_by_category($id);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id){
        // Check login
        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }
        $this->category_model->delete_category($id);

        // Set message
        $this->session->set_flashdata('category_deleted', 'Your category has been deleted');
        redirect('categories');
    }
}
