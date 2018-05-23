<?php


class Category extends CI_Model{

    public function get($select = FALSE)
    {

        if($select !== FALSE){
            $this->db->select($select);
        }
        
        $query = $this->db->get('category');
        return $query->result_array();

    }

   

    public function get_category_id($where)
    {   
        $this->db->select('category_id');
        $query = $this->db->get_where($where);
        return $query->result()->category_id;
    }

    public function get_trending()
    {
        $this->db->select('title, date, slug, category_slug');
        $this->db->where('post.category_id = category.category_id');
        $this->db->order_by('views', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('post, category');
        return $query->result_array();
    }

    public function get_count($where=FALSE)
    {
        if($where===FALSE){
           return $this->db->count_all_results('post');
        }
        $this->db->where($where);
        return $this->db->count_all_results('post');
    }


    /*
    ==== READING 
    */

    public function view($slug)
    {
        $this->db->query("UPDATE post SET views = views+1 WHERE slug = '$slug'");
    }

    public function get_article($slug)
    {
        $this->db->select('*');
        $this->db->where(array('slug'=>$slug));
        $this->db->from('post');
        $this->db->join('author', 'author.id = post.author_id');
        $query = $this->db->get();

        return $query->row_array();
    }


}