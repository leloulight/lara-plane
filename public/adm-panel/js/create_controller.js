var app = angular.module('app', []);

// Add new file input in form for carousel
app.controller('CreateController', function($scope, $http) {
    var fileFormId = 0;
    $scope.fileFormList = [
        {
            "id": fileFormId,
            "name":"carousel[]",
            "class": "add_form__label"
        }
    ];

    $scope.addCarouselField = function() {
        fileFormId++;
        $scope.fileFormList.push({"id": fileFormId,"name":'carousel[]', "class": "add_form__label"});
    }

    $scope.delCarouselField = function(item) {
        angular.forEach($scope.fileFormList, function (val, index) {
            if (val.id === item.id)
                $scope.fileFormList.splice(index, 1);
        })
    }
});
