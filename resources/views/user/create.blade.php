<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Admin User</h1>
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
                        <li class="breadcrumb-item text-muted">Admin</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"><a href="{{ route('admin.user.index') }}" class="text-muted text-hover-primary">Admin User</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Create User</li>
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
                        <form action="{{ route('admin.user.store') }}" method="post" id="formCreate">
                            @csrf
                            <div class="py-5">
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >First Name</label>
                                        <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="First Name" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Last Name</label>
                                        <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Last Name" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Email Id / Username</label>
                                        <input type="text" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Profile Picture</label>
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
                                                <input type="file" name="picture" accept=".png, .jpg, .jpeg" />
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
                                        <label class="required form-label fs-6 mb-2" >Mobile no</label>
                                        <input type="text" name="phone" id="phone" class="form-control mb-2 mb-md-0" placeholder="phone" required/>
                                    </div>
                                </div>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <th></th>
                                                        <th><input class="form-check-input" type="checkbox" /> Create</th>
                                                        <th><input class="form-check-input" type="checkbox" /> Edit </th>
                                                        <th><input class="form-check-input" type="checkbox" /> View </th>
                                                        <th><input class="form-check-input" type="checkbox" /> Delete </th>
                                                        <th><input class="form-check-input" type="checkbox" /> Download </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <td><input class="form-check-input" type="checkbox" /> Currency</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input class="form-check-input" type="checkbox" value="Currency_download" /></td>
                                                    </tr>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <td><input class="form-check-input" type="checkbox" /> Country</td>
                                                        <td colspan="4"></td>
                                                        <td><input class="form-check-input" type="checkbox" /></td>
                                                    </tr>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <td><input class="form-check-input" type="checkbox" /> State</td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="State_Create" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="State_Edit" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="State_View" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="State_delete" /></td>
                                                        <td><input class="form-check-input" name="permession[]" type="checkbox" value="State_download" /></td>
                                                    </tr>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <td><input class="form-check-input" type="checkbox" /> City</td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="City_Create"/></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="City_Edit"/></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="City_View" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="City_delete" /></td>
                                                        <td><input class="form-check-input" name="permession[]" type="checkbox" value="City_download" /></td>
                                                    </tr>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <td><input class="form-check-input" type="checkbox" /> Document</td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Document_Create" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Document_Edit" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Document_View"  /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Document_delete"  /></td>
                                                        <td><input class="form-check-input" name="permession[]" type="checkbox" value="Document_download"  /></td>
                                                    </tr>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <td><input class="form-check-input" type="checkbox" /> Categoty</td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Categoty_Create" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Categoty_Edit" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Categoty_View"  /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Categoty_delete"  /></td>
                                                        <td><input class="form-check-input" name="permession[]" type="checkbox" value="Categoty_download"  /></td>
                                                    </tr>
                                                    <tr class="fw-bolder fs-6 text-gray-800">
                                                        <td><input class="form-check-input" type="checkbox" /> Consultant Category</td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Consultant_Create" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Consultant_Edit" /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Consultant_View"  /></td>
                                                        <td ><input class="form-check-input" name="permession[]" type="checkbox" value="Consultant_delete"  /></td>
                                                        <td><input class="form-check-input" name="permession[]" type="checkbox" value="Consultant_download"  /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">Submit</button>
                                    </div>
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
        var state = $("#state_id")
        var city = $("#city_id")

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
                    $("#phone").val(data.Country.dialing)
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
    </script>
    @endsection

</x-base-layout>
