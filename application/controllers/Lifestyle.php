<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class Lifestyle extends CI_Controller {

    
    var  $category = 'lifestyle';
    

// *******Constructor*******
function __construct(){
    parent::__construct();
    $this->load->library('session');
}
// *******Constructor*******

public function index() {
    
                //***********Handling post requests************.START 
                    $postData = file_get_contents('php://input');
                    $dataObject = json_decode($postData);
            
                if($dataObject)
                {
                    $purpose = $dataObject->data->purpose;
                    
            
                    if($purpose === 'subscribe')
                    {
                        $this->general->subscribe($dataObject);
                    }
                }  
                
                //***********Handling post requests************.END 
                
            
    $data['articles'] = $this->articles->getAllArticlesByCategory($this->category);
    $right_data['digitalMedia_count'] = $this->articles->getArticlesCount('digitalMedia');
    $right_data['technology_count'] = $this->articles->getArticlesCount('technology');
    $right_data['lifestyle_count'] = $this->articles->getArticlesCount('lifestyle');
    $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
    $right_data['articles'] = $this->articles->getAllArticlesByCategory($this->category);
    
    
    $header_data = array(
        'title'=>'Eat Pray Read - Lifestyle',
        'description' => 'An online platform for publishing informative articles and stories',
        'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                'author' => 'Rahul Shenoy',
    );
    
    $this->load->view('header-top',$header_data);
    $this->load->view('category-main',$data);
    $this->load->view('right-side-bar',$right_data);
    $this->load->view('footer-bottom');

    
}   


// For INDIVIDUAL ARTICLES
public function lifestyle($article_id)
        {
                //  IP collect
                $ip = $this->input->ip_address();
     
     
//****************************************Article Bottom Data****************************************
                
            $article_data['details'] = $this->articles->getArticle($article_id);
            $result = $this->articles->getAuthorId($article_id) ;
            $author_detail =  $this->authors->printAuthor($result[0]->author_id);
            $article_bottom_data['author'] = $author_detail[0];

     
     //***ANGULAR SECTION.......For asynchronous Angular Calls from current page 
      {
                
                    $postData = file_get_contents('php://input');     //  <=** Getting the asynchronous post data 
                    $dataObject = json_decode($postData);
                    
                if($dataObject)
                {
                    $purpose = $dataObject->data->purpose;
                    
                    if($purpose === 'submit')
                    {
                        $this->general->commentProc($article_id,$dataObject);
                    }
                    if($purpose === 'onloadComments')
                    {
                        $this->general->getComments($article_id);
                    }
                    
                    if($purpose === 'comments_count')
                    {
                        $this->general->getCommentsCount($article_id);
                    }
                      //Unique visitor View count 18th July 2016
                    if($purpose === 'unique_visitor_view_count')
                    {
                        $this->articles->getArticleViewCount($article_id);
                    }
                  
                    //***For getting Initial Article Like Value on Page Load
                    if($purpose === 'likeProcess')
                    {
                        $this->stats->getArticleLike($article_id,$ip,$dataObject);
                    }
                    
                    //***For subscribing EatPrayRead                    
                    if($purpose === 'subscribe')
                    {
                        $this->general->subscribe($dataObject);
                    
                }
      }
    
    
     //***ANGULAR SECTION.......For asynchronous Angular Calls from current page 
     
//        Use check visitor
            $value = $this->stats->entryPoint($article_id,$ip);

//            
//****************************************Article Bottom Data****************************************

//            ***********************COMMENTS CODE***********************
            $submit = $this->input->post('submit');
        
           
            $article_data['comments_result'] = ''; 
            
            $right_data['digitalMedia_count'] = $this->articles->getArticlesCount('digitalMedia');            
            $right_data['technology_count'] = $this->articles->getArticlesCount('technology');
            $right_data['lifestyle_count'] = $this->articles->getArticlesCount('lifestyle');
            $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
            $right_data['articles'] = $this->articles->getAllArticles();
    
            $footer_data['result'] = '';
            //For header information
            $this->load->view('header-top',$article_data['details'][0]);
            
            $this->load->view('article-top');
            //For Content Information
            $this->load->view('Lifestyle/'.$article_data['details'][0]->article_id.'/content',$article_data);
            $this->load->view('article-bottom-test',$article_bottom_data);

            $this->load->view('right-side-bar',$right_data);
            $this->load->view('footer-bottom');
        }

        
}


//*********************************************** START ARTICLES SECTION ***************************************************


    public function How_to_beat_the_perfect_egg_foam()
        {
            $article_id = 'LIFE_001'; 
            $this->lifestyle($article_id);   
        }

//*********************************************** END ARTICLES SECTION ***************************************************
        


    
}
