<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class DataScience extends CI_Controller {

    
    var  $category = 'datascience';
    
// *******Constructor*******
function __construct(){
    parent::__construct();

}
// *******Constructor*******

public function index() {
    
    
                //***Asynchronous calls for Technology Main Page. START
                {
                        
                                $postData = file_get_contents('php://input');
                                
                                if($postData)
                                    {
                                        $dataObject = json_decode($postData);
                                
                                        if($dataObject)
                                        {
                                            $purpose = $dataObject->data->purpose;
                                                
                                                if($purpose === 'subscribe')
                                                {
                                                    $this->general->subscribe($dataObject);
                                                }
                
                                        }
                                    }
                }
                //***Asynchronous calls for Technology Main Page. END
                
                
                
     
    $data['articles'] = $this->articles->getAllArticlesByCategory($this->category);
    $right_data['digitalMedia_count'] = $this->articles->getArticlesCount('digitalMedia');
    $right_data['technology_count'] = $this->articles->getArticlesCount('technology');
    $right_data['lifestyle_count'] = $this->articles->getArticlesCount('lifestyle');
    $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
    $right_data['articles'] = $this->articles->getAllArticlesByCategory($this->category);

    $footer_data['result'] = '';
    
    $page_id = 'DataScience'; //********Very Very Important****** Everything will be fetched on the basis of page_id
    
    $header_data = array(
        'title'=>'Eat Pray Read - Data Science',
        'description' => 'An online platform for publishing informative articles and stories',
        'keywords' => 'technology business digital media lifestyle fashion health nutrition business art design',
                'author' => 'Rahul Shenoy',
    );
    
    $this->load->view('header-top',$header_data);
    $this->load->view('category-main',$data);

//    $this->load->view('Business/main',$data);
    $this->load->view('right-side-bar',$right_data);
    $this->load->view('footer-bottom');

    
}   



public function datascience($article_id)
        {
           
            //****************************************Statistics****************************************
                    $ip = $this->input->ip_address();                    
            //****************************************Article Bottom Data****************************************
                
            $article_data['details'] = $this->articles->getArticle($article_id);
            $result = $this->articles->getAuthorId($article_id) ;
            $author_detail =  $this->authors->printAuthor($result[0]->author_id);
            $article_bottom_data['author'] = $author_detail[0];
        
            
            ///************* ASYNCHRONOUS handler Technology articles************* . START  
            {
            
                    $postData = file_get_contents('php://input');
                    $dataObject = json_decode($postData);
                    
                if($dataObject)
                {
                    $purpose = $dataObject->data->purpose;
                    // echo 'here';
                    // exit();
                    
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
      }
    ///************* ASYNCHRONOUS handler Technology articles************* . END  
            
            
            $value = $this->stats->entryPoint($article_id,$ip); // =>******For Tracking visitor views
            
//****************************************Article Bottom Data****************************************

            $right_data['digitalMedia_count'] = $this->articles->getArticlesCount('digitalMedia');            
            $right_data['technology_count'] = $this->articles->getArticlesCount('technology');
            $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
            $right_data['articles'] = $this->articles->getAllArticles();
    
    
            $article_top_data['article'] = $this->articles->getAllArticles();
            
            //For header information
            $this->load->view('header-top',$article_data['details'][0]);
            
            $this->load->view('article-top',$article_top_data);
            //For Content Information
            $this->load->view('DataScience/'.$article_data['details'][0]->article_id.'/content',$article_data);
            $this->load->view('article-bottom-test',$article_bottom_data);

            $this->load->view('right-side-bar',$right_data);
            $this->load->view('footer-bottom');
        }

//*************************************************TECH ARTICLES END******************************************************************

//*********************************************** START ARTICLES SECTION ***************************************************

public function curse_of_dimensionality_explained()
{
    $article_id = 'DS_001'; 
    $this->datascience($article_id);   
}

    






}