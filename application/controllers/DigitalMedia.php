<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class DigitalMedia extends CI_Controller {

    
    var  $category = 'digitalMedia';

// *******Constructor*******
function __construct(){
    parent::__construct();
    $this->load->library('session');
}
// *******Constructor*******

public function index() {
    
        
     //***ANGULAR SECTION.......For asynchronous Angular Calls from current page 
      {
            
                    $postData = file_get_contents('php://input');
                    
                    if($postData)
                        {
                            $dataObject = json_decode($postData);
                    
                            if($dataObject)
                            {
                                $this->handle_post($dataObject);
                            }
                        }
      }
    
    

    
    
    $data['articles'] = $this->articles->getAllArticlesByCategory($this->category);
    $right_data['digitalMedia_count'] = $this->articles->getArticlesCount('digitalMedia');
    $right_data['technology_count'] = $this->articles->getArticlesCount('technology');
    $right_data['lifestyle_count'] = $this->articles->getArticlesCount('lifestyle');
    $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
    $right_data['articles'] = $this->articles->getAllArticlesByCategory($this->category);
    
//    $page_id = 'TECHNOLOGY'; //********Very Very Important****** Everything will be fetched on the basis of page_id
    
    $header_data = array(
        'title'=>'Eat Pray Read - Digital Media',
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
public function digitalMedia($article_id)
        {
//****************************************Statistics****************************************
                $ip = $this->input->ip_address();    
//****************************************Statistics****************************************
       
//                TECH CONTENT
                                
            $article_data['details'] = $this->articles->getArticle($article_id);
            $result = $this->articles->getAuthorId($article_id) ;
            $author_detail =  $this->authors->printAuthor($result[0]->author_id);
//            print_r($author_detail[0]);
//            exit();
            
            $article_bottom_data['author'] = $author_detail[0];
            
//            print_r($article_data['author']);
//            exit();
//            

     //***ANGULAR SECTION.......For asynchronous Angular Calls from current page 
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
                        $this->general->subscribe($article_id,$dataObject);
                    }
                    
                    
                    //*** For getting the procesed like value on CLICK of LIKE button 
                    // if($purpose === 'likeClick')
                    // {
                    //     $this->stats->processArticleLike($article_id,$ip);
                        
                    //     // $this->general->
                    // }
                    // if($purpose === 'commentCount')
                    // {
                    //     $this->general->getCommentsCount($article_id);
                    // }
                    
                }
      }
    
    
     //***ANGULAR SECTION.......For asynchronous Angular Calls from current page 
     

//        Use check visitor
            $value = $this->stats->entryPoint($article_id,$ip);



//****************************************Article Bottom Data****************************************

//            ***********************COMMENTS CODE***********************
        $submit = $this->input->post('submit');
                

            $right_data['digitalMedia_count'] = $this->articles->getArticlesCount('digitalMedia');            
            $right_data['technology_count'] = $this->articles->getArticlesCount('technology');
            $right_data['lifestyle_count'] = $this->articles->getArticlesCount('lifestyle');
            $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
            $right_data['articles'] = $this->articles->getAllArticles();
    
            $footer_data['result'] = '';
            //For header information
            $this->load->view('header-top',$article_data['details'][0]);
            
            //For Content Information
                    $this->load->view('article-top');
            $this->load->view('DigitalMedia/'.$article_data['details'][0]->article_id.'/content',$article_data['details'][0]);
//            $this->load->view('about-author');
//            ****************************COMMENTS NOT ACTIVE********************
//            $this->load->view('comments');
// **IMPORTANT      Remove the first line '</div>' from the right-side-bar
//            ****************************COMMENTS NOT ACTIVE********************

            $this->load->view('article-bottom-test',$article_bottom_data);
            $this->load->view('right-side-bar',$right_data);
            $this->load->view('footer-bottom',$footer_data);
        }



public function Holy_Shit_The_New_Snapchat_Update_Is_Killing_It()
{
    $article_id = 'DIGMED_001'; 
    
    $this->digitalMedia($article_id);   
}



public function Have_You_Seen_The_Latest_Instagram_Update()
{
    $article_id ='DIGMED_002';
    
    $this->digitalMedia($article_id);   
}

public function Facebook_Now_Understands_Your_Relationships_Better()
{
    $article_id ='DIGMED_003';
    
    $this->digitalMedia($article_id);   
}
public function Seven_must_have_apps_to_be_more_productive_at_work()
{
    $article_id = 'DIGMED_004';
    $this->digitalMedia($article_id);   
    
} 

//*********************************************** END ARTICLES SECTION ***************************************************


//****   For receiving POST data on Technology index page
public function handle_post($dataObject)
{
                    $purpose = $dataObject->data->purpose;
                    
                    if($purpose === 'subscribe')
                    {
                        $this->general->subscribe($dataObject);
                    }
                    
} 


        
        
}

