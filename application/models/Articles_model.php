<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_Model extends CI_Model {
    
    var $article_view_count ;
    // *******Constructor*******
function __construct(){
    parent::__construct();
}
// *******Constructor*******
//    **************************************UNDER CONSTRUCTION**************************************
//    **************************************UNDER CONSTRUCTION**************************************
    public function articleEntryProcedure() {
    
    $ip = $this->input->ip_address();
    
    $this->input->get_cookie('epr'); 
    echo random_string('alnum', 16);
    
        
        
        $cookie = array(
    'name'   => 'epr',
    'value'  => '',
    'expire' => '86500',
    'domain' => '.some-domain.com',
    'path'   => '/',
    'prefix' => 'myprefix_',
    'secure' => TRUE
);

$this->input->set_cookie($cookie); 
        
    }
//    **************************************UNDER CONSTRUCTION**************************************
//    **************************************UNDER CONSTRUCTION**************************************

    
    
    
    //To fetch all the data in the table..Used in Main Pages
    public function getAllArticles()
    {
            $query = $this->db->order_by('priority')->get('articles');
            return $query->result();
    }
    
    
    public function getAllArticlesByCategory($category)
    {
            $query = $this->db->order_by('article_view_count','desc')->get_where('articles',array('category'=>$category));
            return $query->result();
    }
    
    
    
    //Used to fetch ALL details OF AN ARTICLE...Article_id needs to be specified
    public function getArticle($article_id)
    {
        $query = $this->db->get_where('articles',array('article_id'=>$article_id));
        return $query->result();
              
    }
    
    public function getAuthorId($article_id)
    {   
        $this->db->select('author_id');
        $query = $this->db->get_where('articles',array('article_id'=>$article_id));
        return $query->result();
        
    }

    //Used to fetch all details of an article BY YEAR...Year selected from ARCHIVE year needs to be specified
    public function getArticlesByYear($publish_year)
    {
        $query = $this->db->get_where('articles',array('publish_year'=>$publish_year));
        return $query->result();
              
    }
    
    //Used to get the total number of rows in the table
    public function getArticlesCount($category)
    {
        $sql = "select count(*) as count from articles where category = ?";
        $query = $this->db->query($sql,array($category));
        return $query->result()[0]->count;
        
    }
    
    //Used to return UNIQUE view count of every article
    public function getArticleViewCount($article_id)
    {
        $sql = "select article_view_count as count from articles where article_id = ?";
        $query = $this->db->query($sql,array($article_id));
        
        echo $query->result()[0]->count;
        
        exit();
    }
    
    
    //
    public function incrementArticleViewCount($article_id)
    {
        //Fetching the current article_view_count value
        $this->db->select('article_view_count');
        $query = $this->db->get_where('articles',array('article_id'=>$article_id));
        $data['count'] = $query->result();
        $article_view_count = $data['count'][0]->article_view_count;
        
        $article_view_count++;  // <= INCREMENTING HERE
        

        //Updating the incremented article_view_count value
        $this->db->where('article_id', $article_id);
        $this->db->update('articles', array('article_view_count'=>$article_view_count)); 
       
    }
    
    //Used to insert data in tabble Where '$data' is an associative array with fields specified to values    
    public function insertData($data)
    {
        $this->db->insert('articles', $data);
    }
    
    public function getComments($article_id,$comment)
    {
        
    }
    
    
    
//    function add_transaction($item, $weight, $nug, $transaction_type, $date, $comment){
//        $total_weight = ($weight * $nug);
//        $transaction = array('item_id'=>$item,
//                            'weight'=>$weight,
//                            'nug'=>$nug,
//                            'total_weight'=>$total_weight,
//                            'transaction_type'=>$transaction_type,
//                            'comment'=>$comment,
//                            'created'=>$date);
//        
//       $this->db->insert('transaction', $transaction);
//       if($this->db->affected_rows()>0){
//            echo'<div class="alert alert-dismissable alert-success"><h4>Transaction Successfull</h4></div>';
//            exit;
////            Set transaction history
////            $this->updateReport($item, $weight, $nug, $transaction_type, $date);
//            
//       }
//       else{
//            echo'<div class="alert alert-dismissable alert-danger"><h4>Transaction Unsuccessfull</h4></div>';
//            exit;
//       }
//    }
    
    
}
