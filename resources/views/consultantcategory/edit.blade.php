<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Specialization</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('master.specialization.index') }}" class="text-muted text-hover-primary">Specialization</a></li>
                        
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit Specialization</li>
                        
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
                    <div class="card-body rounded border pt-0">
                        <form action="{{ route('master.consultantcategory.update',[$Document->id]) }}" method="Post" id="formEdit">
                            @csrf
                            <div class="py-5">
                                <div class="p-10">
                                    <div class="form-group row">
                                    <div class="fv-row mb-10 col-md-6">
                                        <!--begin::Label-->
                                        <label class="required form-label fs-6 mb-2" >Choose Main Category</label>
                                        <!--end::Label-->
                                        <!--begin::Select2-->
                                        <select class="form-select" name="categorie_id" id="categorie_id" data-control="select2" data-placeholder="Select an option" required>
                                            <option></option>
                                            @foreach ($Category as $key => $value )
                                                <option url='{{ route('master.category.getchild',$value->id) }}' value="{{ $value->id }}" {{ ($Document->categorie_id == $value->id)?'selected':'' }}>{{$value->name }}</option>
                                            @endforeach
                                        </select>
                                        <!--begin::Select2-->
                                    </div>
                                    <div class="fv-row mb-10 col-md-6" id="selectdiv" {{ isset($Document->subcategorie_id)?'':'hidden' }}>
                                        <!--begin::Label-->
                                        <label class="required form-label fs-6 mb-2" >Choose Child Category</label>
                                        <!--end::Label-->
                                        <!--begin::Select2-->
                                        <select class="form-select" name="subcategorie_id" id="subcategorie_id" data-control="select2" data-placeholder="Select an option" required>
                                            <option></option>
                                            @foreach ($ChildCategory as $key => $value )
                                                <option value="{{ $value->id }}" {{ ($Document->subcategorie_id == $value->id)?'selected':'' }}>{{$value->name }}</option>
                                            @endforeach
                                        </select>
                                        <!--begin::Select2-->
                                    </div>
                                    </div>
                                     <div class="form-group row">
                                    <div class="fv-row mb-10 col-md-6">
                                        <label class="required form-label fs-6 mb-2" >Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $Document->title }}" placeholder="Title" required/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        {{-- <label class="required fw-bold fs-6 mb-5"></label> --}}
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="status" type="checkbox" {{ ($Document->status == 1)?'checked':''}}  value="1" id="status" />
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <label class="form-check-label" for="status">
                                                <div class="fw-bolder text-gray-800">Status</div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                    </div>
                                    </div>
                                       <div class="form-group row" style="float:right;">
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">update</button>
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
    window.onload = function() {
        back = `{{ route('master.specialization.index') }}`
        var child = $("#subcategorie_id")
        var selectdiv = document.getElementById('selectdiv');
        $("#categorie_id").on('select2:select', function (e) {
            var data = e.params.data.element.attributes[0].value
            $.ajax({
                url:data,
                method:"POST",
                data:{"_token": "{{ csrf_token() }}"},
                success:function(data){
                    var option = null
                    if(data.child.length >0){
                        data.child.forEach((e)=>{
                            option += '<option value='+e.id+'>'+e.name+'</option>'
                        })
                        child.html(option)
                        selectdiv.removeAttribute('hidden');
                    }
                    else{
                        selectdiv.setAttribute('hidden',true);
                        subcategorie_id.removeAttribute('required');
                        document.getElementById('subcategorie_id').value = "";
                    }
                }
            })
        })
    }
    </script>
    @endsection
</x-base-layout>
