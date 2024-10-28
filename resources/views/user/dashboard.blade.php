<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
		<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

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
				<div class="app-wrapper flex-column flex-row-fluid me-5" id="kt_app_wrapper">
					<!--begin::Sidebar-->		
					@include('layouts.sidebar')
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid ms-5" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Content-->
                            <div class="card border-left-primary shadow p-2 mt-5">
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-success">Profile Details</h6>
								</div>
                            <div class="card-body">
							<div class="card p-5">
								<div class="d-flex flex-wrap flex-sm-nowrap">
								<!--begin::success-->
								<div class="flex-grow-1">
									<!--begin::Title-->
									<div class="d-flex gap-15 align-items-start flex-wrap mb-2">
										<!--begin::User-->
										<div class="d-flex flex-column col-md-5">
											<!--begin::Name-->
											<div class="d-flex align-items-center mb-2">	
												<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{$user->name}}</a>
												<a href="#">
													<i class="ki-duotone ki-verify fs-1 text-success">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</a>
											</div>
											<!--end::Name-->
											<!--begin::success-->
											<div class="d-flex flex-wrap fw-semibold fs-6 mb-2 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-duotone  ki-profile-circle fs-4 me-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>{{$user->role}}</a>
											</div>
											<div class="d-flex flex-wrap fw-semibold fs-6 mb-2 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-duotone ki-sms fs-4 me-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>{{$user->email}}</a>
											</div>
											<div class="d-flex flex-wrap fw-semibold fs-6 mb-2 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-duotone fs-4 me-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>Joined: {{$user->created_at}}</a>
											</div>
											<div class="d-flex flex-wrap fw-semibold fs-6 mb-2 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-duotone fs-4 me-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>Admin: {{$user->getReferrer()->name}}</a>
											</div>
											<!--end::success-->
										</div>
										<div class="card d-flex flex-column col-md-6">
										<div class="card-header d-flex flex-row align-items-center justify-content-between">
											<h6 class="m-0 font-weight-bold text-success">Token Balance</h6>
										</div>
										<div class="card-body">
										@php
										 $balance=$user->getBalances();
										@endphp
										<div class="d-flex flex-row">										
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<div class="fs-2 fw-bold">{{$balance->BTCUSDT}}</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-semibold fs-6 text-gray-400">BTCUSDT</div>
											<!--end::Label-->
										</div>
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<div class="fs-2 fw-bold">{{$balance->DOGEUSDT}}</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-semibold fs-6 text-gray-400">DOGEUSDT</div>
											<!--end::Label-->
										</div>
										</div>
										<div class="d-flex flex-row">										
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<div class="fs-2 fw-bold">{{$balance->ETHUSDT}}</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-semibold fs-6 text-gray-400">ETHUSDT</div>
											<!--end::Label-->
										</div>
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<div class="fs-2 fw-bold">{{$balance->LTCUSDT}}</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-semibold fs-6 text-gray-400">LTCUSDT</div>
											<!--end::Label-->
										</div>
										</div>
										</div>
										
										<div>
										</div>
										<!--end::User-->
									</div>
									<!--end::Title-->
								</div>
								<!--end::success-->
							</div>
								
								</div>
							
							</div>
							</div>

							<!--end::Content-->
						</div>
						<!--end::Content-->
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
		<script src="exchangesuccess.js"></script>
		<script type="text/javascript">
		@if (Auth::user()->role!="user")
			window.chartId = @json(Auth::user()->id);	
		@else
			window.chartId = @json(Auth::user()->getReferrer()->id);
		@endif
        </script>
		 <script>

    var pusher = new Pusher('65db8d333bfaf7067936', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
  <script>
function updateBalance() {
    var balanceDisplay = document.getElementById("balanceDisplay");
    var tokenDropdown = document.getElementById("tokenDropdown");
    balanceDisplay.textContent = tokenDropdown.value + "$";
}
</script>
  
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>