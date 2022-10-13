<x-base-layout>
    @section('styles')
    <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/flatpickr/flatpickr.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/jstree/jstree.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endsection
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Consultant View</h1>
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
                        <li class="breadcrumb-item text-muted">Consultant</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('consultant.consultant.index') }}" class="btn btn-sm btn-secondary" ><i class="fas fa-arrow-left "></i></a>
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_tab_pane_1" >DashBoad</a> {{--   href="{{ route('consultant.consultant.edit',$consultant->id) }} --}}
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" id="test"  href="#kt_tab_pane_2"{{-- href="{{ route('activities.schedules.appointmentIndex',$consultant->id) }}"--}}>Calender</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_3">Scheduling</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_4">Appointments History</a>
                    </li>
                      <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_5">Offer History</a>
                    </li>
                   
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_7">Wallet & Transaction</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_8">Review & Ratings</a>
                    </li>
                  
                </ul>
                <!--begin::Navs-->
            </div>
        </div>


        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <div class="card-body">
                        <form id="personal_details" action="#" method="post">
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="{{asset("storage/$consultant->picture")}}" alt="image" />
                                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                    </div>
                    
                                
                                </div>
                                <div class="col-lg-10">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $consultant->name }}</a>
                                    <a href="#">
                                        @if($consultant->approval == 1)
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                            </svg>
                                        </span>
                                        @endif
                                    <!--end::Svg Icon-->
                                    </a>
                                    <a href="#" class="btn btn-sm btn-light-{{ ($consultant->approval == 0)?'danger':'success'  }} fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{ ($consultant->approval == 0)?'Waiting for Approval':'Approved' }}</a>
                                
                                
                                    <div class="row">
                                      
                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-2" >Phone :</label>
                                           
                                            <input type="text" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" readonly  value="{{ $consultant->phone_no }}"/>
                                        </div>

                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-2" >Email :</label>
                                            <input type="text" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" required  value="{{ $consultant->email }}"/>

                                        </div>

                                       
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <label for="" class="required form-label">Gender:</label>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input"  name="gender" type="radio" value="0" id="male" {{ ($consultant->gender ==0)?'checked':''}}/>
                                                <label class="form-check-label" for="male">
                                                    Male
                                                </label>
                                                &nbsp;
                                                <input class="form-check-input"  type="radio" name="gender" value="1" id="female" {{ ($consultant->gender ==1)?'checked':''}}/>
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-2" >Year of Experience :</label>
                                            <input type="text" name="exp_year" id="exp_year" class="form-control form-control-solid mb-2" placeholder="Name" required  value="{{ $consultant->exp_year }}"/>

                                        </div>
                                        
                                    </div>

                                    <div class="row p-5">
                                        @include('components.addressComponent',['country_id'=>$consultant->country_id,'state_id'=>$consultant->state_id,
                                            'city_id'=>$consultant->city_id,'zipcode'=>$consultant->zipcode,'register_address'=>$consultant->register_address,'page'=>'Edit','countrys'=>$countrys,'state'=>$state,'city'=>$city])
                                    </div>

                                    <div class="row">
                                        <label class="required form-label fs-6 mb-2" >Bio :</label>
                                        <textarea name="bio_data" id="bio_data" class="form-control form-control-solid mb-3" placeholder="Name" required>{{ $consultant->bio_data }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary btn-sm float-end" id="personal">Update</button>
                                        </div>
                                    </div>
                                
                                </div>
                                
                            </div>
                        </form>
                        <div><hr></div>

                       <form action="#" method="post" id="consultant_amount">
                        <div class="form-group row">

                        
                            <div class="col-2">
                                <h3 class="fw-bolder text-dark">Consultant Type</h3>
                            </div>
                            <div class='row'>
                                <div class="col-1">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" onchange="enabledisable(document.querySelector('input[name=video_amount]'))" {{($consultant->video == 1)?'checked':''}} type="checkbox" value="1" id="Video" name="video" />
                                        <label class="form-check-label" for="Video" >
                                            Video
                                        </label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-5">
                                        <span class="input-group-text consultantcurrnect" id="inputGroup-sizing-default "></span>
                                        <input type="number" onkeyup="courencyconveter()" value="{{$consultant->video_amount}}" {{($consultant->video != 1)?'disabled':''}} class="form-control" name="video_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                        <span class="input-group-text" id="inputGroup-sizing-default basecurrency">Base Amount {{ round($companySetting_country_price->country->currency->price * $consultant->video_amount,2) }} {{ $companeySetting->country->currency->currencycode }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-1">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" onchange="enabledisable(document.querySelector('input[name=voice_amount]'))" {{($consultant->voice == 1)?'checked':''}} value="1" id="Voice" name="voice" />
                                        <label class="form-check-label" for="Voice" >
                                            Voice
                                        </label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-5">
                                        <span class="input-group-text consultantcurrnect" id="inputGroup-sizing-default "></span>
                                        <input type="number" onkeyup="courencyconveter()" value="{{$consultant->voice_amount}}" {{($consultant->voice != 1)?'disabled':''}} class="form-control" name="voice_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                        <span class="input-group-text" id="inputGroup-sizing-default basecurrency">Base Amount {{ round($companySetting_country_price->country->currency->price * $consultant->voice_amount,2) }} {{ $companeySetting->country->currency->currencycode }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-1">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" onchange="enabledisable(document.querySelector('input[name=text_amount]'))" {{($consultant->text == 1)?'checked':''}} value="1" id="Text" name="text" />
                                        <label class="form-check-label" for="Text" >
                                            Text
                                        </label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-5">
                                        <span class="input-group-text consultantcurrnect" id="inputGroup-sizing-default"></span>
                                        <input type="number" onkeyup="courencyconveter()" value="{{$consultant->text_amount}}" {{($consultant->text != 1)?'disabled':''}} class="form-control" name="text_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                        <span class="input-group-text" id="inputGroup-sizing-default basecurrency">Base Amount {{ round($companySetting_country_price->country->currency->price * $consultant->text_amount,2) }} {{ $companeySetting->country->currency->currencycode }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-1">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" onchange="enabledisable(document.querySelector('input[name=direct_amount]'))" {{($consultant->direct == 1)?'checked':''}} value="1" id="Direct" name="direct" />
                                        <label class="form-check-label" for="Direct" >
                                            Direct
                                        </label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-5">
                                        <span class="input-group-text consultantcurrnect" id="inputGroup-sizing-default "></span>
                                        <input type="number" onkeyup="courencyconveter()" value="{{$consultant->direct_amount}}" {{($consultant->direct != 1)?'disabled':''}} class="form-control" name="direct_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                        <span class="input-group-text" id="inputGroup-sizing-default basecurrency">Base Amount {{ round($companySetting_country_price->country->currency->price * $consultant->direct_amount,2) }} {{ $companeySetting->country->currency->currencycode }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="fw-bolder text-dark">Commission</h2>
                        <div class="form-group row">

                            <div class="col-6">
                                <div class="rounded border p-10">
                                <h4>Commission For Consultant Fee</h4>

                                <label class="required form-label fs-6 mb-2" >Flat or Percentage</label>
                                <div class="form-check form-check-custom form-check-solid mb-5">
                                    <input class="form-check-input me-3" name="com_con_type" onchange="CourencyFlatconveter(document.querySelector('input[name=com_con_type]:checked').value)" type="radio" value="0" {{($consultant->com_con_type ==0)?'checked':''}} id="com_con_flat" />
                                    <label class="form-check-label" for="com_con_flat">
                                        <div class="fw-bolder text-gray-800">Flat</div>
                                    </label>
                                    &nbsp;
                                    <input class="form-check-input me-3" name="com_con_type" onchange="CourencyFlatconveter(document.querySelector('input[name=com_con_type]:checked').value)" type="radio" value="1" {{($consultant->com_con_type ==1)?'checked':''}} id="com_con_per" />
                                    <label class="form-check-label" for="com_con_per">
                                        <div class="fw-bolder text-gray-800">Percentage</div>
                                    </label>
                                </div>
                                <label class="required form-label fs-6 mb-2" >Commission Amount</label>
                                <div class="input-group mb-5">
                                    <span class="input-group-text consultantcurrnect" id="inputGroup-sizing-default "></span>
                                    <input type="number" onkeyup="CourencyFlatconveter(document.querySelector('input[name=com_con_type]:checked').value)" value="{{ $consultant->com_con_amount}}" class="form-control" name="com_con_amount" id="com_con_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                    <span class="input-group-text" id="inputGroup-sizing-default basecurrency">Base Amount {{ round($companySetting_country_price->country->currency->price * $consultant->com_con_amount,2) }} {{ $companeySetting->country->currency->currencycode }}</span>
                                </div>
                                <div class="mb-10 fv-row">
                                    <div class="table-responsive">
                                        <table class="table table-rounded table-striped border gy-7 gs-7">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                                                    <th></th>
                                                    <th>Video</th>
                                                    <th>Voice</th>
                                                    <th>Text</th>
                                                    <th>Direct</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="consultantcurrnect"></td>
                                                <td id="video_current"></td>
                                                <td id="voice_current"></td>
                                                <td id="text_current"></td>
                                                <td id="direact_current"></td>
                                            </tr>
                                            <tr>
                                                <td width="5%">Base currency {{ $companeySetting->country->currency->currencycode }}</td>
                                                <td id="video_base"></td>
                                                <td id="voice_base"></td>
                                                <td id="text_base"></td>
                                                <td id="direact_base"></td>
                                            </tr>
                    
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                                </div>
                            </div>
                               
                            <div class="col-6">
                                <div class="rounded border p-10">
                                    <h4>Commission For Offers</h4>

                                    <label class="required form-label fs-6 mb-2" >Flat or Percentage</label>
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input me-3" name="com_off_type" onchange="CourencyFlatconveter(document.querySelector('input[name=com_off_type]:checked').value)" type="radio" value="0" {{($consultant->com_off_flat ==0)?'checked':''}}  id="com_off_flat" />
                                        <label class="form-check-label" for="com_off_flat">
                                            <div class="fw-bolder text-gray-800">Flat</div>
                                        </label>
                                        &nbsp;
                                        <input class="form-check-input me-3" name="com_off_type" onchange="CourencyFlatconveter(document.querySelector('input[name=com_off_type]:checked').value)" type="radio" value="1" {{($consultant->com_off_flat ==1)?'checked':''}} id="com_off_per" />
                                        <label class="form-check-label" for="com_off_per">
                                            <div class="fw-bolder text-gray-800">Percentage</div>
                                        </label>
                                    </div>
                                    <label class="required form-label fs-6 mb-2" >Commission Amount</label>
                                    <div class="input-group mb-5">
                                        <span class="input-group-text consultantcurrnect" id="inputGroup-sizing-default "></span>
                                        <input type="number" class="form-control" onkeyup="CourencyFlatconveter(document.querySelector('input[name=com_off_type]:checked').value)" value="{{ $consultant->com_off_amount}}" name="com_off_amount" id="com_off_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                        <span class="input-group-text" id="inputGroup-sizing-default basecurrency">Base Amount {{ round($companySetting_country_price->country->currency->price * $consultant->com_off_amount,2) }} {{ $companeySetting->country->currency->currencycode }}</span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="rounded border p-10">
                                    <h4>Payout Settings</h4>
                            
                                    <label class="required form-label fs-6 mb-2" >Flat or Percentage</label>
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input me-3" name="com_pay_type" onchange="CourencyFlatconveter(document.querySelector('input[name=com_pay_type]:checked').value)" type="radio" value="0" {{($consultant->com_pay_flat ==0)?'checked':''}} id="com_pay_flat" />
                                        <label class="form-check-label" for="com_pay_flat">
                                            <div class="fw-bolder text-gray-800">Flat</div>
                                        </label>
                                        &nbsp;
                                        <input class="form-check-input me-3" name="com_pay_type" onchange="CourencyFlatconveter(document.querySelector('input[name=com_pay_type]:checked').value)" type="radio" value="1" {{($consultant->com_pay_flat ==1)?'checked':''}} id="com_pay_per" />
                                        <label class="form-check-label" for="com_pay_per">
                                            <div class="fw-bolder text-gray-800">Percentage</div>
                                        </label>
                                    </div>
                                    <label class="required form-label fs-6 mb-2" >Minimum Payout Amount</label>
                                    <div class="input-group mb-5">
                                        <span class="input-group-text consultantcurrnect" id="inputGroup-sizing-default "></span>
                                        <input type="number" class="form-control"  onkeyup="CourencyFlatconveter(document.querySelector('input[name=com_pay_type]:checked').value)" value="{{ $consultant->com_pay_amount}}" name="com_pay_amount" id="com_pay_amount" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                                        <span class="input-group-text" id="inputGroup-sizing-default basecurrency">Base Amount {{ round($companySetting_country_price->country->currency->price * $consultant->com_pay_amount,2) }} {{ $companeySetting->country->currency->currencycode }}</span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary btn-sm float-end" id="submit_consultant">Update</button>
                            </div>  
                        </div>
                        </form>
                        <div><hr></div>

                        <form action="#" method="post" id="firm_individual">
                            <div class="form-group row">
                                <div class="col-6">
                                    <h3 class="fw-bolder text-dark">Firm / Individual</h3>
                
                                    <div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{($consultant->type==1)?'active':''}}" data-kt-button="true">
                                            <input onchange="firm_type(1)" class="btn-check" type="radio" name="type" {{($consultant->type==1)?'checked':''}} value="1"/>
                                            Firm
                                        </label>
                                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{($consultant->type==2)?'active':''}} " data-kt-button="true">
                                            <input onchange="firm_type(2)" class="btn-check" type="radio" name="type"  {{($consultant->type==2)?'checked':''}} value="2"/>
                                            Individual
                                        </label>
                                    </div>
                                
                                    <div class="row" id="firmselectdiv">
                                        <label class=" form-label fs-6 mb-2" >Choose Firm</label>
                                        <select required class="form-select form-select-solid" data-placeholder="Search option" data-allow-clear="true" name="firm_choose" id="firm_choose">
                                            <option value=""></option>
                                            @foreach ($firm as $key => $fi)
                                                <option data-image="{{ asset("storage/$fi->logo") }}" {{ ($consultant->firm_choose == $fi->id)?'selected':''}} value="{{ $fi->id }}">{{ $fi->comapany_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="row" hidden id="other">
                                        <input type="text" name="other" id="other"  class="form-control mb-2 mb-md-0" placeholder="Enter Firm Name"/>
                                    </div>
                                </div>

                                <div class="col-6" hidden>
                                    
                                    <div class="card bg-secondary ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6 d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                                    <b>Firm: {!! isset($consultant->firm)? $consultant->firm->comapany_name:'' !!}</b><br/> 
                                                    City  :  {!! isset($consultant->firm->city)? $consultant->firm->city->city_name:'' !!}
                                                        State  :  {!! isset($consultant->firm->state)? $consultant->firm->state->state_name:'' !!}
                                                    Country  :  {!! isset($consultant->firm->country)? $consultant->firm->country->country_name:'' !!}
                                                    Zipcode  :  {{ $consultant->firm->zipcode??''}} 
                                                </div>

                                                <div class="col-lg-2">
                                                    <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/conversation.png')}}"  alt="image" />
                                                </div>
                                            </div>                                                                                               
                                        </div>
                                    </div>
                                           
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary btn-sm float-end" id="submit_firm">Update</button>
                                </div>  
                            </div>
                        </form>
                        <div><hr></div>

                        <form action="#" method="post" id="category">
                            <div class="form-group row">
                            
                                <div class="col-lg-6">
                                    <div class="rounded border p-10">
                                        <h3>Category</h3>
                                        <input type="hidden" name="categorie_id" id="categorie_id">
                                        <div id="kt_docs_jstree_basic">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-lg-6">
                                    <div class="rounded border p-10">
                                        <h3>Specialization</h3>
                                        <input type="hidden" name="specialized" id="specialized">
                                        <div id="kt_docs_jstree_basic1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary btn-sm float-end" id="submit_category">Update</button>
                                </div>  
                            </div>

                        </form>
                        <div><hr></div>

                        <form action="#" method="post" id="lang_insurance">
                            <div class="form-group row">
                                <div class="col-lg-5" >
                                    <div class="rounded border p-10">
                                        <h2 class="fw-bolder text-dark">Language</h2>
                                        <select class="form-select form-select-solid form-control mb-2 mb-md-0" data-control="select2" data-placeholder="Search option" data-allow-clear="true" name="language" id="language" multiple="multiple">
                                            @foreach ($language as $data)
                                                <option value="{{ $data->id }}" {{(in_array($data->id,explode(',',$consultant->language)))?'selected':''}}>{{ $data->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="rounded border p-10">
                                        <h3 class="fw-bolder text-dark">Insurance</h2>
                                        <div class="col-12">
                                            <div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{($consultant->insurancecheckbox==1 )? 'active':'' }}" data-kt-button="true">
                                                    <input onchange="Insurance(1)" name="insurancecheckbox" class="btn-check" type="radio" value="1"/>
                                                    Yes
                                                </label>
                                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success  {{($consultant->insurancecheckbox==2 )? 'active':'' }}" data-kt-button="true">
                                                    <input onchange="Insurance(2)" name="insurancecheckbox" class="btn-check" type="radio"  value="2"/>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12" id="Insurancediv">
                                            <label class="form-label fs-6 mb-2" >Select Insurance</label>
                                            <select class="form-select form-select-solid"  data-placeholder="option" data-allow-clear="true" name="insurance_id" id="insurance_id" multiple="multiple">
                                                @foreach ($insurance as $value )
                                                    <option data-image="{{ asset("storage/$value->logo") }}" {{($consultant->insurance_id == $value->id)?'selected':''}} value="{{ $value->id }}">{{ $value->comapany_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-7" >
                                    
                                    <h2 class="fw-bolder text-dark">Bank Details</h2>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-2" >Account Number</label>
                                            <input type="number" name="account_number" class="form-control form-control-solid mb-4" placeholder="Account Number" value="{{$consultant->account_number}}" required />
    
                                        </div>
                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-2" >Account Name</label>
                                            <input type="text" name="account_name" class="form-control form-control-solid mb-4" placeholder="Account Name" value="{{$consultant->account_name}}" required />
    
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-4" >IBAN Code / IFSC Code</label>
                                            <input type="text" name="ifsc_code" class="form-control form-control-solid mb-4" placeholder="IBAN Code / IFSC Code" value="{{$consultant->ifsc_code}}" required />
                                        </div>
                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-4" >Bank Name</label>
                                            <input type="text" name="bank_name" class="form-control form-control-solid mb-4" placeholder="Bank Name" value="{{$consultant->bank_name}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label class="required form-label fs-6 mb-2" >Branch</label>
                                            <input type="text" name="branch" class="form-control form-control-solid mb-4" placeholder="Branch" value="{{$consultant->branch}}" required />
    
                                        </div>
                                        <div class="col-6 mt-12">
                                                <input class="form-check-input me-3 " name="bank_status" type="checkbox" {{($consultant->bank_status==1)?'checked':''}} value="1" id="bank_status"  />
                                                <label class="form-check-label" for="bank_status">
                                                    <div class="fw-bolder text-gray-800">verified</div>
                                                </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary btn-sm float-end" id="submit_other">Update</button>
                                </div>  
                            </div>
                        </form>

                        <div><hr></div>
                    
                        <div class="form-group row" >
                            <div class="col-2">
                                <div class=" card bg-secondary ">
                                    <div class="card-body p-5">
                                        <div class="div row">
                                            <div class="col-2">
                                                <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/wallet.png')}}" alt="image" />
                                            </div>
                                            <div class="col">
                                                <b>{{ $consultant->wallet->balance ??'0'}}</b><br>
                                                Wallet Balence
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="card bg-secondary ">
                                    <div class="card-body p-5">
                                        <div class="div row">
                                            <div class="col-2">
                                                <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/star.png')}}"  alt="image" />

                                            </div>
                                            <div class="col">
                                                <b>{{ $rating ??''}} / 5</b><br>
                                                Rating
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class=" card bg-secondary ">
                                    <div class="card-body p-5">
                                        <div class="div row">
                                            <div class="col-2">
                                                <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/calendar.png')}}"  alt="image" />
                                            </div>
                                            <div class="col">
                                                <b>{{ $app_completed ??''}}</b><br>
                                                
                                                Appointment Completed
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4" >
                                <h3 class="fw-bolder text-dark">Recent Reviews</h2>
                                @foreach ($consultant->reviewForView as $review)
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    {{ date('d-m-Y', strtotime($review->created_at)) ??''}}<br/>
                                                    {{ $review->customer->name ??''}} {{ $review->customer->email}}<br>
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/star.png')}}"  alt="image" />
                                                    {{ $review->rating ??''}}
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                @endforeach
                            </div>

                        </div>                      

                        {{-- card body close --}}
                    </div>
                    {{-- card  close --}}
                </div>
                {{-- tab close  --}}
            </div>

            {{-- Tab 2 calendar--}}
        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
            
            <input type="hidden" name="" id="trigerClick1">
    
            <div class="card">
                <div class="card-body">
                    <label>Consultant Details</label>
                    <h3>{{ $consultant->name }}</h3>
                    {{ $consultant->email }} <br/>
                    {{ $consultant->phone_no }}
                </div>
                
            </div>
            <br/>
            <div class="card">
               
                <!--begin::Card header-->
                <div class="card-header">
                    <h2 class="card-title fw-bolder">Calendar</h2>
                    <div class="card-toolbar">
                        <button class="btn btn-flex btn-primary" data-kt-calendar1="add" hidden>
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Events</button>
    
                        {{-- <div class="fs-6" hidden>
                            <select name="" id="status" class="form-select" onchange="statusChange(this)">
                                <option selected>Action</option>
                                <option value="1">Completed</option>
                                <option value="2">Cancelled By Consultant</option>
                                <option value="3">Cancelled By Customer</option>
                                <option value="4">Cancelled By Admin</option>
                            </select>
                        </div> --}}
    
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Calendar-->
                    <div id="kt_calendar_app1"></div>
                    <!--end::Calendar-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->
            <!--begin::Modal - New Product-->
            <div class="modal fade" id="kt_modal_add_event1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-1000px">
                    <div class="modal-content">
                        <form class="form" action="{{ route('activities.schedules.store') }}" id="kt_modal_add_event1_form">
                            @csrf
                            <div class="modal-header">
                                <h2 class="fw-bolder" data-kt-calendar1="title">Add Event</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_event1_close">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body py-10 px-lg-17">
                                <div class="fv-row mb-5">
                                    <label class="required form-label fs-6 mb-2" >Scheduling Type</label>
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input me-3" name="schedule_type" type="radio" value="0" checked id="standard" />
                                        <label class="form-check-label" for="standard">
                                            <div class="fw-bolder text-gray-800">Standard </div>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input me-3" name="schedule_type" type="radio" value="1" id="Variant" />
                                        <label class="form-check-label" for="Variant">
                                            <div class="fw-bolder text-gray-800">Flexi or Variant</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="fv-row mb-9" hidden>
                                    <label class="fs-6 fw-bold required mb-2">Event Name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_name" />
                                </div>
                                <div class="fv-row mb-9" hidden>
                                    <label class="fs-6 fw-bold mb-2">Event Location</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_location" />
                                </div>
                                <div class="fv-row mb-9" hidden>
                                    <label class="fs-6 fw-bold mb-2">Event Description</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                                </div>
                                <div class="fv-row mb-9 d-none">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="kt_calendar_datepicker_allday" />
                                        <span class="form-check-label fw-bold" for="kt_calendar_datepicker_allday">All Day</span>
                                    </label>
                                </div>
                                <div class="fv-row mb-9" data-standard>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="form-label">From</label>
                                            <div class="input-group mb-3">
                                                <input name="from_date" id="from_date" class="form-control form-control-solid" placeholder="" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">To</label>
                                            <div class="input-group mb-3">
                                                <input name="to_date" id="to_date" class="form-control form-control-solid" placeholder="" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-sm btn-light-primary" id="create_Slot" type="button">
                                                <i class="la la-plus"></i> Create Slot
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-9" data-Variant>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="form-label">Recurring Till</label>
                                            <div class="input-group mb-3">
                                                <input name="recurring" id="recurring" class="form-control form-control-solid" placeholder="" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rounded border p-10">
                                    <div class="mb-10">
                                        <div class="kt_docs_repeater_nested">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5 form-parent">
                                                            <div class="col-lg-2">
                                                                <label data-repeater-title class="form-label">Sunday</label>
                                                                <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                    <input class='form-check-input checkboxOnOff' name="day" type='checkbox' value='' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="inner-repeater">
                                                                    <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">From :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="from" class="form-control" placeholder="Enter contact number" required />
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label class="form-label">To :</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="time" name="to" class="form-control" placeholder="Enter contact number" required />
                                                                                <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                    <i class="la la-trash-o fs-3"></i>
                                                                                </button>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                                            <input class="form-check-input" type="checkbox" value="1" id="Video" name="video" />
                                                                                            <label class="form-check-label" for="Video" >
                                                                                                Video
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                                            <input class="form-check-input" type="checkbox" value="1" id="Voice" name="voice" />
                                                                                            <label class="form-check-label" for="Voice" >
                                                                                                Voice
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                                            <input class="form-check-input" type="checkbox" value="1" id="Text" name="text" />
                                                                                            <label class="form-check-label" for="Text" >
                                                                                                Text
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                                            <input class="form-check-input" type="checkbox" value="1" id="Direct" name="direct" />
                                                                                            <label class="form-check-label" for="Direct" >
                                                                                                Direct
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
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
                                <div class="row row-cols-lg-2 g-10 d-none">
                                    <div class="col">
                                        <div class="fv-row mb-9">
                                            <label class="fs-6 fw-bold mb-2 required">Event Start Date</label>
                                            <input class="form-control form-control-solid" name="calendar_event_start_date" placeholder="Pick a start date" id="kt_calendar_datepicker_start_date" />
                                        </div>
                                    </div>
                                    <div class="col" data-kt-calendar1="datepicker">
                                        <div class="fv-row mb-9">
                                            <label class="fs-6 fw-bold mb-2">Event Start Time</label>
                                            <input class="form-control form-control-solid" name="calendar_event_start_time" placeholder="Pick a start time" id="kt_calendar_datepicker_start_time" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-lg-2 g-10 d-none">
                                    <div class="col">
                                        <div class="fv-row mb-9">
                                            <label class="fs-6 fw-bold mb-2 required">Event End Date</label>
                                            <input class="form-control form-control-solid" name="calendar_event_end_date" placeholder="Pick a end date" id="kt_calendar_datepicker_end_date" />
                                        </div>
                                    </div>
                                    <div class="col" data-kt-calendar1="datepicker">
                                        <div class="fv-row mb-9">
                                            <label class="fs-6 fw-bold mb-2">Event End Time</label>
                                            <input class="form-control form-control-solid" name="calendar_event_end_time" placeholder="Pick a end time" id="kt_calendar_datepicker_end_time" />
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_add_event1_cancel" class="btn btn-light me-3">Cancel</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_modal_add_event1_submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - New Product-->
            <!--begin::Modal - New Product-->
            <div class="modal fade" id="kt_modal_view_event1" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header border-0 justify-content-end">
                            <!--begin::Edit-->
                            <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2" data-bs-toggle="tooltip" hidden data-bs-dismiss="click" title="Edit Event" id="kt_modal_view_event1_edit">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Edit-->
                            <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" hidden data-bs-dismiss="click" title="Delete Event" id="kt_modal_view_event1_delete">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary" data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body pt-0 pb-20 px-lg-17" id="appnotfound" hidden> <!--begin::Row-->
                           No Appointment Found
                        </div>
    
                        <div class="modal-body pt-0 pb-20 px-lg-17" hidden id="appfound">
                            <!--begin::Row-->
                            <span class="fs-3 fw-bolder me-3" id="map_id" data-kt-calendar1="map_id" hidden></span>
                            <div class="d-flex"> 
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <div class="mb-9">
                                    <!--begin::Event name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-3 fw-bolder me-3" data-kt-calendar1="event_name"></span>
                                        <span class="badge badge-light-success" data-kt-calendar1="all_day"></span>
                                    </div>
                                    <!--end::Event name-->
                                    <!--begin::Event description-->
                                    <div class="fs-6" data-kt-calendar1="event_description"></div>
                                    <!--end::Event description-->
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <circle fill="currentColor" cx="12" cy="12" r="8" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event start date/time-->
                                <div class="fs-6">
                                    <span class="fw-bolder">Consultant Name</span>
                                    <span data-kt-calendar1="c_name"></span>
                                    <span class="badge badge-light-primary" data-kt-calendar1= "app_status" ></span>
                                </div>
                                <!--end::Event start date/time-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <circle fill="currentColor" cx="12" cy="12" r="8" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event start date/time-->
                                <div class="fs-6">
                                    <span class="fw-bolder">Type</span>
                                    <span data-kt-calendar1="app_type"></span>
                                </div>
                                <!--end::Event start date/time-->
                            </div>
                            
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <circle fill="currentColor" cx="12" cy="12" r="8" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event start date/time-->
                                <div class="fs-6">
                                    <span class="fw-bolder">Starts</span>
                                    <span data-kt-calendar1="event_start_date"></span>
                                </div>
                                <!--end::Event start date/time-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center mb-9">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-danger me-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <circle fill="currentColor" cx="12" cy="12" r="8" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event end date/time-->
                                <div class="fs-6">
                                    <span class="fw-bolder">Ends</span>
                                    <span data-kt-calendar1="event_end_date"></span>
                                </div>
                                <!--end::Event end date/time-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-muted me-5" hidden>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event location-->
                                <div class="fs-6" data-kt-calendar1="event_location" hidden> </div>
                                <!--end::Event location-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-muted me-5" hidden>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <div class="fs-6">
                                    <select name="" id="status" class="form-select" onchange="statusChange(this)">
                                        <option selected value="">Action</option>
                                        <option value="1">Completed</option>
                                        <option value="2">Cancelled By Consultant</option>
                                        <option value="3">Cancelled By Customer</option>
                                        <option value="4">Cancelled By Admin</option>
                                    </select>
                                </div>
                                 
                               
    
                            </div>
                            <!--end::Row-->
                            <div class="d-flex align-items-center mb-2">
                                <span class="svg-icon svg-icon-1 svg-icon-muted me-5" hidden>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
    
                                <div class="" id="actionReason" hidden>
                                    <textarea name="reason" id="reason" class="form-control" placeholder="Reason"></textarea>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="svg-icon svg-icon-1 svg-icon-muted me-5" hidden>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
    
                                <div class="fs-6">
                                    <button class="btn btn-primary" id="statusSave" onclick="saveStatus()">Save</button>
                                </div>
                            </div>
                        </div>
    
                        <!--end::Modal body-->
                    </div>
                </div>
            </div>
        {{-- tab close --}}
        </div>

            {{-- Tab 3 Scheduling --}}
            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
              
                <input type="hidden" name="" id="trigerClick">
                <div id="kt_content_container" class="container-xxl">
                    <div class="row gy-10 gx-xl-10">
                        <div class="card card-docs flex-row-fluid mb-2">
                            <table id="kt_datatable" class="table table-row-bordered gy-5">
                                <thead>
                                    <tr class="fw-bold fs-6 text-muted">
                                        <th>SNo</th>
                                        <th>Create Date</th>
                                        <th>schedule From - To</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Create Date</th>
                                        <th>schedule From - To</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <h2 class="card-title fw-bolder">Calendar</h2>
                            <div class="card-toolbar">
                                <button class="btn btn-flex btn-primary" data-kt-calendar="add">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Add Event</button>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Calendar-->
                            <div id="kt_calendar_app"></div>
                            <!--end::Calendar-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->
                    <!--begin::Modal - New Product-->
                    <div class="modal fade" id="kt_modal_add_event" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered mw-1000px">
                            <div class="modal-content">
                                <form class="form" action="{{ route('activities.schedules.store') }}" id="kt_modal_add_event_form">
                                    @csrf
                                    <div class="modal-header">
                                        <h2 class="fw-bolder" data-kt-calendar="title">Add Event</h2>
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
                                        <div class="fv-row mb-5">
                                            <label class="required form-label fs-6 mb-2" >Scheduling Type</label>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="schedule_type" type="radio" value="0" checked id="standard" />
                                                <label class="form-check-label" for="standard">
                                                    <div class="fw-bolder text-gray-800">Standard </div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="schedule_type" type="radio" value="1" id="Variant" />
                                                <label class="form-check-label" for="Variant">
                                                    <div class="fw-bolder text-gray-800">Flexi or Variant</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-9" hidden>
                                            <label class="fs-6 fw-bold required mb-2">Event Name</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_name" />
                                        </div>
                                        <div class="fv-row mb-9" hidden>
                                            <label class="fs-6 fw-bold mb-2">Event Location</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_location" />
                                        </div>
                                        <div class="fv-row mb-9" hidden>
                                            <label class="fs-6 fw-bold mb-2">Event Description</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                                        </div>
                                        <div class="fv-row mb-9 d-none">
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="kt_calendar_datepicker_allday" />
                                                <span class="form-check-label fw-bold" for="kt_calendar_datepicker_allday">All Day</span>
                                            </label>
                                        </div>
                                        <div class="fv-row mb-9" data-standard>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label class="form-label">From</label>
                                                    <div class="input-group mb-3">
                                                        <input name="from_date" id="from_date" class="form-control form-control-solid" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">To</label>
                                                    <div class="input-group mb-3">
                                                        <input name="to_date" id="to_date" class="form-control form-control-solid" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-sm btn-light-primary" id="create_Slot" type="button">
                                                        <i class="la la-plus"></i> Create Slot
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-9" data-Variant>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Recurring Till</label>
                                                    <div class="input-group mb-3">
                                                        <input name="recurring" id="recurring" class="form-control form-control-solid" placeholder="" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rounded border p-10">
                                            <div class="mb-10">
                                                <div class="kt_docs_repeater_nested">
                                                    <div class="form-group">
                                                        <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                            <div data-repeater-item>
                                                                <div class="form-group row mb-5 form-parent">
                                                                    <div class="col-lg-2">
                                                                        <label data-repeater-title class="form-label">Sunday</label>
                                                                        <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                            <input class='form-check-input checkboxOnOff' name="day" type='checkbox' value='' />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="inner-repeater">
                                                                            <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                                <div data-repeater-item>
                                                                                    <div class="form-group row">
                                                                                    <div class="col-md-4">
                                                                                    <label class="form-label">From :</label>
                                                                                    <div class="input-group mb-3">
                                                                                        <input type="time" name="from" class="form-control" placeholder="Enter contact number" required />
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                    <label class="form-label">To :</label>
                                                                                    <div class="input-group mb-3">
                                                                                        <input type="time" name="to" class="form-control" placeholder="Enter contact number" required />
                                                                                        <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                            <i class="la la-trash-o fs-3"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-check form-check-custom form-check-solid">
                                                                                                    <input class="form-check-input" type="checkbox" value="1" id="Video" name="video" />
                                                                                                    <label class="form-check-label" for="Video" >
                                                                                                        Video
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-check form-check-custom form-check-solid">
                                                                                                    <input class="form-check-input" type="checkbox" value="1" id="Voice" name="voice" />
                                                                                                    <label class="form-check-label" for="Voice" >
                                                                                                        Voice
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-check form-check-custom form-check-solid">
                                                                                                    <input class="form-check-input" type="checkbox" value="1" id="Text" name="text" />
                                                                                                    <label class="form-check-label" for="Text" >
                                                                                                        Text
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-check form-check-custom form-check-solid">
                                                                                                    <input class="form-check-input" type="checkbox" value="1" id="Direct" name="direct" />
                                                                                                    <label class="form-check-label" for="Direct" >
                                                                                                        Direct
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
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
                                        <div class="row row-cols-lg-2 g-10 d-none">
                                            <div class="col">
                                                <div class="fv-row mb-9">
                                                    <label class="fs-6 fw-bold mb-2 required">Event Start Date</label>
                                                    <input class="form-control form-control-solid" name="calendar_event_start_date" placeholder="Pick a start date" id="kt_calendar_datepicker_start_date" />
                                                </div>
                                            </div>
                                            <div class="col" data-kt-calendar="datepicker">
                                                <div class="fv-row mb-9">
                                                    <label class="fs-6 fw-bold mb-2">Event Start Time</label>
                                                    <input class="form-control form-control-solid" name="calendar_event_start_time" placeholder="Pick a start time" id="kt_calendar_datepicker_start_time" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-lg-2 g-10 d-none">
                                            <div class="col">
                                                <div class="fv-row mb-9">
                                                    <label class="fs-6 fw-bold mb-2 required">Event End Date</label>
                                                    <input class="form-control form-control-solid" name="calendar_event_end_date" placeholder="Pick a end date" id="kt_calendar_datepicker_end_date" />
                                                </div>
                                            </div>
                                            <div class="col" data-kt-calendar="datepicker">
                                                <div class="fv-row mb-9">
                                                    <label class="fs-6 fw-bold mb-2">Event End Time</label>
                                                    <input class="form-control form-control-solid" name="calendar_event_end_time" placeholder="Pick a end time" id="kt_calendar_datepicker_end_time" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Modal body-->
                                    <!--begin::Modal footer-->
                                    <div class="modal-footer flex-center">
                                        <!--begin::Button-->
                                        <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_modal_add_event_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Modal footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                    <!--end::Modal - New Product-->
                    <!--begin::Modal - New Product-->
                    <div class="modal fade" id="kt_modal_view_event" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header border-0 justify-content-end">
                                    <!--begin::Edit-->
                                    <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Edit Event" id="kt_modal_view_event_edit">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Edit-->
                                    <!--begin::Edit-->
                                    <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Delete Event" id="kt_modal_view_event_delete">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Edit-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary" data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body pt-0 pb-20 px-lg-17">
                                    <!--begin::Row-->
                                    <div class="d-flex">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <div class="mb-9">
                                            <!--begin::Event name-->
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-3 fw-bolder me-3" data-kt-calendar="event_name"></span>
                                                <span class="badge badge-light-success" data-kt-calendar="all_day"></span>
                                            </div>
                                            <!--end::Event name-->
                                            <!--begin::Event description-->
                                            <div class="fs-6" data-kt-calendar="event_description"></div>
                                            <!--end::Event description-->
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <circle fill="currentColor" cx="12" cy="12" r="8" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Event start date/time-->
                                        <div class="fs-6">
                                            <span class="fw-bolder">Starts</span>
                                            <span data-kt-calendar="event_start_date"></span>
                                        </div>
                                        <!--end::Event start date/time-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="d-flex align-items-center mb-9">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-danger me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <circle fill="currentColor" cx="12" cy="12" r="8" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Event end date/time-->
                                        <div class="fs-6">
                                            <span class="fw-bolder">Ends</span>
                                            <span data-kt-calendar="event_end_date"></span>
                                        </div>
                                        <!--end::Event end date/time-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Event location-->
                                        <div class="fs-6" data-kt-calendar="event_location"></div>
                                        <!--end::Event location-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                        </div>
                    </div>
                    <!--end::Modal - New Product-->
                    <!--end::Modals-->
                </div>

            </div>
            {{-- Tab 4  Appointment History --}}


            <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                <div>Past/Current/Upcoming History</div>
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable4" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            
                                            <th>Date and Time</th>
                                            <th>Booking ID</th>
                                            <th>Appointment Type</th>
                                            <th>Purchased By</th>
                                            <th>Purchased with</th>
                                            <th>XX USD</th>
                                            <th>Discount Amount</th>
                                            <th width="10%">Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consultant->appointment as $item)
                                        <tr>
                                         
                                           <td>{{ date('d-m-Y', strtotime($item->appointment_date))}}</td>
                                           <td>{{ $item->booking ??''}}</td>
                                           <td>{{ $item->appointment_type ??''}}</td>
                                           <td>{{ $item->customer->name ??''}} <br/> {{ $item->customer->email ??''}}</td>
                                           <td>{{ $consultant->name ??''}} <br/> {{ $consultant->email ??''}}</td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td>{{ $item->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab 5  Offer History --}}
            <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable5" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>Date and Time</th>
                                            <th>Transaction ID</th>
                                            <th>Purchased By</th>
                                            <th>Purchased with</th>
                                            <th>Offer Title</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consultant->offer_historys as $offers)
                                        <tr>
                                           <td>{{ date('d-m-Y', strtotime($offers->purchase_date))}}</td>
                                           <td></td>
                                           <td>{{ $offers->customer->name ??''}} <br/> {{ $offers->customer->email ??''}}</td>
                                           <td>{{ $consultant->name ??''}} <br/> {{ $consultant->email ??''}}</td>
                                           <td>{{ $offers->offer->offer_title ??''}}</td>
                                           <td>{{ $offers->offer->amount ??''}}</td>
                                           <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
          

              {{-- Tab 7 Wallet --}}
             
            <div class="tab-pane fade" id="kt_tab_pane_7" role="tabpanel">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable7" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>Date & Time</th>
                                            <th>Type</th>
                                            <th>Transaction ID</th>
                                            <th>Statement</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($consultant->wallet_trans as $trans)
                                        <tr>
                                           <td>{{ date('d-m-Y', strtotime($trans->created_at)) ??''}}</td>
                                           <td></td>
                                           <td></td>
                                           <td>{{ $trans->action ??''}}</td>
                                           <td>{{ $trans->amount ??''}}</td>
                                           <td>{{ ($trans->type == 'add') ?'Payment In':'Payment Out'}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            {{-- Tab 8 Review &Rating--}}
            <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable8" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                           
                                            <th>Date and Time</th>
                                            <th>Booking ID</th>
                                            <th>Appointment Booked By</th>
                                            <th>Appointment Booked with</th>
                                            <th>Amount</th>
                                            <th>Rating</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consultant->reviewForView as $review)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($review->created_at)) ??''}}</td>
                                            <td></td>
                                            <td>{{ $review->customer->name ??''}} <br> {{ $review->customer->email}}</td>
                                            <td>{{ $consultant->name ??''}} <br> {{ $consultant->email}}</td>
                                            <td>{{ $review->amount ??''}}</td>
                                            <td>{{ $review->rating ??''}}</td>
                                            <td>{{ $review->comments ??''}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
           
    </div>
    </div>


    @section('scripts')
<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}'></script>
<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/datatables/datatables.bundle.js')}}'></script>
<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/formrepeater/formrepeater.bundle.js')}}'></script>
<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/flatpickr/flatpickr.bundle.js')}}'></script>
<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/tinymce/tinymce.bundle.js')}}'></script>
<script src="{{ URL::asset(theme()->getDemo().'/js/calendarForConsultant.js') }}"></script>
<script src="{{ URL::asset(theme()->getDemo().'/js/calendar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script>
    const sub_category_id = $('#sub_category_id');
    const specialization_id = $('#specialization_id');
    var table1,table2,table3,table4 = null
    const admin_country = {!! json_encode($companySetting_country_price->country) !!}
    const consultant_country = {!! json_encode($consultant_country) !!}
    const consultantcurrnect = document.querySelectorAll('.consultantcurrnect')
    consultantcurrnect.forEach(e => {
                                    e.innerText = consultant_country.currency.currencycode
                                })
    const com_con_amount = document.getElementById('com_con_amount')
    const com_off_amount = document.getElementById('com_off_amount')
    const com_pay_amount = document.getElementById('com_pay_amount')
          
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        window.dispatchEvent(new Event('resize'))
    });

    $(document).ready(function () {

        // Scheduling

        table1 = $("#kt_datatable3").DataTable({
            responsive: true,
            buttons: [
                    'print',
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
            // Pagination settings
            dom: `<'row'<'col-sm-12'tr>>
            <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 100],

            pageLength: 10,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url : "{{route('activities.schedules.getscheduleDatatable')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id' : `{{ $consultant->id }}`,
                    columnsDef : ['id','created_at','fromto','scheduleType']
                }

            },
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'created_at' },
                { data: 'fromto' },
                { data: 'scheduleType' },
                { data: 'action'}
            ],
            columnDefs : [
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        return `
                            <a href="${data.Delete}" delete_calender class="btn btn-icon btn-danger"><i href="${data.Delete}" delete class="las la-trash fs-2 me-2"></i></a>
                        `;
                    },
                },
            ],
            drawCallback : function( settings ) { }
        });

       
        
        $("#kt_datatable4").DataTable();
        $("#kt_datatable5").DataTable();
        $("#kt_datatable7").DataTable();
        $("#kt_datatable8").DataTable();

        

        table4 = $("#kt_datatable6").DataTable({
            responsive: true,
            buttons: [
                    'print',
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
            // Pagination settings
            dom: `<'row'<'col-sm-12'tr>>
            <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 100],

            pageLength: 10,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url : "{{route('history.purchase.datatable')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    columnsDef : ['id','title','updated_at','status']
                }

            },
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'created_at'},
                { data: 'booking_id'},
                { data: 'app_booked_by'},
                { data: 'app_booked_with'},
                { data: 'xx_usd'},
                { data: 'discount_amount'},
                { data: 'amount'},
                { data: 'status'}
            ],
           
            drawCallback : function( settings ) { }
        });
    });
    var KTJSTreeCheckable = {
        init: function () {
            $("#kt_docs_jstree_basic")
          // listen for event
                .on('changed.jstree', function (e, data) {
                    var i, j, r = [];
                    for(i = 0, j = data.selected.length; i < j; i++) {
                        r.push(data.instance.get_node(data.selected[i]).id);
                    }
                    // categorie_id.value = r.join(',');
                    // console.log(r);     
                    
                    let temparray = $("#kt_docs_jstree_basic").jstree("get_selected")
                    categorie_id.value = temparray.join(',');
                    $.ajax({
                        url: "{{route('consultant.consultant.getSubCategory')}}",
                        method: "POST",
                        data: {
                            "_token": csrf,
                            categorie_id: categorie_id.value
                        },
                        success: function (data) {
                            $('#kt_docs_jstree_basic1').jstree(true).settings.core.data = data.tree;
                            $('#kt_docs_jstree_basic1').jstree(true).refresh();
                           
                        }
                    })

                })
                .jstree({
                'plugins': ["wholerow", "checkbox", "types"],
                core: {
                    themes: {
                        responsive: !1
                    },
                    data: {!! json_encode($tree) !!}
                },
                "types" : {
                    "default" : {
                        "icon" : "fa fa-folder text-warning"
                    },
                    "file" : {
                        "icon" : "fa fa-file  text-warning"
                    }
                },
            })
            $("#kt_docs_jstree_basic1")
          // listen for event
                .on('changed.jstree', function (e, data) {
                    // var i, j, r = [];
                    // for(i = 0, j = data.selected.length; i < j; i++) {
                    //     r.push(data.instance.get_node(data.selected[i]).id);
                    // }
                    // specialized.value = r.join(',');
                    // console.log(r);   
                    let temparray = $("#kt_docs_jstree_basic1").jstree("get_selected")
                    specialized.value = temparray.join(',');        
                })
                .jstree({
                'plugins': ["wholerow", "checkbox", "types"],
                core: {
                    themes: {
                        responsive: !1
                    },
                    data: {!! json_encode($tree1) !!}
                },
                "types" : {
                    "default" : {
                        "icon" : "fa fa-folder text-warning"
                    },
                    "file" : {
                        "icon" : "fa fa-file  text-warning"
                    }
                },
            })
        }
    }

    KTUtil.onDOMContentLoaded((function () {
        
        KTJSTreeCheckable.init()
    }));
</script>
{{-- schedule --}}
<script>
   
        const refresh = `{{ route('activities.schedules.getAllschedule',$consultant->id) }}?_token={{ csrf_token() }}`
        const Consultamt_id = `{{ $consultant->id }}`
        const create_Slot = document.getElementById('create_Slot');
        create_Slot.addEventListener('click',function(){ variant($('#from_date').val(),$('#to_date').val()) })
        var _token = `{{ csrf_token() }}`
        
        const formrepeat = $('.kt_docs_repeater_nested');
        $("#from_date").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),
                
            }, function(start, end, label) {
                let toDay = new Date($("#from_date").val());
                $("#to_date").val($("#from_date").val());
                let PlusThirtyDays = new Date();
                PlusThirtyDays.setDate(toDay.getDate() + 30)
                $("#to_date").daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        minYear: 1901,
                        maxYear: parseInt(moment().format("YYYY"),10),
                        maxDate : formatDate(PlusThirtyDays),
                        minDate : formatDate(toDay),
                        
                    }, function(start, end, label) {

                    }
                );
            }
        );

        $("#recurring").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),
                locale: {
                        format: '{{ strtoupper($companeySetting->date_format) }}'
                    }
            }, function(start, end, label) {

            }
        );
        const date =  new Date();
        formrepeat.repeater({
            repeaters: [{
                selector: '.inner-repeater',
                isFirstItemUndeletable: true,
                defaultValues : {'sunday_from':`${date.getHours()}:${date.getMinutes()}`,'sunday_to':`${date.getHours()}:${date.getMinutes()}`},
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
        const Standard = function(){
            formrepeat.setList([
                {title:'Sunday','day':'sunday'},
                {title:'Monday','day':'monday'},
                {title:'Tuesday','day':'tuesday'},
                {title:'Wednesday','day':'wednesday'},
                {title:'Thursday','day':'thursday'},
                {title:'Friday','day':'friday'},
                {title:'Saturday','day':'saturday'},
            ])
        }

        const variant = function(start,end){
            let data = []
            var start = new Date(start);
            var end = new Date(end);

            var loop = new Date(start);
            while(loop <= end){
                data.push({title:`${formatDate(loop)}`,day:`${formatDate(loop)}`})
                var newDate = loop.setDate(loop.getDate() + 1);
                loop = new Date(newDate);
            }
            formrepeat.setList(data)
        }
        var table = null;
        $(document).ready(function () {
            table = $("#kt_datatable").DataTable({
                responsive: true,
                buttons: [
                        'print',
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                    ],
                // Pagination settings
                dom: `<'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                // read more: https://datatables.net/examples/basic_init/dom.html

                lengthMenu: [5, 10, 25, 100],

                pageLength: 10,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{route('activities.schedules.getscheduleDatatable')}}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id' : `{{ $consultant->id }}`,
                        columnsDef : ['id','created_at','fromto','scheduleType']
                    }

                },
                columns: [
                    { data: 'DT_RowIndex'},
                    { data: 'created_at' },
                    { data: 'fromto' },
                    { data: 'scheduleType' },
                    { data: 'action'}
                ],
                columnDefs : [
                    {
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-end',
                        render: function (data, type, row) {
                            return `
                                <a href="${data.Delete}" delete_calender class="btn btn-icon btn-danger"><i href="${data.Delete}" delete class="las la-trash fs-2 me-2"></i></a>
                            `;
                        },
                    },
                ],
                drawCallback : function( settings ) { }
            });
        });
        document.body.addEventListener('click', function(event){
                const e = event

                if(e.srcElement.hasAttribute('delete_calender')){
                    e.preventDefault()
                    var text = e.srcElement.hasAttribute('text')? e.srcElement.getAttribute('text'): 'Are you sure you want to delete ?'
                    Swal.fire({
                        text: text,
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then((function (t) {
                        if(t.value){
                            let route = e.srcElement.getAttribute('href')
                            let data = { _token: _token }
                            fetch(route,{
                                method: 'DELETE',
                                headers: { 'Content-Type': 'application/json', },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json())
                            .then(data => {
                                $('#trigerClick').click();
                                table.ajax.reload(null, false);
                                Switealert((data.status)?data.msg:'error',(data.status)?'success':'error')
                            });
                        }
                    }))
                }
        }, true);
</script>
{{-- calendar --}}
<script>
        function load_calendar(){
            // var calendarEl = document.getElementById('kt_calendar_app1')
            // calendar = new FullCalendar.Calendar(calendarEl)
            // calendar.render();
        }

        const appdetails = `{{ route('activities.schedules.getappdetails') }}`
        const refresh1 = `{{ route('activities.schedules.getAllschedule',$consultant->id) }}?_token={{ csrf_token() }}`
       
        const appfound = document.getElementById('appfound');
        const appnotfound = document.getElementById('appnotfound');
        const popup_edit = document.getElementById('kt_modal_view_event1_edit');
        const popup_delete = document.getElementById('kt_modal_view_event1_delete');
        const status = document.getElementById('status');
        var _token = `{{ csrf_token() }}`
    
        statusValue = document.getElementById("status").value;
        map_id = document.getElementById("map_id").innerText;
        reason = '';

        function statusChange(e){
            statusValue = e.value;
            
            map_id = document.getElementById("map_id").innerText;
            reason = document.getElementById("reason");
           
            if(e.value >0){

                actionReason.removeAttribute('hidden');
            }
            else{
                actionReason.setAttribute('hidden',true);
                reason.value = '';
            }
        }
        
        function saveStatus(){
           
            Reason = reason.value;
            Swal.fire({
                html: "Are you Sure?",
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Save",
                cancelButtonText: 'Discard',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                },
            }).then((function (e){
                if(e.value){
                    $.ajax({
                        url: "{{ route('activities.schedules.appStatus') }}",
                        method:"post",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            status:statusValue,
                            map:map_id,
                            reason:Reason,
                        },
                        success:function(data){
                        if(data.msg){
                            Switealert(data.msg,'success')
                        }else{
                            var Ptag = "";
                            for(var error in data.errors) { Ptag += data.errors[error]+', '; };
                        }

                    },
                    error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
                            
                    })
                }
            }))
        }
        function Switealert(Msg,status){
            Swal.fire({
                text: Msg,
                icon: status,
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }

        function enabledisable(input){
            if(event.target.checked){
                input.disabled = false
            }else{
                input.disabled = true
                input.value = 0
            }
        }
        var BasicDetails = null
        var country_id = $("#country_id");
        $("#country_code").select2({
            templateResult: formatState,
            width: 'resolve'
        });

        $("#country_code").change(function (e) {
            $('#phone_no').val('');

            var id = e.currentTarget.options[e.currentTarget.options.selectedIndex].value;
            let has_state = e.currentTarget.options[e.currentTarget.options.selectedIndex].dataset.has_state;
            if (has_state != "0") {
                stateDiv.show(500)
                state.attr('required');
            } else {
                stateDiv.hide(500)
                state.removeAttr('required');
            }
            country_id.val(id).trigger("change");
            $.ajax({
                url: "{{ route('master.country.getState')}}",
                method: "POST",
                data: {
                    id: id,
                    "_token": csrf,
                },
                success: function (data) {
                    var option = `<option value=''>Select State</option>`
                    var option1 = `<option selected>Select City</option>`

                    if (data.states.length != null) {
                        data.states.forEach((e) => {
                            option += '<option value=' + e.id + '>' + e.state_name + '</option>';
                        })
                    }
                    if(data.city.length != null){
                        data.city.forEach((e)=>{
                            option1 += '<option value='+e.id+'>'+e.city_name+'</option>';
                        })
                    }
                    state.html(option).trigger("change");
                    city.html(option1).trigger("change");
                    BasicDetails = data
                    $("#dial_code").val(data.Country.dialing)
                    // phone_no.val(data.Country.dialing)
                    // countrycode.innerText = data.Country.dialing
                    // landline.val(data.Country.dialing)
                }
            })
        });

        function formatState(state) {
            if (!state.id) return state.text;

            var baseUrl = `${ baseURl }/demo1/flags/1x1/`;
            var $state = $(
                `<span><img onerror="this.onerror=null;this.remove()" src="${baseUrl}/${state.text.toLowerCase()}.svg" class="img-flag" />${state.text}</span>`
            );
            return $state;
        };

        $("#country_code").on('select2:select', function (e) {
            var data = e.params.data;
            $.ajax({
                url:"{{route('master.country.getState')}}",
                method:"POST",
                data:{id:data.id,"_token": "{{ csrf_token() }}",},
                success:function(data){
                    console.log(data);
                    if(data.Country){
                       
                    }
                }
            })
        });

        $( window ).on( "load", function() {
         
            
            let com_con_type = document.querySelector('input[name="com_con_type"]:checked').value
            var amount = $('#com_con_amount').val();
            let AmountFlat = parseFloat(amount)
            let AmountFlatcurrency = admin_country.currency.price * consultant_country.currency.price *AmountFlat
            updateAmount(event.target, com_con_type)
            let voice = document.querySelector('input[name=voice]')
            let direct = document.querySelector('input[name=direct]')
            let text = document.querySelector('input[name=text]')
            let video = document.querySelector('input[name=video]')

            let video_current = document.getElementById("video_current")
            let voice_current = document.getElementById("voice_current")
            let text_current = document.getElementById("text_current")
            let direact_current = document.getElementById("direact_current")

            let video_base = document.getElementById("video_base")
            let voice_base = document.getElementById("voice_base")
            let text_base = document.getElementById("text_base")
            let direact_base = document.getElementById("direact_base")

            if(video.checked) {
                let value = parseFloat(document.querySelector('input[name=video_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                video_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value : value+AmountFlat} )`
                video_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }
            if(voice.checked) {
                let value = parseFloat(document.querySelector('input[name=voice_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                voice_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
                voice_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }
            if(text.checked) {
                let value = parseFloat(document.querySelector('input[name=text_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                text_current.innerText =`${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
                text_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }
            if(direct.checked) {
                let value = parseFloat(document.querySelector('input[name=direct_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                direact_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
                direact_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }
            $type = @json($consultant->type);
            $type1 = @json($consultant->insurancecheckbox);
            
            firm_type($type);
            Insurance($type1);
        });

        function courencyconveter() {
            event.target.parentElement.lastElementChild.innerText = `Base Amount ${(admin_country.currency.price * consultant_country.currency.price * Number(event.target.value)).toFixed(2)}  ${admin_country.currency.currencycode}`
        }

        function CourencyFlatconveter(type) {
            const parentNode = event.target.parentNode.parentNode
            const inputvalue = parentNode.children[4].children[1]
            if (type == 0) {
                parentNode.children[4].children[2].innerText = `Base Amount ${(admin_country.currency.price * consultant_country.currency.price * Number(inputvalue.value)).toFixed(2)}  ${admin_country.currency.currencycode}`
            } else {
                parentNode.children[4].children[2].innerText = `%`
            }
        }

        function updateAmount(event, type) {
            if (type == 1) {
                event.value > 100 ? (event.value = 100) : event.value = event.value
            }
        }

        var firmType = 1;
        function firm_type(type) {
            firmType = type
            if (type == 2) {
                $("#firmselectdiv").hide(500)
                $('#firm_choose').removeAttr('required');
                $('#firm_choose').val('');
            } else {
                $("#firmselectdiv").show(500)
                $('#firm_choose').attr('required');
            }

        }
        function Insurance(type){
            
            if (type == 2) {
                $("#Insurancediv").hide(500)
                $('#insurance_id').val('');
                $('#Insurancediv').removeAttr('required');
            } else {
                $("#Insurancediv").show(500)
                $('#Insurancediv').attr('required');
            }
        }

        $("#firm_choose").select2({
            templateResult: insuransetemplate,
            templateSelection: insuransetemplate
        });

        $("#insurance_id").select2({
            templateResult: insuransetemplate,
            templateSelection: insuransetemplate
        });

        function insuransetemplate(state){
            if (!state.id) return state.text;
            
            var imag = $(state.element).data('image');
                var $state = $(
                    `<span><img style="width:25px;" onerror="this.onerror=null;this.remove()" src="${imag}" class="img-flag" />${state.text}</span>`
                );
            return $state;
        }


        com_con_amount.addEventListener('keyup', function (event) {
            let com_con_type = document.querySelector('input[name="com_con_type"]:checked').value
            let AmountFlat = parseFloat(event.target.value)
            let AmountFlatcurrency = admin_country.currency.price * consultant_country.currency.price *AmountFlat
            updateAmount(event.target, com_con_type)
            let voice = document.querySelector('input[name=voice]')
            let direct = document.querySelector('input[name=direct]')
            let text = document.querySelector('input[name=text]')
            let video = document.querySelector('input[name=video]')

            let video_current = document.getElementById("video_current")
            let voice_current = document.getElementById("voice_current")
            let text_current = document.getElementById("text_current")
            let direact_current = document.getElementById("direact_current")

            let video_base = document.getElementById("video_base")
            let voice_base = document.getElementById("voice_base")
            let text_base = document.getElementById("text_base")
            let direact_base = document.getElementById("direact_base")

            if(video.checked) {
                let value = parseFloat(document.querySelector('input[name=video_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                video_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value : value+AmountFlat} )`
                video_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }
            if(voice.checked) {
                let value = parseFloat(document.querySelector('input[name=voice_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                voice_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
                voice_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }
            if(text.checked) {
                let value = parseFloat(document.querySelector('input[name=text_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                text_current.innerText =`${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
                text_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }
            if(direct.checked) {
                let value = parseFloat(document.querySelector('input[name=direct_amount]').value)
                let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

                direact_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
                direact_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
            }

        });
        com_off_amount.addEventListener('keyup', function (event) {
            updateAmount(event.target, document.querySelector('input[name="com_off_type"]:checked').value)
        });
        com_pay_amount.addEventListener('keyup', function (event) {
            updateAmount(event.target, document.querySelector('input[name="com_pay_type"]:checked').value)
        });
        document.querySelectorAll('input[name="com_con_type"]').forEach(e => e.addEventListener('change', function (event) {
            updateAmount(com_con_amount, event.target.value)
        }))
        document.querySelectorAll('input[name="com_off_type"]').forEach(e => e.addEventListener('change', function (event) {
            updateAmount(com_off_amount, event.target.value)
        }))
        document.querySelectorAll('input[name="com_pay_type"]').forEach(e => e.addEventListener('change', function (event) {
            updateAmount(com_pay_amount, event.target.value)
        }))



        // Update Consultant
        var consultant_id = @json($consultant->id);
        $("#personal").on("click",function(e){
            e.preventDefault();
            
            var data = ( $('#personal_details').serializeArray().reduce(function (json, { name, value }) {
            json[name] = value;
            return json;
            }, {}));
           
            $.ajax(
            {
                type:'post',
                dataType: 'json',
                url: "{{ route('consultant.update') }}",
                data:{data,"_token": "{{ csrf_token() }}",form:'personal',id:consultant_id},
               
                success:function(result)
                {
                    if(result.msg){
                            Switealert(result.msg,'success')
                        }else{
                            var Ptag = "";
                            for(var error in result.errors) { Ptag += result.errors[error]+', '; };
                        }
                },
                error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
            });
        })

        $("#submit_consultant").on("click",function(e){
            e.preventDefault();
            
            var data = ( $('#consultant_amount').serializeArray().reduce(function (json, { name, value }) {
            json[name] = value;
            return json;
            }, {}));
           
            $.ajax(
            {
                type:'post',
                dataType: 'json',
                url: "{{ route('consultant.update') }}",
                data:{data,"_token": "{{ csrf_token() }}",form:'consultant_amount',id:consultant_id},
               
                success:function(result)
                {
                    if(result.msg){
                            Switealert(result.msg,'success')
                        }else{
                            var Ptag = "";
                            for(var error in result.errors) { Ptag += result.errors[error]+', '; };
                        }
                },
                error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
            });
        })
        $("#submit_firm").on("click",function(e){
            e.preventDefault();
            
            var data = ( $('#firm_individual').serializeArray().reduce(function (json, { name, value }) {
            json[name] = value;
            return json;
            }, {}));
           
            $.ajax(
            {
                type:'post',
                dataType: 'json',
                url: "{{ route('consultant.update') }}",
                data:{data,"_token": "{{ csrf_token() }}",form:'firm_individual',id:consultant_id},
               
                success:function(result)
                {
                    if(result.msg){
                            Switealert(result.msg,'success')
                        }else{
                            var Ptag = "";
                            for(var error in result.errors) { Ptag += result.errors[error]+', '; };
                        }
                },
                error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
            });
        })
        $("#submit_category").on("click",function(e){
            e.preventDefault();
            
            var data = ( $('#category').serializeArray().reduce(function (json, { name, value }) {
            json[name] = value;
            return json;
            }, {}));
           
            $.ajax(
            {
                type:'post',
                dataType: 'json',
                url: "{{ route('consultant.update') }}",
                data:{data,"_token": "{{ csrf_token() }}",form:'category',id:consultant_id},
               
                success:function(result)
                {
                    if(result.msg){
                            Switealert(result.msg,'success')
                        }else{
                            var Ptag = "";
                            for(var error in result.errors) { Ptag += result.errors[error]+', '; };
                        }
                },
                error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
            });
        })
        $("#submit_other").on("click",function(e){
            e.preventDefault();
            
            var data = ( $('#lang_insurance').serializeArray().reduce(function (json, { name, value }) {
            json[name] = value;
            return json;
            }, {}));
           
            $.ajax(
            {
                type:'post',
                dataType: 'json',
                url: "{{ route('consultant.update') }}",
                data:{data,"_token": "{{ csrf_token() }}",form:'others',id:consultant_id},
               
                success:function(result)
                {
                    if(result.msg){
                            Switealert(result.msg,'success')
                        }else{
                            var Ptag = "";
                            for(var error in result.errors) { Ptag += result.errors[error]+', '; };
                        }
                },
                error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
            });
        })

        
        

</script>

@endsection
</x-base-layout>
