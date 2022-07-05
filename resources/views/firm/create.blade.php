<x-base-layout>
    @section('styles')
    <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/jstree/jstree.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endsection
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Consultant Category</h1>
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
                        <li class="breadcrumb-item text-muted">Master</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"><a href="{{ route('master.documents.index') }}" class="text-muted text-hover-primary">Consultant Category</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Create consultantcategory Category</li>
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
                        <form action="{{ route('user.firms.store') }}" method="post" id="formCreate">
                            <input type="hidden" name="categorie_id" id="categorie_id">
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
                                        <label class="required form-label fs-6 mb-2" >About Us</label>
                                        <textarea id="about_us" name="about_us" class="tox-target"></textarea>
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
                                </div>
                                <h4>Category / Sub Category</h4>
                                <div class="rounded border p-10">
                                    <div id="kt_docs_jstree_checkable"></div>
                                </div>
                                <h4>Bank Account Details</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Account Number</label>
                                        <input type="text" name="account_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Account Number" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Account Name</label>
                                        <input type="text" name="account_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Account Name" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >IBAN Code / IFSC Code</label>
                                        <input type="text" name="ifsc_code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="IBAN Code / IFSC Code" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Bank Name" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Branch</label>
                                        <input type="text" name="branch" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Branch" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="bank_status" type="checkbox" value="1" id="bank_status" />
                                            <label class="form-check-label" for="bank_status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <h4>Login Details</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Email ID</label>
                                        <input type="text" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="email" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >User Name</label>
                                        <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="User Name" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Role</label>
                                        <input type="text" name="role" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Role" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="login_status" type="checkbox" value="1" id="login_status" />
                                            <label class="form-check-label" for="login_status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <h4>Gallary</h4>
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Upload Image</label>
                                        <input type="file" name="gallery" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="email" required />
                                    </div>
                                </div>
                                <h4>Working Hours</h4>
                                <div class="rounded border p-10">
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Sunday</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="sunday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="sunday_to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                        <i class="la la-plus"></i> Add Number
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Monday</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="monday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="monday_to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                        <i class="la la-plus"></i> Add Number
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Tuesday</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="tuesday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="tuesday_to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                        <i class="la la-plus"></i> Add Number
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Wednesday</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="wednesday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="wednesday_to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                        <i class="la la-plus"></i> Add Number
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Thursday</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="thursday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="thursday_to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                        <i class="la la-plus"></i> Add Number
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Friday</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="friday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="friday_to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                        <i class="la la-plus"></i> Add Number
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Saturday</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="saturday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="saturday_to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                        <i class="la la-plus"></i> Add Number
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/jstree/jstree.bundle.js')}}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
    const have_tax_Yes = document.querySelectorAll('[name="have_tax"]')
    const taxation_number_div = document.getElementById('taxation_number_div')
    const categorie_id = document.getElementById('categorie_id')
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
    $('.kt_docs_repeater_nested').repeater({
        repeaters: [{
            selector: '.inner-repeater',
            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        }],

        show: function () {
            $(this).slideDown();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    var KTJSTreeCheckable = {
    init: function () {
        $("#kt_docs_jstree_checkable")
          // listen for event
            .on('changed.jstree', function (e, data) {
                var i, j, r = [];
                for(i = 0, j = data.selected.length; i < j; i++) {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }
                categorie_id.value = r.join(', ');
                console.log(r);
            })
            .jstree({
            plugins: ["wholerow", "checkbox", "types"],
            core: {
                themes: {
                    responsive: !1
                },
                data: {!! json_encode($tree) !!}
            },
            types: {
                default: {
                    icon: ""
                },
                file: {
                    icon: ""
                }
            }
        })
    }
};

        var options = {selector: "#about_us"};
        var options2 = {selector: "#register_address"};

        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options);
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
    KTUtil.onDOMContentLoaded((function () {
        KTJSTreeCheckable.init()
    }));
    </script>
    @endsection
</x-base-layout>
