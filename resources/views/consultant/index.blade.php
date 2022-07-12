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
                            <option value="country_code">Country Code</option>
                            <option value="dialing">Dialing</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4" data-id-filter="country_code" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Country Code</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='2' />
                        </div>
                        <div class="col-xxl-4" data-id-filter="dialing" hidden>
                            <label class="fs-6 form-label fw-bolder text-dark">Dialing</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='3' />
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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Consultant</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Consultant</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('consultant.consultant.create') }}" class="btn btn-sm btn-primary">Create</a>
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
                                    <input type="text" class="form-control form-control-solid ps-10 datatable-input" data-col-index='1' name="search" value="" placeholder="Country" />
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
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row gy-10 gx-xl-10">
                    <div class="card card-docs flex-row-fluid mb-2">
                        <div>
                            Toggle column: <a class="toggle-vis" data-column="0">SNo</a> - <a class="toggle-vis" data-column="1">Country Name</a> - <a class="toggle-vis" data-column="2">Code</a> -
                            <a class="toggle-vis" data-column="3">Dialing</a>
                        </div>
                        <table id="kt_datatable" class="table table-row-bordered gy-5">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>Sno</th>
                                    <th>Phone No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Bio Data</th>
                                    <th>Date of Birth</th>
                                    <th>Expriance</th>
                                    <th>landline</th>
                                    <th>Language</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Firm Type</th>
                                    <th>specialized</th>
                                    <th>Category</th>
                                    <th>preferre Slot</th>
                                    <th>Video</th>
                                    <th>video Amount</th>
                                    <th>voice</th>
                                    <th>voice amount</th>
                                    <th>Text</th>
                                    <th>Text amount</th>
                                    <th>Direct</th>
                                    <th>Direct Amount</th>
                                    <th>Account name</th>
                                    <th>Account number</th>
                                    <th>Bank name</th>
                                    <th>Branch</th>
                                    <th>IFCS code</th>
                                    <th>Bank status</th>
                                    <th>proof</th>
                                    <th>Insurance</th>
                                    <th>Commission Consultant Type</th>
                                    <th>Commission Consultant Amount</th>
                                    <th>Commission Offers Type</th>
                                    <th>Commission Offers Amount</th>
                                    <th>Commission Payout Type</th>
                                    <th>Commission Payout Amount</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sno</th>
                                    <th>Phone No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Bio Data</th>
                                    <th>Date of Birth</th>
                                    <th>Expriance</th>
                                    <th>landline</th>
                                    <th>Language</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Firm Type</th>
                                    <th>specialized</th>
                                    <th>Category</th>
                                    <th>preferre Slot</th>
                                    <th>Video</th>
                                    <th>video Amount</th>
                                    <th>voice</th>
                                    <th>voice amount</th>
                                    <th>Text</th>
                                    <th>Text amount</th>
                                    <th>Direct</th>
                                    <th>Direct Amount</th>
                                    <th>Account name</th>
                                    <th>Account number</th>
                                    <th>Bank name</th>
                                    <th>Branch</th>
                                    <th>IFCS code</th>
                                    <th>Bank status</th>
                                    <th>proof</th>
                                    <th>Insurance</th>
                                    <th>Commission Consultant Type</th>
                                    <th>Commission Consultant Amount</th>
                                    <th>Commission Offers Type</th>
                                    <th>Commission Offers Amount</th>
                                    <th>Commission Payout Type</th>
                                    <th>Commission Payout Amount</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        $(document).ready(function () {
            const SearchSubmit = document.getElementById('search')
            const SearchSubmit_two = document.getElementById('search_two')
            const resetSubmit = document.getElementById('reset')
            SearchSubmit.addEventListener('click',search)
            SearchSubmit_two.addEventListener('click',search)
            resetSubmit.addEventListener('click',reset)

            function search(event){
                event.preventDefault()
                var params = {}
                const datatable_input = document.querySelectorAll('.datatable-input')
                datatable_input.forEach((data) => {
                    var i = data.dataset.colIndex
                    if (params[i]) {
                        params[i] += '|' + data.value;
                    } else {
                        params[i] = data.value;
                    }
                })
                $.each(params, function(i, val) {
                    table.column(i).search(val ? val : '', false, false);
                });
                table.table().draw();
            }

            function reset(event){
                event.preventDefault()
                const datatable_input = document.querySelectorAll('.datatable-input')
                datatable_input.forEach((data) => {
                    data.value = ''
                    table.column(data.dataset.colIndex).search('', false, false);
                })
                table.table().draw();
            }

            var table = $("#kt_datatable").DataTable({
                responsive: true,
                scrollX: true,
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
                    url : "{{route('consultant.consultant.datatable')}}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        columnsDef : [
                            'DT_RowIndex',
                            'phone_no',
                            'name' ,
                            'email' ,
                            'bio_data' ,
                            'dob' ,
                            'exp_year' ,
                            'landline' ,
                            'language' ,
                            'register_address' ,
                            'country_id' ,
                            'state_id' ,
                            'city_id' ,
                            'zipcode' ,
                            'type' ,
                            'specialized' ,
                            'categorie_id' ,
                            'preferre_slot' ,
                            'video' ,
                            'video_amount' ,
                            'voice' ,
                            'voice_amount' ,
                            'text' ,
                            'text_amount' ,
                            'direct' ,
                            'direct_amount' ,
                            'account_name' ,
                            'account_number' ,
                            'bank_name' ,
                            'branch' ,
                            'ifsc_code' ,
                            'bank_status' ,
                            'proof' ,
                            'insurance_id' ,
                            'com_con_type' ,
                            'com_con_amount' ,
                            'com_off_type' ,
                            'com_off_amount' ,
                            'com_pay_type' ,
                            'com_pay_amount',
                        ]
                    }

                },
                columns: [
                    { data : 'DT_RowIndex'},
                    { data : 'phone_no'},
                    { data : 'name' },
                    { data : 'email' },
                    { data : 'bio_data' },
                    { data : 'dob' },
                    { data : 'exp_year' },
                    { data : 'landline' },
                    { data : 'language' },
                    { data : 'register_address' },
                    { data : 'country_id' },
                    { data : 'state_id' },
                    { data : 'city_id' },
                    { data : 'zipcode' },
                    { data : 'type' },
                    { data : 'specialized' },
                    { data : 'categorie_id' },
                    { data : 'preferre_slot' },
                    { data : 'video' },
                    { data : 'video_amount' },
                    { data : 'voice' },
                    { data : 'voice_amount' },
                    { data : 'text' },
                    { data : 'text_amount' },
                    { data : 'direct' },
                    { data : 'direct_amount' },
                    { data : 'account_name' },
                    { data : 'account_number' },
                    { data : 'bank_name' },
                    { data : 'branch' },
                    { data : 'ifsc_code' },
                    { data : 'bank_status' },
                    { data : 'proof' },
                    { data : 'insurance_id' },
                    { data : 'com_con_type' },
                    { data : 'com_con_amount' },
                    { data : 'com_off_type' },
                    { data : 'com_off_amount' },
                    { data : 'com_pay_type' },
                    { data : 'com_pay_amount' },
                ],

                drawCallback : function( settings ) { }
            });

            $('a.toggle-vis').on('click', function (e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column($(this).attr('data-column'));
                // Toggle the visibility
                column.visible(!column.visible());
            });

            $('#filter').on('change', function (e) {
                const selected = $('#filter').val()
                const length = selected.length
                if(length > 0){
                    document.getElementById('search_div').removeAttribute('hidden')
                }else{
                    document.getElementById('search_div').setAttribute('hidden',true)
                }
                document.querySelectorAll('[data-id-filter').forEach((a) =>{
                    if(selected.indexOf(a.getAttribute('data-id-filter')) !== -1)  {
                        a.removeAttribute('hidden')
                    }else{
                        a.setAttribute('hidden',true)
                    }
                })
            });
        });
    </script>
    @endsection
</x-base-layout>
