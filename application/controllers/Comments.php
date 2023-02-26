<?php
class Comments extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
        $this->load->model('posts_model');
    }

    public function create($post_id){ 
        $slug = $this->input->post('slug');
        $data['post'] = $this->posts_model->get_posts($slug);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required'); 

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');

        }else{
            $this->comment_model->create_comment($post_id)  ;
            redirect('posts/'.$slug);

        }
    }
}