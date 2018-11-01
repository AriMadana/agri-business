<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div ng-app="myApp" ng-controller="myCtrl">
  <button ng-click="weathFore()">Click</button>
</div>
<a href="https://darksky.net/poweredby/">Powered by Dark Sky</a>
</html>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
  $scope.weathFore = function() {
    var proxy = 'https://cors-anywhere.herokuapp.com/';
    $.ajax({
      url: proxy + "https://api.darksky.net/forecast/50cc33876eb66559b91b065db478440b/20.4323,94.7638",
      type: 'get',
      success: function(response) {
        console.log(response);
      },
      error: function(xhr, desc, err) {
        // console.log(xhr + "\n" + err);
      },
			complete: function() {
			}
    });
  };
});

$.ajax({
   url: 'long-polling.php',
   success: function(result) {
     console.log(result);
      // when everything goes fine...
   },
   type: 'GET'
});
</script>
