<x-base-layout>
    @section('styles')
    <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/jstree/jstree.bundle.css')}}" rel="stylesheet" type="text/css" />
        <style>
            .stepper.stepper-pills .stepper-item.skip .stepper-icon .stepper-number {
                color: #ffffff !important;
                font-size: 1.35rem;
            }
            .stepper.stepper-pills .stepper-item.skip .stepper-icon {
                transition: color 0.2s ease, background-color 0.2s ease;
                background-color: #9a5400;
            }
            .stepper [data-kt-stepper-action=skip] {
                display: none;
            }
        </style>
    @endsection
    <div class="content d-flex flex-column flex-column-fluid card card-flush">
        <div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column" id="kt_create_account_stepper">
				<div class="d-flex flex-column flex-lg-row-auto w-xl-500px bg-lighten shadow-sm">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-500px scroll-y">
						<div class="d-flex flex-row-fluid flex-column flex-center p-10 pt-lg-20">
							{{-- <a href="../../demo1/dist/index.html" class="mb-10 mb-lg-20">
								<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
							</a> --}}
							<div class="stepper-nav">
								<div class="stepper-item current" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">1</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Mobile</h3>
										<div class="stepper-desc fw-bold">Verify OTP</div>
									</div>
								</div>
								<div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<i class="stepper-check fas fa-warning"></i>
										<span class="stepper-number">2</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Personal</h3>
										<div class="stepper-desc fw-bold">Setup Personal Settings</div>
									</div>
								</div>
								<div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">3</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Address</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
								<div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">4</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Film / Individual</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">5</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Profession</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">6</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Specialized</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">7</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Consultant Details</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">8</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Bank Details</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">9</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Proof</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">10</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Insurance</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">11</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Commission</h3>
										<div class="stepper-desc fw-bold"></div>
									</div>
								</div>
								<div class="stepper-item" data-kt-stepper-element="nav">
									<div class="stepper-line w-40px"></div>
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">12</span>
									</div>
									<div class="stepper-label">
										<h3 class="stepper-title">Completed</h3>
										<div class="stepper-desc fw-bold">Woah, we are here</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 5-->
							</div>
						</div>
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-150px min-h-lg-300px" style="background-image: url(assets/media/illustrations/sketchy-1/16.png"></div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-1000px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">
								<!--begin::Step 1-->
								<div class="current" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
                                        <div class="card-body pt-0">
                                            <div class="py-5">
                                                <h4>Mobile</h4>
                                                <div class="rounded border p-10">
                                                    <div class="fv-row mb-10">
                                                        <label class="required form-label fs-6 mb-2" >Mobile No</label>
                                                        <input type="tel" id="phone_no" name="phone_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile No" required />
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
								<!--end::Step 1-->
								<!--begin::Step 2-->
								<div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Personal</h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-bold fs-6">Personal info, please Fill</div>
											<!--end::Notice-->
										</div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control mb-2 mb-md-0" placeholder="First & last Name" required/>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Email</label>
                                            <input type="email" name="email" id="email"  class="form-control mb-2 mb-md-0" placeholder="Email" required/>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">Landline Number</label>
                                            <input type="tel" name="landline"  class="form-control mb-2 mb-md-0" placeholder="Landline Number ( optional )"/>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Date of Birth</label>
                                            <input class="form-control form-control-solid" name="dob" id="dob"  placeholder="Date of Birth"  required/>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Gender</label>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" value="male" id="male" checked/>
                                                <label class="form-check-label" for="male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" value="female" id="female"/>
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Bio</label>
                                            <div class="form-floating mb-7">
                                                <textarea class="form-control" id="bio_data" placeholder="Leave a comment here" name="bio_data" ></textarea>
                                                <label for="bio_data">Comments</label>
                                            </div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Year of Experience</label>
                                            <input type="number" name="exp_year" id="exp_year"  class="form-control mb-2 mb-md-0" placeholder="Year of Experience" required/>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Select Language</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Search option" data-allow-clear="true" name="language" id="language" multiple="multiple">
                                                <option value="type">Type</option>
                                                <option value="name">Name</option>
                                                <option value="categories_id">Categorie Name</option>
                                                <option value="description">Description</option>
                                                <option value="tags">Tags</option>
                                                <option value="sort_no_list">sort Categorie list</option>
                                                <option value="sort_no_home">sort Home list</option>
                                                <option value="display_in_home">Display in Home</option>
                                                <option value="sort_no_home">sort Home list</option>
                                            </select>
                                        </div>
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Step 2-->
								<!--begin::Step 3-->
								<div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-10 pb-lg-12">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Address</h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-bold fs-6">Add Address Information</div>
											<!--end::Notice-->
										</div>
										<!--end::Heading-->
                                        <div class="fv-row mb-10">
                                            <label class="required form-label fs-6 mb-2" >Registered Address</label>
                                            <div class="form-floating mb-7">
                                                <textarea class="form-control" id="register_address" placeholder="Address" name="register_address" ></textarea>
                                                <label for="bio_data">Address</label>
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
									</div>
									<!--end::Wrapper-->
								</div>
								<div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Firm / Individual</h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-bold fs-6"></div>
											<!--end::Notice-->
										</div>
										<!--end::Heading-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Radio group-->
                                            <div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                                <!--begin::Radio-->
                                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="type" checked="checked" value="1"/>
                                                    <!--end::Input-->
                                                    Firm
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success active" data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="type"  value="2"/>
                                                    <!--end::Input-->
                                                    Individual
                                                </label>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Radio group-->
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class=" form-label fs-6 mb-2" >Choose Firm</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Search option" data-allow-clear="true" name="firm_choose" id="firm_choose">
                                                <option value="type">Type</option>
                                                <option value="name">Name</option>
                                                <option value="categories_id">Categorie Name</option>
                                                <option value="description">Description</option>
                                                <option value="tags">Tags</option>
                                                <option value="sort_no_list">sort Categorie list</option>
                                                <option value="sort_no_home">sort Home list</option>
                                                <option value="display_in_home">Display in Home</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="fv-row mb-10" hidden id="other">
                                            <input type="text" name="other" id="other"  class="form-control mb-2 mb-md-0" placeholder="Enter Firm Name"/>
                                        </div>
									</div>
									<!--end::Wrapper-->
								</div>
                                <div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
                                    <div class="w-100">
										<!--begin::Heading-->
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Profession</h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-bold fs-6"></div>
											<!--end::Notice-->
										</div>
                                        <div class="fv-row mb-10">
                                            <input type="hidden" name="categorie_id" id="categorie_id">
                                            <div id="kt_docs_jstree_checkable"></div>
                                        </div>
                                    </div>
									<!--end::Wrapper-->
								</div>
                                <div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
                                    <div class="w-100">
										<!--begin::Heading-->
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Specialized </h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-bold fs-6"></div>
											<!--end::Notice-->
										</div>
                                        <div class="fv-row mb-10">
                                            <input type="hidden" name="specialized" id="specialized">
                                            <div id="kt_docs_jstree_checkable1"></div>
                                        </div>
                                    </div>
									<!--end::Wrapper-->
								</div>
								<div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<div class="pb-8 pb-lg-10">
											<h2 class="fw-bolder text-dark">Preferred Slot</h2>
										</div>
                                        <div class="fv-row mb-10">
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                ....
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->

                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">15 Min</span>
                                                        {{-- <span class="fs-7 text-muted">Creating a clear text structure is just one SEO</span> --}}
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->

                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio"  name="preferre_slot" checked value="15"/>
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->

                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                ....
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->

                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">30 Min</span>
                                                        {{-- <span class="fs-7 text-muted">Creating a clear text structure is just one aspect</span> --}}
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->

                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="preferre_slot" value="30"/>
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->

                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-success">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                ....
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->

                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">45 Min</span>
                                                        {{-- <span class="fs-7 text-muted">Creating a clear text structure copywriting</span> --}}
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->

                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="preferre_slot" value="45"/>
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->

                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-success">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                ....
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->

                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">60 Min</span>
                                                        {{-- <span class="fs-7 text-muted">Creating a clear text structure copywriting</span> --}}
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->

                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="preferre_slot" value="60"/>
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <div class="fv-row">
                                            <div class="col-12">
                                                <h2 class="fw-bolder text-dark">Consultant Type</h2>
                                            </div>
                                            <div class='row'>
                                                <div class="col-2">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" id="Video" name="video" />
                                                        <label class="form-check-label" for="Video" >
                                                            Video
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-5">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                                        <input type="text" class="form-control" name="video_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-2">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" id="Voice" name="voice" />
                                                        <label class="form-check-label" for="Voice" >
                                                            Voice
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-5">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                                        <input type="text" class="form-control" name="voice_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-2">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" id="Text" name="text" />
                                                        <label class="form-check-label" for="Text" >
                                                            Text
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-5">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                                        <input type="text" class="form-control" name="text_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-2">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" id="Direct" name="direct" />
                                                        <label class="form-check-label" for="Direct" >
                                                            Direct
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-5">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                                        <input type="text" class="form-control" name="direct_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<!--end::Wrapper-->
								</div>
								<div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-8 pb-lg-10">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Bank Details</h2>
										</div>
                                        <div class="fv-row mb-10">
                                            <label class="required form-label fs-6 mb-2" >Account Number</label>
                                            <input type="number" name="account_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Account Number" required />
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
									<!--end::Wrapper-->
								</div>
                                <div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-8 pb-lg-10">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Proof</h2>
										</div>
                                        <div class="fv-row mb-10">
                                            <label class="required form-label fs-6 mb-2" >Document</label>
                                            <input id="proof" multiple type="file" name="proof" class="form-control form-control-solid mb-3 mb-lg-0"  />
                                        </div>
									</div>
									<!--end::Wrapper-->
								</div>
                                <div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
                                    <div class="w-100">
										<!--begin::Heading-->
										<div class="pb-8 pb-lg-10">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Insurance</h2>
										</div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label fs-6 mb-2" >Select Insurance</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="option" data-allow-clear="true" name="insurance_id" id="insurance_id" multiple="multiple">
                                                @foreach ($Insurance as $value )
                                                <option value="{{ $value->id }}">{{ $value->comapany_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
									</div>
									<!--end::Wrapper-->
								</div>
                                <div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
                                    <div class="w-100">
										<!--begin::Heading-->
										<div class="pb-8 pb-lg-10">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Commission</h2>
										</div>
                                        <h4>Commission For Consultant Fee</h4>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Flat or Percentage</label>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="com_con_type" type="radio" value="0" checked id="com_con_flat" />
                                                <label class="form-check-label" for="com_con_flat">
                                                    <div class="fw-bolder text-gray-800">Flat</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="com_con_type" type="radio" value="1" id="com_con_per" />
                                                <label class="form-check-label" for="com_con_per">
                                                    <div class="fw-bolder text-gray-800">Percentage</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Commission Amount</label>
                                            <div class="input-group mb-5">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                                <input type="number" class="form-control" name="com_con_amount" id="com_con_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                            </div>
                                        </div>
                                        <h4>Commission For Offers</h4>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Flat or Percentage</label>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="com_off_type" type="radio" value="0" checked id="com_off_flat" />
                                                <label class="form-check-label" for="com_off_flat">
                                                    <div class="fw-bolder text-gray-800">Flat</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="com_off_type" type="radio" value="1" id="com_off_per" />
                                                <label class="form-check-label" for="com_off_per">
                                                    <div class="fw-bolder text-gray-800">Percentage</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Commission Amount</label>
                                            <div class="input-group mb-5">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                                <input type="number" class="form-control" name="com_off_amount" id="com_off_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                            </div>
                                        </div>
                                        <h4>Payout Settings</h4>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Flat or Percentage</label>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="com_pay_type" type="radio" value="0" checked id="com_pay_flat" />
                                                <label class="form-check-label" for="com_pay_flat">
                                                    <div class="fw-bolder text-gray-800">Flat</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="com_pay_type" type="radio" value="1" id="com_pay_per" />
                                                <label class="form-check-label" for="com_pay_per">
                                                    <div class="fw-bolder text-gray-800">Percentage</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label fs-6 mb-2" >Commission Amount</label>
                                            <div class="input-group mb-5">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                                <input type="number" class="form-control" name="com_pay_amount" id="com_pay_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                            </div>
                                        </div>
									</div>
									<!--end::Wrapper-->
								</div>
                                <div class="" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-8 pb-lg-10">
											<!--begin::Title-->
											<h2 class="fw-bolder text-dark">Your Are Done!</h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-bold fs-6">If you need more info, please
											<a href="../../demo1/dist/authentication/sign-in/basic.html" class="link-primary fw-bolder">Sign In</a>.</div>
											<!--end::Notice-->
										</div>
										<!--end::Heading-->
										<!--begin::Body-->
										<div class="mb-0">
											<!--begin::Text-->
											<div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great &amp; amazing audience.</div>
											<!--end::Text-->
											<!--begin::Alert-->
											<!--begin::Notice-->
											<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
												<!--begin::Icon-->
												<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
												<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
														<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
														<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<!--end::Icon-->
												<!--begin::Wrapper-->
												<div class="d-flex flex-stack flex-grow-1">
													<!--begin::Content-->
													<div class="fw-bold">
														<h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
														<div class="fs-6 text-gray-700">To start using great tools, please, please
														<a href="#" class="fw-bolder">Create Team Platform</a></div>
													</div>
													<!--end::Content-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Notice-->
											<!--end::Alert-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Wrapper-->
								</div>
								<div class="d-flex flex-stack pt-15">
									<div class="mr-2">
										<button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
												<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->Previous</button>
									</div>
									<div>
										<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
											<span class="indicator-label">Submit
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-4 ms-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon--></span>
											<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
										<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next" >Continue
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
										<span class="svg-icon svg-icon-4 ms-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
												<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon--></button>
                                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="skip" >Skip
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                            <span class="svg-icon svg-icon-4 ms-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></button>
									</div>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<!--begin::Links-->
						<div class="d-flex flex-center fw-bold fs-6">
							<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
							<a href="https://devs.keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
							<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
						</div>
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Multi-steps-->
		</div>
    </div>
    @section('scripts')
    <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/jstree/jstree.bundle.js')}}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
        const categorie_id = document.getElementById('categorie_id')
        const specialized = document.getElementById('specialized')

        const com_con_amount = document.getElementById('com_con_amount')
        const com_off_amount = document.getElementById('com_off_amount')
        const com_pay_amount = document.getElementById('com_pay_amount')

        com_con_amount.addEventListener('keyup', function(event) {updateAmount(event.target,document.querySelector('input[name="com_con_type"]:checked').value) });
        com_off_amount.addEventListener('keyup', function(event) {updateAmount(event.target,document.querySelector('input[name="com_off_type"]:checked').value) });
        com_pay_amount.addEventListener('keyup', function(event) {updateAmount(event.target,document.querySelector('input[name="com_pay_type"]:checked').value) });
        document.querySelectorAll('input[name="com_con_type"]').forEach(e => e.addEventListener('change', function(event){ updateAmount(com_con_amount,event.target.value) }) )
        document.querySelectorAll('input[name="com_off_type"]').forEach(e => e.addEventListener('change', function(event){ updateAmount(com_off_amount,event.target.value) }) )
        document.querySelectorAll('input[name="com_pay_type"]').forEach(e => e.addEventListener('change', function(event){ updateAmount(com_pay_amount,event.target.value) }) )

        function updateAmount(event,type){
            if(type == 1){
                event.value > 100 ? (event.value = 100) : event.value = event.value
            }
        }

        const yesterday = new Date();
        var BasicDetails = null
        yesterday.setDate(yesterday.getDate() - 1);

        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }

        function formatDate(date) {
            return [
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
                date.getFullYear(),
            ].join('/');
        }

        function OtpVerify(event){
                const input = event.target
                if(input.value.length < 4) return

                input.setAttribute("disabled", true)
                GenerateOtp.textContent = 'Vefiy OTP'
                const data = { _token: "{{ csrf_token() }}",otp:input.value };

                fetch('{{ route('consultant.verifyotp') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    if(!data.otp_status) GenerateOtp.textContent = 'Try Again'
                    if(data.otp_status) {
                        document.getElementById('continue').click()
                        document.getElementById('continue').removeAttribute('hidden')
                    }
                })
            }
        $(document).ready(function () {
            document.getElementsByClassName('container-xxl')[0].className = 'container-fluid'
            const continueBtn = document.getElementById('continue')
            const GenerateOtp = document.getElementById('GenerateOtp')
            const other = document.getElementById('other')
            var state = $("#state_id")
            var city = $("#city_id")


            GenerateOtp.addEventListener("click", GenerateOtpFun);
            function GenerateOtpFun(event){
                const phone_no = document.getElementById('phone_no').value
                const data = { _token: "{{ csrf_token() }}",phone_no:phone_no };
                event.target.innerHTML = 'Senting OTP...'

                fetch('{{ route('consultant.generateotp') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('otp').disabled  = false
                    document.getElementById('otp').value  = ''
                    event.target.innerHTML = 'OTP Sented'
                    document.getElementById('otp_div').removeAttribute('hidden')
                })
            }

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
                        BasicDetails = data
                    }
                })
            })
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
            })
            $("#firm_choose").on('select2:select', function (e) {
                var data = e.params.data;
                if(data.id == 'other') document.getElementById('other').removeAttribute('hidden')
                else document.getElementById('other').setAttribute('hidden',true)
            })
        })

"use strict";

var KTCreateAccount = function () {
    var e, t, i, o, s, r, k, a = [],showSkip = [1,2,3,4,5,6,7,8,9,10,11,12],showpreview = [], funsave = [],funprev = [],triggervalue = [];
    return {
        init: function () {
            (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e),
            t = document.querySelector("#kt_create_account_stepper"),
            i = t.querySelector("#kt_create_account_form"),
            o = t.querySelector('[data-kt-stepper-action="submit"]'),
            k = t.querySelector('[data-kt-stepper-action="skip"]'),
            s = t.querySelector('[data-kt-stepper-action="next"]'),
            pr = t.querySelector('[data-kt-stepper-action="previous"]'),
            (r = new KTStepper(t)).on("kt.stepper.changed", (function (e) {
                13 === r.getCurrentStepIndex() ? (o.classList.remove("d-none"), o.classList.add("d-inline-block"), s.classList.add("d-none")) : 13 === r.getCurrentStepIndex() ? (o.classList.add("d-none"), s.classList.add("d-none")) : (o.classList.remove("d-inline-block"), o.classList.remove("d-none"), s.classList.remove("d-none")),
                showSkip.includes(r.currentStepIndex) ? (k.classList.add("d-inline-block"), k.classList.remove("d-none")) : (k.classList.add("d-none"), k.classList.remove("d-inline-block")),
                showpreview.includes(r.currentStepIndex) ? (pr.classList.add("d-none"), pr.classList.remove("d-inline-block")) :(pr.classList.add("d-inline-block"), pr.classList.remove("d-none"))
            })), r.on("kt.stepper.next", (function (e) {
                console.log("stepper.next");
                var t = a[e.getCurrentStepIndex() - 1];
                t ? t.validate().then((function (t) {
                    console.log("validated!"), "Valid" == t ? ( typeof funsave[e.getCurrentStepIndex() - 1] === 'function' ? funsave[e.getCurrentStepIndex() - 1]().then(function(data) { if(data?.step){ e.goTo(data.step);KTUtil.scrollTop();pr.classList.add('d-none');showpreview.push(data.step);  }else{ if(data){ e.goNext();KTUtil.scrollTop() } }  }):  e.goNext(), KTUtil.scrollTop()) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then((function () {
                        KTUtil.scrollTop()
                    }))
                })) :( typeof funsave[e.getCurrentStepIndex() - 1] === 'function' ? funsave[e.getCurrentStepIndex() - 1]().then(function(data) { console.log(data); if(data){ e.goNext();KTUtil.scrollTop() } }):  e.goNext(), KTUtil.scrollTop())
            })), r.on("kt.stepper.previous", (function (e) {
                console.log("stepper.previous"),
                typeof funprev[e.getCurrentStepIndex() - 1] === 'function' ? funprev[e.getCurrentStepIndex() - 1]().then(function(t){ e.goPrevious(), KTUtil.scrollTop() }) : e.goPrevious(), KTUtil.scrollTop()
            })), r.on("kt.stepper.skip", (function (e) {
                console.log("stepper.skip"), e.goNext(), KTUtil.scrollTop()
            })), a.push(FormValidation.formValidation(i, {
                fields: {
                    phone_no :{
                        validators: {
                            notEmpty: {
                                message: "Phone no required"
                            },
                            regexp : {
                                message : 'Enter Valide Phone number',
                                regexp : '^([9]{1})([234789]{1})([0-9]{8})$'
                            },
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    }),
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                }
            })), a.push(FormValidation.formValidation(i, {
                fields: {
                    name : {
                        validators : {
                            notEmpty: {
                                message: "Enter Name"
                            }
                        }
                    },
                    dob : {
                        validators : {
                            notEmpty: {
                                message: "Enter Date of Birth"
                            }
                        }
                    },
                    bio_data : {
                        validators : {
                            notEmpty: {
                                message: "Leave Some comment here"
                            }
                        }
                    },
                    exp_year : {
                        validators : {
                            notEmpty: {
                                message: "Enter Year of Experience"
                            }
                        }
                    },
                    language : {
                        validators : {
                            notEmpty: {
                                message: "Select at least one Language"
                            }
                        }
                    },
                    email : {
                        validators: {
                            notEmpty: {
                                message: "Enter Email Address"
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address',
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    }),
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                }
            })), a.push(FormValidation.formValidation(i, {
                fields: {
                    register_address : {
                        validators: {
                            notEmpty: {
                                message: "Add Address"
                            }
                        }
                    },
                    country_id : {
                        validators: {
                            notEmpty: {
                                message: "Select a Option"
                            }
                        }
                    },
                    state_id : {
                        validators: {
                            notEmpty: {
                                message: "Select a Option"
                            }
                        }
                    },
                    city_id : {
                        validators: {
                            notEmpty: {
                                message: "Select a Option"
                            }
                        }
                    },
                    zipcode : {
                        validators: {
                            notEmpty: {
                                message: "Enter Zip Code"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    }),
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {
                    account_number : {
                        validators: {
                            notEmpty: {
                                message: "Enter Account Number"
                            }
                        }
                    },
                    account_name : {
                        validators: {
                            notEmpty: {
                                message: "Enter Account Name"
                            }
                        }
                    },
                    ifsc_code : {
                        validators: {
                            notEmpty: {
                                message: "Enter IBAN Code / IFSC Code"
                            }
                        }
                    },
                    bank_name : {
                        validators: {
                            notEmpty: {
                                message: "Enter Bank Name"
                            }
                        }
                    },
                    branch : {
                        validators: {
                            notEmpty: {
                                message: "Enter Branch"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {
                    proof : {
                        validators: {
                            notEmpty: {
                                message: "Choose File"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),a.push(FormValidation.formValidation(i, {
                fields: {
                    com_con_amount : {
                        validators: {
                            notEmpty: {
                                message: "Enter Amount"
                            }
                        }
                    },
                    com_off_amount : {
                        validators: {
                            notEmpty: {
                                message: "Enter Amount"
                            }
                        }
                    },
                    com_pay_amount : {
                        validators: {
                            notEmpty: {
                                message: "Enter Amount"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    }),
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                }
            })),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 0
                for(var key in triggervalue[0]){
                    data[key] = triggervalue[0][key].value
                }
                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return response }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 1
                data['phone_no'] = document.getElementById('phone_no').value

                for(var key in triggervalue[1]){
                    data[key] = triggervalue[1][key].value
                }
                data['language'] = $('#language').val().toString()
                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 2
                data['phone_no'] = document.getElementById('phone_no').value

                for(var key in triggervalue[2]){
                    data[key] = triggervalue[2][key].value
                }
                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 3
                data['phone_no'] = document.getElementById('phone_no').value

                for(var key in triggervalue[3]){
                    data[key] = triggervalue[3][key].value
                }
                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),
            funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 4
                data['phone_no'] = document.getElementById('phone_no').value
                data['categorie_id'] = categorie_id.value

                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 5
                data['phone_no'] = document.getElementById('phone_no').value
                data['specialized'] = specialized.value

                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 6
                data['phone_no'] = document.getElementById('phone_no').value

                for(var key in triggervalue[6]){
                    if(triggervalue[6][key].type == 'checkbox') data[key] = (triggervalue[6][key].checked)? 1 : 0
                    else data[key] = triggervalue[6][key].value
                }
                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 7
                data['phone_no'] = document.getElementById('phone_no').value

                for(var key in triggervalue[7]){
                    if(triggervalue[7][key].type == 'checkbox') data[key] = (triggervalue[7][key].checked)? 1 : 0
                    else data[key] = triggervalue[7][key].value
                }
                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                let formdata = new FormData()
                let file = document.getElementById('proof').files

                file.forEach((i,d) => formdata.append(`proof[${d}]`, i))
                formdata.append("phone_no", document.getElementById('phone_no').value);
                formdata.append("step", 8);
                formdata.append("_token", "{{ csrf_token() }}");

                // var data = { _token: "{{ csrf_token() }}"};
                // data['step'] = 8
                // data['phone_no'] = document.getElementById('phone_no').value
                // data['proof'] = document.getElementById('proof').files

                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    // headers: { 'Content-Type': 'application/json', },
                    body: formdata
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 9
                data['phone_no'] = document.getElementById('phone_no').value
                data['insurance_id'] = document.getElementById('insurance_id').value

                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),funsave.push(async function(){
                var data = { _token: "{{ csrf_token() }}"};
                data['step'] = 10
                data['phone_no'] = document.getElementById('phone_no').value
                data['com_con_type'] = document.querySelector('input[name="com_con_type"]:checked').value
                data['com_off_type'] = document.querySelector('input[name="com_off_type"]:checked').value
                data['com_pay_type'] = document.querySelector('input[name="com_pay_type"]:checked').value
                data['com_con_amount'] = com_con_amount.value
                data['com_off_amount'] = com_off_amount.value
                data['com_pay_amount'] = com_pay_amount.value

                return await fetch('{{ route('consultant.save') }}', {
                    method: 'POST', // or 'PUT'
                    headers: { 'Content-Type': 'application/json', },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then((response) => {
                    if(response.next){ return true }
                    return false
                })
                .catch(error => {
                    funerror()
                })
            }),
            document.querySelectorAll('[data-kt-stepper-element="content"]').forEach(function (e,i){
                var obj = { }
                e.querySelectorAll('[name]').forEach(function (e){
                    obj[e.name] = e
                })
                triggervalue.push(obj)
            }),
            o.addEventListener("click", (function (e) {
                a[4].validate().then((function (t) {
                    console.log("validated!"), "Valid" == t ? (e.preventDefault(), o.disabled = !0, o.setAttribute("data-kt-indicator", "on"), setTimeout((function () {
                        o.removeAttribute("data-kt-indicator"), o.disabled = !1, r.goNext()
                    }), 2e3)) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then((function () {
                        KTUtil.scrollTop()
                    }))
                }))
            }))
        }
    }
}();

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
        $("#kt_docs_jstree_checkable1")
          // listen for event
            .on('changed.jstree', function (e, data) {
                var i, j, r = [];
                for(i = 0, j = data.selected.length; i < j; i++) {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }
                specialized.value = r.join(', ');
                console.log(r);
            })
            .jstree({
            plugins: ["wholerow", "checkbox", "types"],
            core: {
                themes: {
                    responsive: !1
                },
                data: {!! json_encode($tree1) !!}
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
}

KTUtil.onDOMContentLoaded((function () {
    KTCreateAccount.init()
    KTJSTreeCheckable.init()
}));
function funerror() {
    Swal.fire({
        text: "Sorry, looks like there are some errors detected, please try again.",
        icon: "error",
        buttonsStyling: !1,
        confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-light"
            }
    }).then((function () {
        KTUtil.scrollTop()
    }))
}
</script>
@endsection
</x-base-layout>
