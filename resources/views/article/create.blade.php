<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Articel</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('other.articel.index') }}" class="text-muted text-hover-primary">Articel</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Create Articel</li>
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
                        <form action="{{ route('other.articel.store') }}" method="post" id="formCreate">
                            @csrf
                            <div class="py-5">
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required fw-bold fs-6 mb-3">Pos from</label>
                                        <div class="d-flex flex-column fv-row">
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="from_user"  type="radio" value="0" id="kt_docs_formvalidation_radio_option_1" />
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                    <div class="fw-bolder text-gray-800">Firm</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="from_user" type="radio" value="1" id="kt_docs_formvalidation_radio_option_1" />
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                    <div class="fw-bolder text-gray-800">Consultant</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="from_user" type="radio" value="2" id="kt_docs_formvalidation_radio_option_2" />
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                                    <div class="fw-bolder text-gray-800">Admin</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fv-row mb-10" id="selecter">
                                        <label class="required form-label fs-6 mb-2" >Firm / Consultant / Admin</label>
                                        <select class="form-select" id="f_c_a" name="f_c_a" data-placeholder="Search by Consultant Name / Email / Mobile No / Consultant ID /  Admin Name">

                                        </select>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required fw-bold fs-6 mb-2">Title</label>
                                        <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Title" required />
                                    </div>
                                    <div class="fv-row mb-10">
                                        <div class="image-input image-input-empty" data-kt-image-input="true" style="background-color: aliceblue;">
                                            <div class="image-input-wrapper w-125px h-125px"></div>
                                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Edit button-->

                                            <!--begin::Cancel button-->
                                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel button-->

                                            <!--begin::Remove button-->
                                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove button-->
                                        </div>
                                        <!--end::Image input-->
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="required fw-bold fs-6 mb-2">Short Description</label>
                                        <textarea name="describtion" class="form-control form-control-solid"></textarea>
                                    </div>
                                    <div class="fv-row mb-10">
                                        {{-- <label class="required fw-bold fs-6 mb-5"></label> --}}
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="status" type="checkbox" value="1" id="status" />
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <label class="form-check-label" for="status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">Submit</button>
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
        $('#f_c_a').select2({
            ajax: {
                url: '{{ route('other.articel.search') }}',
                type: 'POST',
                data: function (params) {
                var query = {
                    search: params.term,
                    "_token": "{{ csrf_token() }}",
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (item) {
                            return {
                                text: item.title,
                                children: $.map(item.children, function (data) { return { id:`${data.id}|${item.title}`,text : data.text} })
                            }
                        })
                    };
                },
                cache: true
            },

        })

    </script>
    @endsection
</x-base-layout>
