angular.module('mainApp')
.directive('resource', function($window) {
    return {
        restrict: 'E',
        scope: {
            item: '=',
            color: '@'
        },
        templateUrl: 'app/directives/templates/resourceItem.html',
        link: function (scope, element, attrs) {
            element.on('click', function() {
                $window.location.href = scope.item.url;
            });
        }
    }
});
