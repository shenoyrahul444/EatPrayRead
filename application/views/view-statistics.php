<!doctype html>
<html>
        <head>
        <title>Statistics</title>
        
        <script src="<?= base_url()?>assets/js/angular.min.js"></script>

        </head>
<body ng-app="statistics" ng-controller="statisticsCtrl">

<h1 align = "center" style="margin-top: 3em;">Number of Unique visitors on website : <u> <?= $unique_visitor_count ?></u></h1>
<h1 align="center">Pagewise Statastics</h1>


<table border="2">
        <h1>Response is : {{response}}</h1>
<tr class="columns">
        <td>Sr_No</td>
        <td>IP</td>
        <td>TECH-001</td>
        <td>TECH-002</td>
        <td>TECH-003</td>
        <td>TECH-004</td>

        
        <td>Article Like Count</td>
        <td>Author</td>

</tr>
<tr ng-repeat="view in visitor_views">
        <td>{{view.sr_no}}</td>
        <td>{{view.ip_address}}</td>
        <td>{{view.TECH-001}}</td>
        <td>{{view.TECH-002}}</td>
        <td>{{view.TECH-003}}</td>
        <td>{{view.TECH-004}}</td>
</tr>

        </table>

<!--******************Articles Table******************.START-->
<table border="2">
        <h1>Articles Table</h1>
<tr class="columns">
        <td>Sr_No</td>
        <td>Article ID</td>        
        <td>Article View Count</td>
        <td>Article Like Count</td>
        <td>Author ID</td>

</tr>
<tr ng-repeat="article in article_data">
        <td>{{article.sr_no}}</td>
        <td>{{article.article_id}}</td>
        <td>{{article.article_view_count}}</td>
        <td>{{article.article_like_count}}</td>
        <td>{{article.author_id}}</td>

        
        
</tr>

        </table>
<!--******************Articles Table******************.END-->


<script>
                        angular.module('statistics',[]).controller('statisticsCtrl',['$scope','$http',function($scope,$http){
                        
                        
                        //***********Views Data. Start*************
                        var views = {
                        purpose : 'view_data'      
                        };
                        
                        $http.post(window.location.href,
                                {
                                        data : views
                                }).success(function(response){
                                        // alert(response);
                                        $scope.visitor_views = response;
                                });
                                
                        //***********Views Data. End*************
                                
                        //***********Articles Data. Start*************
                                
                        var articles = {
                        purpose : 'article_data'      
                        };
                        
                        $http.post(window.location.href,
                                {
                                        data : articles
                                }).success(function(response){
                                        // alert(response);
                                        $scope.article_data = response;
                                });
                        //***********Articles Data. End*************
                                
                        }]);   

                
       
        </script>
</body>
</html>