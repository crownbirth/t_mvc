

var paymentModule = angular.module('tams-app', []);


paymentModule.filter('selectedProgram', function(){
    return function (programmes, level) {
        var resultArr = [];
        angular.forEach(programmes, function (prog) {
            if (parseInt(level) <= parseInt(prog.duration)) {
                resultArr.push(prog);
                
            }
        });
        
        return resultArr;
    };
});
    
paymentModule.controller('PageController', function($scope) {
    
    $scope.data = {
            "merchants" : merchants,
            "payschedules" : payschedules,
            "sessions" : sessions,
            "payheads" : payheads,
            "colleges" : colleges,
            "programmes" : programmes,
            "exceptions" : exceptions,
            "instalments" : instalments      
        };
    
    
    merchants = null;
    payschedules = null;
    sessions = null;
    payheads = null;
    colleges = null;
    programmes = null;
    exceptions = null;
    instalments = null;
    
    $scope.current = null;
    
    angular.element('.modal').on('show', function() {
        angular.element(this).find('.chosen-select').each(function() {
            return function(that) {
                setTimeout(function(){angular.element(that).trigger('liszt:updated');},100);   
            }(this);
        });
    });
    
    
    
    $scope.openAddDialog = function(name, idx, e) {   
        
        var href = '#create_'+name+'_modal';  
        $scope.openDialog(href, name, idx, e);
    }; 
    
    $scope.openViewDialog = function(name, idx, e) {   
        
        var href = '#view_'+name+'_modal';  
        $scope.openDialog(href, name, idx, e);
    }; 
    
    $scope.openSetDialog = function(name, idx, e) {   
        
        var href = '#set_'+name+'_modal';  
        $scope.openDialog(href, name, idx, e);
    }; 
    
    $scope.openEditDialog = function(name, idx, e) {         
        var href = '#edit_'+name+'_modal';         
        $scope.openDialog(href, name, idx, e);
    }; 

    $scope.openDeleteDialog = function(name, idx, e) {         
        var href = '#delete_'+name+'_modal'; 
        $scope.current = null;
        $scope.openDialog(href, name, idx, e);
    }; 
    
    $scope.openMyExcepDialog = function(name, idx, e) {         
        var href = '#create_'+name+'_modal';
        
        var me = _.filter($scope.data['payschedules'], {'scheduleid' : idx});
        
        $scope.current = null;
        $scope.current = angular.copy(me);
        
        angular.element(href).modal('show'); 
        
        e.preventDefault();
        
        console.log($scope.current);
    };
    
    $scope.openExceptionDialog = function(href, name, idx, e) {
        $scope.current = null;
        
        if($scope.current === null)
            return;
               
        angular.element(href).modal('show'); 
        
        e.preventDefault();
    };
    
    $scope.openDialog = function(href, name, idx, e) {
        $scope.current = null;
        $scope.current = angular.copy($scope.data[name+'s'][idx]);
        
        
        if($scope.current === null)
            return;
               
        angular.element(href).modal('show'); 
        
        e.preventDefault();
    };
    
    $scope.unit = 0;
    $scope.$watch('unit', function(value) {
        $scope.generate();
        
        
    });
    
    $scope.generate = function() {
        var dt = new Array();
        
        for(i = 0; i < $scope.unit; i++){
            dt[i] = 'we'+i;
        }
       $scope.dt = dt;
    };


    $scope.getUnit = function(val){
            console.log(val);
            $scope.university = false;
            $scope.college = false;
            $scope.department = false;
            $scope.programme = false;
            
            switch(val){
                
                case 'all':
                    $scope.university = true;
                    
                    break;
                    
                case 'college':
                        $scope.college = true;
                        
                    break;

                case 'department':
                        $scope.department = true;
                        
                    break;

                case 'programme':
                        $scope.programme = true;
                    
                    break;

                default:
                        $scope.college = false;
                        $scope.department = false;
                        $scope.programme = false;
                        
                    break;
            };
            
            
        };
  
});



paymentModule.controller('ExceptionController', function($scope) {
    
        $scope.data2 = {
                
                "colleges" : colleges,
                "programmes" : programmes,
                "payschedules" : payschedules
            };
        
        $scope.getUnit = function(val){
            //console.log(val);
            $scope.university = false;
            $scope.college = false;
            $scope.department = false;
            $scope.programme = false;
            
            switch(val){
                
                case 'all':
                    $scope.university = true;
                    
                    break;
                    
                case 'college':
                        $scope.college = true;
                        
                    break;

                case 'department':
                        $scope.department = true;
                        
                    break;

                case 'programme':
                        $scope.programme = true;
                    
                    break;

                default:
                        $scope.college = false;
                        $scope.department = false;
                        $scope.programme = false;
                        
                    break;
            };
            
            
        };
        
        $scope.getSchedule = function(val){
             console.log(val);
        }
  
        
});


paymentModule.controller('ScheduleController', function($scope) {
    
        $scope.data2 = {
                
                "colleges" : colleges,
                "programmes" : programmes

            };
        
        $scope.getUnit = function(val){
            console.log(val);
            $scope.university = false;
            $scope.college = false;
            $scope.department = false;
            $scope.programme = false;
            
            switch(val){
                
                case 'all':
                    $scope.university = true;
                    
                    break;
                    
                case 'college':
                        $scope.college = true;
                        
                    break;

                case 'department':
                        $scope.department = true;
                        
                    break;

                case 'programme':
                        $scope.programme = true;
                    
                    break;

                default:
                        $scope.college = false;
                        $scope.department = false;
                        $scope.programme = false;
                        
                    break;
            };
            
            
        };
  
        
});



