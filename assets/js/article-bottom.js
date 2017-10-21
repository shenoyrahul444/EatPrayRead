 var app = angular.module('article',[]);
   app.controller('articleCtrl',['$http','$scope',function($http,$scope){
       
//*************************** On Load Comments Retrival .  START ***************************
var dataOnLoad = {
            purpose : 'onloadComments',
        };

$http.post(window.location.href,
         {
         data : dataOnLoad,
         }
        ).success( function(response){
            
            //
            $scope.comments = response;
            //  $scope.val = response; // TESTING
            //Unsetting input fields
            $scope.name = '';
            $scope.comment = '';
        
        });

//For getting Comments count
$http.post(window.location.href,
        {
            data: { purpose : 'comments_count'}    
        }).success(function(response){
                // alert(response);
                
           $scope.total_comments_count = response;     
        });
        
        
//For getting Unique_Views_count
$http.post(window.location.href,
        {
            data: { purpose : 'unique_visitor_view_count'}    
        }).success(function(response){
        
           $scope.unique_visitor_view_count = response;     
        });
        
        
        

// var countData = {
//         purpose : 'commentCount'
//         };
        
// $http.post(window.location.href,
//          {
//          data : countData,
//          }
//         ).success( function(response1){
            
//             //
//             // respo
            
//             $scope.totalCommentCount = '5';
//             // $scope.totalCommentCount = response;
//             //  $scope.val = response; // TESTING
//             //Unsetting input fields
            
        
//         });




//    $http.post(window.location.href,
//          {
//          value : commentData,
//          }
//         ).success( function(response){
            
//             //
//             $scope.comments = response;
            
//             //Unsetting input fields
//             $scope.name = '';
//             $scope.comment = '';
        
//     });
//*************************** On Load Comments Retrival . END ***************************
           
       
//****************************OnClick of  "Submit" button***************************
$scope.addComment = function(){
         
        //1> Accumulating Data from inputs . START
        var data = {
            purpose : 'submit',
            name : $scope.name,  
            comment : $scope.comment,  
    
        };
        
         //2> Sending comment Data for submission and retriving results . START
         $http.post(window.location.href,
            {
                data : data,  // data local object being appointed to data JSON object.
                }
            ).success( function(response){
                $scope.comments = response;
                if(response){
                $scope.comment_status_type = 'success';
                $scope.comment_status = 'Your comment has been added.';        
                }
                 
                //Unsetting input fields
                // $scope.name = '';
                // $scope.comment = '';
            });
          
        
        // 3> Getting the updated total comments count .START
        // var countData = {
        //     purpose : 'commentCount'
        //     };
        
        // $http.post(window.location.href,
        //         {
        //         data : countData,
        //         }
        //         ).success( function(response){
                    
        //             if(response)
        //             {
        //             // $scope.totalCommentCount = '5';                
        //             }
        // });
         
         //For getting Comments count
        $http.post(window.location.href,
                {
                data: { purpose : 'comments_count'}    
                }).success(function(response){
                        // alert(response);
                        
                $scope.total_comments_count = response;     
                });
        //Getting the total comment count


}; // End Submit button logic
        
        //Unsetting the input fields
//****************************OnClick of  "Submit" button***************************
        



//***********LIKE CLICK LIKE CLICK LIKE CLICK LIKE CLICK LIKE CLICK*********************************        
//Functional Impact => 
// 1> Should show current like count by default and Also see if that IP has clicked like before 
// 2> ON CLICK : a-> Update the Article Like count against IP and get the updated like count
//               b-> Increment/Decrement the total Like if the IP has not-Liked/Liked before
//               
//
// 


//Step 1 -> Default Like Initialization
   var initLikeData = {
           purpose: 'likeProcess',
           purpose_type : 'init'
   }
  $http.post(window.location.href,
          {
                  data: initLikeData
          }
          ).success(    function(response){
                //   alert('response R');
                $scope.likeResponse = response.like_value;
                if(response.like_value === '1')
                {
                $scope.like_class = 'fa fa-thumbs-up';
                
                $scope.like_suggestion_class = 'success';
                $scope.like_suggestion_text = 'You have already liked this article. We are Happy you found it interesting';                  
                // $scope.like_suggestion = '<div class="success">You have already liked this article</div>';
                }else{
                        
                $scope.like_class = 'fa fa-thumbs-o-up';
                                  
                $scope.like_suggestion_class = 'error';
                $scope.like_suggestion_text = 'If you find the article Interesting, please hit the Like button';
                        
                }
                
                $scope.total_likes = response.total_likes;
          });
                // $scope.likeStatus = 'fa fa-thumbs-o-up';                  
  
  

$scope.likeClick = function(){
  
  var likeClickData = {
          purpose: 'likeProcess',
          purpose_type : 'like_update'
  };
  
  $http.post(window.location.href,
          {
                  data:likeClickData
          }
          ).success( function(response){
        
        // $scope.likeResponse = response.like_value;

        if(response.like_value === '1')
        {          
                $scope.like_class = 'fa fa-thumbs-up';
                                        
                $scope.like_suggestion_class = 'success';
                $scope.like_suggestion_text = 'We are happy you found this article informative. Thank you for your response';
        }else{
                $scope.like_class = 'fa fa-thumbs-o-up';
                                        
                $scope.like_suggestion_class = 'error';
                $scope.like_suggestion_text = 'If you find the article Interesting, please hit the Like button';
        }               
                  
        $scope.total_likes = response.total_likes;  
        
          
          });
  
     // if($article_liked == 0){ 
                               //         echo '<i class="fa fa-thumbs-o-up" style="background: none;">';                            
                            // }else{
                              //          echo '<i class="fa fa-thumbs-up" style="background: none;">';
                                //}
                         
  
        
};

//***********LIKE CLICK LIKE CLICK LIKE CLICK LIKE CLICK LIKE CLICK*********************************        
        
//************************SUBSCIBE***********************************. START

$scope.subscribe = function(){
        
  var dataSubscribe = {
          purpose : 'subscribe',
          subEmail : $scope.subEmail
            };
            
     $http.post(window.location.href,
             {
                     data : dataSubscribe
             }).success(function(response){
                     
                        if(response === 'exists')
                        {
                                $scope.subscribe_response_type = 'error';
                                $scope.subscribe_message = 'You have already subscribed to our Newsletters. ';
                                // $scope.subEmail = '';
                        }
                        if(response === 'success')
                        {
                                $scope.subscribe_response_type = 'success';
                                $scope.subscribe_message = 'Thank you for subscribing';
                                // $scope.subEmail = '';
                                
                        } 
                        
                        if(response === 'fail')
                        {
                                
                                        $scope.subscribe_response_type = 'error';
                                        $scope.subscribe_message = 'Therez been some error..Please report this problem to admin@eatprayread.com';
                                
                        }
                        
                        if(response === 'invalid')
                        {
                                        $scope.subscribe_response_type = 'error';
                                        $scope.subscribe_message = 'Doesn\'t seem like a valid Email address. Please Try again';
                                
                        }      
             });       
        
};
//************************SUBSCIBE***********************************. END 

//************************ CONNECT ***********************************. START
$scope.connect_name = '';    

$scope.submit_message = function(){
 
 
 var connect_name = $scope.connect_name;
 var connect_message = $scope.connect_message;
 var connect_email = $scope.connect_email;
 
 
 if(connect_name.length < 9)
 {
                                $scope.connect_response_type = 'error';
                                $scope.connect_response_message = 'Please enter your full name ';
                                return;
 }
 
 if(connect_email.length < 5)
 {
                                $scope.connect_response_type = 'error';
                                $scope.connect_response_message = 'Email doesn\'t seem to be valid.. ';
                                return;
 }
 
 if(connect_message.length < 5)
 {
                                $scope.connect_response_type = 'error';
                                $scope.connect_response_message = 'Email doesn\'t seem to be valid.. ';
                                return;
 }
 
 var connect_data = {
                purpose : 'connect',
                name : $scope.connect_name,
                email : $scope.connect_email,
                message : $scope.connect_message     
 };

$http.post(window.location.href,
        {
                data: connect_data
        }).success(function(response){
                
                
                if(response === 'invalid_email')
                {
                                $scope.connect_response_type = 'error';
                                $scope.connect_response_message = 'Doesn\'t seem like a valid Email address. Please Try again';
                        
                }
                
                if(response === 'invalid_name')
                {
                                $scope.connect_response_type = 'error';
                                $scope.connect_response_message = 'Please enter your full name ';
                        
                }      
                
                if(response === 'success')
                        {
                                $scope.connect_response_type = 'success';
                                $scope.connect_response_message = 'Your mail has been sent successfully. We will get in touch with you shortly';
                                // $scope.connect_name = '';
                                // $scope.connect_email = '';
                                // $scope.connect_message = '';
                                
                        }
                        
                
        });
     
}; 
//************************ CONNECT ***********************************. END        

       
// ***********************************MODAL Code***********************************        

$scope.open = function() {
  $scope.showModal = true;
};

$scope.ok = function() {
  $scope.showModal = false;
};

$scope.cancel = function() {
  $scope.showModal = false;
};

// ***********************************MODAL Code***********************************        
        
    
   }]);                 //***************ENDING Controller Scope
   
