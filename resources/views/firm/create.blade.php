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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Firms</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('user.firms.index') }}" class="text-muted text-hover-primary">Firms</a></li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Create Firm</li>
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
                        <form action="{{ route('user.firms.store') }}" method="post" id="formCreate">
                            <input type="hidden" name="categorie_id" id="categorie_id">
                            @csrf
                            <div class="py-5">
                                <div class="tabs effect-1">
			<!-- tab-title -->
			<input type="radio" id="tab-1" name="tab-effect-1" checked="checked">
			<span>About</span>

			<input type="radio" id="tab-2" name="tab-effect-1">
			<span> Address</span>

			<input type="radio" id="tab-3" name="tab-effect-1">
			<span>Category / Sub Category</span>

			<input type="radio" id="tab-4" name="tab-effect-1">
			<span>Bank Account Details</span>

			<input type="radio" id="tab-5" name="tab-effect-1">
			<span>Login Details</span>

	<input type="radio" id="tab-6" name="tab-effect-1">
			<span style="width: 10%;"> Gallery</span>
				<input type="radio" id="tab-7" name="tab-effect-1">
			<span>Working Hours</span>
				<input type="radio" id="tab-8" name="tab-effect-1">
			<span>Contact</span>
			<!-- tab-content -->
			<div class="tab-content">
				<section id="tab-item-1">
					<div class="p-10">
                                    <div class="form-group row">
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Company Name</label>
                                        <input type="text" name="comapany_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Company Name" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Legal Name</label>
                                        <input type="text" name="legal_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Legal Name" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6 firm-yn">
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
                                    <div class="fv-row mb-10 col-md-6" id="taxation_number_div">
                                        <label class="required form-label fs-6 mb-2" >Taxation Number</label>
                                        <input type="number" id="taxation_number" name="taxation_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Taxation Number" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Company Registered On</label>
                                        <input class="form-control form-control-solid" name="register_on" placeholder="Pick date rage" id="kt_daterangepicker_3" required/>
                                    </div>

                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="form-label fs-6 mb-2" >Logo</label>
                                  
                                    <div class="fv-row mb-10">
                                       
                                        @include('components.imagecrop',['name'=>'logo'])
                                    </div>
                                      </div>
                                     </div>
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >About Us</label>
                                        <textarea id="about_us" name="about_us" class="tox-target"></textarea>
                                    </div>
                                </div>
				</section>
				<section id="tab-item-2">
				  <div class="p-10">
                                    
                                    <div class="p-10">
                                    @include('components.addressComponent',['register_address'=>'','page'=>'create','countrys'=>$countrys,'state'=>$state,'city'=>$city])
                                    </div>
                                
                               
                                </div>
				</section>
				<section id="tab-item-3">
				 <div class="p-10">
                                    <div id="kt_docs_jstree_checkable"></div>
                                </div>
				</section>
				<section id="tab-item-4">
				 <div class="p-10">
                                    <div class="form-group row">
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Account Number</label>
                                        <input type="number" name="account_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Account Number" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Account Name</label>
                                        <input type="text" name="account_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Account Name" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >IBAN Code / IFSC Code</label>
                                        <input type="text" name="ifsc_code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="IBAN Code / IFSC Code" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Bank Name" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Branch</label>
                                        <input type="text" name="branch" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Branch" required />
                                    </div>
                                    </div>
                                   <!-- <div class="fv-row mb-10">
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="bank_status" type="checkbox" value="1" id="bank_status" />
                                            <label class="form-check-label" for="bank_status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                        </div>-->
                                    </div>
            
				</section>
				<section id="tab-item-5">
				    <div class="p-10">
                                    <div class="form-group row">
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Email ID</label>
                                        <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="email" required />
                                    </div>
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >User Name</label>
                                        <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="User Name" required />
                                    </div>
                                    </div>
                                    <!--<div class="fv-row mb-10">-->
                                    <!--    <label class="required form-label fs-6 mb-2" >Role</label>-->
                                    <!--    <input type="text" name="role" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Role" required />-->
                                    <!--</div>-->
                                    <div class="fv-row mb-10">
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="login_status" type="checkbox" value="1" id="login_status" />
                                            <label class="form-check-label" for="login_status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
				</section>
				<section id="tab-item-6">
					       <div class="p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required form-label fs-6 mb-2" >Upload Image</label>
                                        <input type="file" name="gallery[]" id="image" multiple onchange="image_select()" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Image" required >
                                        <div class="card-body d-flex flex-wrap justify-content-start" id="container"></div>
                                    </div>
                                </div>
					</section>
				<section id="tab-item-7">
							          <div class="p-10">
                                    <div class="form-group row">
                                    <div class="mb-10 col-md-6">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Sunday</label>
                                                                <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                    <input class='form-check-input checkboxOnOff'  name='day' type='checkbox'checked value='Sunday' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="sunday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                    <div class="mb-10 col-md-6">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Monday</label>
                                                                <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                    <input class='form-check-input checkboxOnOff' name='day' type='checkbox' checked value='Monday' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="monday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="monday_to" class="form-control" placeholder="Enter contact number"  required/>
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
                                    <div class="mb-10 col-md-6">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Tuesday</label>
                                                                <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                    <input class='form-check-input checkboxOnOff' name='day' type='checkbox' checked value='Tuesday' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="tuesday_from" class="form-control" placeholder="Enter contact number"  required/>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                    <div class="mb-10 col-md-6">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-3">
                                                                <label class="form-label">Wednesday</label>
                                                                <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                    <input class='form-check-input checkboxOnOff' name='day' type='checkbox' checked value='Wednesday' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="wednesday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                    <div class="mb-10 col-md-6">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-3">
                                                                <label class="form-label">Thursday</label>
                                                                <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                    <input class='form-check-input checkboxOnOff' name='day' type='checkbox' checked value='Thursday' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="thursday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="thursday_to" class="form-control" placeholder="Enter contact number" required/>
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
                                    <div class="mb-10 col-md-6">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Friday</label>
                                                                <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                    <input class='form-check-input checkboxOnOff' name='day' type='checkbox' checked value='Friday' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-6">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="friday_from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                    <div class="mb-10 col-md-6">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-2">
                                                                <label class="form-label">Saturday</label>
                                                                 <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                <input class='form-check-input checkboxOnOff' name='day' type='checkbox' checked value='Saturday' />
                                                            </div>
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
                                                                            <div class="col-md-6">
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
                                    </div>
                                    </div>
							    </section>
							    <section id="tab-item-8">
							        <div class="p-10">
							     @include('components.contact')
							     </div>
							    </section>
			</div>
		</div>
                               
                                
                               
                             
                                
                              
                     
                            
                                    <div class="fv-row mb-10">
                                        {{-- <label class="required fw-bold fs-6 mb-5"></label> --}}
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                      
                                            <input class="form-check-input me-3" name="status" type="checkbox" value="1" id="status" />
                                         

                                   
                                            <label class="form-check-label" for="status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                     
                                        </div>
                                    </div>
                                    <div class="form-group row" style="float:right;">
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
    <style>
        <style>
                .image_container {
            height: 120px;
            width: 200px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
        }
        .image_container img {
            height: 120px;
            width: 200px;
            
            object-fit: cover;
        }
        .image_container span {
            top: -6px;
            right: 8px;
            color: red;
            font-size: 28px;
            font-weight: normal;
            cursor: pointer;
        }
    </style>
   
    <script>
        var images = [];
        function image_select() {
          var image = document.getElementById('image').files;
          for (i = 0; i < image.length; i++) {
            images.push({
                "name" : image[i].name,
                "url" : URL.createObjectURL(image[i]),
                "file" : image[i],
            })
          }
          document.getElementById('container').innerHTML = image_show();
        }

        function image_show() {
          var image = "";
          images.forEach((i) => {
             image += `<div class="image_container d-flex justify-content-center position-relative">
                  <img src="`+ i.url +`"  alt="Image">
                  <span class="position-absolute" onclick="delete_image(`+ images.indexOf(i) +`)">&times;</span><div></div>
              </div>`;
          })
          return image;
        }

        function delete_image(e) {
            images.splice(e, 1);
            document.getElementById('container').innerHTML = image_show();

            const dt = new DataTransfer()
            const input = document.getElementById('image')
            const { files } = input

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (e !== i)
                dt.items.add(file);
            }

            input.files = dt.files;
            console.log(document.getElementById('image').files);
        }
    </script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/cropper/cropper.bundle.js')}}'></script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/formrepeater/formrepeater.bundle.js')}}'></script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/tinymce/tinymce.bundle.js')}}'></script>
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/jstree/jstree.bundle.js')}}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
    
        back = "{{ route('user.firms.index') }}"
        
    const have_tax_Yes = document.querySelectorAll('[name="have_tax"]')
    const taxation_number_div = document.getElementById('taxation_number_div')
    const taxation_number = document.getElementById('taxation_number')
    const categorie_id = document.getElementById('categorie_id')
    var state = $("#state_id")
    var city = $("#city_id")

    have_tax_Yes.forEach(element => {
        element.addEventListener('change',have_tax_Yes_fun)
    })
    // function time(event){
    //     console.log(event.value);
    //     var btdel =  document.querySelectorAll('[data-repeater-create]')
    //     btdel[1].click();
    // }

    
    $(".checkboxOnOff").on('change', function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().parent().find('[data-repeater-create]')[0].click()
       
        }
        else {
            let arr = $(this).parent().parent().parent().find('[data-repeater-delete]');
            $.each( arr, function( key, value ) {
                value.click();
            });

        }
    });

    $("#kt_daterangepicker_3").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format("YYYY"),10),
            locale: {
                        format: '{{ strtoupper($companeySetting->date_format) }}'
                    }
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
                    categorie_id.value = r.join(',');
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
            taxation_number.setAttribute('required',true)
        }else{
            taxation_number_div.setAttribute('hidden',true)
            taxation_number.removeAttribute('required')
            taxation_number.value = ''
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
                // city.html(null).trigger("change");
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
