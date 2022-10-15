<x-base-layout>
    <div class="row col-10 gy-12 gx-xl-12">
        <div class="card card-docs rounded border flex-row-fluid mb-2">
            <form action="{{ route('other.video.store') }}" method="post" id="formCreate">
                @csrf
                <div class="py-5">
                    <div class="p-10">
                        <div class="form-group row">
                        <div class="fv-row mb-10 col-md-6">
                            <label class="required fw-bold fs-6 mb-3">Pos from</label>
                            <div class="d-flex flex-column fv-row">
                                <div class="row">
                                <div class="form-check form-check-custom form-check-solid mb-5 col-md-4">
                                    <input class="form-check-input me-3" name="post_from"  type="radio" checked  value="0" id="kt_docs_formvalidation_radio_option_1" />
                                    <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                        <div class="fw-bolder text-gray-800">Firm</div>
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid mb-5 col-md-4">
                                    <input class="form-check-input me-3" name="post_from" type="radio" value="1" id="kt_docs_formvalidation_radio_option_1" />
                                    <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                        <div class="fw-bolder text-gray-800">Consultant</div>
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid mb-5 col-md-4">
                                    <input class="form-check-input me-3" name="post_from" type="radio" value="2" id="kt_docs_formvalidation_radio_option_2" />
                                    <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                        <div class="fw-bolder text-gray-800">Admin</div>
                                    </label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-10 col-md-6" id="selecterdiv1">
                            <label class="required form-label fs-6 mb-2" >Firm</label>
                            <select class="form-select" id="firm_id" name="firm_id" data-placeholder="Search by Firm Name / Email / Mobile No / Consultant ID /  Admin Name">
                               
                            </select>
                        </div>
                        <div class="fv-row mb-10 col-md-6" id="selecterdiv2" hidden>
                            <label class="required form-label fs-6 mb-2" >Consultant</label>
                            <select class="form-select" id="consultant_id" name="consultant_id" data-placeholder="Search by Consultant Name / Email / Mobile No / Consultant ID /  Admin Name">

                            </select>
                        </div>
                        <div class="fv-row mb-10 col-md-6" id="selecterdiv3" hidden>
                            <label class="required form-label fs-6 mb-2" >Admin</label>
                            <select class="form-select" id="admin_id" name="admin_id" data-placeholder="Admin by Consultant Name / Email / Mobile No / Consultant ID /  Admin Name">

                            </select>
                        </div>
                        <div class="mb-10 col-md-6">
                            <label for="" class="form-label">Video Title<span class="text-danger">*</span></label>
                            <input type="text" name="video_title" class="form-control " placeholder="Video Title"/>
                        </div>
                        <div class="mb-10 col-md-6">
                            <label for="" class="form-label">Video URL<span class="text-danger">*</span></label>
                            <input type="url" name="video_url" class="form-control " placeholder="Video URL"/>
                        </div>
                        <div class="mb-10 col-md-6">
                            <label class="form-check-label" for="display_in_home">
                                <div class="fw-bolder text-gray-800">Display in Home</div>
                            </label>   
                            <input class="form-check-input me-3" name="display_in_home" type="checkbox" value="1" id="display_in_home" />
                                           
                        </div>
                        <div class="mb-10 col-md-6">
                            <label for="" class="form-label">Sort No<span class="text-danger">*</span></label>
                            <input type="number" name="sort_no" class="form-control " placeholder="Sort No"/>
                        </div>
                        </div>
                        <div class="form-group row" style="float:right;">
                        <div class="mb-10">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
    <script>
        back = `{{ route('other.video.index') }}`
        $(document).ready(function () {
            back = `{{ route('other.video.index') }}`
        })
        
        const selecterdiv1 = document.getElementById('selecterdiv1')
        const selecterdiv2 = document.getElementById('selecterdiv2')
        const selecterdiv3 = document.getElementById('selecterdiv3')
        
        var RadioButton = document.getElementById('formCreate').elements['post_from'];
        RadioButton.forEach(element => {
            element.addEventListener('click',showhideParent)
        });
        function showhideParent(event){
            
            if(event.target.value == 0){
                selecterdiv1.removeAttribute('hidden')
                selecterdiv2.setAttribute('hidden',true)
                selecterdiv3.setAttribute('hidden',true)
                $(firm_id).prop('required','true');
                // remove required for consultants
                // $(category_id).removeAttr('required'); 
                // $(sub_category_id).removeAttr('required');
                // $(consultant_id).removeAttr('required');

                
            }
            if(event.target.value == 1){
                selecterdiv2.removeAttribute('hidden')
                selecterdiv1.setAttribute('hidden',true)
                selecterdiv3.setAttribute('hidden',true)
                $(consultant_id).prop('required','true');
            }
            // else{
            //     selecterdiv1.setAttribute('hidden',true)
            //     $(consultant_id).removeAttr('required');
            // }
            if(event.target.value == 2){
                selecterdiv3.removeAttribute('hidden')
                selecterdiv1.setAttribute('hidden',true)
                selecterdiv2.setAttribute('hidden',true)
                $(admin_id).prop('required','true');
            }
        }
        
        $('#firm_id').select2({
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
                                children: $.map(item.children, function (data) { return { id:`${data.id}`,text : data.text} })
                            }
                        })
                    };
                },
                cache: true
            },

        })
        $('#consultant_id').select2({
            ajax: {
                url: '{{ route('other.articel.consultantSearch') }}',
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
                                children: $.map(item.children, function (data) { return { id:`${data.id}`,text : data.text} })
                            }
                        })
                    };
                },
                cache: true
            },

        })
        $('#admin_id').select2({
            ajax: {
                url: '{{ route('other.articel.userSearch') }}',
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
                                children: $.map(item.children, function (data) { return { id:`${data.id}`,text : data.text} })
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
