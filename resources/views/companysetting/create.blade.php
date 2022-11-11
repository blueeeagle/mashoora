<x-base-layout>
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Company Setting</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Setting</li>
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
                    <div class="card-body rounded border pt-0">
                        <form action="{{ route('setting.companysettings.update',1) }}" method="post" id="formEdit">
                            @csrf
                            
                            <div class="py-5">
                                   <div class="tabs effect-1 company">
			<!-- tab-title -->
			<input type="radio" id="tab-1" name="tab-effect-1">
			<span>About</span>

			<input type="radio" id="tab-2" name="tab-effect-1">
			<span> Address</span>

			<input type="radio" id="tab-3" name="tab-effect-1">
			<span>Setting</span>

			
			<!-- tab-content -->
			<div class="tab-content">
				<section id="tab-item-1">
					  <div class="p-10">

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Company Name</label>
                                            <input type="text" name="comapany_name" value="{{ $Companysetting->comapany_name }}" class="form-control form-control-solid mb-4" placeholder="Company Name" required />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Legal Name</label>
                                            <input type="text" name="legal_name" value="{{ $Companysetting->legal_name }}" class="form-control form-control-solid mb-4" placeholder="Legal Name" required />    
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Do you have tax?</label>
                                            
                                            <div class="col-md-4">
                                                <input class="form-check-input mb-4" name="have_tax" type="radio" value="1" id="have_tax_Yes" {{ ($Companysetting->have_tax == 1)? 'checked':'' }}/> 
                                                <label class="form-check-label" for="have_tax_Yes">
                                                    <div class="fw-bolder text-gray-800">Yes</div>
                                                </label>
                                                &nbsp;
                                                <input class="form-check-input mb-4" name="have_tax" type="radio" value="0" id="have_tax_no" {{ ($Companysetting->have_tax == 0)? 'checked':'' }} />
                                                <label class="form-check-label" for="have_tax_no">
                                                    <div class="fw-bolder text-gray-800">No</div>
                                                </label>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6" id="taxation_number_div" {{ ($Companysetting->have_tax != 1)? "hidden":''}}>
                                            <label class="required form-label fs-6 mb-4" >Taxation Number</label>
                                            <input type="number" name="taxation_number" id="taxation_number" value="{{ $Companysetting->taxation_number }}" class="form-control form-control-solid mb-4" placeholder="Taxation Number" {{ ($Companysetting->have_tax_Yes == 1)?"required":''}}  />
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Company Registered On</label>
                                            <input class="form-control form-control-solid mb-4" value="{{ $Companysetting->register_on }}" name="register_on" placeholder="Pick date rage" id="kt_daterangepicker_3" required/>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label class="required form-label fs-6 mb-4" >About Us</label>
                                        <textarea id="about_us" name="about_us" class="tox-target" maxlength="256">{{ $Companysetting->about_us }}</textarea>
                                    </div>
                                </div>
					
				</section>
				<section id="tab-item-2">
				    <div class="p-10">
                                    @include('components.addressComponent',['country_id'=>$Companysetting->country_id,'state_id'=>$Companysetting->state_id,
                                    'city_id'=>$Companysetting->city_id,'zipcode'=>$Companysetting->zipcode,'register_address'=>$Companysetting->register_address,'page'=>'Edit','countrys'=>$countrys,'state'=>$state,'city'=>$city])
                                </div>
				</section>
				<section id="tab-item-3">
				   <div class="p-10">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Base Currency</label>
                                            <div class="input-group input-group-solid mb-4">
                                                <span class="input-group-text base_curency mb-4" id="base_curency">{{$currency->countrycode}}</span>
                                                <input type="text" style="text-align: left;" value="{{$currency->countryname}}" class="form-control form-control-solid mb-4" id="inputGroup-sizing-default_text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Time Zone</label>
                                            <select name="time_zone" class="form-select mb-4" id="time_zone" required>
                                                <option>Select Option</option>
                                                <option value="1" {{ ($Companysetting->time_zone == '1')?'selected':'' }}>Africa</option>
                                                <option value="2" {{ ($Companysetting->time_zone == '2')?'selected':'' }}>America</option>
                                                <option value="3" {{ ($Companysetting->time_zone == '3')?'selected':'' }}>Antarctica</option>
                                                <option value="4" {{ ($Companysetting->time_zone == '4')?'selected':'' }}>Arctic</option>
                                                <option value="5" {{ ($Companysetting->time_zone == '5')?'selected':'' }}>Asia</option>
                                                <option value="6" {{ ($Companysetting->time_zone == '6')?'selected':'' }}>Atlantic</option>
                                                <option value="7" {{ ($Companysetting->time_zone == '7')?'selected':'' }}>Australia</option>
                                                <option value="8" {{ ($Companysetting->time_zone == '8')?'selected':'' }}>Europe</option>
                                                <option value="9" {{ ($Companysetting->time_zone == '9')?'selected':'' }}>Indian</option>
                                                <option value="10" {{ ($Companysetting->time_zone == '10')?'selected':'' }}>Pacific</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Date Format</label>
                                            <select class="form-select mb-4" name="date_format" id="date_format" data-control="select2" data-placeholder="Eg: Y-M:m-D:d" required>
                                                <option></option>
                                                <option {{ ($Companysetting->date_format == 'mm/dd/yyyy')?'selected':'' }} value="mm/dd/yyyy">02/21/2018</option>
                                                <option {{ ($Companysetting->date_format == 'mm/dd/yy')?'selected':'' }} value="mm/dd/yy">02/21/18</option>
                                                <option {{ ($Companysetting->date_format == 'dd/mm/yyyy')?'selected':'' }} value="dd/mm/yyyy">21/02/2018</option>
                                                <option {{ ($Companysetting->date_format == 'dd/mm/yy')?'selected':'' }} value="dd/mm/yy">21/02/18</option>
                                                <option {{ ($Companysetting->date_format == 'dd-mm-yyyy')?'selected':'' }} value="dd-mm-yyyy">21-02-2018</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Reschedule Cut off Time</label>
                                            <input type="time" name="reschedule_cut_off_time" value="{{ $Companysetting->reschedule_cut_off_time }}"  class="without form-control form-control-solid mb-4" required />    
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="required form-label fs-6 mb-4" >Discard Cut off Time</label>
                                            <input type="time" name="discard_cut_off_time" value="{{ $Companysetting->discard_cut_off_time }}" class="without form-control form-control-solid mb-4" placeholder="Eg: H:i:s:a" required />
                                        </div>

                                        <div class="col-md-3">
                                            <label class="required form-label fs-6 mb-4" >Logo (For Login Page)</label>
                                            <div class="col-md-3">
                                                @include('components.imagecrop',['name'=>'logo_login_page','imgsrc'=>$Companysetting->logo_login_page])
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="required form-label fs-6 mb-4" >Logo (For Header)</label>
                                            <div class="col-md-3">
                                                @include('components.imagecrop',['name'=>'logo_header','imgsrc'=>$Companysetting->logo_header])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        @include('components.contact')
                                    </div>                                    
                                </div>
				</section>
			
			
			
			</div>
		</div>
                                
                                
                             
                              

                                <br>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="status" type="checkbox" {{ ($Companysetting->status == 1)? 'checked' : '' }} value="1" id="status" />
                                        <!--end::Input-->

                                        <!--begin::Label-->
                                        <label class="form-check-label" for="status">
                                            <div class="fw-bolder text-gray-800">Status</div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="form-group row" style="float:right" >
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-secondary btn-hover-rise me-5 ">Reset</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">Save</button>
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
    <script>
        $(document).ready(function () {
             back = "{{ route('setting.companysettings.index') }}"
        })
    </script> 
    <style>
        .without::-webkit-datetime-edit-ampm-field {
           display: none;

         }

   </style>

    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/cropper/cropper.bundle.js')}}'></script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/formrepeater/formrepeater.bundle.js')}}'></script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/tinymce/tinymce.bundle.js')}}'></script>
    <script>
    var objectB = new Object();
    var objectA = new Object();
    const have_tax_Yes = document.querySelectorAll('[name="have_tax"]')
    const taxation_number_div = document.getElementById('taxation_number_div')
    const taxation_number = document.getElementById('taxation_number')

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

        var options = {selector: "#about_us"};

        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);


    function have_tax_Yes_fun(event){
        if(event.target.value == 1){
            taxation_number_div.removeAttribute('hidden')
            taxation_number_div.setAttribute('required',true)
            taxation_number.setAttribute('required',true)
            
        }else{
            taxation_number_div.setAttribute('hidden',true)
            taxation_number_div.removeAttribute('required')
            taxation_number.removeAttribute('required')
            taxation_number.value ='';
        }
    }

    $("#country_id").on('select2:select', function (e) {
        var data = e.params.data;
        $.ajax({
            url:"{{route('master.country.getState')}}",
            method:"POST",
            data:{id:data.id,"_token": "{{ csrf_token() }}",},
            success:function(data){
                var option = `<option>Select State</option>`
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
    // const Contact = $('#kt_docs_repeater_basic');
    // var pincoed = '+91'
    // Contact.repeater({
    //     initEmpty: false,
    //     defaultValues: {
    //         'cphone':pincoed
    //     },

    //     show: function () {
    //         $(this).slideDown();
    //     },

    //     hide: function (deleteElement) {
    //         $(this).slideUp(deleteElement);
    //     }
    // });
    // Contact.setList(@json($contact))
    </script>
    @endsection
</x-base-layout>
