<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Insurance</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">User</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"><a href="{{ route('user.insurance.index') }}" class="text-muted text-hover-primary">Insurance</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Create Insurance</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <form action="{{ route('user.insurance.store') }}" method="post" id="formCreate">
                            @csrf
                            <div class="py-5">
                                <h4>About</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Company Name</label>
                                        <input type="text" name="comapany_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Company Name" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Legal Name</label>
                                        <input type="text" name="legal_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Legal Name" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Do you have tax?</label>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="have_tax" type="radio" value="1" checked id="have_tax_Yes" />
                                            <label class="form-check-label" for="have_tax_Yes">
                                                <div class="fw-bolder text-gray-800">Yes</div>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="have_tax" type="radio" value="0" id="have_tax_no" />
                                            <label class="form-check-label" for="have_tax_no">
                                                <div class="fw-bolder text-gray-800">No</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="fv-row mb-10" id="taxation_number_div">
                                        <label class="required form-label fs-6 mb-2" >Taxation Number</label>
                                        <input type="number" name="taxation_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Taxation Number" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Company Registered On</label>
                                        <input class="form-control form-control-solid" name="register_on" placeholder="Pick date rage" id="kt_daterangepicker_3" required/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Logo (For Header)</label>
                                        <div class="image-input image-input-empty" data-kt-image-input="true" style="background-color: aliceblue;">
                                            <!--begin::Image preview wrapper-->
                                            <div class="image-input-wrapper w-125px h-125px"></div>
                                            <!--end::Image preview wrapper-->

                                            <!--begin::Edit button-->
                                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>

                                                <!--begin::Inputs-->
                                                <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Edit button-->

                                            <!--begin::Cancel button-->
                                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel button-->

                                            <!--begin::Remove button-->
                                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove button-->
                                        </div>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Consultant Type </label>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="consultant_type[]" type="checkbox" value="video_consultation" id="video_consultation" />
                                            <label class="form-check-label" for="video_consultation">
                                                <div class="fw-bolder text-gray-800">Video Consultation</div>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="consultant_type[]" type="checkbox" value="audio_voice_call_consultation" id="audio_voice_call_consultation" />
                                            <label class="form-check-label" for="audio_voice_call_consultation">
                                                <div class="fw-bolder text-gray-800">Audio / Voice Call Consultation</div>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="consultant_type[]" type="checkbox" value="text_consultation" id="text_consultation" />
                                            <label class="form-check-label" for="text_consultation">
                                                <div class="fw-bolder text-gray-800">Text Consultation</div>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="consultant_type[]" type="checkbox" value="direct_consultation" id="direct_consultation" />
                                            <label class="form-check-label" for="direct_consultation">
                                                <div class="fw-bolder text-gray-800">Direct Consultation</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <h4>Address</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Registered Address</label>
                                        <textarea id="register_address" name="register_address" class="tox-target"></textarea>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Country</label>
                                        <select class="form-select" id="country_id" name="country_id" data-control="select2" data-placeholder="Select an Country" required>
                                            <option></option>
                                            @foreach($countrys as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >State</label>
                                        <select class="form-select" name="state_id" id="state_id" data-control="select2" data-placeholder="Select an State" required>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >City</label>
                                        <select class="form-select" name="city_id" id="city_id" data-control="select2" data-placeholder="Select an City" required>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Zip Code</label>
                                        <input type="text" name="zipcode" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Zip Code" required />
                                    </div>
                                </div>

                                <h4>Contact</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <div id="kt_docs_repeater_basic">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_basic">
                                                    <div data-repeater-item>
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label class="required form-label">Name:</label>
                                                                <input type="text" name="cname" data-cname class="form-control mb-2 mb-md-0" placeholder="name" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class=" required form-label">Title</label>
                                                                <input type="text" name="ctitle" data-ctitle class="form-control mb-2 mb-md-0" placeholder="Title" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="required form-label">Email</label>
                                                                <input type="email" name="cemail" data-cemail class="form-control mb-2 mb-md-0" placeholder="Email" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="required form-label">Mobile</label>
                                                                <input type="tel" name="cmobile" data-cmobile class="form-control mb-2 mb-md-0" placeholder="Mobile" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="required form-label">Phone</label>
                                                                <input type="tel" name="cphone" data-cphone class="form-control mb-2 mb-md-0" placeholder="Phone" required/>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                    <i class="la la-trash-o"></i>Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                    <i class="la la-plus"></i>Add
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fv-row mb-10">
                                        {{-- <label class="required fw-bold fs-6 mb-5"></label> --}}
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="status" type="checkbox" value="1" id="status" />
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <label class="form-check-label" for="status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                    </div>

                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    @section('scripts')
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/cropper/cropper.bundle.js')}}'></script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/formrepeater/formrepeater.bundle.js')}}'></script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/tinymce/tinymce.bundle.js')}}'></script>
    <script>
    const have_tax_Yes = document.querySelectorAll('[name="have_tax"]')
    const taxation_number_div = document.getElementById('taxation_number_div')
    var state = $("#state_id")
    var city = $("#city_id")




    have_tax_Yes.forEach(element => {
        element.addEventListener('change',have_tax_Yes_fun)
    })


    $("#kt_daterangepicker_3").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format("YYYY"),10)
        }, function(start, end, label) {
            // var years = moment().diff(start, "years");
            // alert("You are " + years + " years old!");
        }
    );

        var options2 = {selector: "#register_address"};

        if (KTApp.isDarkMode()) {

            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options2);


    function have_tax_Yes_fun(event){
        if(event.target.value == 1){
            taxation_number_div.removeAttribute('hidden')
            taxation_number_div.setAttribute('required',true)
        }else{
            taxation_number_div.setAttribute('hidden',true)
            taxation_number_div.removeAttribute('required')
        }
    }

    $("#country_id").on('select2:select', function (e) {
        var data = e.params.data;
        $.ajax({
            url:"{{route('master.country.getState')}}",
            method:"POST",
            data:{id:data.id,"_token": "{{ csrf_token() }}",},
            success:function(data){
                var option = null
                if(data.states.length != null){
                    data.states.forEach((e)=>{
                        option += '<option value='+e.id+'>'+e.state_name+'</option>';
                    })
                }
                state.html(option).trigger("change");
                city.html(null).trigger("change");
                if(data.currency){
                    $("#inputGroup-sizing-default").html(data.currency.currencycode)
                    $("#inputGroup-sizing-default_text").val(data.currency.countryname)
                }
                if(data.Country){
                    $("input[data-cmobile]").val(data.Country.dialing)
                    $("input[data-cphone]").val(data.Country.dialing)
                }
            }
        })
    });
    $("#state_id").on('select2:select', function (e) {
        var data = e.params.data;
        $.ajax({
            url:"{{route('master.country.getCity')}}",
            method:"POST",
            data:{id:data.id,"_token": "{{ csrf_token() }}",},
            success:function(data){
                var option = null
                if(data.length != null){
                    data.forEach((e)=>{
                        option += '<option value='+e.id+'>'+e.city_name+'</option>';
                    })
                }
                city.html(option).trigger("change");
            }
        })
    });
    $('#kt_docs_repeater_basic').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function () {
            $(this).slideDown();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    </script>
    @endsection
</x-base-layout>
