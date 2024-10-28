<form id="kt_signin_change_password" class="form" method="post" action="{{ route('password.update') }}" >
@csrf
@method('put')
    <div class="row mb-1">
            <div class="col-lg-4">
                <div class="fv-row mb-0">
                    <label for="update_password_current_password" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                    <input type="password" class="form-control form-control-lg form-control-solid" name="current_password" id="update_password_current_password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
            </div>
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
