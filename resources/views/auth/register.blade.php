<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<!-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> -->
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::Aside-->
				<div class="d-flex flex-column bg-light-primary flex-lg-row-fluid w-md-100 w-lg-50 p-10 order-2 order-lg-2 h-100">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px h-100 ptlg-20">
						<!--begin::Illustration-->
						<div class="d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-cover bgi-position-y-bottom 
						min-h-lg-450px" style="background-image: url(assets/media/illustrations/crypto-analytics.png)">
						</div>
						<!--end::Illustration-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-md-100 w-lg-50 p-10 order-2 order-lg-2">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
					<!--begin::Logo-->
					<div class="justify-content-center align-content-center d-flex">
						<img class="default-logo h-40px h-lg-80px " src="assets/media/logos/light_main_logo.png"/>
					</div>
					<!--end::Logo-->
					<!--begin::Content-->			
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="/dashboard" method="POST" action="{{ route('register', ['token' => $token]) }}">
								<!--begin::Heading-->
                                @csrf
								<div class="mb-10 text-center">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Registration</h1>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-7">
										<label class="form-label fw-bold text-dark fs-6">Name</label>
										<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="name" />
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<label class="form-label fw-bold text-dark fs-6">Email</label>
									<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="username" />
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Label-->
										<label class="form-label fw-bold text-dark fs-6">Password</label>
										<!--end::Label-->
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-duotone ki-eye-slash fs-2"></i>
												<i class="ki-duotone ki-eye fs-2 d-none"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
									<!--end::Hint-->
								</div>
								<!--end::Input group=-->
								<!--begin::Input group-->
								<div class="fv-row mb-5">
									<label class="form-label fw-bold text-dark fs-6">Confirm Password</label>
									<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<label class="form-check form-check-custom form-check-solid form-check-inline">
										<input class="form-check-input" type="checkbox" name="toc" value="1" />
										<span class="form-check-label fw-semibold text-gray-700 fs-6">I Agree
										<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
									</label>
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="text-center">
									<!--begin::Submit button-->
									<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-success w-100 mb-5">
										<span class="indicator-label">Register</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<!--end::Submit button-->
								</div>
								<!--end::Actions-->
							</form>
                            <!--begin::Link-->
									<div class="text-gray-400 fw-semibold fs-4 py-5">Already have an account?
									<a href="/login" class="link-primary fw-bold">Sign in here</a></div>
									<!--end::Link-->
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script>
			$(document).ready(function() {
				$('#kt_sign_up_form').on('submit', function(event) {
					event.preventDefault(); 
					var form = $(this); 

					var saveButton = form.find('button[type="submit"]');
					saveButton.prop('disabled', true).text('Registering...');

					// Send AJAX request
					$.ajax({
						url: form.attr('action'), 
						type: 'POST',
						data: form.serialize(),
						success: function(response) {         
							Swal.fire({
							title: 'Success!',
							text: 'You have successfully registered! Check your Email to verify and login',
							icon: 'success'
							}).then(()=>{
								window.location.reload();
							})
						},
						complete: function() {
							saveButton.prop('disabled', false).text('Save'); 
						},
						error: function(xhr, status, error) {
							// Handle error response
							console.error('Error updating data:', error);
							alert('An error occurred while updating data.');
						}
					});
				});
			});
		</script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>