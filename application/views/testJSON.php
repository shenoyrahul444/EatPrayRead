	<script src="<?= base_url()?>assets/js/angular.min.js" ></script>

<div ng-app="myApp" ng-controller="myCtrl">
<h1>Working with database and creating JSON object</h1>

<button ng-click="getArticles()">Get Articles</button>

<ul>
	<!--<li ng-repeat ="article in articles">-->
		<!--{{a}}-->
		 
		<!--Category : {{category}}
		Directory : {{directory}}-->
		<br>
		
	<!--</li> -->
</ul>

Name : <input type="text" ng-model="name"><br>
Comment : <input type="text" ng-model="comment">
<br>
<button type="submit" ng-click="printDetails()">Print</button>
{{val}}


<style>
	.captcha {
		text-align:center;
		padding: 
		width : 40px;
		/*height : 35px;*/
		background : lightgreen;
	}
</style>

<button type="submit" ng-click="reset()">Reset Captcha</button>
<div class="captcha">{{a}} + {{b}}</div>
<input type='text' ng-model="answer"/>
<button type="submit" ng-click="submitAnswer()">Submit</button>
<h2 style="color:{{statusColor}}">{{status}}</h2>

</div>

<script>
	
//	alert(window.location.href);		//*********GETS Current Page URL********	
	
	
	
	// function printDetails()
	// {
	// var name = document.getElementById('name').value;
	
	// alert('Name is : '+ name+ 'and');
	// }
	// var tech_id = 'TECH-001';
	var app = angular.module('myApp', []);
	var current_url = window.location.href;
	
	app.controller('myCtrl',
			['$scope', '$http', function ($scope, $http)
					{

$scope.a = Math.floor((Math.random() * 10) + 1); 
$scope.b = Math.floor((Math.random() * 10) + 1);

$scope.reset = function(){

					$scope.a = Math.floor((Math.random() * 10) + 1); 
					$scope.b = Math.floor((Math.random() * 10) + 1);
					$scope.answer = '';
						
			};	
$scope.submitAnswer = function(){

	var result = $scope.a + $scope.b;		//Result calculated
	
	var answer = parseInt($scope.answer,10);	//Answer From the user
	 
	console.log('result is : '+ result);
	console.log('answer is : '+ answer);
	if(result == answer)
	{
		$scope.status = 'success';
		$scope.statusColor = 'green';
		
	}else {
		
		$scope.status = 'Please Try Again';
		$scope.statusColor = 'red';
		$scope.answer = '';
		$scope.reset();
	}
	// var answer = parseInt($scope.answer,10);
	// alert(answer); 
};
  
			// TESTING						
// Simple GET request example:



$scope.printDetails = function(){
//Preparing the Data 
var print_data = {
	// url : current_url,
	name : $scope.name,
	comment : $scope.comment,
	// id : 'TECH-001',
};

//Posting the data
	$http.post(window.location.href,
	{
	value : print_data
	}
).success(	function(data){
	$scope.val = data;
})};
	
}]);


// $scope.getArticles = function(){
// 					$http.post(
// 					'http://localhost/www.eatprayread.com/site/procJson',
// 						{   data : $scope.data }
// 					).success(function(data) {
// 						// this callback will be called asynchronously
// 						// when the response is available
// 						// $scope.article = data;
// 						// $scope.directory = data.directory;
// 						// $scope.category = data.category;
// 						alert(data);
// 						// alert(data.sr_no);
// 						// $scope.articles = response;
// 					}),  error(function(data) {
// 						// called asynchronously if an error occurs
// 						// or server returns response with an error status.
// 						alert('Post Not happening');
// 					});
// 			// TESTING						
						
// 						};
						
						
						
// 						// var req = {
// 						// // method:'POST',
// 						// url:'http://localhost/www.eatprayread.com/site/procJson',
// 						// data : {test:'testing values'}
// 						// // headers: {   'Content-Type': unde },	
// 						// };
						
// 						// $http.post(req).then(function(data) {
// 						// 		$scope.articles = data;
// 						// 			});
						
// 					}
// 			]
// 	);
</script>
	
	