<x-base-layout>
    
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Approval</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Approval</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Firm</li>
                    </ul>
                </div>
                <!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('master.city.create') }}" class="btn btn-sm btn-primary" >Create</a>
                </div> -->
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                
                <div class="row gy-10 gx-xl-10">
                    <div class="card card-docs flex-row-fluid mb-2">
                        <table id="kt_datatable" class="table table-row-bordered gy-5">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>Date & Time</th>
                                    <th>Firm Name</th>
                                    <th>Email ID</th>
                                    <th>Category</th>
                                    <th>status</th>
                                    <th>Date & Time Stamp</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Firm Name</th>
                                    <th>Email ID</th>
                                    <th>Category</th>
                                    <th>status</th>
                                    <th>Date & Time Stamp</th>
                                    <th>Option</th>
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
                // initComplete: function(settings, json) {
                //     const select = ToogleColum.val()
                //     table.columns().every(function (index) {
                //         if(!select.includes(index.toString())){
                //             var column =  table.column(index)
                //             column.visible(false)
                //         }else{
                //             var column =  table.column(index)
                //             column.visible(true)
                //         }
                //     })
                // },
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
                    url : "{{route('approval.firm.datatable')}}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        columnsDef : ['id','created_at','company_name','email','category','status','updated_at','option']
                    }

                },
                columns: [
                    { data: 'created_at'},
                    { data: 'comapany_name' },
                    { data: 'email' },
                    { data: 'category' },
                    { data: 'status'},
                    { data: 'updated_at'},
                    {data: 'option'}
                ],
                columnDefs : [
                    {
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-end',
                        render: function (data, type, row) {
                            return `
                                <a href="${data.view}" class="btn btn-icon btn-primary"><i class="las la-eye fs-2 me-2"></i></a>
                            `;
                        },
                    },
                    {
                        targets: 4,
                        data: null,
                        orderable: false,
                        render: function (data, type, row) {
                            return `
                                <select name="" id="" class="form-select" onchange='status(this)' data-control="select2">
                                    <option ${(row.dropdown.select == 1)?'selected':''} value="${row.dropdown.ped}">Pending</option>
                                    <option ${(row.dropdown.select == 2)?'selected':''} value="${row.dropdown.acc}">Approval</option>
                                    <option ${(row.dropdown.select == 3)?'selected':''} value="${row.dropdown.dec}">Decline</option>
                                </select>
                            `;
                        },

                    }
                ],
                drawCallback : function( settings ) { }
            });
        });
        function status(obj){
            value = obj.value;
            
            $.ajax({
                url: value,
                method:"post",
                data:{
                    "_token": "{{ csrf_token() }}",
                    changeValue:value,
                },
                success:function(data){
                if(data.msg){
                    Switealert(data.msg,'success')
                    
                }else{
                    var Ptag = "";
                    for(var error in data.errors) { Ptag += data.errors[error]+', '; };
                    // Switealert(Ptag,'error')
                }
                
            },
            error:function(erroe){
                console.log(erroe);
                window.scrollTo({top:0,behavior:'smooth'});
                alert("Something is wrong");
            }
                    
            })

        }
        
        function Switealert(Msg,status){
            Swal.fire({
                text: Msg,
                icon: status,
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    
    </script>
@endsection
</x-base-layout>

