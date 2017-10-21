<script src="<?= base_url() ?>assets/js/angular.min.js" ></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" ></script>

<link href="<?= base_url() ?>assets/css/bootstrap.min.css" />
<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  

<style>
	.error{
		background: green;
	}
	</style>
<body>



<h2>Validation Example</h2>

<form ng-app="myApp" ng-controller="validateCtrl" name="myForm" novalidate>

<p>Username:<br>
<input type="text" name="user" ng-model="user" required>
<span class="error" ng-show="myForm.user.$dirty && myForm.user.$invalid">
<span ng-show="myForm.user.$error.required">Username is required.</span>
</span>
</p>

<p>Email:<br>
<input type="email" name="email" ng-model="email" required>
<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
<div class="error" ng-show="myForm.email.$touched && myForm.email.$error.required">Email is required.</div>
<span ng-show="myForm.email.$error.email">Invalid email address.</span>
</span>
</p>

<p>
<input type="submit" ng-click="submit()"
ng-disabled="myForm.user.$dirty && myForm.user.$invalid ||  
myForm.email.$dirty && myForm.email.$invalid">
</p>

</form>

<script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
    $scope.user = '';
    $scope.email = '';

$scope.submit = function(){
alert('Done');
};

});
</script>

</body>
</html>



<!--<div ng-app="test1" ng-controller="test1Ctrl">
	<form name='studentForm' novalidate>
		<input type="text" ng-model="name" name="name"  required />
		<span ng-show="studentForm.name.$touched && studentForm.name.$invalid">Please enter a valid name</span> 
		<input type="email" ng-model="email" name="email" id="email" required />
			{{studentForm.email.$valid}}

		<button type="submit" ng-click="submit_form()">Submit</button>
	</form>
</div>
	
	<style>
	input.ng-invalid {
    background-color: pink;
}
	</style>
	
	<script>
	
	angular.module('test1',[]).controller('test1Ctrl',['$scope','$http',function($scope,$http){
		
	$scope.submit_form = function(){
	alert('Inside the form');	
	};
		
	}]);
	
	function submit()
	{
		var name= document.getElementById('name').value;
		if(name.length > 5)
		{
			submit_form();
		}else{
			alert('Name needs to be atleast 5 chars');
		}
				
	}
	
	
	 </script>-->
	 