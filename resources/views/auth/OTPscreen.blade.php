<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <!--begin::Logo-->
    {{-- <a href="../../demo1/dist/index.html" class="mb-12">
        <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px">
    </a> --}}
    <!--end::Logo-->
    <!--begin::Wrapper-->
    <div class="w-lg-600px bg-body rounded p-10 p-lg-15 mx-auto">
        <!--begin::Form-->
        <form class="form w-100 mb-10" novalidate="novalidate" data-kt-redirect-url="../../demo1/dist/index.html" id="kt_sing_in_two_steps_form">
            <!--begin::Icon-->
            <div class="text-center mb-10">
                <img alt="Logo" class="mh-125px" src="{{ URL::asset(theme()->getDemo().'/media/svg/misc/smartphone.svg') }}">
            </div>
            <!--end::Icon-->
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">Two Step Verification</h1>
                <!--end::Title-->
                <!--begin::Sub-title-->
                <div class="text-muted fw-bold fs-5 mb-5">Enter the verification code we sent to</div>
                <!--end::Sub-title-->
                <!--begin::Mobile no-->
                <div class="fw-bolder text-dark fs-3" id="phone-number"></div>
                <!--end::Mobile no-->
            </div>
            <!--end::Heading-->
            <!--begin::Section-->
            <div class="mb-10 px-md-10">
                <!--begin::Label-->
                <div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
                <!--end::Label-->
                <!--begin::Input group-->
                <div class="d-flex flex-wrap flex-stack">
                    <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" inputmode="text">
                    <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" inputmode="text">
                    <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" inputmode="text">
                    <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" inputmode="text">
                    <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" inputmode="text">
                    <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" inputmode="text">
                </div>
                <!--begin::Input group-->
            </div>
            <!--end::Section-->
            <!--begin::Submit-->
            <div class="d-flex flex-center">
                <button type="button" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bolder">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <!--end::Submit-->
        </form>
        <!--end::Form-->
        <!--begin::Notice-->
         <div class="text-center fw-bold fs-5">
            <span class="text-muted me-1">Didn’t get the code ?</span>
            <a href="#" class="link-primary fw-bolder fs-5 me-1" id="resent_otp">Resend</a>
            <!--<span class="text-muted me-1">or</span>-->
            <!--<a href="#" class="link-primary fw-bolder fs-5">Call Us</a>-->
        </div> 
        <!--end::Notice-->
    </div>
    <!--end::Wrapper-->
</div>
