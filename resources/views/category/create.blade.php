<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Category</h1>
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
                        <li class="breadcrumb-item text-muted">Master</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"><a href="{{ route('master.category.index') }}" class="text-muted text-hover-primary">Category</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Create Category</li>
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
                        <form action="{{ route('master.category.store') }}" method="post" id="formCreate">
                            @csrf
                            <div class="py-5">
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required fw-bold fs-6 mb-3">Choose</label>
                                        <div class="d-flex flex-column fv-row">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="type" type="radio" value="0" id="kt_docs_formvalidation_radio_option_1" />
                                                <!--end::Input-->

                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                    <div class="fw-bolder text-gray-800">Parent</div>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="type" type="radio" value="1" id="kt_docs_formvalidation_radio_option_2" />
                                                <!--end::Input-->

                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                                    <div class="fw-bolder text-gray-800">Sub Category</div>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Radio-->
                                        </div>
                                        <!--end::Input row-->
                                    </div>
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">Category Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Category Name" required />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-10" id="selecter">
                                        <!--begin::Label-->
                                        <label class="required form-label fs-6 mb-2" >Choose Parent</label>
                                        <!--end::Label-->
                                        <!--begin::Select2-->
                                        <select class="form-select" name="categories_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach ($Category as $key => $value )
                                                <option value="{{ $value->id }}">{{$value->name }}</option>
                                            @endforeach
                                        </select>
                                        <!--begin::Select2-->
                                    </div>
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">Short Description</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <textarea name="description" class="form-control form-control-solid"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">Tags</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control" name="tags" value="" id="tags" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-10">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-empty" data-kt-image-input="true" style="background-color: aliceblue;">
                                            <!--begin::Image preview wrapper-->
                                            <div class="image-input-wrapper w-125px h-125px"></div>
                                            <!--end::Image preview wrapper-->

                                            <!--begin::Edit button-->
                                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>

                                                <!--begin::Inputs-->
                                                <input type="file" name="img" accept=".png, .jpg, .jpeg" />
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
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">Sort No</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="sort_no_list" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="for Category list" required />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">Sort No</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="sort_no_home" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="for Home list" required />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-10">
                                        {{-- <label class="required fw-bold fs-6 mb-5"></label> --}}
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="display_in_home" type="checkbox" value="1" id="display_in_home" />
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <label class="form-check-label" for="display_in_home">
                                                <div class="fw-bolder text-gray-800">Display in home</div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
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
        new Tagify(document.getElementById('tags'))
        const selecter = document.getElementById('selecter')
        var RadioButton = document.getElementById('formCreate').elements['type'];
        RadioButton.forEach(element => {
            element.addEventListener('click',showhideParent)
        });
        function showhideParent(event){
            if(event.target.value == 1){
                selecter.removeAttribute('hidden')
                selecter.setAttribute('required',true)

            }else{
                selecter.setAttribute('hidden',true)
                selecter.removeAttribute('required')
            }
        }
    </script>
    @endsection
</x-base-layout>
