<x-base-layout>
    <div id="kt_engage_demos" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_engage_demos_toggle" data-kt-drawer-close="#kt_engage_demos_close">
        <!--begin::Card-->
        <div class="card shadow-none rounded-0 w-100">
            <!--begin::Header-->
            <div class="card-header" id="kt_engage_demos_header">
                <h3 class="card-title fw-bolder text-gray-700">Advance Search</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary h-40px w-40px me-n6" id="kt_engage_demos_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body" id="kt_engage_demos_body">
                <!--begin::Content-->
                <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_engage_demos_body" data-kt-scroll-dependencies="#kt_engage_demos_header" data-kt-scroll-offset="5px">
                    <!--begin::Wrapper-->
                  
                    <div class="fv-row mb-12">
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="Search option" data-allow-clear="true" id="filter" multiple="multiple">
                            <option value="consultant">Consultant</option>
                            <option value="promo">Promo Title</option>
                            <option value="promo_code">Promo Code</option>
                            <option value="no">No of Coupons</option>
                            <option value="amount">Amount</option>
                            <option value="cat">Category</option>
                            <option value="spec">Specialization</option>                            
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="consultant" hidden>
                        <label class="fs-6 form-label fw-bolder text-dark">Consultant</label>
                            <select name="" id="" class="form-select form-select-solid datatable-input" data-control="select2" data-col-index='1'>
                                <option value=""></option>
                                @foreach($consultant as $consultant)
                                    <option  value="{{$consultant->id}}">{{$consultant->name}}</option>
                                @endforeach
                            </select>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="promo" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Promo Title</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='2' />

                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="promo_code" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Promo Code</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='3' />

                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="no" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">No of Coupons</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='4' />

                        </div>                        
                    </div>
            
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="amount" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Amount</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='7' />

                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="cat" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Category</label>
                            <select name="" id="" class="datatable-input" data-col-index='10'>
                                <option value=""></option>
                                @foreach($category as $category)
                                    <option  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="spec" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Specialization</label>
                            <select name="" id="" class="datatable-input" data-col-index='11'>
                                <option value=""></option>
                                @foreach($specialization as $specialization)
                                    <option  value="{{$specialization->id}}">{{$specialization->title}}</option>
                                @endforeach
                            </select>
                        </div>                        
                    </div>

                    <div class="rounded py-4 px-6 mb-5" hidden id="search_div">
                        <button type="button" id="search_two" class="btn btn-primary me-5">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"> Discount</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Other</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"> Discount</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('other.discount.create') }}" class="btn btn-sm btn-primary" >Create</a>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <form action="#">
                    <!--begin::Card-->
                    <div class="card mb-7">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Compact form-->
                            <div class="d-flex align-items-center">
                                <!--begin::Input group-->
                                <div class="position-relative w-md-400px me-md-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" class="form-control form-control-solid ps-10 datatable-input" data-col-index='1' name="search" value="" placeholder="Promo Title" />
                                </div>
                                <!--end::Input group-->
                                <!--begin:Action-->
                                <div class="d-flex align-items-center">
                                    <button type="button" id="search" class="btn btn-primary me-5">Search</button>
                                    <button type="button" id="reset" class="btn btn-primary me-5">Reset</button>
                                    <button id="kt_engage_demos_toggle" class="engage-demos-toggle btn btn-flex h-35px bg-body btn-color-gray-700 btn-active-color-gray-900 shadow-sm fs-6 px-4 rounded-top-0" title="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click" >
                                        <span id="kt_engage_demos_label">Advanced Search</span>
                                    </button>
                                </div>
                                <div class="position-relative w-md-300px me-md-2">
                                    <select class="form-select" id="toogleColum" data-control="select2" data-placeholder="Toggle column" multiple="multiple">
                                        <option></option>
                                        <option selected value="0">SNo</option>
                                        <option selected value="1">Consultant</option>
                                        <option selected value="2">Promo Title</option>
                                        <option selected value="3">Promo Code</option>
                                        <option selected value="4">No of Coupons</option>
                                        <!-- <option selected value="5">Upload Image</option> -->
                                        <option selected value="5">Flat or Percentage</option>
                                        <option selected value="6">Amount ({{ $companeySetting->country->currency->currencycode }})</option>
                                        <option selected value="7">Validity From Date</option>
                                        <option selected value="8">Validity To Date</option>
                                        <option selected value="9">Category</option>
                                        <option selected value="10">Specialization</option>
                                        <option selected value="11">Applicable For</option>
                                        <option selected value="12">Action</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row gy-10 gx-xl-10">
                    <div class="card card-docs flex-row-fluid mb-2">
                        <table id="kt_datatable" class="table table-row-bordered gy-5">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>SNo</th>
                                    <th>Consultant</th>
                                    <th>Promo Title</th>
                                    <th>Promo Code</th>
                                    <th>No of Coupons</th>
                                    <!-- <th>Upload Image</th> -->
                                    <th>Flat or Percentage</th>
                                    <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                    <th>Validity From Date</th>
                                    <th>Validity To Date</th>
                                    <th>Category</th>
                                    <th>Specialization</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>Consultant</th>
                                    <th>Promo Title</th>
                                    <th>Promo Code</th>
                                    <th>No of Coupons</th>
                                    <th>Flat or Percentage</th>
                                    <th>Amount ({{ $companeySetting->country->currency->currencycode }})</th>
                                    <th>Validity From Date</th>
                                    <th>Validity To Date</th>
                                    <th>Category</th>
                                    <th>Specialization</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
<script type="text/javascript">
    var table = null;
        
        table = $("#kt_datatable").DataTable({
            initComplete: function(settings, json) {
                const select = ToogleColum.val()
                table.columns().every(function (index) {
                    if(!select.includes(index.toString())){
                        var column =  table.column(index)
                        column.visible(false)
                    }else{
                        var column =  table.column(index)
                        column.visible(true)
                    }
                })
            },
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
                url : "{{route('other.discount.datatable')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    columnsDef : ['id','consultantID','promo_title','promo_code','no_of_coupons','flat_percentage','amount','from_date','to_date','categoryID','specializationID','status','action']
                }

            },
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'consultantId'},
                { data: 'promo_title'},
                { data: 'promo_code'},
                { data: 'no_of_coupons'},
                { data: 'flat_percentage'},
                { data: 'amount'},
                { data: 'from_date'},
                { data: 'to_date'},
                { data: 'categoryID'},
                { data: 'specializationID'},
                { data: 'status'},
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
                            <a href="${data.edit}" class="btn btn-icon btn-primary"><i class="las la-edit fs-2 me-2"></i></a>
                            <a href="${data.Delete}" delete class="btn btn-icon btn-danger"><i href="${data.Delete}" delete class="las la-trash fs-2 me-2"></i></a>
                        `;
                    },
                },
               // {
                 //   targets: 1,                                                
                 //   className: 'text-end',
                 //   render: function (data, type, row) {
                 //       return `${row.consultantId}`;
                 //   },
                //},
                // {
                //     targets: 9,                                                
                //     className: 'text-end',
                //     render: function (data, type, row) {
                //         return `${row.categoryID}`;
                //     },
                // },
                // {
                //     targets: 10,                                                
                //     className: 'text-end',
                //     render: function (data, type, row) {
                //         return `${row.specializationID}`;
                //     },
                // },
              
            ],
            drawCallback : function( settings ) { }
        });
   

    </script>
@endsection
</x-base-layout>

