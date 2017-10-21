
<!--//foreach ($records as $rec) {
//    
//   echo $rec->article_id;
//    echo br(2);
//}-->

<!--********************TESTING********************--> 
                                    <div id="like">5 </div>
                                    <button type="button" class=" fa-thumbs-up" onclick="increment()">Like</button>
                                    
                                    <script>
                                        
                                        
                                        function increment()
                                        {

                                            var x = document.getElementById('like').innerHTML;
                                            x = parseInt(x);
                                            document.getElementById('like').innerHTML = x+1;
                                            
                                        }
                                    
                                    </script>
                                    <!--********************TESTING********************--> 

                                    <script src="<?= base_url()?>assets/js/jquery-1.11.2.min.js" ></script>
                                    
<div id="c">
    <input id="text1" type="text" name="text1" /> 
    <input id="submit" type="submit" name="submit" value="SAVE IT" />
</div>
<div id="cn"></div>



<script src="<?= base_url()?>assets/js/angular.min.js"></script>

<style>
    /*.testing{
        margin: 20%;
    }*/
    </style>

<div ng-app="test" ng-controller='testCtrl' class='testing'>
    
Name :    <input type="text" ng-model="name" /> <br>
<input type="submit" ng-click="process()">
    {{game}}
    
</div>

<script>
    angular.module('test',[]).controller('testCtrl',['$scope','$http',function($scope,$http){
        $scope.process = function(){
          if($scope.name.value.length == 5)
          {
          $scope.game = 'Exactly';    
          }else{
          $scope.game = 'Nao Nao ';    
              
          }
        };
    }]);
    </script>

<!--<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(document).ready(function () { 
$('#submit').click(function(){
var ths = this;
var str = $(ths).siblings("#text1").val();
var article_id = 'TECH-001';
//$.post
//$.post("http://localhost/www.eatprayread.com/site/testProc", {t:str}, function(value){
////$(ths).parent("#c").fadeOut("fast");
//$(ths).parent("#c").siblings("#cn").html(value);
//});

//Print comments---TEST
$.post("http://localhost/www.eatprayread.com/site/getComments", {t:str} , function(value){
$(ths).parent("#c").siblings("#cn").html(value);

})
});
});
</script>
        
        
        
        