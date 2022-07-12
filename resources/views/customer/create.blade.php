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
                        <li class="breadcrumb-item text-dark">Create Articel</li>
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
                        <form action="{{ route('user.customer.store') }}" method="post" id="formCreate">
                            @csrf
                            <div class="py-5">
                                <h4>Mobile</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Mobile</label>
                                        <input type="text" name="phone_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile" required />
                                    </div>
                                </div>
                                <h4>Personal</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Name</label>
                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" required />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label fs-6 mb-2" >Date of Birth</label>
                                        <input class="form-control form-control-solid" name="dob" id="dob"  placeholder="Date of Birth"  required/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Gender </label>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="gender" type="radio" value="male" checked id="male" />
                                            <label class="form-check-label" for="male">
                                                <div class="fw-bolder text-gray-800">Male</div>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="gender" type="radio" value="female" id="Female" />
                                            <label class="form-check-label" for="Female">
                                                <div class="fw-bolder text-gray-800">Female</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label fs-6 mb-2" >Email</label>
                                        <input class="form-control form-control-solid" name="Email" id="Email"  placeholder="Email" type="email" required/>
                                    </div>
                                </div>
                                <h4>Address</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Registered Address</label>
                                        <textarea id="register_address" name="register_address" class="form-control"></textarea>
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
    <script>
        const yesterday = new Date();
        var BasicDetails = null
        yesterday.setDate(yesterday.getDate() - 1);

        var state = $("#state_id")
        var city = $("#city_id")

        $("#dob").val(formatDate(yesterday))
        $("#dob").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),
                maxDate : formatDate(yesterday)
            }, function(start, end, label) {}
        )

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

    </script>
    @endsection
</x-base-layout>
