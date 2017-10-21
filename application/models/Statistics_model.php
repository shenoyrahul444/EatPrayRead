<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_Model extends CI_Model {
// *******Constructor*******
function __construct(){
    parent::__construct();
}
// *******Constructor*******
    public function entryPoint($article_id,$ip)
    {
        //Checking if Visitor is NEW Or RETURNING
        //Verifying ip with ip_address in 'visitor_views' table
try {
            

        $checkVisitorQuery = 'select count(*) as count from visitor_views where ip_address = ?';
        $exists_query =  $this->db->query($checkVisitorQuery,$ip );
        $exists = $exists_query->result();
        $exists_in_visitors = intval($exists[0]->count) ;
        
        if($exists_in_visitors >= 1)
        {
            //**Returning Visitor**
            {

                $this->db->select($article_id.' as count');
                $query1 = $this->db->get_where('visitor_views',array('ip_address'=> $ip));    
                
                     if($query1)
                     {
                         $count = intval($query1->result()[0]->count);
                        //  echo $count;
                        //  exit();
                     }else{
                         die(mysql_error());
                         exit();    
                     }
                     $count++;
                         
                    $this->db->where('ip_address', $ip);
                    $query3 =  $this->db->update('visitor_views', array($article_id => $count)); 
       
                    if(!$query3)
                    {
                        die(mysql_error());
                    }
                    
                    
            }
            
         }else
            //**For New Visitors**
            {
                    
//                        echo 'Created Visitor by inserting!!';
//                        echo $article_id.'     '.$ip;
//
//                        exit();
            //***Entries into VISITOR_VIEWS Table
                    $sql1 = "INSERT INTO visitor_views (`sr_no`, `ip_address`, `TECH_001`, `TECH_002`, `TECH_003`, `TECH_004`, `TECH_005`, `TECH_006`, `DIGMED_001`, `DIGMED_002`, `DIGMED_003`, `DIGMED_004`, `DIGMED_005`, `LIFE_001`, `LIFE_002`, `LIFE_003`, `DS_001`, `DS_002`)".
                            "VALUES (NULL, ? , '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
                    $query1 = $this->db->query($sql1,$ip);
                    if($query1)
                    {   
//                                *********CONVERT TO STRING****
                         $this->db->where('ip_address', $ip);
                         $query2 = $this->db->update('visitor_views', array($article_id=>'1')); 
                            {
                                if(!$query2) die('Something Went Wrong'); 
                            }
                    }
                    else
                    {
                        die(mysql_errno());
                    }

            //***Entries into ARTICLES Table ( ***INCREMENTING ARTICLE VIEW COUNT*** )
                    //Fetching the current article_view_count value
                    $this->db->select('article_view_count');
                    $query = $this->db->get_where('articles',array('article_id'=>$article_id));
                    $data['count'] = $query->result();
                    $article_view_count = intval($data['count'][0]->article_view_count);

                    $article_view_count++;  // <= INCREMENTING HERE
                    
                    //Updating the incremented article_view_count value
                    $this->db->where('article_id', $article_id);
                    $query3 =  $this->db->update('articles', array('article_view_count'=>$article_view_count)); 
       
                    if(!$query3)
                    {
                        die(mysql_error());
                    }
                    
                    
            }
//            die(mysql_error());
//            return 1;

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    }
    
    
    public function getArticleLike($article_id,$ip,$dataObject)
    {       
        $checkVisitorQuery = 'select count(*) as count from visitor_likes where ip_address = ?';
        $exists_query =  $this->db->query($checkVisitorQuery,$ip );
        $exits = $exists_query->result();
        $data['exists_in_visitors'] = intval($exits[0]->count);
        
        #fetch total Article Likes
        $sql = "select article_like_count as count from articles where article_id = ?";
        $query = $this->db->query($sql,array($article_id));
        $data['total_likes'] =  $query->result()[0]->count;
        
        if($data['exists_in_visitors'] >= 1)
        {
            // Visitor Has liked before..Hence entry was made previously
                $this->db->select($article_id.' as count');
                $query = $this->db->get_where('visitor_likes',array('ip_address'=> $ip));
                
                $data['like_value'] = $query->result()[0]->count;
        
        }else {
            
            //New Visitor
            $data['like_value'] = 0;
           
        }
        
        //*************IF Like button clicked, its forwarded for further processing
        if($dataObject->data->purpose_type == 'like_update')
        {
             $this->processArticleLike($article_id,$ip,$data);
        }    
        
        
        //Sending Like data back to View
        header('Content-Type: application/json');
        $result = json_encode($data);
        echo $result;
        exit(); 
        
    }
    
    public function processArticleLike($article_id,$ip,$data)
    {
        
    
        
        if($data['exists_in_visitors'] == 1){
            #update the Like 2's Complement
            switch ($data['like_value']) {
                case '0':
                    # updates article_id => 1
                    $this->db->where('ip_address', $ip);
                    $query3 =  $this->db->update('visitor_likes', array($article_id=>1)); 
                    
                    #incrementing the  'article_likes_count' in the 'articles' TABLE 
                        {
                        #fetch number of likes
                        $sql = "select article_like_count as count from articles where article_id = ?";
                        $query = $this->db->query($sql,array($article_id));
                        $article_likes_count =  $query->result()[0]->count;
                        
                        #incrementing
                        $article_likes_count = intval($article_likes_count) + 1;
                        
                        #updating the incremented 'article_likes_count' 
                        $this->db->where('article_id', $article_id);
                        $query3 =  $this->db->update('articles', array('article_like_count'=>$article_likes_count)); 
                        
                        #preparing Data to be sent back to VIEW
                        $data['total_likes'] = $article_likes_count;
                        $data['like_value'] = '1';
                        
                        header('Content-Type: application/json');
                        $result = json_encode($data);
                        echo $result;
                        exit();
                    }
                                
                    if($query3) return 1; else die(mysql_error());
                    break;
                    
                case '1':
                    # code...
                    $this->db->where('ip_address', $ip);
                    $query3 =  $this->db->update('visitor_likes', array($article_id=>0)); 
                    
                    #decrementing the  'article_likes_count' in the 'articles' TABLE 
                    {
                        #fetch number of likes
                        $sql = "select article_like_count as count from articles where article_id = ?";
                        $query = $this->db->query($sql,array($article_id));
                        $article_likes_count =  $query->result()[0]->count;
                        
                        #incrementing
                        $article_likes_count = intval($article_likes_count) - 1;
                        
                        #updating the incremented 'article_likes_count' 
                        $this->db->where('article_id', $article_id);
                        $query3 =  $this->db->update('articles', array('article_like_count'=>$article_likes_count)); 
                    
                        #preparing Data to be sent back to VIEW
                        $data['total_likes'] = $article_likes_count;
                        $data['like_value'] = '0';
                        
                        header('Content-Type: application/json');
                        $result = json_encode($data);
                        echo $result;
                        exit();
                        
                    }
                    
                    if($query3) return 0; else die(mysql_error());
                    
            }
             
        }else {
            # FIRST TIME LIKE by VISITOR
            # make visitor entry and increment like value
            $sql1 = "INSERT INTO visitor_likes (`sr_no`, `ip_address`, `TECH_001`, `TECH_002`, `TECH_003`, `TECH_004`, `TECH_005`, `TECH_006`, `DIGMED_001`, `DIGMED_002`, `DIGMED_003`, `DIGMED_004`, `DIGMED_005`, `LIFE_001`, `LIFE_002`, `LIFE_003`, `DS_001`, `DS_002`)".
                            "VALUES (NULL, ? , '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
            $query1 = $this->db->query($sql1,$ip);
            if($query1)
            {
                $this->db->where('ip_address',$ip);
                $query3 =  $this->db->update('visitor_likes', array($article_id=>1)); 
                    
                   
                    #incrementing the  'article_likes_count' in the 'articles' TABLE 
                    {
                        #fetch number of likes
                        $sql = "select article_like_count as count from articles where article_id = ?";
                        $query = $this->db->query($sql,array($article_id));
                        $article_likes_count =  $query->result()[0]->count;
                        
                        #incrementing
                        $article_likes_count = intval($article_likes_count) + 1;
                        
                        #updating the incremented 'article_likes_count' 
                        $this->db->where('article_id', $article_id);
                        $query3 =  $this->db->update('articles', array('article_like_count'=>$article_likes_count)); 
                    
                        
                        #preparing Data to be sent back to VIEW
                        $data['total_likes'] = $article_likes_count;
                        $data['like_value'] = '1';
                        
                        header('Content-Type: application/json');
                        $result = json_encode($data);
                        echo $result;
                        exit();
                        
                        
                        
                    }
                    
                    if($query3) return 1; else die(mysql_error());
                
            }
        }
        
        
        // exit();
        
//                     if($query1)
//                     {   
// //                                *********CONVERT TO STRING****
//                          $this->db->where('ip_address', $ip);
//                          $query2 = $this->db->update('visitor_views', array($article_id=>'1')); 
//                             {
//                                 if(!$query2) die('Something Went Wrong'); 
//                             }
//                     }
//                     else
//                     {
//                         die(mysql_errno());
//                     }

    }
    
    
    //************************For Statistics************************.Start
    public function getAllViewsData($dataObject)
    {
        
        $sql = "SELECT * FROM visitor_views order by sr_no desc ";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        // header("Content-Type: application/json; charset=UTF-8");    
        header('Content-Type: application/json');

        $result = json_encode($result);
     
        echo $result;
        exit(); 
       
    }
    
    
    public function getAllArticlesData($dataObject)
    {
        $sql = "SELECT * FROM articles order by sr_no desc ";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        // header("Content-Type: application/json; charset=UTF-8");    
        header('Content-Type: application/json');

        $result = json_encode($result);
     
        echo $result;
        exit(); 
       
    }
    
    // RETURNING IP INFORMATION to view.
    public function getJsonIPdata()
    {   
        //Getting Ip addresses from database
        $sql = "SELECT ip_address from visitor_views";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        header('Content-Type:application/json');
        $result= json_encode($result);
        echo $result;
        exit();
        
        $count = count($result);
        print_r($result[$count-1]->ip_address);
        exit();
        $string = ''; //Initialization
        
        // count($result)
        header('Content-Type:application/json');
        $json = "http://ip-api.com/json/".$result[1]->ip_address."";
        $jsonfile = file_get_contents($json);
        
        // for($i = 0; $i<5;$i++)
        // {
        //   $json = "http://ip-api.com/json/".$result[$i]->ip_address."";
          
        //   $jsonfile = file_get_contents($json);
            
        //   $string = $string.$jsonfile;
                
        // }
        
        // foreach($result as $ip){
        //     echo $ip;
            
        // }
        
        // echo '</pre>';
        echo $jsonfile;
        exit();
        header('Content-Type:application/json');
        $result= json_encode($result);
        echo $result;
        exit();
        
        $json = "http://ip-api.com/json/208.80.152.201";
        $jsonfile = file_get_contents($json);
        echo $jsonfile;
        exit();
        
        // header('Content-Type: application/json');
        // $result = json_encode($jsonfile);
        // echo $result;
        // exit();
        // var_dump(json_decode($jsonfile));

    }
    //************************For Statistics************************.End
//  *************************************************************************************************************************************
//  *************************************************************************************************************************************
//  ****************************                        VISUALIZATION AREA         **************************************************
 
 //NOTES :* 
 public function getCumilativeData($dataObject)
 {
    
    // $sql = "select sum(TECH_001) as TECH_001,sum(TECH_002) as TECH_002 from visitor_views";
    $sql = "select sum(TECH_001) as tech1,   sum(TECH_002) as tech2,   sum(TECH_003) as tech3,  sum(TECH_004) as tech4,  sum(TECH_005) as tech5, sum(TECH_006) as tech6 from visitor_views";
    $query = $this->db->query($sql);     
    $result = $query->result();
    // echo $result;
    // exit();
    $CF_articles = $this->getTotatViewsCount($result);
    echo $CF_articles;
    exit();
   
    header('Content-Type:application/json');
    // //We need to count the total of all the article views 
    $result = json_encode($CF_articles);
    echo $result;
    exit();
  }

//Sub function  
  public function getTotatViewsCount($result)
  {
      $GRAND_TOTAL_VIEW_COUNT = 0;  // <-------- For total count of all the views. Denominator for finding cumilative frequencies
      
      $CF_articles[][] = 0;           // <-------- Array for storing CUMILATIVE FREQUENCIES
    
      //Loop for finding the total count of views for ALL Articles
    foreach ($result[0] as $article => $ARTICLE_TOTAL_VIEW_COUNT) {
        $GRAND_TOTAL_VIEW_COUNT = $GRAND_TOTAL_VIEW_COUNT +  $ARTICLE_TOTAL_VIEW_COUNT;
    }
    print_r($result[0]->tech1);
    exit();
    //Creating Array for storing the cumilative frequencies for all articles. 
    foreach($result[0] as $article => $value)
    {
        $CF_articles[$article][$value/$GRAND_TOTAL_VIEW_COUNT]; 
    }
    
    print_r($CF_articles) ;
    exit();
  }
    
    
//  *************************************************************************************************************************************
//  *************************************************************************************************************************************
//  ****************************                        VISUALIZATION AREA         **************************************************
 
}