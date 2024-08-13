<?php echo
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title> @yield('title',"")</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{url('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/css/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/css/default/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
	<link href="{{url('assets/css/farmer-module/style.css')}}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
    
	<!-- ================== END PAGE CSS STYLE ================== -->
		<link href="{{url('assets/plugins/flag-icon/css/flag-icon.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{url('assets/plugins/pace/pace.min.js')}}"></script>

	

	<style>
		input.form-control.error{
			text-align: left;
		}
	</style>

	

    @section('page-css')
    @show

</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fadeshow"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade  page-without-sidebar page-header-fixed  ">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="{{url('')}}/home" class="navbar-brand"> 					
				<h4 class="flag-icon flag-icon-jp  m-r-0 m-t-0 m-b-0" title="jp" id="jp"></h4>		
				<b> Welcome To Japan Tourist Information Web Application 	 </b> </a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->					
		</div>
		<!-- end #header -->
		
	
	
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
            @yield('content')            
		</div>
		<!-- end #content -->
		    
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{url('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{url('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{url('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{url('assets/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{url('assets/js/theme/default.min.js')}}"></script>
	<script src="{{url('assets/js/apps.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
        
    @section('page-js')	
    @show
    
	


	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();			
		
		});
	</script>

{{-- Change Password First Log in  --}}
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>

	<script>



	</script>

		
	
</body>
</html>