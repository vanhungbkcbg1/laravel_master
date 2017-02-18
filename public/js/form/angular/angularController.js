/**
 * Created by hungnv on 2/5/2017.
 */

app.controller('angularController', ['$scope','sinhvienService', function ($scope,sinhvienService) {

    $scope.name="vanhung";
    $scope.getALL= function () {
        sinhvienService.api().query(function (data) {
            $scope.sinhviens=data;
        })
    }

    $scope.getALL();
}]);