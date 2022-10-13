<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Customer</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('user.customer.index') }}" class="text-muted text-hover-primary">Customer</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Edit Customer</li>
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
                        <form action="{{ route('user.customer.update',$customer->id) }}" method="post" id="formEdit">
                            @csrf
                            <div class="py-5">
                                <h4>Mobile</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <div class="col-10">
                                            <div class="input-group">
                                                {{-- <label class="input-group-text">Country Code</label> --}}
                                                <select class="form-select w-0" name="country_code" id="country_code" style="max-width:10%;">
                                                    <option>--</option>
                                                    @foreach($countrys as $data)
                                                        <option value="{{$data->id}}" data-has_state='{{ $data->has_state }}' {{ ($customer->country_id ==  $data->id)?'selected':'' }}>{{$data->country_code}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" name="phone_no" id="phone_no" value="{{ $customer->phone_no }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" required />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <h4>Personal</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Name</label>
                                        <input type="text" name="name" value="{{ $customer->name }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" required />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label fs-6 mb-2" >Date of Birth</label>
                                        <input class="form-control form-control-solid" name="dob" id="dob"  placeholder="Date of Birth" value="{{ $customer->dob }}"  required/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Gender </label>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="gender" type="radio" {{ ($customer->gender == 'male')?'checked':'' }} value="male" id="male" />
                                            <label class="form-check-label" for="male">
                                                <div class="fw-bolder text-gray-800">Male</div>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="gender" type="radio" {{ ($customer->gender == 'female')?'checked':'' }} value="female" id="Female" />
                                            <label class="form-check-label" for="Female">
                                                <div class="fw-bolder text-gray-800">Female</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label fs-6 mb-2" >Email</label>
                                        <input class="form-control form-control-solid" value="{{ $customer->email }}" name="email" id="Email"  placeholder="Email" type="email" required/>
                                    </div>
                                </div>
                                <h4>Address</h4>
                                <div class="rounded border p-10">
                                    @include('components.addressComponent',['country_id'=>$customer->country_id,'state_id'=>$customer->state_id,
                                        'city_id'=>$customer->city_id,'zipcode'=>$customer->zipcode,'register_address'=>$customer->register_address,'page'=>'Edit','countrys'=>$countrys,'state'=>$state,'city'=>$city])

                                    <div class="fv-row mb-10">
                                        {{-- <label class="required fw-bold fs-6 mb-5"></label> --}}
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="status" {{ ($customer->status == 1)?'checked':'' }} type="checkbox" value="1" id="status" />
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <label class="form-check-label" for="status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">Update</button>
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
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/tinymce/tinymce.bundle.js')}}'></script>
    <script>
        back = '{{ route('user.customer.index') }}'
        const yesterday = new Date();
        var BasicDetails = null
        yesterday.setDate(yesterday.getDate() - 1);


        // $("#dob").val(formatDate(yesterday))
        $("#dob").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),
                maxDate : formatDate(yesterday),
                locale: {
                        format: '{{ strtoupper($companeySetting->date_format) }}'
                    }
            }, function(start, end, label) {}
        )


        function formatDate(date) {
            return [
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
                date.getFullYear(),
            ].join('/');
        }
        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }
        
         var state = $("#state_id")
        var city = $("#city_id")
        var country_id = $("#country_id")
        var stateDiv = $('#stateDiv')
        var phone_no = $('#phone_no')

        $("#country_code").change(function (e) {
           
            var id = e.currentTarget.options[e.currentTarget.options.selectedIndex].value;
            let has_state =  e.currentTarget.options[e.currentTarget.options.selectedIndex].dataset.has_state;
            if(has_state != "0"){
                stateDiv.show(500)
                state.attr('required');
            }else{
                stateDiv.hide(500)
                state.removeAttr('required');
            }
            $.ajax({
                url:"{{route('master.country.getState')}}",
                method:"POST",
                data:{id:id,"_token": "{{ csrf_token() }}",},
                success:function(data){
                    
                    var option = `<option selected></option>`
                    var option1 = `<option selected></option>`
                    if(data.states.length != null){
                        data.states.forEach((e)=>{
                            option += '<option value='+e.id+'>'+e.state_name+'</option>';
                        })
                    }
                    if(data.city.length != null){
                        data.city.forEach((e)=>{
                            option1 += '<option value='+e.id+'>'+e.city_name+'</option>';
                        })
                    }
                    country_id.val(id).trigger("change");
                    state.html(option).val('').trigger("change");
                    city.html(option1).val('').trigger("change");
                    phone_no.val(data.Country.dialing)
                }
            })
            
        });
        

    </script>
    @endsection
</x-base-layout>