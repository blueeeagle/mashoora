<x-base-layout>
    @section('styles')
    {{-- <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/flatpickr/flatpickr.bundle.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ URL::asset(theme()->getDemo().'/plugins/custom/jstree/jstree.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
    @endsection

    {{-- Model --}}
    @include('consultant.view_layouts.Model')

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
            {{-- NAV--}}
            <div class="card-body pt-9 pb-0">
                @include('consultant.view_layouts.basicinfo')
                @include('consultant.view_layouts.nav')
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="kt_tab_pane_1" role="tabpanel">
                {{-- Dash Boad--}}
                @include('consultant.view_layouts.basic')
                @include('consultant.view_layouts.schandcom')
                @include('consultant.view_layouts.bank_details')
                @include('consultant.view_layouts.CatSpecInsDoc')
            </div>
            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                @include('consultant.view_layouts.transaction')
            </div>
            {{-- @include('consultant.view_layouts.dashboad') --}}
            {{-- calendar--}}
            {{-- @include('consultant.view_layouts.calender') --}}
            {{-- Scheduling --}}
            {{-- @include('consultant.view_layouts.Scheduling') --}}
            {{-- Appointment History --}}
            {{-- @include('consultant.view_layouts.Appointment') --}}
            {{-- Offer History --}}
            {{-- @include('consultant.view_layouts.Offer') --}}
            {{-- Wallet --}}
            {{-- @include('consultant.view_layouts.Wallet') --}}
            {{--Review &Rating--}}
            {{-- @include('consultant.view_layouts.Review') --}}
        </div>
    </div>


    @section('scripts')
{{-- <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}'></script> --}}
{{-- <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/datatables/datatables.bundle.js')}}'></script> --}}
{{-- <script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/formrepeater/formrepeater.bundle.js')}}'></script> --}}
{{-- <script src="{{ URL::asset(theme()->getDemo().'/js/calendarForConsultant.js') }}"></script> --}}
{{-- <script src="{{ URL::asset(theme()->getDemo().'/js/calendar.js') }}"></script> --}}
{{-- <script src="{{ URL::asset(theme()->getDemo().'/js/consultant_view.js') }}"></script> --}}

<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/flatpickr/flatpickr.bundle.js')}}'></script>
<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/tinymce/tinymce.bundle.js')}}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script src='{{ URL::asset(theme()->getDemo().'/plugins/custom/fslightbox/fslightbox.bundle.js') }}'></script>
<script src="{{ URL::asset(theme()->getDemo().'/js/consultant_view_model.js') }}"></script>

<script>
    const updateURL = `{{ route('consultant.consultant.update',$consultant->id) }}`
    const Getcity = `{{route('master.country.getCity')}}`
    const consultant_country = {!! json_encode($consultant->country) !!}
    const admin_country = {!! json_encode($companySetting_country_price->country) !!}
    var downloadAllFiles = `{{ $consultant->proof }}`
    const filepauth = `{{ asset("") }}`
    const modelcategory = `{{ route('consultant.modelcategory') }}`

    const sub_category_id = $('#sub_category_id');
    const specialization_id = $('#specialization_id');
    var table1,table2,table3,table4 = null

    const consultantcurrnect = document.querySelectorAll('.consultantcurrnect')
    consultantcurrnect.forEach(e => { e.innerText = consultant_country.currency.currencycode })
    const tree =  {!! json_encode($tree) !!}
    const refresh = `{{ route('activities.schedules.getAllschedule',$consultant->id) }}?_token={{ csrf_token() }}`
    const Consultamt_id = `{{ $consultant->id }}`
    const appdetails = `{{ route('activities.schedules.getappdetails') }}`
    const refresh1 = `{{ route('activities.schedules.getAllschedule',$consultant->id) }}?_token={{ csrf_token() }}`
    const $type = @json($consultant->type);
    const $type1 = @json($consultant->insurancecheckbox);
    var consultant_id = @json($consultant->id);

    //commom function
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

var table = null
    $(document).ready(function () {
        table = $("#kt_customers_table").DataTable({
            responsive: true,
            buttons: [
                    'print',
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
            // Pagination settings
            // dom: `<'row'<'col-sm-12'tr>>
            // <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 100],
                // searching: false,
                pageLength: 10,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                bInfo : false,
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    footer: false, // display/hide footer
                },
            ajax: {
                url : "{{route('consultant.consultant.transactiondatatable')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id' : "{{$consultant->id}}",
                    columnsDef : ['id','tx','amount','type','created_at','action']
                }

            },
            columns: [
                { data : 'DT_RowIndex' },
                { data : 'tx' },
                    { data : 'amount' },
                    { data : 'type' },
                    { data : 'created_at' },
                    { data : 'action' },
            ],
           columnDefs : [
               {
                   targets: 1,
                        data: null,
                        orderable: true,
                        render: function (data, type, row) {
                            return `TX-${data}`;
                        },
               },
               {
                   targets: 3,
                        data: null,
                        orderable: true,
                        render: function (data, type, row) {
                            let symbol = (data == 'sub')?`<span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                    <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                </svg>
                            </span>`:`<span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                </svg>
                            </span>`;
                            return `${row.amount} ${symbol}`;
                        },
               }
              ],
            drawCallback : function( settings ) { }
        });

        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                table.search(e.target.value).draw();
            });


        $( "#reset" ).click(function() {
                $('#kt_customers_table').val('');
               table.search($('#kt_customers_table').val()).draw();
            });

    });
</script>

@endsection
</x-base-layout>
