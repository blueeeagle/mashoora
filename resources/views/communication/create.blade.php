<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Manage Communication</h1>
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
                        <li class="breadcrumb-item text-muted">Other</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"><a href="{{ route('other.communication.index') }}" class="text-muted text-hover-primary">Manage Communication</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Create Communication</li>
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
                        <form action="{{ route('other.communication.store') }}" method="post" id="formCreate">
                            @csrf
                            <div class="py-5">
                                <div class="rounded border p-10">
                                   
                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Communication Mode<span class="text-danger">*</span></label>
                                        <select class="form-select" name="communication_mode" id="communication_mode" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                           <option value="0">SMS</option>
                                           <option value="1">Push Notification</option>
                                            <option value="2">Email</option>
                                            
                                        </select>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Send To<span class="text-danger">*</span></label>
                                        <select class="form-select" name="send_to" id="send_to" onchange="sendTo(this)" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            <option value="1">Customer</option>
                                            <option value="2">Consultant</option>
                                            <option value="0">Others</option>
                                        </select>
                                    </div>

                                    <div class="mb-0">
                                        <label class="form-label">Send On</label>
                                        <input class="form-control form-control-solid" name="send_on" placeholder="Select Date & Time" id="kt_daterangepicker_3"/>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="form-label fs-6 mb-2" >Subject<span class="text-danger">*</span></label>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject"/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label fs-6 mb-2" >Body<span class="text-danger">*</span></label>
                                        <textarea name="body" class="form-control" placeholder="Body"></textarea>
                                    </div>

                                    <!--<div class="position-relative w-md-400px me-md-2">-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <!--    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">-->
                                    <!--            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />-->
                                    <!--            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                        <!--end::Svg Icon-->
                                    <!--    <input type="text" class="form-control form-control-solid ps-10 datatable-input" data-col-index='1' name="search" value="" placeholder="Name" />-->
                                    
                                    <!--</div>-->
                                    <!--<div class="position-relative w-md-300px me-md-2">-->
                                    <!--    <button type="button" id="search" class="btn btn-primary me-5">Search</button>-->
                                    <!--</div>-->
                                    
                                    <!-- Data Table for "Send To" -->
                                    <div class="row gy-10 gx-xl-10">
                                        <div class="card card-docs flex-row-fluid mb-2">
                                            <table id="communicate" class="table table-row-bordered gy-5">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-muted">
                                                        <th>Sno</th>
                                                        <th>Name</th>
                                                        <th>Mobile No</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">Save</button>
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
       var checked = [];
       const send_to = document.getElementById('send_to');

        back = `{{ route('other.communication.index') }}`
        var table = null;
        $(document).ready(function () {
            back = `{{ route('other.communication.index') }}`
            table = $("#communicate").DataTable({
                    
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
                        url : "{{route('other.communication.sendTO_Datatable')}}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            columnsDef : ['id','name','phone_no','email']
                        }
                    },
                    columns: [
                        { data: 'DT_RowIndex'},                        
                        { data: 'name'},
                        { data: 'phone_no'},
                        { data: 'email'},
                        { data : 'action'}
                    ],
                    columnDefs : [
                        {
                            targets: -1,                                                
                            className: 'text-end',
                            render: function (data, type, row) {
                                
                                return `<input ${(checked.includes(row.id))?'checked':''} class="typecheck" type="checkbox" name='customer_consultant_id[]' value='${row.id}' >`;
                            },
                        },
                    ],
                    drawCallback : function( settings ) { }
                    // bDestroy: true
                });      
        })
        function sendTo(obj){
            table.column(4).search(obj.value, false, false);
            table.table().draw();                                      
        }
        $('body').on('click','.typecheck',function(e){
            checked.push(e.target.value);
            $(send_to).prop('required','true');
        
        })

        // date & time
        $("#kt_daterangepicker_3").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                timePicker: true,
                maxYear: parseInt(moment().format("YYYY"),10)
            },
        );
    </script>
    @endsection
</x-base-layout>
