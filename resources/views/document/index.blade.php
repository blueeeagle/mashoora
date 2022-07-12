<x-base-layout>

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
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('master.documents.create') }}" class="btn btn-sm btn-primary">Create</a>
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
                                </div>
                                <div class="position-relative w-md-300px me-md-2">
                                    <select class="form-select" id="toogleColum" data-control="select2" data-placeholder="Toggle column" multiple="multiple">
                                        <option></option>
                                        <option selected value="0">SNo</option>
                                        <option selected value="1">Title</option>
                                        <option selected value="2">Create Date</option>
                                        <option selected value="3">Status</option>
                                        <option selected hidden value="4">Action</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row gy-10 gx-xl-10">
                    <div class="card card-docs flex-row-fluid mb-2">
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
    var table = null
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

