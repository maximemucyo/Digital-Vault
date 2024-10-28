<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
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
		<script
        type="text/javascript"
        src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"
    ></script>

	</head>
	<!--end::Head-->
	<!--begin::Body-->
    <body id="kt_app_body" class="justify-content-between align-items-center">
    <div class="col-xl-6 col-lg-6 col-sm-12 text-center flex-row align-items-center justify-content-between">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Email Verification</h6>
			</div>
			<!-- Card Body -->
			<div class="card-body">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
				</div>
                <div class="card-footer">
                    
    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}" class="mb-2">
            @csrf
                <button class="btn btn-success" type="submit">
                {{ __('Resend Verification Email') }}
                </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-success" type="submit">
                {{ __('Log Out') }}
            </button>          
        </form>
    </div>
                </div>
			</div>
		</div>
        </body>

	<!--end::Body-->
</html>
