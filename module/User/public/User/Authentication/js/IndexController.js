/**
 * 
 * IndexController
 * 
 **/

// Instanciando a Aplicação
var application = angular.module('application');


// Definindo controller
application.controller('IndexController', function($scope, IndexService) {
    
    /*
     * init()
     * 
     * Chamada na inicialização.
     */
    $scope.init = function() {
        
    }();

    /*
     * search()
     * 
     * Faz a busca no ML.
     */
    $scope.search = function() {
        IndexService.search($scope.searchField);
    };
    
    /*
     * searchEnter()
     * 
     * Faz a busca no ML pela tecla Enter.
     */
    $scope.searchEnter = function() {
        IndexService.search($scope.searchField);
    };
    
});