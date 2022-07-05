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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Document</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Master</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"><a href="{{ route('master.documents.index') }}" class="text-muted text-hover-primary">Document</a></li>
                        {{-- <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">Create Document</li> --}}
                    </ul>
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
                                    <input type="text" class="form-control form-control-solid ps-10 datatable-input" data-col-index='1' name="search" value="" placeholder="name" />
                                </div>
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
                            Toggle column: <a class="toggle-vis" data-column="0">SNo</a> - <a class="toggle-vis" data-column="1">title</a> - <a class="toggle-vis" data-column="2">Create at</a> -
                            <a class="toggle-vis" data-column="3">Status</a> - <a class="toggle-vis" data-column="4">Actions</a>
                        </div>
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-200px">Sno</th>
                                    <th class="min-w-200px">Title</th>
                                    <th class="min-w-100px">Create at</th>
                                    <th class="min-w-70px">Status</th>
                                    <th class="min-w-70px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">

                            </tbody>
                            <!--end::Table body-->
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
        const resetSubmit = document.getElementById('reset')
        SearchSubmit.addEventListener('click',search)
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
                url : "{{route('master.documents.datatable')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    columnsDef : ['id','title','updated_at','status']
                }

            },
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'title'},
                { data: 'updated_at'},
                { data: 'status'},
                { data: 'action'}
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

    });
</script>

@endsection
</x-base-layout>

