<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>TAMS - Payment Management</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- Tagsinput -->
	<link rel="stylesheet" href="css/plugins/tagsinput/jquery.tagsinput.css">
	<!-- chosen -->
	<link rel="stylesheet" href="css/plugins/chosen/chosen.css">
	<!-- multi select -->
	<link rel="stylesheet" href="css/plugins/multiselect/multi-select.css">
	<!-- timepicker -->
	<link rel="stylesheet" href="css/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- colorpicker -->
	<link rel="stylesheet" href="css/plugins/colorpicker/colorpicker.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="css/plugins/datepicker/datepicker.css">
	<!-- Plupload -->
	<link rel="stylesheet" href="css/plugins/plupload/jquery.plupload.queue.css">
	<!-- select2 -->
	<link rel="stylesheet" href="css/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- imagesLoaded -->
	<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.slider.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Masked inputs -->
	<script src="js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
	<!-- TagsInput -->
	<script src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- Datepicker -->
	<script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Timepicker -->
	<script src="js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- Colorpicker -->
	<script src="js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- Chosen -->
	<script src="js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- MultiSelect -->
	<script src="js/plugins/multiselect/jquery.multi-select.js"></script>
	<!-- CKEditor -->
	<script src="js/plugins/ckeditor/ckeditor.js"></script>
	<!-- PLUpload -->
	<script src="js/plugins/plupload/plupload.full.js"></script>
	<script src="js/plugins/plupload/jquery.plupload.queue.js"></script>
<!--	 Custom file upload -->
	<script src="js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
	<script src="js/plugins/mockjax/jquery.mockjax.js"></script>
	<!-- select2 -->
	<script src="js/plugins/select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- complexify -->
	<script src="js/plugins/complexify/jquery.complexify-banlist.min.js"></script>
	<script src="js/plugins/complexify/jquery.complexify.min.js"></script>


	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/icon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>

<body data-mobile-sidebar="button">
	<div id="navigation">
            <div class="container-fluid">
                <a href="#" class="mobile-sidebar-toggle"><i class="icon-th-list"></i></a>
                <a href="#" id="brand">TAMS</a>
                <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
                <ul class='main-nav'>
                    <li>
                            <a href="index.html">
                                    <span>Dashboard</span>
                            </a>
                    </li>
                    <li class="active">
                            <a href="Payment_management.html">
                                    <span>Payment Management</span>
                            </a>
                    </li>
                </ul>
                <div class="user">
                    <ul class="icon-nav">
                        <li class='dropdown'>
                            <a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope-alt"></i><span class="label label-lightred">4</span></a>
                            <ul class="dropdown-menu pull-right message-ul">
                                    <li>
                                            <a href="#">
                                                    <img src="img/demo/user-1.jpg" alt="">
                                                    <div class="details">
                                                            <div class="name">Mrs Abimbola</div>
                                                            <div class="message">
                                                                    Hello Admin ...
                                                            </div>
                                                    </div>
                                            </a>
                                    </li>						
                                    <li>
                                            <a href="components-messages.html" class='more-messages'>Go to Message center <i class="icon-arrow-right"></i></a>
                                    </li>
                            </ul>
                        </li>
                        <li class="dropdown sett" rel="tooltip" data-placement="bottom" title="configuration">     
                                        <a href="configuration.html"><i class="icon-cog"></i></a>                                                

                        </li>
                        <div class="dropdown pull-right">                                    
                                <a href="#" class='dropdown-toggle' data-toggle="dropdown">Ademola Adenubi <img src="img/demo/user-avatar.jpg" alt=""></a>					                                        
                                <ul class="dropdown-menu">                                                                     
                                        <li>
                                                <a href="userprofile.html">Edit profile</a>
                                        </li>
                                        <li>
                                                <a href="#">Account settings</a>
                                        </li>
                                        <li>
                                                <a href="more-login.html">Sign out</a>
                                        </li>
                                </ul>

                        </div>
                    </ul>                           
                </div>
            </div>
        </div>
	<div class="container-fluid" id="content">
            <div id="left">
                    <form action="search-results.html" method="GET" class='search-form'>
                            <div class="search-pane">
                                    <input type="text" name="search" placeholder="Search here...">
                                    <button type="submit"><i class="icon-search"></i></button>
                            </div>
                    </form>
                    <div class="subnav">                                
                            <div class="subnav-title">
                                    <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>User</span></a>
                            </div>
                            <ul class="subnav-menu">					
                                    <li>
                                            <a href="/tamsboot2/tamsboot2/userprofile.html">Ademola Adenubi</a>                                                
                                    </li>					
                            </ul>
                    </div>	
                    <div class="subnav">                                
                            <div class="subnav-title">
                                    <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>General Info</span></a>
                            </div>
                            <ul class="subnav-menu">					
                                    <li>
                                            <a href="/tamsboot2/tamsboot2/college.html">Colleges</a>
                                    </li>
                                    <li>
                                            <a href="#">Departments</a>
                                    </li>
                                    <li>
                                            <a href="#">Courses</a>
                                    </li>
                            </ul>
                    </div>			
                    <div class="subnav">
                            <div class="subnav-title">
                                    <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Administration</span></a>
                            </div>
                            <ul class="subnav-menu">					
                                    <li>
                                            <a href="#">Message</a>
                                    </li>
                                    <li>
                                            <a href="#">Set Session</a>
                                    </li>
                                    <li>
                                            <a href="#">Colleges</a>
                                    </li>
                                    <li>
                                            <a href="#">Courses</a>
                                    </li>
                                    <li>
                                            <a href="#">Staff</a>
                                    </li>
                                    <li>
                                            <a href="#">Student</a>
                                    </li>
                                    <li>
                                            <a href="#">Appointments</a>
                                    </li>
                                    <li>
                                        <a href="#">Disciplinary</a>
                                    </li>
                                    <li>
                                            <a href="#">Assign Course</a>
                                    </li>
                                    <li>
                                            <a href="#">Allocate Course</a>
                                    </li>
                                    <li>
                                            <a href="#">Upload Result</a>
                                    </li>
                                    <li>
                                            <a href="#">Consider Result</a>
                                    </li>
                                    <li>
                                            <a href="#">Broad Sheet</a>
                                    </li>                                       
                            </ul>
                    </div>		
            </div> 
            <div id="main">
                <div class="container-fluid">
                    <div class="page-header">					
                            <div class="pull-left">                                
                                <form>
                                    <input id="logo" type="image" src="img/logo.jpg" name="logo">
                                </form>
                            </div>
                            <div class="pull-right">
                                <ul class="stats">
                                    <li class="lightred">
                                        <i class="icon-calendar"></i>
                                            <div class="details">
                                                <span class="big">March 13, 2014</span>
                                                <span>Thursday, 17:01</span>
                                            </div>
                                     </li>
                                </ul>
                            </div>
                    </div>   				
                    <div class="breadcrumbs">
                            <ul>
                                    <li>
                                            <a href="index.html">Dashboard</a>
                                            <i class="icon-angle-right"></i>
                                    </li>						
                                    <li>
                                            <a href="payment_management.html">Payment Management</a>
                                    </li>
                            </ul>					
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box box box-color">
                                <div class="box-title">
                                    <h3>
                                            <i class="icon-money"></i>
                                            Payment Management
                                    </h3>
                                    <ul class="tabs">
                                            <li class="active">
                                                    <a href="#t6" data-toggle="tab">Register Merchant</a>
                                            </li>
                                            <li>
                                                    <a href="#t7" data-toggle="tab">Pay Option</a>
                                            </li> 
                                            <li>
                                                    <a href="#t8" data-toggle="tab">Pay Head</a>
                                            </li>
                                            <li>
                                                    <a href="#t9" data-toggle="tab">Pay Schedule</a>
                                            </li>
                                             <li>
                                                    <a href="#t10" data-toggle="tab">Installment</a>
                                            </li>
                                    </ul>
                                </div>                                
                                <div class="box-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="t6">                                                                                       
                                            <div class="box box-content">
                                                <ul class="tabs pull-right form">                                                    
                                                    <li class="btn btn-lime" data-toggle="modal" href="#create_merchant_modal">
                                                        <i class="icon-plus"> </i>
                                                        Add
                                                    </li>                                                                                                                 
                                                </ul><br/><br/>

                                                <table id="all_merchant" class="table table-hover table-nomargin">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th class='hidden-350'>Merchant Name</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Skye Bank PLC</td>
                                                            <td>                                                               
                                                               <div class="btn-group">
                                                                    <a href="#" data-toggle="dropdown" class="btn  btn-lime dropdown-toggle"><i class="icon-cog"> </i> <span class="caret"></span></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <a ng-click="openViewDialog('merchant', $index, $event)">View</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openEditDialog('merchant', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('merchant', $index, $event)">Delete</a>
                                                                        </li>													
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                        </tr>                                          
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="t7">                                                                                       
                                            <div class="box box-content">
                                                <ul class="tabs pull-right form">                                                    
                                                    <li class="btn btn-lime" data-toggle="modal" href="#create_option_modal">
                                                        <i class="icon-plus"> </i>
                                                        Add
                                                    </li>                                                                                                                 
                                                </ul><br/><br/>
                                                <!--college modal-->
                                                <div 
                                                    class="modal hide fade" 
                                                    id="create_option_modal" 
                                                    tabindex="-1" role="dialog" 
                                                    aria-labelledby="basicModal" 
                                                    aria-hidden="true">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                        <h4 class="modal-title" id="myModalLabel">Add Pay Option</h4>
                                                    </div>
                                                    <form id="create_college_form" class="form-horizontal form-striped" method="post" action="#">
                                                        <div class="modal-body">
                                                            <div class="control-group">
                                                               <label for="college_name" class="control-label">Name:</label>
                                                                <div class="controls">
                                                                    <input type="text" name="name" id="college_name" class="input-xlarge" >
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                               <label for="college_name" class="control-label">Type:</label>
                                                                <div class="controls">
                                                                    <input type="text" name="type" id="college_name" class="input-xlarge" >
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                               <label for="college_name" class="control-label">Api:</label>
                                                                <div class="controls">
                                                                    <textarea name="textarea" id="college_name" class="input-xlarge"></textarea>
                                                                </div>
                                                            </div>                                                                                                                                                                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
                                                            <button class="btn btn-primary" type="submit" id="create_college_button">Add</button>
                                                        </div> 
                                                    </form>
                                                </div>
                                                <table class="table table-hover table-nomargin">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th></th>
                                                            <th class='hidden-350'>Pay Option Name</th>
                                                            <th>Activate</th>
                                                            <th class='hidden-480'></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td></td>
                                                            <td class='hidden-350'>Point of sale (P.O.S)</td>
                                                            <td class='hidden-1024'>
                                                                <div class="controls">                                                                        
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="checkbox">                                                                       
                                                                    </label>                                                                  
                                                                </div>
                                                            </td>
                                                            <td>                                                               
                                                               <button class="btn btn-lime"> <i class="icon-edit"></i> </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="t8">
                                            <div class="box box-content">
                                                <div class="tab-content">                                                        
                                                    <div class="box-content">
                                                        <ul class="tabs pull-right form">                                                    
                                                            <li class="btn btn-lime" data-toggle="modal" href="#create_type_modal">
                                                                <i class="icon-plus"> </i>
                                                                Add Type
                                                            </li>                                                                                                                 
                                                        </ul><br/><br/>
                                                        <table id="all_merchant" class="table table-hover table-nomargin">
                                                            <thead>
                                                                <tr>
                                                                    <th>S/N</th>
                                                                    <th></th>
                                                                    <th>Type</th>                                                                    
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td></td>
                                                                    <td>School Fees</td>                                                                    
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a href="#" data-toggle="dropdown" class="btn  btn-lime dropdown-toggle"><i class="icon-cog"> </i> <span class="caret"></span></a>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a>View</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a>Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a>Delete</a>
                                                                                </li>													
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>                                
                                                                    <td>2</td>
                                                                    <td></td>
                                                                    <td>Acceptance Fee</td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a href="#" data-toggle="dropdown" class="btn  btn-lime dropdown-toggle"><i class="icon-cog"> </i> <span class="caret"></span></a>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a>View</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a>Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a>Delete</a>
                                                                                </li>													
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--type modal-->
                                                        <div 
                                                            class="modal hide fade" 
                                                            id="create_type_modal" 
                                                            tabindex="-1" role="dialog" 
                                                            aria-labelledby="basicModal" 
                                                            aria-hidden="true">

                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                <h4 class="modal-title" id="myModalLabel">Add Type</h4>
                                                            </div>
                                                            <form id="create_type_form" class="form-horizontal form-striped" method="post" action="#">                                                                           
                                                                    <div class="control-group">
                                                                       <label for="college_name" class="control-label">Type:</label>
                                                                        <div class="controls">
                                                                            <input type="text" name="type" id="college_name" class="input-xlarge" >
                                                                        </div>
                                                                    </div>                                                                                                                                                                                                                                                                                                                                                    
                                                                <div class="modal-footer">
                                                                    <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
                                                                    <button class="btn btn-primary" type="submit" id="create_type_button">Add</button>
                                                                </div> 
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="t9">                                            
                                            <div class="box box-content">
                                                <ul class="tabs pull-right form">                                                    
                                                    <li class="btn btn-lime" data-toggle="modal" href="#create_sppay_modal">
                                                        <i class="icon-plus"> </i>
                                                        Add Special Payment
                                                    </li>                                                                                                                 
                                                </ul><br/><br/>
                                                <!--college modal-->
                                                <div 
                                                    class="modal hide fade" 
                                                    id="create_sppay_modal" 
                                                    tabindex="-1" role="dialog" 
                                                    aria-labelledby="basicModal" 
                                                    aria-hidden="true">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                        <h4 class="modal-title" id="myModalLabel">Add Pay Option</h4>
                                                    </div>
                                                    <form id="create_college_form" class="form-horizontal form-striped" method="post" action="#">
                                                    <div class="modal-body">
                                                            <div class="control-group">
                                                                <label for="college_name" class="control-label">Unit: </label>
                                                                <div class="controls">
                                                                    <div class="input-prepend input-append">
                                                                        <div class="btn-group">                                                                    
                                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                            College
                                                                            <span class="caret"></span>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                               <li class='radio'>
                                                                                   <input type="checkbox" name="checkbox"> All                                                             
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">COSIT</a>
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">COAVOET</a>
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">COHUM</a>
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">CUSMAS</a>
                                                                               </li>
                                                                            </ul>
                                                                        </div>
                                                                        <span class="input-mini uneditable-input" id="appendedPrependedDropdownButton"></span>                                                                  
                                                                        <div class="btn-group">
                                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                            Department
                                                                            <span class="caret"></span>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                               <li class='radio'>
                                                                                   <input type="checkbox" name="checkbox"> All                                                             
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">Computer Sci</a>
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">Biology</a>
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">Telecoms</a>
                                                                               </li>
                                                                               <li>
                                                                                <a href="#">Physics</a>
                                                                               </li>
                                                                           </ul>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label for="session" class="control-label">Session</label>
                                                                <div class="controls">
                                                                    <div class="input-xlarge"><select name="session" id="session" class='chosen-select'>
                                                                        <option value="1">Select</option>
                                                                        <option value="1">All</option>                                                                        
                                                                        <option value="1">2012 / 2013</option>
                                                                        <option value="2">2013 / 2014</option>
                                                                        <option value="3">2014 / 2015</option></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label for="level" class="control-label">Level:</label>
                                                                <div class="controls">
                                                                    <div class="input-xlarge"><select name="select" id="select" class='chosen-select'>
                                                                        <option value="1">Select</option>
                                                                        <option value="1">All</option>                                                                        
                                                                        <option value="1">100</option>
                                                                        <option value="2">200</option>
                                                                        <option value="3">300</option>
                                                                        <option value="4">400</option>
                                                                        <option value="5">500</option>
                                                                        <option value="6">600</option></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label for="payhead" class="control-label">Pay Head</label>
                                                                <div class="controls">
                                                                    <div class="input-xlarge"><select name="payhead" id="payhead" class='chosen-select'>
                                                                        <option value="1">Select</option>
                                                                        <option value="1">All</option>                                                                        
                                                                        <option value="1">School Fees</option>
                                                                        <option value="2">Acceptance Fee</option></select>                                                                     
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">   
                                                                <label for="text" class="control-label">Indegene</label>
                                                                <div class="controls">                                                                    
                                                                    <div class="input-append">
                                                                        <input class="span9" id="appendedPrependedInput" type="text">
                                                                        <span class="add-on">.00</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group"> 
                                                               <label for="text" class="control-label">Non Indegene</label>
                                                               <div class="controls">                                                                                                                                       
                                                                    <div class="input-append">
                                                                        <input class="span9" id="appendedPrependedInput" type="text">
                                                                        <span class="add-on">.00</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group"> 
                                                               <label for="text" class="control-label">Foreign</label>
                                                               <div class="controls">                                                                                                                                        
                                                                    <div class="input-append">
                                                                        <input class="span9" id="appendedPrependedInput" type="text">
                                                                        <span class="add-on">.00</span>
                                                                    </div>
                                                               </div>
                                                            </div>   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
                                                        <button class="btn btn-primary" type="submit" id="create_college_button">Add</button>
                                                    </div> 
                                                </form>
                                                </div>
                                                <table class="table table-hover table-nomargin">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th></th>
                                                            <th>Level</th>
                                                            <th></th>
                                                            <th>Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td></td>
                                                            <td>100</td>
                                                            <td></td>
                                                            <td>90,000</td>
                                                            <td><button class="btn btn-lime"> <i class="icon-edit"></i> </button> </td> 
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td></td>
                                                            <td>200</td>
                                                            <td></td>
                                                            <td>60,000</td>
                                                            <td><button class="btn btn-lime"> <i class="icon-edit"></i> </button> </td> 
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td></td>
                                                            <td>300</td>
                                                            <td></td>
                                                            <td>50,000</td>
                                                            <td><button class="btn btn-lime"> <i class="icon-edit"></i> </button> </td> 
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td></td>
                                                            <td>400</td>
                                                            <td></td>
                                                            <td>40,000</td>
                                                            <td><button class="btn btn-lime"> <i class="icon-edit"></i> </button></td>                                                            
                                                        </tr>                                                 
                                                    </tbody>                                                        
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="t10">                                            
                                            <div class="box box-content nopadding">                                                                                             
                                                <ul class="tabs pull-left">                                                    
                                                    <li class="btn btn-lime" href="#">                                                       
                                                        Activate
                                                         <input type="checkbox" name="checkbox">
                                                    </li>                                                                                                                 
                                                </ul>
                                                <ul class="tabs pull-right form">                                                    
                                                    <li class="btn btn-lime" data-toggle="modal" href="#create_session_modal">
                                                        <i class="icon-plus"> </i>
                                                        Add Session
                                                    </li>                                                                                                                 
                                                </ul><br/><br/>
                                                <table class="table table-hover table-nomargin">
                                                    <thead>
                                                        <tr>
                                                            <th>Session</th>
                                                            <th></th>
                                                            <th>Number of Installment</th>
                                                            <th>Installment type (%)</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>2013 / 2014</td>
                                                            <td></td>
                                                            <td>
                                                                <select class=" input-mini">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="input-large">
                                                                    <option value="1">Select</option>
                                                                    <option value="2">80:20</option>
                                                                    <option value="3">70:30</option>
                                                                    <option value="4">60:40</option>
                                                                    <option value="5">50:50</option>                                                                                                                                       
                                                                </select>
                                                            </td>
                                                            <td> 
                                                                <button class="btn btn-lime"> <i class="icon-edit"></i> </button> 
                                                            </td>
                                                             <!--college session-->
                                                            <div 
                                                                class="modal hide fade" 
                                                                id="create_session_modal" 
                                                                tabindex="-1" role="dialog" 
                                                                aria-labelledby="basicModal" 
                                                                aria-hidden="true">
                                                                
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Add Pay Option</h4>
                                                                    </div>
                                                                    <form id="create_session_form" class="form-horizontal form-striped" method="post" action="#">
                                                                    <div class="modal-body">
                                                                        <div class="control-group">
                                                                           <label for="college_name" class="control-label">Session:</label>
                                                                            <div class="controls">
                                                                                <input type="text" name="name" id="college_name" class="input-xlarge" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                           <label for="college_name" class="control-label">Number of Installment</label>
                                                                            <div class="controls">
                                                                                <select class=" input-mini">
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                           <label for="college_name" class="control-label">Installment Type</label>
                                                                            <div class="controls">
                                                                                    <select class="input-large">
                                                                                        <option value="1">Select</option>
                                                                                        <option value="2">80:20</option>
                                                                                        <option value="3">70:30</option>
                                                                                        <option value="4">60:40</option>
                                                                                        <option value="5">50:50</option>                                                                                                                                       
                                                                                    </select>
                                                                            </div>
                                                                        </div>                                                                                                                                                                                           
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
                                                                        <button class="btn btn-primary" type="submit" id="create_college_button">Add</button>
                                                                    </div> 
                                                                </form>
                                                            </div>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="footer" style="position: fixed; bottom: 0px; top: auto;">
       <p>
         © 2013 - 2014. Tai Solarin University of Education, Ijagun, Ogun State, Nigeria.                                        
       </p>
       <a class="gototop" href="#">
        <i class="icon-arrow-up"></i>
       </a>
   </div>
</body>

</html>

