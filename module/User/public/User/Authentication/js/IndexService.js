/**
 * 
 * IndexService
 * 
 **/

// Instanciando a Aplicação
var application = angular.module('application');

// Definindo service
application.service('IndexService', function(UtilsService) {

    /*
     * search()
     * 
     * Faz a busca no ML.
     */
    this.search = function(searchText) {
        if(!searchText) return false;
        searchText = UtilsService.cleanText(searchText);
        if(!searchText) return false;
        
        var searchUrl = 'http://lista.mercadolivre.com.br/' + searchText + '/_ItemTypeID_N_AuctTypeID_AFP';
        //var trackUrl = 'http://pmstrk.mercadolivre.com.br/jm/PmsTrk?tool=6358021&word=BUSCA_' + searchText + '&go=' + searchUrl;
        window.open(searchUrl, '_blank');
    };

});