<x-auth-layout>
    <style type="text/css">
            .hide {
                display: none;
            }
        </style>
    <!--begin::Signin Form-->
    <form method="POST" action="{{ theme()->getPageUrl('login') }}" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
    @csrf

    <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ $companeySetting->comapany_name }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4 d-none">
                {{ __('New Here?') }}

                <a href="{{ theme()->getPageUrl('register') }}" class="link-primary fw-bolder">
                    {{ __('Create an Account') }}
                </a>
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <div class="mb-10 bg-light-info p-8 rounded d-none"><div class="text-info"> Use account <strong>admin@demo.com</strong> and password <strong>demo</strong> to continue. </div></div>

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email', 'demo@demo.com') }}" required autofocus/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                <!--end::Label-->

                <!--begin::Link-->
                @if (Route::has('password.request'))
                    <a href="{{ theme()->getPageUrl('password.request') }}" class="link-primary fs-6 fw-bolder">
                        {{ __('Forgot Password ?') }}
                    </a>
            @endif
            <!--end::Link-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" value="demo" required/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" name="remember"/>
                <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('Remember me') }}
            </span>
            </label>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                @include('partials.general._button-indicator', ['label' => __('Continue')])
            </button>
            <!--end::Submit button-->

            <!--begin::Separator-->
            <div class="text-center text-muted text-uppercase fw-bolder mb-5 d-none">or</div>
            <!--end::Separator-->

            <!--begin::Google link-->
            <a href="{{ url('/auth/redirect/google') }}?redirect_uri={{ url()->previous() }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5 d-none">
                <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/google-icon.svg') }}" class="h-20px me-3"/>
                {{ __('Continue with Google') }}
            </a>
            <!--end::Google link-->

            <!--begin::Facebook link-->
            <a href="{{ url('/auth/redirect/facebook') }}?redirect_uri={{ url()->previous() }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5 d-none">
                <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/facebook-4.svg') }}" class="h-20px me-3"/>
                {{ __('Continue with Facebook') }}
            </a>
            <!--end::Facebook link-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Signin Form-->
    <!-- Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <div class="modal-content">
                    <form class="form" action="" id="kt_modal_add_event_form">
                        @csrf
                        <div class="modal-header">
                            <h2 class="fw-bolder" data-kt-calendar="title">Mobile Verify</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_event_close">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </div>  
                        <div class="modal-body py-10 px-lg-17">                            
                            <div class="rounded border p-10">
                            <div class="alert alert-danger hide" id="error-message"></div>
                            <div class="alert alert-success hide" id="sent-message"></div>
                                <form>
                                <div class="fv-row mb-10">                        
                                    <div class="input-group mt-5">
                                        <input type="tel" name="phone_no" id="phone-number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="+91XXXXXXXXXX" required />
                                    </div>                       
                                </div>
                                <div class="fv-row mb-10"  id="otp_gene">
                                    <div id="recaptcha-container"></div>
                                    <button type="button" class="btn btn-primary btn-hover-rise me-5" onclick="otpSend();">Generate OTP</button>
                                </div>
                                </form>
                                <div class="fv-row mb-10" id="otp_div" hidden>                        
                                    <label class="required form-label fs-6 mb-2" > Enter OTP</label>
                                    <input type="number" id="otp-code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="OTP" required />
                                </div>
                                <form>
                                <div class="fv-row mb-10" id="otp_very_div" hidden>
                                    <button type="button" class="btn btn-primary btn-hover-rise me-5" onclick="otpVerify1();">Verify OTP</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @section('scripts')

    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script type="text/javascript">
        const config = {
            apiKey: "AIzaSyDfzyTX8vp-v0JPvN3mHrg-ijwxGWE-rdc",
            authDomain: "revathi-160905.firebaseapp.com",
            projectId: "revathi-160905",
            storageBucket: "revathi-160905.appspot.com",
            messagingSenderId: "742620427349",
            appId: "1:742620427349:web:a678c2f2aa2cd41a7f10dc",
            measurementId: "G-SXP6HX49ZZ"
        };
        
        firebase.initializeApp(config);
    </script>
    <script type="text/javascript">  
        // reCAPTCHA widget    
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            'size': 'invisible',
            'callback': (response) => {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
                onSignInSubmit();
            }
        });

        function otpSend() {
            let p = document.getElementById('otp_div');
            p.removeAttribute("hidden");
            let v = document.getElementById('otp_very_div');
            v.removeAttribute("hidden");
            document.getElementById("otp_gene").style.display = "none";

            var phoneNumber = document.getElementById('phone-number').value;
            const appVerifier = window.recaptchaVerifier;
            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then((confirmationResult) => {
                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;

                    document.getElementById("sent-message").innerHTML = "Message sent succesfully.";
                    document.getElementById("sent-message").classList.add("d-block");
                }).catch((error) => {
                    document.getElementById("error-message").innerHTML = error.message;
                    document.getElementById("error-message").classList.add("d-block");

                    let p = document.getElementById('otp_div');
                    p.hidden = true;
                    let v = document.getElementById('otp_very_div');
                    v.hidden = true;
                    document.getElementById("otp_gene").style.display = "block";
                    
                });
        }

        function otpVerify1() {
            var code = document.getElementById('otp-code').value;
            confirmationResult.confirm(code).then(function (result) {
                // User signed in successfully.
                var user = result.user;
                submitButton = document.querySelector('#kt_sign_in_submit');  
                form = document.querySelector('#kt_sign_in_form');
                // Simulate ajax request
                axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "You have successfully logged in!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    form.querySelector('[name="email"]').value = "";
                                    form.querySelector('[name="password"]').value = "";
                                    window.location.reload();
                                }
                            });
                        })
                        .catch(function (error) {
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: dataMessage,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        });
                document.getElementById("sent-message").innerHTML = "You are succesfully logged in.";
                document.getElementById("sent-message").classList.add("d-block");
      
            }).catch(function (error) {
                document.getElementById("error-message").innerHTML = error.message;
                document.getElementById("error-message").classList.add("d-block");
                window.location.reload();
            });
        }
    </script>


    <script>
    const updateURL = `{{ route('get-user') }}`    
    </script>
    @endsection
</x-auth-layout>
