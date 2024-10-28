<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<style>
        .skiptranslate > iframe { 
		height: 0 !important;
		border-style: none;
		box-shadow: none;
		}
</style>
</head>
<div id="kt_app_header" class="app-header shadow d-flex flex-column flex-stack me-2 ms-2">
	<!--begin::Header main-->
	<div class="d-flex align-items-center flex-stack flex-grow-1">
		<div class="app-header-logo d-flex align-items-center flex-stack px-lg-11 mb-2" id="kt_app_header_logo">
			<!--begin::Sidebar mobile toggle-->
			<div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
				<i class="ki-duotone ki-abstract-14 fs-4x fs-lg-2x text-success">
					<span class="path1"></span>
					<span class="path2"></span>
				</i>
			</div>
			<!--end::Sidebar mobile toggle-->
			<!--begin::Logo-->
			
			<div>
			
				<img class="default-logo h-40px h-lg-80px " id="vaultLogo" src="assets/media/logos/light_main_logo.png"/>
			</div>
			<!--end::Logo-->
		</div>
		<!--begin::Navbar-->
		<div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
			<!--begin::Menu item-->
			<div class="app-navbar-item me-lg-1">
				<!--begin::Menu- wrapper-->
				<div class="cursor-pointer symbol symbol-30px symbol-lg-40px" data-kt-menu-trigger="{default: 'hover', md: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
							<i class="ki-duotone ki-night-day theme-light-show fs-4x fs-lg-2x text-success">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
								<span class="path5"></span>
								<span class="path6"></span>
								<span class="path7"></span>
								<span class="path8"></span>
								<span class="path9"></span>
								<span class="path10"></span>
							</i>
							<i class="ki-duotone ki-moon theme-dark-show fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
					</a>
					<!--begin::Menu-->
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg-success menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
						<!--begin::Menu item-->
						<div class="menu-item px-3 my-0">
							<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
								<span class="menu-icon" data-kt-element="icon">
									<i class="ki-duotone ki-night-day fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
										<span class="path5"></span>
										<span class="path6"></span>
										<span class="path7"></span>
										<span class="path8"></span>
										<span class="path9"></span>
										<span class="path10"></span>
									</i>
								</span>
								<span class="menu-title">Light</span>
							</a>
						</div>
						<!--end::Menu item-->
						<!--begin::Menu item-->
						<div class="menu-item px-3 my-0">
							<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
								<span class="menu-icon" data-kt-element="icon">
									<i class="ki-duotone ki-moon fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</span>
								<span class="menu-title">Dark</span>
							</a>
						</div>
						<!--end::Menu item-->
						<!--begin::Menu item-->
						<div class="menu-item px-3 my-0">
							<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
								<span class="menu-icon" data-kt-element="icon">
									<i class="ki-duotone ki-screen fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
									</i>
								</span>
								<span class="menu-title">System</span>
							</a>
						</div>
						<!--end::Menu item-->
					</div>
					<!--end::Menu-->
				</div>
			<!--end::Menu item-->
			<!--begin::User menu-->
			<div class="app-navbar-item ms-3 ms-lg-4 me-lg-2" id="kt_header_user_menu_toggle">
				<!--begin::Menu wrapper-->
				<div class="cursor-pointer symbol symbol-30px symbol-lg-40px" data-kt-menu-trigger="{default: 'hover', md: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
				<i class="ki-duotone ki-profile-circle fs-4x fs-lg-2x text-success ">
							<span class="path1"></span>
							<span class="path2"></span>
							<span class="path3"></span>
							</i>
					</div>
				
				<!--begin::User account menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<div class="menu-content d-flex align-items-center px-3">
							<!--begin::Avatar-->
							<div class="symbol symbol-50px me-5">
							<i class="ki-duotone ki-profile-circle  fs-2x  text-success ">
							<span class="path1"></span>
							<span class="path2"></span>
							<span class="path3"></span>
							</i>
							</div>
							<!--end::Avatar-->
							<!--begin::Username-->
							<div class="d-flex flex-column">
								<div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}</div>
								<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
							</div>
							<!--end::Username-->
						</div>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu separator-->
					<div class="separator my-2"></div>
					<!--end::Menu separator-->
					<!--begin::Menu item-->
				
					<div class="menu-item px-5">
						<a href="/dashboard" class="menu-link px-5">Dashboard</a>
					</div>
		
					<!--end::Menu item-->
					<!--begin::Menu separator-->
					<div class="separator my-2"></div>
					<!--end::Menu separator-->

					<!--begin::Menu item-->
					<div class="menu-item px-5 my-1">
						<a href="/account-settings" class="menu-link px-5">Account Settings</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-5">
					<form method="POST" action="{{ route('logout') }}" class="d-inline">
						@csrf
						<button type="submit" class="btn btn-link text-decoration-none" onclick="event.preventDefault(); this.closest('form').submit();">
							{{ __('Log Out') }}
						</button>
					</form>

					</div>
					<!--end::Menu item-->
				</div>
				<!--end::User account menu-->
				<!--end::Menu wrapper-->
			</div>
			<!--end::User menu-->
			<!--begin::Language menu-->
			<div class="app-navbar-item ms-3 ms-lg-4 me-lg-2" id="kt_header_language_menu_toggle">
				<!--begin::Menu wrapper-->
				<div class="cursor-pointer symbol symbol-30px symbol-lg-40px" data-kt-menu-trigger="{default: 'hover', md: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
					<i class="fa-solid fa-language fs-4x fs-lg-2x  text-success"></i>
				</div>
				<!--begin::Language menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
					<!--begin::Menu item-->
					<div class="menu-item px-5" id="google_translate_element">
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::Language menu-->
				<!--end::Menu wrapper-->
			</div>
			<!--end::User menu-->
		</div>
		</div>
		<!--end::Navbar-->
	</div>
	<!--end::Header main-->
	<!--begin::Separator-->
	<div class="app-header-separator"></div>
	<!--end::Separator-->
</div>

<script type="text/javascript">	
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.DEFAULT
      }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/66e3308d50c10f7a00a8ea50/1i7jq61ri';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->