<?php


class Post extends CI_Model{

    public function get_posts($select = FALSE, $where = FALSE, $limit = FALSE, $order = FALSE)
    {

        $this->db->order_by('date', 'DESC');

        if($limit!==FALSE){
            $this->db->limit($limit);
        }

        if($select !== FALSE){
            $this->db->select($select);
        }
        

        $this->db->where('post.category_id = category.category_id');

        if($where===FALSE){
            $query = $this->db->get('post, category');
            return $query->result_array();
        }
        $this->db->where($where);
        

        $query = $this->db->get('post, category');
        return $query->result_array();

    }


    public function get_params($params = FALSE)
    {
        if($params===FALSE){
            return $this->db->get('post')->result_array();   
        }
        if(isset($params['select'])){
           $this->db->select($params['select']); 
        }
       
        if(isset($params['limit'])){
           $this->db->limit($params['limit'][1],$params['limit'][0]); 
        }
        if(isset($params['from'])){
            if(strpos($params['from'], 'author')){
                $this->db->where('post.author_id = author.id');
            } 
            if(strpos($params['from'], 'category')){
                $this->db->where('post.category_id = category.category_id');
            } 
        }else{
            $params['from']='post';
        }

        if(isset($params['where'])){
           $this->db->where($params['where']); 
        }
        if(isset($params['like'])){
           $this->db->like($params['like']); 
        }
        if(isset($params['order'])){
           $this->db->order_by($params['order']); 
        }

        $query = $this->db->get($params['from']);

        // return $this->db->last_query();
        return $query->result_array();

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



    // ===============EDIT=================
    public function update($params)
    {
        $this->db->set($params['set']);
        $this->db->where($params['where']);
        return $this->db->update('post');
        
    }

    // ============INSERT=============

    public function insert($param)
    {
        $this->db->insert('post', $param['data']);
    }

    // ==============DELETE============

    public function delete($where)
    {

        $param['select']='img';
        $param['where']=$where;
        $data = $this->get_params($param);
        $this->db->where($where);
        if($this->db->delete('post')){
            return $data[0];
        }else{
            return FALSE;
        }
    }


    // ==================get comment
    public function get_comments($slug)
    {
       $this->db->where("slug = '$slug'");
       $this->db->order_by('date');
       $query =  $this->db->get('comment');
       return $query->result_array();
    }
    
    // input comment

    public function set_comments($data)
    {
        $this->db->insert('comment', $data);
    }

}