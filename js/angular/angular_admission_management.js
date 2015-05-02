/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var admissionMgtModule = angular.module('tams-app', []);

admissionMgtModule.controller('PageController', function($scope){
    
    angular.element('.modal').on('show', function() {
        angular.element(this).find('.chosen-select').each(function() {
            return function(that) {
                setTimeout(function(){angular.element(that).trigger('liszt:updated');},100);   
            }(this);
        });
    });
    
    $scope.data = {
        "cur_adm_ses": cur_adm_session,
        "groups" : groups,
        "exams" : exams,
        "subjects" : subjects,
        "grades" : grades,
        "exam_subjects" : exam_subjects,
        "exam_grades" : exam_grades,
        "admissions" : admissions,
        "admission_types" : admission_types
        
    };
    
    
    groups = null;
    exams = null;
    grades = null;
    subjects = null;
    exam_subjects = null;
    exam_grades = null;
    admissions = null;
    
    $scope.current = null;
    
    angular.element('.modal').on('show', function() {
        angular.element(this).find('.chosen-select').each(function() {
            return function(that) {
                setTimeout(function(){angular.element(that).trigger('liszt:updated');},100);   
            }(this);
        });
    });
    
    
    function updateSelect(elem){
        angular.element(this).find('.chosen-select').each(function() {
            return function(that) {
                setTimeout(function(){angular.element(that).trigger('liszt:updated');},100);   
            }(this);
        });
    }
    
    
    $scope.openEditDialog = function(name, idx, e) {         
        var href = '#edit_'+name+'_modal';         
        $scope.openDialog(href, name, idx, e);
    }; 

    $scope.openDeleteDialog = function(name, idx, e) {         
        var href = '#delete_modal'; 
        $scope.current = null;
        $scope.openDialog(href, name, idx, e);
    }; 
    
    $scope.openDialog = function(href, name, idx, e) {
        $scope.current = null;
        $scope.current = angular.copy($scope.data[name+'s'][idx]);
        
        if($scope.current === null)
            return;
               
        angular.element(href).modal('show'); 
        
        e.preventDefault();
    };
    
});