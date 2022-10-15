<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Video</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Others</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"><a href="{{ route('other.video.index') }}" class="text-muted text-hover-primary">Video</a></li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">Edit Video</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-body rounded border pt-0">
                        <form action="{{ route('other.video.update',$video->id) }}" method="POST" id="formEdit">
                            @csrf
                            <div class="py-5">
                                <div class="p-10">
                                    <div class="form-group row">
                                <div class="fv-row mb-10 col-md-6">
                                        <label class="required fw-bold fs-6 mb-3">Pos from</label>
                                        <div class="d-flex flex-column fv-row">
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="post_from"  type="radio" value="0" {{ ($video->post_from == 0)?'checked':'' }} id="kt_docs_formvalidation_radio_option_1" />
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                    <div class="fw-bolder text-gray-800">Firm</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="post_from" type="radio" value="1" {{ ($video->post_from == 1)?'checked':'' }} id="kt_docs_formvalidation_radio_option_1" />
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                    <div class="fw-bolder text-gray-800">Consultant</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="post_from" type="radio" value="2" {{ ($video->post_from == 2)?'checked':'' }} id="kt_docs_formvalidation_radio_option_2" />
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                                    <div class="fw-bolder text-gray-800">Admin</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fv-row mb-10 col-md-6" id="selecterdiv1" {{ ($video->firm_id =='')?'hidden':'' }}>
                                        <label class="required form-label fs-6 mb-2" >Firm</label>
                                        <select class="form-select " id="firm_id" name="firm_id" data-placeholder="Search by Firm Name / Email / Mobile No / Consultant ID /  Admin Name">
                                            <option value=""></option>
                                            @foreach($firm as $data)
                                                <option {{ ($data->id ==  $video->firm_id)?'selected':'' }} value="{{$data->id}}">{{$data->comapany_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10 col-md-6" id="selecterdiv2" {{ ($video->consultant_id =='')?'hidden':'' }}>
                                        <label class="required form-label fs-6 mb-2" >Consultant</label>
                                        <select class="form-select" id="consultant_id" name="consultant_id" data-placeholder="Search by Consultant Name / Email / Mobile No / Consultant ID /  Admin Name">
                                            <option value=""></option>
                                            @foreach($consultant as $data)
                                                <option {{ ($data->id ==  $video->consultant_id)?'selected':'' }} value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10 col-md-6" id="selecterdiv3" {{ ($video->admin_id =='')?'hidden':'' }}>
                                        <label class="required form-label fs-6 mb-2" >Admin</label>
                                        <select class="form-select" id="admin_id" name="admin_id" data-placeholder="Admin by Consultant Name / Email / Mobile No / Consultant ID /  Admin Name">
                                            <option value=""></option>
                                            @foreach($user as $data)
                                                <option {{ ($data->id ==  $video->admin_id)?'selected':'' }} value="{{$data->id}}">{{$data->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-10 col-md-6">
                                        <label for="" class="form-label">Video Title<span class="text-danger">*</span></label>
                                        <input type="text" name="video_title" class="form-control " placeholder="Video Title" value="{{ $video->video_title }}"/>
                                    </div>
                                    <div class="mb-10 col-md-6">
                                        <label for="" class="form-label">Video URL<span class="text-danger">*</span></label>
                                        <input type="text" name="video_url" class="form-control " placeholder="Video URL" value="{{ $video->video_url }}"/>
                                    </div>
                      
                                    <div class="mb-10 col-md-6">
                                        <label class="form-check-label" for="display_in_home">
                                            <div class="fw-bolder text-gray-800">Display in Home</div>
                                        </label>   
                                        <input class="form-check-input me-3" name="display_in_home" type="checkbox" value="1" {{ ($video->display_in_home == '1')?'checked':'' }} id="display_in_home" />
                                                    
                                    </div>
                                    <div class="mb-10 col-md-6">
                                        <label for="" class="form-label">Sort No<span class="text-danger">*</span></label>
                                        <input type="number" name="sort_no" class="form-control " placeholder="Sort No" value="{{ $video->sort_no}}"/>
                                    </div>
                                   </div>
                                        <div class="form-group row" style="float:right;">
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        back = `{{ route('other.video.index') }}`
        $(document).ready(function () {
            back = `{{ route('other.video.index') }}`
        })
        
        var RadioButton = document.getElementById('formEdit').elements['post_from'];
            RadioButton.forEach(element => {
                element.addEventListener('click',showhideParent)
            });

            const firm_id = document.getElementById('firm_id');
            const consultant_id = document.getElementById('consultant_id');
            const admin_id = document.getElementById('admin_id');

            function showhideParent(event){
            // console.log(event.target.value);
            console.log('load');
                if(event.target.value == 0){
                    selecterdiv1.removeAttribute('hidden')
                    selecterdiv2.setAttribute('hidden',true)
                    selecterdiv3.setAttribute('hidden',true)
                    $(firm_id).prop('required','true');
                   
                    $(admin_id).val('');
                    $(consultant_id).val('');

                    $(admin_id).removeAttr('required'); 
                    $(consultant_id).removeAttr('required');

                    
                }
                if(event.target.value == 1){
                    selecterdiv2.removeAttribute('hidden')
                    selecterdiv1.setAttribute('hidden',true)
                    selecterdiv3.setAttribute('hidden',true)
                    $(consultant_id).prop('required','true');
                    
                    $(firm_id).val('');
                    $(admin_id).val('');

                    $(admin_id).removeAttr('required'); 
                    $(firm_id).removeAttr('required');

                }
                if(event.target.value == 2){
                    selecterdiv3.removeAttribute('hidden')
                    selecterdiv1.setAttribute('hidden',true)
                    selecterdiv2.setAttribute('hidden',true)
                    $(admin_id).prop('required','true');

                    $(consultant_id).val('');
                    $(firm_id).val('');

                    $(consultant_id).removeAttr('required'); 
                    $(firm_id).removeAttr('required');
                }
            }
        
    </script>
    @endsection
</x-base-layout>
