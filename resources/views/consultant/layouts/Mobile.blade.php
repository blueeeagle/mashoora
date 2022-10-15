<div class="current" data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <div class="card-body pt-0">
            <div class="py-5">
                <h4>Enter Your Mobile Number</h4>
                <div class="rounded border p-10">
                    <div class="fv-row mb-10">
                        {{-- <div class="col-10"> --}}
                            <div class="input-group mt-5">
                                <label class="mob-label">Country Code</label>
                                {{-- <label class="input-group-text">Country Code</label> --}}
                                <select class="form-select" name="country_code" id="country_code" style="max-width:12%;">
                                    <option value="">--</option>
                                    @foreach($countrys as $data)
                                        <option value="{{$data->id}}" data-has_state='{{ $data->has_state }}'>{{$data->country_code}}</option>
                                    @endforeach
                                </select>
                                <input class="input-group-text" name="c_code" id="c-code" readonly style="width: 100px">
                                <input type="tel" name="phone_no" id="phone_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter youor Mobile Number" required />
                            </div>

                        {{-- </div> --}}
                    </div>

                    <div class="fv-row mb-10" id="otp_div" hidden>
                        <label class="required form-label fs-6 mb-2" > Enter OTP</label>
                        <input type="number" onkeyup='OtpVerify(event)' id="otp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile No" required />
                    </div>
                    <div class="fv-row mb-10">
                        <button type="button" id="GenerateOtp" class="btn btn-primary btn-hover-rise me-5">Generate OTP</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Wrapper-->
</div>
