<div id="kt_app_sidebar" class="app-sidebar mt-md-10 shadow flex-column border" data-kt-drawer="true" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-name="app-sidebar" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Main-->
    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column" id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px" style="height: 207px;">
        <!--begin::Sidebar menu-->
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-element-11 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title side-bar-item"><a href="/dashboard" class="navi-link text-dark">Dashboard</a></span>
                </span>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
			    <!--begin:Menu item-->
				
				@if (Auth::user()->role!='user')
				<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
									<!--begin:Menu link-->
									<span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-people fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
											</i>
										</span>
										<span class="menu-title side-bar-item"><a href="/users" class=" navi-link text-dark">Users</a></span>
									</span>
									<!--end:Menu link-->
								</div>
				@endif

                @if (Auth::user()->role=='super')
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-people fs-1 ">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title side-bar-item"><a href="/admins" class=" navi-link text-dark">Admins</a></span>
                    </span>
                    <!--end:Menu link-->
                </div>
                
                @endif					
            <!--end:Menu item-->
            <!--begin:Menu item-->
			@if (Auth::user()->role=='super' && Auth::user()->role=='admin')
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-people fs-1 ">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title side-bar-item"><a href="/users" class=" navi-link text-dark">Users</a></span>
                </span>
                <!--end:Menu link-->
            </div>
			@endif
            <!--end:Menu item-->
			 <!--begin:Menu item-->
			 
			 <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link ">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-chart fs-1 ">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title side-bar-item"><a href="/chart" class="text-dark navi-link">Chart</a></span>
                </span>
                <!--end:Menu link-->
            </div>
		
            <!--end:Menu item-->
			 <!--begin:Menu item-->
			 <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link ">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-setting-2 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title side-bar-item"><a href="/account-settings" class="navi-link text-dark ">Settings</a></span>
                </span>
                <!--end:Menu link-->
            </div>
			
		
            <!--end:Menu item-->
			@if (Auth::user()->role=='user')
			 <!--begin:Menu item-->
			 <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link ">
                    <span class="menu-icon">
                        <i class="ki-duotone  fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title side-bar-item"><a href="/account-settings" class="navi-link text-dark "></a></span>
                </span>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link ">
                    <span class="menu-icon">
                        <i class="ki-duotone  fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title side-bar-item"><a href="/account-settings" class="navi-link text-dark "></a></span>
                </span>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
			@endif
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link ">
                    <span class="menu-icon">
                        <i class="ki-duotone  fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title side-bar-item"><a href="/account-settings" class="navi-link text-dark "></a></span>
                </span>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
			 <!--begin:Menu item-->
			 <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link ">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-exit-left text-success fs-2x">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
					<form method="POST" action="{{ route('logout') }}" class="d-inline">
						@csrf
						<button type="submit" class="btn btn-link text-decoration-none" onclick="event.preventDefault(); this.closest('form').submit();">
												{{ __('Log Out') }}
						</button>
					</form>

                </span>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
			

        </div>
		<!--end::Footer-->
        <!--end::Sidebar menu-->
    </div>
    <!--end::Main-->
</div>