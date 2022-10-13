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
                            <option value="phone_no">Phone No</option>
                            <option value="dob">DOB</option>
                            <option value="gender">Gnder</option>
                            <option value="email">Email</option>
                            <option value="register_address">Register Address</option>
                            <option value="country_id">Country</option>
                            <option value="state_id">State</option>
                            <option value="city_id">City</option>
                            <option value="zipcode">Zipcode</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="phone_no" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Phone No</label>
                            <input type="tel" class="form-control form-control form-control-solid datatable-input" data-col-index='1' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="dob" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Date Of Birth</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='3' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="gender" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Gnder</label>
                            <select class="form-control form-control form-control-solid datatable-input" data-col-index='4'>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-xxl-4" data-id-filter="email" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Email</label>
                            <input type="email" class="form-control form-control form-control-solid datatable-input" data-col-index='5' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="register_address" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Register Address</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='6' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="country_id" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Country</label>
                            <select class="form-control form-control form-control-solid datatable-input" data-col-index='7'>
                                <option value="">Select</option>
                                @foreach ($Country as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-4" data-id-filter="state_id" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">State</label>
                            <select class="form-control form-control form-control-solid datatable-input" data-col-index='8'>
                                <option value="">Select</option>
                                @foreach ($State as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->state_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-4" data-id-filter="city_id" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">City</label>
                            <select class="form-control form-control form-control-solid datatable-input" data-col-index='9'>
                                <option value="">Select</option>
                                @foreach ($City as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-4" data-id-filter="zipcode" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Zipcode</label>
                            <input type="number" class="form-control form-control form-control-solid datatable-input" data-col-index='10' />
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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Customer</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">User</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Customer</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('user.customer.create') }}" class="btn btn-sm btn-primary" >Create</a>
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
                                    <input type="text" class="form-control form-control-solid ps-10 datatable-input" data-col-index='2' name="search" value="" placeholder="Name" />
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
                                        <option selected value="1">Phone No</option>
                                        <option selected value="2">Name</option>
                                        <option selected value="3">DOB</option>
                                        <option selected value="4">Gnder</option>
                                        <option selected value="5">Email</option>
                                        <option selected value="6">Register Address</option>
                                        <option selected value="7">Country</option>
                                        <option selected value="8">State</option>
                                        <option selected value="9">City</option>
                                        <option selected value="10">Zipcode</option>
                                        <option selected value="11">Status</option>
                                        <option selected value="12">Actions</option>

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
                                    <th>Phone No</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Gnder</th>
                                    <th>Email</th>
                                    <th>Register Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zipcode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>Phone No</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Gnder</th>
                                    <th>Email</th>
                                    <th>Register Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zipcode</th>
                                    <th>Status</th>
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
                    url : "{{route('user.customer.datatable')}}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        columnsDef : ['id','phone_no','name','dob','gender','email','register_address','country_id','state_id','city_id','zipcode','status']
                    }

                },
                columns: [
                    { data: 'DT_RowIndex' },
                    { data: 'phone_no' },
                    { data: 'name' },
                    { data: 'dob' },
                    { data: 'gender' },
                    { data: 'email' },
                    { data: 'register_address' },
                    { data: 'country_id' },
                    { data: 'state_id' },
                    { data: 'city_id' },
                    { data: 'zipcode' },
                    { data: 'status' },
                    { data: 'action' }
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
                                <a href="${data.view}" class="btn btn-icon btn-primary"><i class="las la-eye fs-2 me-2"></i></a>
                            `;
                        },
                    },
                    {
                        targets: 7,
                        render: function (data, type, row) {
                            return row.country
                        },
                    },
                    {
                        targets: 8,
                        render: function (data, type, row) {
                            return row.state
                        },
                    },
                    {
                        targets: 9,
                        render: function (data, type, row) {
                            return row.city
                        },
                    },
                ],
                drawCallback : function( settings ) { }
            });
        });


    </script>
@endsection
</x-base-layout>

