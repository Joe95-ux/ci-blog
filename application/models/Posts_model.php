<?php
class Posts_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_posts($slug = FALSE){
        if($slug === FALSE){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
    }

    public function create_post($post_image){
        //to create slug out of title us url_title method
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'post_image' => $post_image
        );
        return $this->db->insert('posts', $data);
    }

    public function get_categories(){
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function delete_post($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    public function update_post(){
        $id = $this->input->post('id');
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body')
        );
        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }
    public function get_posts_by_category($id){
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('category_id' => $id));
        return $query->result_array();
    }
}