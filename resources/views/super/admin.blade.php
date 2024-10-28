<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
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
			window.chartId = @json($admin->id);
    </script>
	</head>
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
					@if (Auth::user()->role == 'super')
					@include('layouts.sidebar')
					@endif
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid ms-5" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">                         
							<!--begin::Content-->
							<div class="row mt-10">
							<!-- Area Admin -->
							<div class="col-xl-12 col-lg-12">
								<div class="card p-10">
								<div class="d-flex flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="flex-grow-1">
									<!--begin::Title-->
									<div class="d-flex gap-4 align-items-start flex-wrap mb-2">
										<!--begin::User-->
										<div class="d-flex flex-column">
											<!--begin::Name-->
											<div class="d-flex align-items-center mb-2">	
												<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{$admin->name}}</a>
												<a href="#">
													<i class="ki-duotone ki-verify fs-1 text-primary">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</a>
											</div>
											<!--end::Name-->
											<!--begin::Info-->
											<div class="d-flex flex-wrap fw-semibold fs-6 mb-2 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-duotone  ki-profile-circle fs-4 me-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>{{$admin->role}}</a>
											</div>
											<div class="d-flex flex-wrap fw-semibold fs-6 mb-2 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-duotone ki-sms fs-4 me-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>{{$admin->email}}</a>
											</div>
											<div class="d-flex flex-wrap fw-semibold fs-6 mb-2 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-duotone fs-4 me-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>Joined: {{$admin->created_at}}</a>
											</div>
											<!--end::Info-->
										</div>
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<div class="d-flex align-items-center">
												<i class="ki-duotone ki-people fs-2 text-success me-2">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
												<div class="fs-2 fw-bold">{{$admin->getReferees()->count()}}</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-semibold fs-6 text-gray-400">Referees</div>
											<!--end::Label-->
										</div>
										<button class="btn btn-success"><a href={{'settings-admin'.$admin->id}}>Settings</a></button>
										<div>
										</div>
										<!--end::User-->
									<!--end::Title-->
								</div>
								<!--end::Info-->
							</div>
								
								</div>
								<div class="card shadow mb-4">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Chart</h6>
									</div>
										<!-- Card Body -->	
									<div class="card-body">
											<div id="chart{{$admin->id}}" class="card-body border border-secondry align-items-center justify-content-center">								
								<script type="module" src="resources/js/visualization/main.js"></script>											
									</div>
										
									</div>

								</div>
								<!--begin::Content-->
								<div id="kt_account_settings_deactivate" class="collapse show">
									<!--begin::Form-->
									<form id="kt_account_deactivate_form" class="form" method="post" action="{{ route('admin.destroy', ['admin' => $admin->id]) }}">
									@csrf
									@method('delete')
										<!--begin::Card footer-->
										<div class="card-footer d-flex justify-content-end">
											<button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Remove admin</button>
										</div>
										<!--end::Card footer-->
									</form>
									<!--end::Form-->
								</div>
								<!--end::Content-->
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
        @include('super.add_admin')

    
		<!--end::App-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
