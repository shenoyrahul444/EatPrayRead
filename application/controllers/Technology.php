<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class Technology extends CI_Controller {

    
    var  $category = 'technology';

// *******Constructor*******
function __construct(){
    parent::__construct();
    $this->load->library('session');

}
// *******Constructor*******
//*******************************************************INDEX*************************************************************************
public function index() 
{
    
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
                
                
                $header_data = array(
                    'title'=>'Eat Pray Read - Technology',
                    'description' => 'An online platform for publishing informative articles and stories',
                    'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                            'author' => 'Rahul Shenoy',
                );
                
                $this->load->view('header-top',$header_data);
                $this->load->view('category-main',$data);
                $this->load->view('right-side-bar',$right_data);
                $this->load->view('footer-bottom');

}   
//*******************************************************INDEX END**********************************************************************

//*************************************************TECH ARTICLES START******************************************************************

//********TECHONOLOGY Articles************
private function technology($article_id)
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
            $right_data['lifestyle_count'] = $this->articles->getArticlesCount('lifestyle');
            $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
            $right_data['articles'] = $this->articles->getAllArticles();
    
    
            $article_top_data['article'] = $this->articles->getAllArticles();
            
            //For header information
            $this->load->view('header-top',$article_data['details'][0]);
            
            $this->load->view('article-top',$article_top_data);
            //For Content Information
            $this->load->view('Technology/'.$article_data['details'][0]->article_id.'/content',$article_data);
            $this->load->view('article-bottom-test',$article_bottom_data);

            $this->load->view('right-side-bar',$right_data);
            $this->load->view('footer-bottom');
        }
//*************************************************TECH ARTICLES END******************************************************************

//*********************************************** START ARTICLES SECTION ***************************************************

public function Internet_of_Things_Emerging_business_models()
{
    $article_id = 'TECH_001'; 
    $this->technology($article_id);   
}

public function Project_management_methodologies()
{
    $article_id ='TECH_002';
    
    $this->technology($article_id);   
}

public function Big_data_understanding_the_buzzword()
{
    
    $article_id = 'TECH_003'; 
    
    $this->technology($article_id);   
}


public function Project_ara_future_of_Mobile_Phones()
{
    $article_id = 'TECH_004'; 
    
    $this->technology($article_id);   
}


public function Demystifying_Big_Data_Business_Intelligence_and_Business_Analytics()
{
    $article_id = 'TECH_005'; 
    
    $this->technology($article_id);   
}


public function WhatsApps_encryption_genie_is_out_of_the_bottle()
{
    $article_id = 'TECH_006'; 
    
    $this->technology($article_id);   
}

//*********************************************** END ARTICLES SECTION ***************************************************


}