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
    
    
    
    $scope.group_exam = null
    $scope.$watch('exam_group', function() {
        $scope.get_exam_data($scope.exam_group);  
    });
    
    
    $scope.get_exam_data = function(value){
        var ex_group;
        var ex_typ_period;
        
        
        ex_group = _.filter($scope.exam_groups, {'groupid' : value});
        ex_typ_period = _.filter($scope.exam_type_period, {'groupid' : value});
        
        $scope.group_exam = ex_group;
        $scope.ex_typ_periods = ex_typ_period;
        
        //console.log($scope.ex_typ_periods);
        //console.log($scope.group_exam);
    };
    
    
    $scope.subject1 = null;
    $scope.grade1 = null;
    
    $scope.$watch('exam_type1', function() {
        $scope.get_exam_subject1($scope.exam_type1);  
    });
    
    $scope.get_exam_subject1 = function(value){
       var ex_subject1;
       var ex_grade1;
       
       ex_subject1 = _.filter($scope.exam_subject, {'examid' : value});
       ex_grade1 = _.filter($scope.exam_grades, {'examid' : value});
       $scope.subject1 = ex_subject1;
       $scope.grade1 = ex_grade1;
       
       console.log($scope.subject1);
    };
    
    $scope.subject2 = null;
    $scope.grade2 = null;
    
    $scope.$watch('exam_type2', function() {
        $scope.get_exam_subject2($scope.exam_type2);  
    });
    
    $scope.get_exam_subject2 = function(value){
       var ex_subject2;
       var ex_grade2;
       
       ex_subject2 = _.filter($scope.exam_subject, {'examid' : value});
       ex_grade2 = _.filter($scope.exam_grades, {'examid' : value});
       $scope.subject2 = ex_subject2;
       $scope.grade2 = ex_grade2;
       
       console.log($scope.subject2);
    };
    
    
});

