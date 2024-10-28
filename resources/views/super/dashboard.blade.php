<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> -->
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
		<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script
        type="text/javascript"
        src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"
    ></script>
    <script type="text/javascript">
        @if (Auth::user()->role!="user")
			window.chartId = @json(Auth::user()->id);	
		@else
			window.chartId = @json(Auth::user()->getReferrer()->id);
		@endif
        </script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" data-kt-app-aside-push-footer="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "white"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@include('layouts.top_header')
				<!--end::Header-->
				<!--begin::Wrapper-->
				@include('layouts.sidebar')
				<div class="app-wrapper flex-column flex-row-fluid me-5" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					@include('layouts.sidebar')
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid ms-5 mt-9" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Content-->
							@if (Auth::user()->role == 'super')
							<div class="container-fluid">

<!-- Page Heading -->


<!-- Content Row -->
<div class="row">

</div>

<!-- Content Row -->

<div class="row">

	<!-- Area Chart -->
	<div class="col-xl-12 col-lg-12">
	<!-- Card Header - Dropdown -->
			<div class="card d-flex flex-row align-items-center gap-2">
				<div class="col-xl-3 col-md-4 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							TOTAL USERS</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
					</div>
					<div class="col-auto">					
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-4 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							TOTAL ADMINS</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$admins->count()}}</div>
					</div>
					<div class="col-auto">
					</div>
				</div>
			</div>
		</div>
	</div>
	    	
				</div>
		<div class="card shadow mb-4">		
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Chart</h6>
				@include('chart.chart_toolbar')
			</div>
			<!-- Card Body -->		
				<div class="card-body">			
			<div id="chart{{Auth::user()->id}}" class="card-body border border-secondry align-items-center justify-content-center">								
		<script type="module" src="resources/js/visualization/main.js"></script>											
			</div>
			    
			</div>
		</div>
		<div class="modal fade" id="kt_price_point_edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-start mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <h2 class="fw-bold">Change Price Points</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                      <span class="path1"></span>
                      <span class="path2"></span>
                    </i>
						        </div>
                </div>
				<div id="price_points_forms">
				</div>
                @include('chart.partials.price_point_js')
    </div>
    </div>
    </div>
	</div>
</div>
</div>
@endif                       
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						<div id="kt_app_footer" class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-semibold me-1">2024&copy;</span>
								<a href="" target="_blank" class="text-gray-800 text-hover-primary">CryptoEduction</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="exchangeInfo.js"></script>
		 <script>

    var pusher = new Pusher('65db8d333bfaf7067936', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>