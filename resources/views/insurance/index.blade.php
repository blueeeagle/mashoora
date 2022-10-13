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
                            <option value="legal_name" >legal Name</option>
                            <option value="have_tax" >have Tax</option>
                            <option value="taxation_number" >taxation Number</option>
                            <option value="register_on" >register On</option>
                            <option value="consultant_type" >consultant Type</option>
                            <option value="register_address" >register Address</option>
                            <option value="country_id" >country</option>
                            <option value="state_id" >state</option>
                            <option value="city_id" >city</option>
                            <option value="zipcode" >Zipcode</option>
                            <option value="cname" >c-name</option>
                            <option value="ctitle" >c-title</option>
                            <option value="cemail" >c-email</option>
                            <option value="cmobile" >c-mobile</option>
                            <option value="cphone" >c-phone</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="legal_name" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">legal Name</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='2' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="have_tax" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">have Tax</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='3' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="taxation_number" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">taxation Number</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='4' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="register_on" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">register On</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='5' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="consultant_type" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">consultant Type</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='6' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="register_address" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Register Address</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='7' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="country_id" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">country</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='8' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="state_id" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">state</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='9' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="city_id" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">city</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='10' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="zipcode" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">zipcode</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='11' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="cname" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">c-name</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='12' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="ctitle" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">c-title</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='13' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="cemail" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">c-email</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='14' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="cmobile" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">c-Mobile</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='15' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="cphone" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">c-phone</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='16' />
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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Insurance</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Master</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Insurance</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('user.insurance.create') }}" class="btn btn-sm btn-primary" >Create</a>
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
                                    <input type="text" class="form-control form-control-solid ps-10 datatable-input" data-col-index='1' placeholder="Company Name" />
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
                                        <option selected value="0" >SNo</option>
                                        <option selected value="1" >comapany Name</option>
                                        <option selected value="2" >legal Name</option>
                                        <option selected value="3" >have Tax</option>
                                        <option selected value="4" >taxation Number</option>
                                        <option selected value="5" >register On</option>
                                        <option selected value="6" >consultant Type</option>
                                        <option selected value="7" >register Address</option>
                                        <option selected value="8" >country</option>
                                        <option selected value="9" >state</option>
                                        <option selected value="10" >city</option>
                                        <option selected value="11" >Zipcode</option>
                                        <option selected value="12" >c-name</option>
                                        <option selected value="13" >c-title</option>
                                        <option selected value="14" >c-email</option>
                                        <option selected value="15" >c-mobile</option>
                                        <option selected value="16" >c-phone</option>
                                        <option selected value="17" >status</option>
                                        <option selected value="18" >Action</option>
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
                                    <th>comapany Name</th>
                                    <th>legal Name</th>
                                    <th>have Tax</th>
                                    <th>taxation Number</th>
                                    <th>register On</th>
                                    <th>consultant Type</th>
                                    <th>register Address</th>
                                    <th>country</th>
                                    <th>state</th>
                                    <th>city</th>
                                    <th>Zipcode</th>
                                    <th>c-name</th>
                                    <th>c-title</th>
                                    <th>c-email</th>
                                    <th>c-mobile</th>
                                    <th>c-phone</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>comapany Name</th>
                                    <th>legal Name</th>
                                    <th>have Tax</th>
                                    <th>taxation Number</th>
                                    <th>register On</th>
                                    <th>consultant Type</th>
                                    <th>register Address</th>
                                    <th>country</th>
                                    <th>state</th>
                                    <th>city</th>
                                    <th>Zipcode</th>
                                    <th>c-name</th>
                                    <th>c-title</th>
                                    <th>c-email</th>
                                    <th>c-mobile</th>
                                    <th>c-phone</th>
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
        $(document).ready(function () {
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
                    url : "{{route('user.insurance.datatable')}}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        columnsDef : ['id','comapany_name','legal_name','have_tax','taxation_number','register_on','consultant_type','register_address',
                                        'country_id','state_id','city_id','zipcode','cname','ctitle','cemail','cmobile','cphone','status']
                    }

                },
                columns: [
                    { data: 'DT_RowIndex'},
                    { data: 'comapany_name' },
                    { data: 'legal_name' },
                    { data: 'have_tax' },
                    { data: 'taxation_number' },
                    { data: 'register_on' },//5
                    { data: 'consultant_type' },
                    { data: 'register_address' },
                    { data: 'country_id' },
                    { data: 'state_id' },
                    { data: 'city_id' },//10
                    { data: 'zipcode' },
                    { data: 'cname' },
                    { data: 'ctitle' },
                    { data: 'cemail' },
                    { data: 'cmobile' },
                    { data: 'cphone' },
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
                ],
                drawCallback : function( settings ) { }
            });
        });


    </script>
@endsection
</x-base-layout>

