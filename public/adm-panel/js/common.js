var app = angular.module('app', []);

// Add new file input in form for carousel
app.controller('CreateController', function($scope, $http) {
    $scope.fileFormList = [
        {
            "name":"carousel[]",
            "class": "add_form__label"
        }
    ];

    $scope.addCarouselField = function() {
        $scope.fileFormList.push({"name":'carousel[]', "class": "add_form__label"});
    }
});
