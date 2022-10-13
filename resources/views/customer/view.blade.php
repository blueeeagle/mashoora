<x-base-layout>
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">customer</h1>
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">customer</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"><a href="{{ route('user.customer.index') }}" class="text-muted text-hover-primary">customer</a></li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-dark">View customer</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_tab_pane_1" >DashBoad</a> {{--   href="{{ route('consultant.consultant.edit',$consultant->id) }} --}}
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_2">Calender</a>
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
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_6">Promo Purchase History</a>
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
            {{-- Tab 1 --}}
            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/300-1.jpg')}}" alt="image" />
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                </div>
                
                               
                            </div>
                            <div class="col-lg-8">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{!! $customer->name !!}</a>
                                {{-- gender --}}
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">Gender :{!!$customer->gender!!}</span>
                                </div>
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">Address :  {!! nl2br($customer->register_address) !!}</span>  
                                </div>
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">Country :  {!! $customer->country->country_name !!}</span>  
                                </div>
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">State :  {!! $customer->state->state_name !!}</span>  
                                </div>
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">City :  {!! $customer->city->city_name !!}</span>  
                                </div>
                                <div><hr></div>
                                <div class="form-group row">
                                    <div class="col-lg-6 d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                        <span class="fw-bolder">Email :  {!! $customer->email !!}</span> 
                                    </div>
                                    <div class="col-lg-6 d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                        <span class="fw-bolder fs-6">Phone :  {!! $customer->phone_no !!}</span>  
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div><hr></div>

                        <div class="form-group row">
                            <div class="col-sm-12"> 
                                <div class="container">
                                    <div class="form-group row">
                                        <div class="col-sm-3" style="border-right-style: solid; border-width: 1px;">
                                            <div class=" card text-black bg-secondary " style="width: 15rem;">
                                                <div class="card-body">
                                                    <div class="div">
                                                        <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/wallet.png')}}" alt="image" />
                                                        Wallet Balence in  {{ $companeySetting->country->currency->currencycode }}
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>

                                            <div class="card text-black bg-secondary " style="width: 15rem;">
                                                <div class="card-body">
                                                    <div class="div">
                                                        <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/calendar.png')}}"  alt="image" />
                                                    Appointment Completed
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3" style="border-right-style: solid; border-width: 1px;">
                                            <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                                <span class="fw-bolder fs-6"> Recent Booking</span>

                                                <p class=" fs-6">Booking ID</p>
                                                <p class=" fs-6"> {!! $consultant->name!!}</p>
                                                <p class=" fs-6"> {!! $consultant->email!!}</p>
                                                <p class=" fs-6"> {!! $consultant->phone_no!!}</p> 
                                            </div>
                                            <div><hr></div>
                                        </div>

                                        <div class="col-sm-3" >
                                            <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                                <span class="fw-bolder fs-6"> Recent Reviews</span>
                                            </div>
                                            <div class="card text-black bg-secondary " style="width: 10rem;">
                                                <div class="card-body">
                                                    <div class="div">
                                                        <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/star.png')}}"  alt="image" />
                                                    Rating
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                       
                                </div>
                                <div><hr></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                <span class="fw-bolder fs-6"> Recent Visited Consultants</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="card">
                                <div class="card-body text-black bg-secondary">
                                    <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                        <span class="fw-bolder fs-6">{!! $consultant->name!!}</span>
                                        <p class="fs-6">{!! $consultant->phone_no!!}</p>
                                        <p class="fs-6">{!! $consultant->email!!}</p>
                                    </div>
                                </div>
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
                {{-- @include('schedule.appointment',['consultant'=>$consultant]) --}}
            </div>

            {{-- Tab 3 Scheduling --}}
            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                <div id="kt_content_container" class="container-xxl">
                    <div class="row gy-10 gx-xl-10">
                        <div class="card card-docs flex-row-fluid mb-2">
                            <table id="kt_datatable3" class="table table-row-bordered gy-5">
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
                </div>
            </div>
            {{-- Tab 4  Appointment History --}}


            <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                    <span class="fw-bolder fs-6"> Past/Current/Upcoming History</span>
                </div>
           
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable4" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Transaction ID</th>
                                            <th>Purchased By</th>
                                            <th>Purchased with</th>
                                            <th>XX USD</th>
                                            <th>Discount Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Transaction ID</th>
                                            <th>Purchased By</th>
                                            <th>Purchased with</th>
                                            <th>XX USD</th>
                                            <th>Discount Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
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
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Transaction ID</th>
                                            <th>Purchased By</th>
                                            <th>Purchased with</th>
                                            <th>Offer Title</th>
                                            <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Transaction ID</th>
                                            <th>Purchased By</th>
                                            <th>Purchased with</th>
                                            <th>Offer Title</th>
                                            <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab 6 Promo Purchase History --}}
            <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable6" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Booking ID</th>
                                            <th>Appointment Booked By</th>
                                            <th>Appointment Booked with</th>
                                            <th>XX USD ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>XX USD Discount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Booking ID</th>
                                            <th>Appointment Booked By</th>
                                            <th>Appointment Booked with</th>
                                            <th>XX USD ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>XX USD Discount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
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
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                         
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tfoot>
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
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Booking ID</th>
                                            <th>Appointment Booked By</th>
                                            <th>Appointment Booked with</th>
                                            <th>XX USD</th>
                                            <th>XX USD Discount</th>
                                            <th>Amount {{ $companeySetting->country->currency->currencycode }}</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Date and Time</th>
                                            <th>Booking ID</th>
                                            <th>Appointment Booked By</th>
                                            <th>Appointment Booked with</th>
                                            <th>XX USD</th>
                                            <th>XX USD Discount</th>
                                            <th>Amount {{ $companeySetting->country->currency->currencycode }}</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    @section('scripts')
<script>

    var table1,table2,table3,table4 = null

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

        // Appointment
        table2 = $("#kt_datatable4").DataTable({
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
                url : "{{route('history.appointment.datatable')}}",
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

        // Offer History
        table3 = $("#kt_datatable5").DataTable({
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
                url : "{{route('history.offer.datatable')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    columnsDef : ['id','title','updated_at','status']
                }

            },
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'created_at'},
                { data: 'trans_id'},
                { data: 'purchased_by'},
                { data: 'purchased_with'},
                { data: 'offer_title'},
                { data: 'amount'},
                { data: 'status'}
            ],
           
            drawCallback : function( settings ) { }
        });

        // Promo History

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

        // Wallet
        table5 = $("#kt_datatable7").DataTable({
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
                url : "{{route('consultant.consultant.wallet.index')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    columnsDef : ['id','title','updated_at','status']
                }

            },
            columns: [
                { data: 'date_time'},
                { data: 'type'},
                { data: 'account_name'},
                { data: 'consultant_id'},
                { data: 'done_by'},
                { data: 'amount'},
                { data: 'balance'},
                { data: 'status'},
               
            ],
           
            drawCallback : function( settings ) { }
        });

        // Review & Rating
        table5 = $("#kt_datatable8").DataTable({
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
                url : "{{route('review.datatable')}}",
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
                { data: 'rating'},
                { data: 'action'}
            ],
           
            drawCallback : function( settings ) { }
        });

    });
</script>

@endsection
</x-base-layout>
