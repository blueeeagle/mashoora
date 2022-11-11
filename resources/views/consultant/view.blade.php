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
            {{-- Dash Boad--}}
            @include('consultant.view_layouts.basic')
            @include('consultant.view_layouts.schandcom')
            @include('consultant.view_layouts.bank_details')
            @include('consultant.view_layouts.CatSpecInsDoc')
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

</script>

@endsection
</x-base-layout>
