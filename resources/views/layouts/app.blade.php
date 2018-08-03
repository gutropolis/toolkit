<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title> 
	<!-- Meta -->
	<meta name="description" content="@yield('meta_description', 'Default Description')">
	<meta name="author" content="@yield('meta_author', 'Viral Solani')">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  
    <!-- Custom CSS -->
    <link href="{{ URL::to('admin/assets/css/style.css') }}" rel="stylesheet">
	
    <!-- You can change the theme colors from here -->
    <link href="{{ URL::to('admin/assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
	<style>
		.lds-ellipsis {
		  display: inline-block;
		  position: relative;
		  width: 64px;
		  height: 64px;
		}
		.lds-ellipsis div {
		  position: absolute;
		  top: 27px;
		  width: 11px;
		  height: 11px;
		  border-radius: 50%;
		  background: #fff;
		  animation-timing-function: cubic-bezier(0, 1, 1, 0);
		}
		.lds-ellipsis div:nth-child(1) {
		  left: 6px;
		  animation: lds-ellipsis1 0.6s infinite;
		}
		.lds-ellipsis div:nth-child(2) {
		  left: 6px;
		  animation: lds-ellipsis2 0.6s infinite;
		}
		.lds-ellipsis div:nth-child(3) {
		  left: 26px;
		  animation: lds-ellipsis2 0.6s infinite;
		}
		.lds-ellipsis div:nth-child(4) {
		  left: 45px;
		  animation: lds-ellipsis3 0.6s infinite;
		}
		@keyframes lds-ellipsis1 {
		  0% {
			transform: scale(0);
		  }
		  100% {
			transform: scale(1);
		  }
		}
		@keyframes lds-ellipsis3 {
		  0% {
			transform: scale(1);
		  }
		  100% {
			transform: scale(0);
		  }
		}
		@keyframes lds-ellipsis2 {
		  0% {
			transform: translate(0, 0);
		  }
		  100% {
			transform: translate(19px, 0);
		  }
		}
	</style>
	<!-- Styles -->
	@yield('header-style')  
	 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    @include('admin.includes.loader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
	     
		 
		<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
			@yield('content') 
		</div>
		<!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
	 
		 @include('admin.includes.footer')
	 
	</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	 <script src="{{ URL::to('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ URL::to('admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ URL::to('admin/plugins/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ URL::to('admin/assets/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ URL::to('admin/assets/js/sidebarmenu.js') }} "></script>
    <!--stickey kit -->
    <script src="{{ URL::to('admin/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
	
	 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
		
    <!--Custom JavaScript -->
    <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
	 
	
	@yield('footer_js') 

</body>

</html>
