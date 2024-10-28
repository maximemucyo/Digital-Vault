<form id="kt_account_deactivate_form" class="form" method="post" action="{{ route('profile.destroy') }}">
@csrf
@method('delete')
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <!--begin::Notice-->
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
            <!--begin::Icon-->
            <i class="ki-duotone ki-successrmation fs-2tx text-warning me-4">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-semibold">
                    <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
                    <div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number when you reset you sign in password.
                    <br />
                    <a class="fw-bold" href="#">Learn more</a></div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Notice-->
        <!--begin::Form input row-->
        <div class="form-check form-check-solid fv-row">
            <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" required/>
            <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
        </div>
        <!--end::Form input row-->
    </div>
    <!--end::Card body-->
    <!--begin::Card footer-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Deactivate Account</button>
    </div>
    <!--end::Card footer-->
</form>
