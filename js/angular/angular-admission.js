/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var admissionModule = angular.module('tams-app', []);



admissionModule.controller('PageController', function($scope){
    $scope.lga = lga;
    $scope.exam_groups = exam_groups;
    $scope.exam_type_period = exam_type_period;
    $scope.exam_subject = exam_subjects;
    $scope.exam_grades = exam_grades
    
    
    
    
    
    
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
        lg = _.filter($scope.lga, {'stateid' : value});
        $scope.state_local = lg;
        
        //console.log($scope.state_local);
    };//END of State and local Govt selection.
    
    
    $scope.gen4repeat = function(val) {
        
        var dt = new Array(); 
        for(i = 0; i < val; i++){
            dt[i] = 'item_'+i;
        }
        return dt;
    };// End of repeat element
    
  
    $scope.group_exam = null 
    $scope.$watch('group', function() {
        
        console.log("here");
        
        
    });
    
    
   $scope.get_exam_data =  function (value){ 
        var ex_type = _.filter($scope.exam_type_period, {'groupid' : value});
        
        return ex_type;
    };
    
    
    
    
    
    
    
    
    
    $scope.subject2 = null;
    $scope.grade2 = null;
    
    $scope.$watch('exam_type2', function() {
        $scope.get_exam_subject2($scope.exam_type2);  
    });
    
//    $scope.get_exam_subject2 = function(value){
//       var ex_subject2;
//       var ex_grade2;
//       
//       ex_subject2 = _.filter($scope.exam_subject, {'examid' : value});
//       ex_grade2 = _.filter($scope.exam_grades, {'examid' : value});
//       $scope.subject2 = ex_subject2;
//       $scope.grade2 = ex_grade2;
//       
//       console.log($scope.subject2);
//    };
    
    
    
});

