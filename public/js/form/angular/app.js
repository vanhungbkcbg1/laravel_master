/**
 * Created by hungnv on 2/5/2017.
 */

var app=
angular.
module('angular').
config(['$locationProvider', '$routeProvider','ngResource',
    function config($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('!');

        $routeProvider.
        when('/phones', {
            template: '<phone-list></phone-list>'
        }).
        when('/phones/:phoneId', {
            template: '<phone-detail></phone-detail>'
        }).
        otherwise('/phones');
    }
]);