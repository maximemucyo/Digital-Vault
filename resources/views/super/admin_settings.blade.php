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
				<div class="app-wrapper flex-column flex-row-fluid me-5" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					@include('layouts.sidebar')
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid ms-5" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
						<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid">
									<!--begin::Basic success-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
                                        <form id="kt_account_profile_details_form" class="form" method="post" action="{{ route('admin.update',["admin"=>$admin->id]) }}">
                                            @csrf
                                            @method('patch')
                                            <!--begin::Card body-->
                                            <div class="card-body border-top p-9">
                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Name" value={{$admin->name}}   />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="text" name="email"  value={{$admin->email}}  class="form-control form-control-lg form-control-solid" placeholder="Name"  />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->

                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Actions-->
                                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">{{ __('Save') }}</button>
                                                @if (session('status') === 'profile-updated')
                                                <p
                                                    x-data="{ show: true }"
                                                    x-show="show"
                                                    x-transition
                                                    x-init="setTimeout(() => show = false, 2000)"
                                                    class="text-sm text-success dark:text-success"
                                                >{{ __('Saved.') }}</p>
                                            @endif
                                            </div>
                                            <!--end::Actions-->
                                        </form>			 
										</div>
										<!--end::Content-->
									</div>
									<!--end::Basic success-->
									<!--begin::Sign-in Method-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Password Update</h3>
											</div>
										</div>
										<!--end::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_signin_method" class="collapse show">
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
                                            <form id="kt_signin_change_password" class="form" method="post" action="{{ route('admin.update.password',["admin"=>$admin->id]) }}" >
                                            @csrf
                                            @method('put')
                                                <div class="row mb-1">
                                                        <div class="col-lg-4">
                                                            <div class="fv-row mb-0">
                                                                <label for="update_password_current_password" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                                                <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="update_password_current_password" />
                                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="fv-row mb-0">
                                                                <label for="update_password_password_confirmation" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                                                <input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" id="update_password_password_confirmation" />
                                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                                                    <div class="d-flex">
                                                        <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                                        @if (session('status') === 'password-updated')
                                                            <p
                                                                x-data="{ show: true }"
                                                                x-show="show"
                                                                x-transition
                                                                x-init="setTimeout(() => show = false, 2000)"
                                                                class="text-sm text-gray-600 dark:text-gray-400"
                                                            >{{ __('Saved.') }}</p>
                                                        @endif
                                                        <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                                </div>
                                            </form>
											
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Sign-in Method-->
								</div>
								<!--end::Content container-->
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