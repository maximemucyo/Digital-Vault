<section>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <!--begin::Form-->
<form id="kt_account_profile_details_form" class="form" method="post" action="{{ route('profile.update') }}">
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
                <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Name" value={{Auth::user()->name}}   />
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
                <input type="text" name="email"  value={{Auth::user()->email}}  class="form-control form-control-lg form-control-solid" placeholder="Name"  />
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
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
<!--end::Form-->

