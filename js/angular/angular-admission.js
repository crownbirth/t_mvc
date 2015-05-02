/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var admissionModule = angular.module('tams-app', []);



admissionModule.controller('PageController', function($scope){
    
    angular.element('.modal').on('show', function() {
        angular.element(this).find('.chosen-select').each(function() {
            return function(that) {
                setTimeout(function(){angular.element(that).trigger('liszt:updated');},100);   
            }(this);
        });
    });
    
    $scope.data = {
        "lga": lga,
        "group" : exam_groups,
        "period": exam_type_period,
        "subject" : exam_subjects,
        "grade" : exam_grades,
        
        
    };
    
    
    /**
     * Handle for Disability and disablity description
     */
    $scope.unit = 1;
    $scope.$watch('unit', function(value) {
        $scope.generate();
    });
    
    $scope.generate = function() {
        var dt = new Array();
        
        for(i = 0; i < $scope.unit; i++){
            dt[i] = 'we'+i;
        }
       $scope.dt = dt;
    };// End of disability Handle
    
    
    
    /**
     * Handle for State and local Govt selection
     * 
     */
    
    
    $scope.state_local = null;
    $scope.$watch('state', function() {
        $scope.get_state_lga($scope.state);  
        
    });
    
    $scope.get_state_lga = function(value){
        var lg;
        lg = _.filter($scope.data.lga, {'stateid' : value});
        $scope.state_local = lg;
        
        //console.log($scope.state_local);
    };//END of State and local Govt selection.
    

  
    $scope.group = 0; 
    $scope.$watch('group', function() {
        var grp;
        grp = _.filter($scope.data.group, {'groupid' : $scope.group});
        $scope.grp_itm =  genItem(grp[0].maxentries);
        
        $scope.exams = getExam(grp[0].groupid, grp[0].maxentries);
        
        console.log($scope.exams);    
    });
    
     function genItem(val) {
        
        var dt = new Array(); 
        for(i = 0; i < val; i++){
            dt[i] = 'item_'+i;
        }
        return dt;
    };// End of repeat element
    
    
    function getExam(val, entr){
        var type = new Array();
        var idx = 0;
        for(;idx < entr; idx++){
            type[idx] = _.filter($scope.data.period, {'groupid' : val});
        }
         
         return type;
    }
});

