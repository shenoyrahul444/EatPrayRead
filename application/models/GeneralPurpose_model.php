<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralPurpose_Model extends CI_Model {
// *******Constructor*******
function __construct(){
    parent::__construct();
}
// *******Constructor*******
    
//    *****************INDEX*****************
//  1> commentProc($article_id) => ( For Inserting Comments )    
//  2> getComments($article_id) => ( For Retriving Comments )
//  3> getCommentsCount($article_id) => ( For Retriving Comments Count)

    
//  4> xmlGenerator($article_id) => ( For XML File Creation and Updating IP...Testing)
//  5> loadCaptcha() => ( For Testing new Code)

    
//  6> test()( For Testing new Code)
//    *****************INDEX*****************
    

    // public function commentProc($article_id)            //Changed for Angular JS Retrofitting
    public function commentProc($article_id,$dataObject)
    {
        
        
        $name =  $dataObject->data->name;
        $comment = $dataObject->data->comment;
        
            $date = date("Y-m-d");
            $day = date("d");
            $month = date("m");
            $year = date("Y");
//            $time_stamp=  date("Y/m/d")." ".$hour.":".$minute.":".date("sa");

            //    date_default_timezone_set("India");
            $hour = date('h') + 3;
            if($hour > 12)
            {
                $hour = $hour - 12;
            }
        //            + 3; //***NEEDS To be corrected..hours goes above 12
            $minute  = date('i') + 30;
            if($minute > 60)
            {
                $minute = $minute - 60;
            }
        //    + 30;   //***NEEDS To be corrected..minutes goes above 60

    
    
        //    echo 'Hour : '.$hour.'<br>Minute : '.$minute.'<br>Timestamp : '.$time_stamp.'<br>Date : '.$date.'<br>';
        
            $data = array(
                'sr_no'=> '',
                'article_id' => $article_id,
                'root'=>0,
                'id'=>1,
                'comment_author_name'=>$name,
                'comment_content'=>$comment ,
                'day'=>$day ,
                'month'=>$month ,
                'year'=>$year ,
                'date' => $date,
//                'hour'=>$hour,
//                'minute'=>$minute
                );
            
                $this->db->insert('comments', $data);
       if($this->db->affected_rows()>0){
            $comments_result = '<div class="success"><h4>Comment submitted successfuly</h4></div>';
//If INSERT Successful, It will fetch all the comments again
                if($comments_result)
                {
                        $this->getComments($article_id);    
                }

        
            // return $comments_result;
        }
    }
    
    public function getComments($article_id)
    {
        
        $sql = "SELECT * FROM comments WHERE article_id = ? order by sr_no desc ";
        $query = $this->db->query($sql, array($article_id));
        $result = $query->result();
        
        // header("Content-Type: application/json; charset=UTF-8");    
        header('Content-Type: application/json');

        $result = json_encode($result);
     
     
        echo $result;
        exit(); 
        // return 
  }
    
    public function getCommentsCount($article_id)
    {
       // $this->db->where(array('$article_id'=>$article_id));
        // $result = $this->db->count_all('comments');        
        $sql = "SELECT count(*) as count FROM comments WHERE article_id = ? ";
        $query = $this->db->query($sql, array($article_id));
        
        // $result = $query->result_array();
        $result = $query->result();
        header('Content-Type: application/json');
        
        echo $result[0]->count;
        exit();
       
    }
    
    
    public function subscribe($dataObject)
    {
               $subscriber_email =  $dataObject->data->subEmail;
        
                if(!valid_email($subscriber_email))
                {
                    echo 'invalid';
                    exit();
                }
            
                //*****Checking if already a subscriber.
                $sql = "SELECT count(*) as count FROM sub_list WHERE sub_email = ? ";
                $query = $this->db->query($sql, array($subscriber_email));
        
                // $result = $query->result_array();
                $result = $query->result();
                $sub_count = $result[0]->count;
                if($sub_count < 1)
                {
                        //***getTimestamp returns an array of details related to timestamp
                        $timestamp = $this->getTimestamp();                    
                        
                        //****INSERTing into 'sub_list' table..Subscriber entry
                        $data = array(
                            'sr_no' => '' ,
                            'sub_email' => $subscriber_email,
                            'sub_timestamp' => $timestamp['date']
                            );
                        $this->db->insert('sub_list', $data);
                        
                        //*****************ADMIN MAIL Initializations***************** . Start
                        $admin_subject = "Subscriber Alert";
                        $admin_message = '  <html>
                        <head>
                        <title>Subscriber Alert</title>
                        </head>
                        <body>
                        <h1>We have a subscriber with Email Address :'.$subscriber_email.' </h1>
                        <p></p>
                        
                        </body>
                        </html>
                    ';
                
                        $to_admin = "admin@eatprayread.com";
        
                        //*****************ADMIN MAIL Initializations***************** . END
                        
                        //*****************SUBSCRIBER MAIL Initializations***************** . Start
                        $subscriber_subject = "Welcome to EatPrayRead community";
                        $subscriber_message = '  <html>
                        <head>
                        <title>Welcome to EatPrayRead community</title>
                        </head>
                        <body>
                        <h1>Thank you for subscribing to our platform.</h1>
                        <p>We at EatPrayRead aim at providing the Quality and Positive articles that would help you grow your knowledge in the areas of Business, Technology, Lifestyle and Digital Media. </p>
                        <p>And we won\'t disappoint you :) </p>
                        </body>
                        </html>
                    ';
                
                        $to_subscriber = $subscriber_email;
        
                        
                        //*****************SUBSCRIBER MAIL Initializations***************** . END
                        
                    
                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
                        // More headers
                        $headers .= 'From: <www.eatprayread.com>' . "\r\n";
        
        
                        //*********SENDING MAILS***********
                        $admin_mail = mail($to_admin,$admin_subject,$admin_message,$headers);
                        
                        $subscriber_mail = mail($to_subscriber,$subscriber_subject,$subscriber_message,$headers);
                        
                        
                        
                        if($admin_mail && $subscriber_mail)
                        {
                            echo 'success';
                            exit();
                        }else{
                            echo 'fail';
                            exit();
                        }
                        
                }
                    else   //********* For New Subscriber Entry 
                {
                    echo 'exists';
                    exit();
                }
        
    }
    
    
    
    
    public function connect($dataObject)
    {
        $name = $dataObject->data->name;
        $email = $dataObject->data->email;
        $message = $dataObject->data->message;
        
        if($email)
        {
            if(!valid_email($email))
            {
                echo 'invalid_email';
                exit();
            }    
        }else{
            echo 'empty_email';
            exit();
        }
        
        
        $timestamp = $this->getTimestamp();                    
        
        $timestamp = $timestamp['date'].' '.$timestamp['hour'].':'.$timestamp['minute'].$timestamp['hour_meridian'];
        $data = array(
            'sr_no'=> '',
            'name'=> $name,
            'email' => $email,
            'message' => $message,
            'time_stamp' => $timestamp//****Gets the timestamp in format dd-mm-yyyy
        );
        
        //****Inserting into the 'mail_list' table
        $insert_connect = $this->db->insert('mail_list',$data);
        
                    //*****************Connect MAIL Initializations***************** . Start
                        $admin_subject = "Mail from EatPrayRead Visitor";
                        $admin_message = '  <html>
                        <head>
                        <title>Connect Alert</title>
                        </head>
                        <body>
                        <h1>'.$name.' has sent you a message <br>Email ID : '.$email.' </h1>
                        <p>'.$message.'</p>
                        
                        </body>
                        </html>
                    ';
                
                        $to_admin = "admin@eatprayread.com";
        
                        
                        //*****************SUBSCRIBER MAIL Initializations***************** . END
                        
                    
                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
                        // More headers
                        $headers .= 'From: <www.eatprayread.com>' . "\r\n";
        
        
                        //*********SENDING MAILS***********
                        $admin_mail = mail($to_admin,$admin_subject,$admin_message,$headers);
            
        
                    if($insert_connect && $admin_mail)
                    {
                        echo 'success';
                        exit();
                    }else
                    {
                        echo 'error';
                        exit();
                    }
        
    }
    
    private function getTimestamp()
    {
                
            $date = date("d-m-Y");
            $day = date("d");
            $month = date("m");
            $year = date("Y");

            $hour = date('h') + 3;
            $hour_meridian = 'pm';
            if($hour > 12)
            {
                $hour = $hour - 12;
                $hour_meridian = 'pm';
            }else{
                $hour_meridian = 'am';
            }
        //            + 3; //***NEEDS To be corrected..hours goes above 12
            $minute  = date('i') + 30;
            if($minute > 60)
            {
                $minute = $minute - 60;
            }
            
            $timestamp = $date.' => '.$hour.' '.$minute;
        //    + 30;   //***NEEDS To be corrected..minutes goes above 60

    
    
        //    echo 'Hour : '.$hour.'<br>Minute : '.$minute.'<br>Timestamp : '.$time_stamp.'<br>Date : '.$date.'<br>';
        
            $data = array(
                'day'=>$day ,
                'month'=>$month ,
                'year'=>$year ,
                'date' => $date,
               'hour'=>$hour,
               'minute'=>$minute,
               'hour_meridian' => $hour_meridian, // For deciding AM and PM
               'timestamp'=> $timestamp
                );
            
                return $data;

    }
    
    
    public function xmlGenerator($article_id)
    {
        
//    ***************XML WritingFILE TEST ***************

                
                
  $fileName = $article_id.".xml";
  
           if(file_exists('application/logs/articles/'. $article_id.'.xml')) {
                $doc = new DOMDocument();   
                $doc->load('application/logs/articles/'. $article_id.'.xml' );
                  $ips = $doc->getElementsByTagName( "ip" ); 
                  
              $i = 0;
                  foreach ($ips as $ip)
                  {
//                  
                      if($ips->item(0)->nodeValue == $this->input->ip_address())
//                      if($ips->item(0)->nodeValue == '1')
                      {
                          echo 'Already IP Exists';
                          break;

                        }  else {
                                $doc->formatOutput = true; 

                                $ips = $doc->createElement( "ips" ); 
                                $doc->appendChild($ips);
                                $ip = $doc->createElement('ip');
                                 $ip->appendChild( 
                                 $doc->createTextNode($this->input->ip_address()) 
//                                 $doc->createTextNode('12312') 
                                 ); 
                                 $ips->appendChild($ip);


                    $doc->saveXML(); 
                    if($doc->save('application/logs/articles/'.$fileName))
                    {
                        echo 'File Updated';
                          break;
                    }
                    }
              }
              
        }else {
                 
               

//****If File Doesnt Exist
               
               //IF the IP-XML File Doesn't Exist Already, it will create one and start storing the IP.
               
                    $doc = new DOMDocument(); 
                    $doc->formatOutput = true; 

                    $ips = $doc->createElement( "ips" ); 
                    $doc->appendChild($ips);
                    $ip = $doc->createElement('ip');
                     $ip->appendChild( 
                     $doc->createTextNode($this->input->ip_address()) 
                     ); 
                     $ips->appendChild($ip);


                    $doc->saveXML(); 
                    if($doc->save('application/logs/articles/'.$fileName))
                        echo 'File CREATED';
                    else die(error_get_last ());



        
   }
    }
    
    public function test()
    {
        //This is executing query using prepared statements...This way all the unwanted charecters are escaped.
        //VERY SUITAblE
//        $sql = "SELECT * FROM comments WHERE article_id = ? order by sr_no ";
//        $query = $this->db->query($sql, array('TECH-001'));
//        echo '<pre>';
//        print_r($query->result());
//        echo '</pre>';
        
        $sql = "SELECT * FROM comments WHERE article_id = ? order by sr_no desc ";
        $query = $this->db->query($sql, array('TECH-001'));
        echo '<pre>';
        print_r($query->result());
        echo '</pre>';
        exit();
//        return $query;
        exit();
    }

    public function loadCaptcha()
    {
        
$config['image_library'] = 'gd';
//$config['source_image'] = '/path/to/image/mypic.jpg';
$config['create_thumb'] = TRUE;
$config['maintain_ratio'] = TRUE;
$config['width']         = 75;
$config['height']       = 50;

$this->load->library('image_lib', $config);
        
        $vals = array(
        'word'          => 'Random word',
        'img_path'      => './captcha/',
        'img_url'       => 'http://example.com/captcha/',
        'font_path'     => './path/to/fonts/texb.ttf',
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 7200,
        'word_length'   => 8,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
        )
);

$cap = create_captcha($vals);
echo $cap['image'];
exit();
    }
    
    public function imageResize()
    {
        echo base_url().'assets/images/Technology/TECH-001/1.jpg<br>';
//        $this->load->library('image_lib');
$config['image_library'] = 'gd2';
$config['source_image'] =  base_url().'assets/images/Technology/TECH-001/1.jpg';
$config['create_thumb'] = TRUE;
$config['maintain_ratio'] = TRUE;
$config['width']         = 75;
$config['height']       = 50;

$this->load->library('image_lib', $config);

        if($this->image_lib->resize())
        {
            echo 'Done';
        }
        else
        {
            echo 'Not Done';
            echo $this->image_lib->display_errors();
        }

    }
       
    public function testing()
    {
        $t = $this->input->post('t');

        $sql = "select article_view_count as view from articles where article_id = ?";

        $query = $this->db->query($sql,array('TECH-001'));
        $result = $query->result();
        
        $view_count =  $result[0]->view;
        $view_count =  intval($view_count) + 1;
        
        $update_query = 'UPDATE articles set article_view_count = ? where article_id = ?';
        $query1 = $this->db->query($update_query,array($view_count,'TECH-001'));
        
        echo $view_count;
        if($query)
            echo 'Update Value to Database<br>';
        else        
            echo 'Couldn\'t Update';
        
        exit();
        return $view_count;
//     exit();
    }
 
    public function createJson($article_id)
    {
        
        // $article_id = $this->input->get('article_id');
        // echo 'here';
        // echo $article_id;
        $sql = 'select * from articles where article_id = ?';
        $query = $this->db->query($sql,array($article_id));
        
        // if(!$query){
        //      die(mysql_error());
        // }else{
        //     echo 'true';
        // }
        $result = $query->result();
        
        
        // header("Access-Control-Allow-Origin: *");
        // header("Content-Type: application/json; charset=UTF-8");    
        // print_r ($result);
        echo json_encode($result[0]);
        // header('Content-Type: application/json');
        
        // echo json_encode($result);
        exit();
        
    }
}