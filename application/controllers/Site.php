<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

// *******Constructor*******
function __construct(){
    parent::__construct();
              $this->load->library('form_validation');
              $this->load->library('session');
}
// *******Constructor*******


	public function index()
	{
            
            $data['articles'] = $this->articles->getAllArticles();
            
                //***********Handling post requests************ 
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
            
            
            $page_id = 'EPR';
            
            $header_info = array(
        'title'=>'Eat Pray Read - Home',
        'description' => 'An online platform for publishing informative articles and stories',
        'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                'author' => 'Rahul Shenoy',
    );
            
            $this->load->view('header-top',$header_info);
            $this->load->view('index-content',$data);
            $this->load->view('footer-bottom');
	    
	}
        
//For getting the archives view
        public function archive()
        {
            $footer_data['result'] = '';
            $archive = $this->input->get('value');
                if(isset($archive))
                {

            $right_data['technology_count'] = $this->articles->getArticlesCount('technology');
            $right_data['lifestyle_count'] = $this->articles->getArticlesCount('lifestyle');
            $right_data['datascience_count'] = $this->articles->getArticlesCount('datascience');
            $right_data['articles'] = $this->articles->getAllArticles();
    

                    $header_data = array(
                        'title'=>'Eat Pray Read - Archive '.$archive,
                        'description' => 'An online platform for publishing informative articles and stories',
                        'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                                'author' => 'Rahul Shenoy',
                    );

                    $archive_data['articles']= $this->articles->getArticlesByYear($archive);
                    $archive_data['year'] = $archive;

                    $this->load->view('header-top',$header_data);
                    $this->load->view('archive-view',$archive_data);
//                    $this->load->view('right-side-bar',$right_data);

                    $this->load->view('footer-bottom',$footer_data);

                }else{
        //            echo 'not set bro';
                }
}
        
        public function connect()
        {   
                    $postData = file_get_contents('php://input');
                    $dataObject = json_decode($postData);
            
                if($dataObject)
                {
                    $purpose = $dataObject->data->purpose;
                    
            
                    if($purpose === 'connect')
                    {
                        $this->general->connect($dataObject);
                    }
                    
                                
                    if($purpose === 'subscribe')
                    {
                        $this->general->subscribe($dataObject);
                    }

                }  
                
                    
            $type = 'connect';    //To tell sendmail() what kind of 
            $data['result']='';
            $submit = $this->input->post('submit');
            if(isset($submit))
            {
                // Including Validation Library
                $this->load->library('form_validation');
                // Displaying Errors In Div
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                // Validation For Name Field
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[15]');
                // Validation For Email Field
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                // Validation For Contact Field
//                $this->form_validation->set_rules('dmobile', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
                // Validation For Address Field
                $this->form_validation->set_rules('message', 'Message', 'required|min_length[10]|max_length[50]');
                if ($this->form_validation->run())
                {
                            $status = $this->sendMail($type);
                            if($status)
                            {
                                $data['result'] = '<div class="success">Your message has been sent. We will respond to you shortly</div>';
                            }else{
                                $data['result'] = '<div class="error">There have been some technical issues. Kindly notify admin@eatprayread.com</div>';
                            }
                }
                    $header_info = array(
                        'title'=>'Eat Pray Read - Home',
                        'description' => 'An online platform for publishing informative articles and stories',
                        'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                                'author' => 'Rahul Shenoy',
                        );

                    $this->load->view('header-top',$header_info);
                    $this->load->view('connect-view',$data);
                    // $this->load->view('footer-bottom');
            }else{
                   $header_info = array(
                'title'=>'Eat Pray Read - Home',
                'description' => 'An online platform for publishing informative articles and stories',
                'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                        'author' => 'Rahul Shenoy',
                );
                        $this->load->view('header-top',$header_info);
                        $this->load->view('connect-view',$data);
                        // $this->load->view('footer-bottom');
            }
        }

        public function subscribe()
        {           
            $type = 'subscribe';
            $data['result']='';
            $subscribe = $this->input->post('subscribe');
            if(isset($subscribe))
            {
                // Including Validation Library
                $this->load->library('form_validation');
                // Displaying Errors In Div
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                // Validation For Email Field
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                
                if ($this->form_validation->run())
                {
                            $status = $this->sendMail($type);
                            if($status)
                            {
                                $data['result'] = '<div class="success">You have successfully subscribed to our platform. We will keep you notified</div><br>';
                            }else{
                                $data['result'] = '<div class="error">There have been some technical issues. Kindly notify admin@eatprayread.com</div><br>';
                            }
                   }
                return $data;
            }
        }
        
        public function sendMail($type)
        {
            if($type == 'connect')
            {
                
            $name =  $this->input->post('name');
            $email =  $this->input->post('email');
            $message =  $this->input->post('message');
            
            $subject = "Mail From EatPrayRead";
            $message = "
                <html>
                <head>
                <title>Title of the mail</title>
                </head>
                <body>
                <p>Message from EatPrayRead</p>
                <style>
                        th{
                        padding:5px;
                        border: 2px solid black;
                        }

                        table{
                        border: 2px solid black;
                }
                </style>

                <table>
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                </tr>
                <tr>
                <td>".$name."</td>
                <td>".$email."</td>
                <td>".$message."</td>
                </tr>
                </table>
                </body>
                </html>
                ";

            
            }elseif ($type == 'subscribe') {
                    $email =  $this->input->post('email');
                     $subject = "Subscriber Alert";
                     $message = '  <html>
                <head>
                <title>Subscriber Alert</title>
                </head>
                <body>
                <h1>We have a subscriber with Email Address :'.$email.' </p>
                </body>
                </html>
              ';
        }
                $to = "admin@eatprayread.com";

            
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <www.eatprayread.com>' . "\r\n";
//                $headers .= 'Cc: myboss@example.com' . "\r\n";

                $mail = mail($to,$subject,$message,$headers);
                if($mail)
                {
                    return true;
                }  
                else{
                    return false;    
                }
            
          }
        
        //************** DISPLAYING all data as API to be analysed using python *************************  
        public function getViews()
        {
            $this->stats->getJsonIPdata();
        }   
        //************** DISPLAYING all data as API to be analysed using python *************************  
        
               
        public function statistics()
        {
            
            //***Asynchronous calls for Statistics Main Page. START
                {
                        
                                $postData = file_get_contents('php://input');
                                
                                if($postData)
                                    {
                                        $dataObject = json_decode($postData);
                                
                                        if($dataObject)
                                        {
                                            
                                            
                                            
                                            $purpose = $dataObject->data->purpose;
                                            
                                            //**************Visualizations section**************
                                            // 1> Pi chart - View Cumulative data distribution - 
                                            if($purpose === 'pi_chart')
                                                {
                                                    $this->stats->getCumilativeData($dataObject);
                                                }
                                            
                                            //**************Visualizations section**************
                                            
                                            
                                            
                                            // Testing IP DATA
                                            
                                                if($purpose === 'ip_data')
                                                {
                                                    $this->stats->getJsonIPdata($dataObject);
                                                }
                                            //Testing IP DATA
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                
                                                if($purpose === 'view_data')
                                                {
                                                    $this->stats->getAllViewsData($dataObject);
                                                }
                                                
                                                if($purpose === 'article_data')
                                                {
                                                    $this->stats->getAllArticlesData($dataObject);
                                                }
                
                                        }
                                    }
                }
                //***Asynchronous calls for Statistics Main Page. END
                
            
            
            $header_data = array(
        'title'=>'Eat Pray Read - Statistics ',
        'description' => 'An online platform for publishing informative articles and stories',
        'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                'author' => 'Rahul Shenoy',
    );

        
        $content_data['articles'] = $this->articles->getAllArticles();
        $content_data['unique_visitor_count'] = '';
        
        // $this->stats->getAllViewsData();
        
        
        // $this->load->view('header-top',$header_data);
        $this->load->view('view-statistics',$content_data);
        // $this->load->view('footer-bottom');
    }

          
        public function comments()
        {
        
            $header_info = array(
        'title'=>'Eat Pray Read - Home',
        'description' => 'An online platform for publishing informative articles and stories',
        'keywords' => 'technology digital media lifestyle fashion health nutrition business art design',
                'author' => 'Rahul Shenoy',
    );
           $submit = $this->input->post('submit');
           
          $content_data['result'] = '';
           
        if(isset($submit))
        { 
//            $article_id = 'TECH_001';
            $content_data['comments_result'] = $this->general->commentProc($article_id);
//            echo $content_data;
//            exit();
        }
        
        $content_data['comments'] = $this->general->getComments($article_id);
        $content_data['comments_count'] = $this->general->getCommentsCount($article_id);
        
        $this->load->view('header-top',$header_info);
        $this->load->view('comments',$content_data);
        $this->load->view('footer-bottom');
    }
    
    public function getComments()
    {
        $value = $this->input->post('t');
        
        if(isset($value))
        {
            echo $value;
            exit();
        }
        $article_id = $this->input->post('t');
        $comments = $this->general->getComments($article_id);
        print_r($comments);
        exit();
    }

        public function test()
        {
            
        
        $this->load->view('test1');
        
    }
    
    public function testProc()
    {
     $value = $this->general->testing();
     return $value;
     exit();
     
    }
    
//    ****************************SOME UNEXPECTED ERRORS IN CAPTCHA****************************
//    ****************************SOME UNEXPECTED ERRORS IN CAPTCHA****************************
//    ****************************SOME UNEXPECTED ERRORS IN CAPTCHA****************************
    public function captcha()
    {
        
        $this->load->library('session');
//                    session_start();


        $submit = $this->input->post('submit');
        
        if(isset($submit))
        {
            
//                echo error_log($message);
                $userCapValue = $this->input->post('userCaptchValue');
                echo 'User cap value : '.$userCapValue.'<br>';
                echo 'OG cap value : '.$_SESSION['captcha'].'<br>';
                
                if($userCapValue == $_SESSION['captcha'])
                {
                    $data['result']='<div class="success">Human</div>';

                }else
                {
                    $data['result']='<div class="error">You are a Robot</div>';

                }
                  $this->load->view('test-captcha',$data);
                
//                $data['image'] = "Image";
//               exit();
            
        }

        else{
            $this->load->helper('captcha');
            //Creating Captcha
//                $captcha_code = random_string('alnum', 5);
                $captcha_code = random_string('basic',5);
//                $_SESSION['captcha'] = $captcha_code;
                $captcha = array(
//                    'word' => $captcha_code,
                    'word' => $captcha_code,
                    'img_path' => './captcha/',
                    'img_url' => base_url().'captcha/',
                    'font_path' => './assets/fonts/ufonts.com_perpetua.ttf',
                    'img_width' => '300',
                    'img_height' => '50',
                    'expiration' => '3600',

                );

                $_SESSION['captcha']=$captcha_code;
        
                $img = create_captcha($captcha);
                $data['image']= $img['image'];
                $data['result']='';
        }
                        $this->load->view('test-captcha',$data);


        
    }
    
    public function createJson()
{
    $article_id = 'TECH_001';
        
       //***For asynchronous Angular Calls from current page 
      {  
                    $postData = file_get_contents('php://input');
                    $dataObject = json_decode($postData);
                if($dataObject)
                {
                    echo $article_id;
                    exit();
                    // echo $dataObject->data->name;
                }
      }
    //    $data = $this->general->createJson();
    //     $json_obj = json_encode($data); 
    //     echo $json_obj;
    //     exit();
        
        
        
        
//         // print($json_obj);

//         // echo '</pre>';
// //       
//         //    exit();
//         // exit();        
// //         echo '<pre>';
// //         print_r($data);
// //         echo '</pre>';
// //        
// //         exit();
// 		// $fp = fopen('articles.json', 'w');
// 		// fwrite($fp, $data);
// 		// fclose($fp);
// //		exit();
// //return $data;
$article_id = 'TECH_001';
$data['article_id'] = $article_id; 

// print_r($data);
// exit();
        $this->load->view('testJSON',$data);
    }
    
    public function procJson()
    {
        
        $postData = file_get_contents('php://input');
        $dataObject = json_decode($postData);
        
        $article_id = $dataObject->data->id;
        echo $article_id;
        exit();
        $this->general->createJson($article_id); 
    }
    
    
    
    public function dataJson()
    {
        header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");    
        $sql = "select  sr_no , article_id from articles";
        $result = $this->db->query($sql);
        
      $rs = $result->result_array();
    //   print_r($rs);
      $rs = json_encode($rs);
    //   echo $rs;
    //   exit();
// $outp ='{"articles":['.$rs.']}';
//       return $outp;
//       exit();
//       print_r($rs[0]['sr_no']);
//       exit();  

// $outp = "";
// $i = 0;

// echo $rs;
// exit();
// while($rs) {
//     // echo 'Jere';
//     // exit();
//     if ($outp != "") {$outp .= ",";}
//     $outp .= '{"Sr. No ":"'  . $rs[0]["sr_no"] . '",';
//     $outp .= '"Article Id":"'   . $rs[0]["article_id"]        . '",';
//     // $i++;
//     // if($i==10)
//     // {
//     //  echo $outp;
//     // exit();   
//     // }
// }
// $outp ='{"records":['.$outp.']}';

    print_r($rs);
    exit();

    }
    
}
