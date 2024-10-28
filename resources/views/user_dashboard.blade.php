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
                            <div class="card col-md-6 border-left-primary shadow p-2 mt-5">
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
								</div>
                            <div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col-4 mr-2">
										<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
											BALANCE</div>
										<div class=" mb-0 font-weight-bold text-gray-800" id="balanceDisplay"  onchange="updateBalance()">0.24$</div>
									</div>
									<div class="col-auto">
										<select id="tokenDropdown" class="btn btn-small btn-light-success">
											<option value="">USDT</option>
											<option value="0.000008">Bitcoin (BTC)</option>
											<option value="0.99000">Ethereum (ETH)</option>
											<option value="0.9900000">Tether (USDT)</option>
											<option value="0.7809">Ripple (XRP)</option>
										</select>
									</div>
								</div>
							</div>
							</div>

							<!--end::Content-->
						</div>
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