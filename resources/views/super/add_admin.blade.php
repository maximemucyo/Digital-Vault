<div class="modal fade" id="kt_modal_add_admin" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px mh-470px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <h2 class="fw-bold">Add Admin</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_add_user_form" class="form admin_addition_form" method="POST" action="{{ route('add_admin') }}">
                        {{ csrf_field() }}
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Name</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Name" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="example@domain.com" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Password</label>
                                <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0"
                                />
                            </div>
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bold text-dark fs-6">Confirm Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
                            </div>

                            <input type="text" name="role" class="d-none"
                                       value="admin" />
                            <button type="submit" class="btn btn-success">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.admin_addition_form').on('submit', function(event) {
            console.log("Admin Created!");
            event.preventDefault(); 
            var form = $(this); 

            var saveButton = form.find('button[type="submit"]');
            saveButton.prop('disabled', true).text('Adding...');

            // Send AJAX request
            $.ajax({
                url: form.attr('action'), 
                type: 'POST',
                data: form.serialize(),
                success: function(response) {  
                    $('#kt_modal_add_admin').removeClass('show'); 
                    $('.modal-backdrop').removeClass('show');           
                    Swal.fire({
                    title: 'Success!',
                    text: 'Admin Added successfully!They will need to verify their email on Login.',
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