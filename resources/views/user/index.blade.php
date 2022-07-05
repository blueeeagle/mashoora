<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Admin</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"><a href="#" class="text-muted text-hover-primary">User</a></li>
                        {{-- <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">Create Document</li> --}}
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary" >Create</a>
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
                                    <input type="text" class="form-control form-control-solid ps-10 datatable-input" data-col-index='1' name="search" value="" placeholder="name" />
                                </div>
                                <!--end::Input group-->
                                <!--begin:Action-->
                                <div class="d-flex align-items-center">
                                    <button type="button" id="search" class="btn btn-primary me-5">Search</button>
                                    <button type="button" id="reset" class="btn btn-primary me-5">Reset</button>
                                    <a id="kt_horizontal_search_advanced_link_new" class="btn btn-link" data-bs-toggle="collapse" href="#kt_advanced_search_form_new">Advanced Search</a>
                                </div>

                                <!--end:Action-->
                            </div>
                            <!--end::Compact form-->
                            <!--begin::Advance form-->
                            <div class="collapse" id="kt_advanced_search_form_new">
                                <!--begin::Separator-->
                                <div class="separator separator-dashed mt-9 mb-6"></div>
                                <!--end::Separator-->
                                <!--begin::Row-->
                                <div class="row g-8 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xxl-4">
                                        <label class="fs-6 form-label fw-bolder text-dark">Email</label>
                                        <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='2'  value="" />
                                    </div>
                                    <div class="col-xxl-4">
                                        <label class="fs-6 form-label fw-bolder text-dark">phone</label>
                                        <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='3'  value="" />
                                    </div>
                                    <div class="col-xxl-4">
                                        <label class="fs-6 form-label fw-bolder text-dark">permission</label>
                                        <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index='4'  value="" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Advance form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </form>
                <div class="row gy-10 gx-xl-10">
                    <div class="card card-docs flex-row-fluid mb-2">
                        <div>
                            Toggle column: <a class="toggle-vis" data-column="0">SNo</a> - <a class="toggle-vis" data-column="1">Country Name</a> - <a class="toggle-vis" data-column="2">Code</a> -
                            <a class="toggle-vis" data-column="3">Currency Code</a> - <a class="toggle-vis" data-column="4">symbol</a> - <a class="toggle-vis" data-column="5">price</a>
                        </div>
                        <table id="kt_datatable" class="table table-row-bordered gy-5">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>permission</th>
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

            // $(reset).on('click', function(e) {
            //     e.preventDefault();
            //     $(rowFilter).find('.datatable-input').each(function(i) {
            //         $(this).val('');
            //         table.column($(this).data('col-index')).search('', false, false);
            //     });
            //     table.table().draw();
            // });

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
                    url : "{{route('admin.user.datatable')}}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        columnsDef : ['id','name','name','phone','permission']
                    }

                },
                columns: [
                    { data: 'DT_RowIndex'},
                    { data: 'name'},
                    { data: 'email'},
                    { data: 'phone'},
                    { data: 'permission'},
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

