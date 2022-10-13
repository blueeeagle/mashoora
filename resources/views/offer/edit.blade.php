<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Offer</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('other.offer.index') }}" class="text-muted text-hover-primary">Offer</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Edit Offer</li>
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
                        <form action="{{ route('other.offer.update',$offer->id) }}" method="post" id="formCreate">
                            @csrf
                            
                            <div class="py-5">
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <label class="required fw-bold fs-6 mb-3">Firm or Consultant Offer</label>
                                        <div class="d-flex flex-column fv-row">
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="firm_consultant"  type="radio" checked  value="0" id="kt_docs_formvalidation_radio_option_1" {{ ($offer->firm_consultant == 0)?'checked':'' }} />
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                    <div class="fw-bolder text-gray-800">Firm</div>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="form-check-input me-3" name="firm_consultant" type="radio" value="1" id="kt_docs_formvalidation_radio_option_2" {{ ($offer->firm_consultant == 1)?'checked':'' }}/>
                                                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                                    <div class="fw-bolder text-gray-800">Consultant</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fv-row mb-10" id="selecterdiv" {{ ($offer->firm_consultant == 1)?'hidden':'' }}>
                                        <label for="" class="form-label">Choose firm<span class="text-danger">*</span></label>
                                        <select class="form-select" name="firm_id" id="firm_id" required data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($firm as $firm)
                                                <option {{ ($offer->firm_id ==  $firm->id)?'selected':'' }} value="{{$firm->id}}">{{$firm->comapany_name}}</option>
                                            @endforeach
                                        </select>                                        
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Choose Consultant<span class="text-danger">*</span></label>
                                        <select class="form-select" name="consultant_id" id="consultant_id" required data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($consultant as $consul)
                                                <option data-value="{{$consul->categorie_id}}" value="{{$consul->id}}" {{ ($offer->consultant_id ==  $consul->id)?'selected':'' }}>{{$consul->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="fw-bold fs-6 mb-2">Offer Title</label>
                                        <input type="text" name="offer_title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Offer Title" required value="{{ $offer->offer_title}}"/>
                                    </div>

                                    <div class="fv-row mb-10">
                                        @include('components.imagecrop',['name'=>'image','imgsrc'=>$offer->image])
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="required fw-bold fs-6 mb-2">Description</label>
                                        <textarea  name="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Description" required >{{ $offer->description}}</textarea>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="required fw-bold fs-6 mb-2">Amount</label>
                                        <div class="input-group  mb-5">
                                            <span class="input-group-text base_curency" id="base_curency">{{$offer->consultant->country->currency->currencycode}}</span>
                                            <input type="number" name="amount" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Amount" required value="{{ $offer->amount}}"/>
                                         </div>
                                    </div>

                                    <div class="mb-10">
                                        <label class=" form-check-label" for="has_validity">
                                            <div class="fw-bolder text-gray-800">Has Validity</div>
                                        </label>   
                                        <input class="form-check-input me-3" name="has_validity" type="checkbox" value="1" id="has_validity" {{ ($offer->has_validity == 1)?'checked':'' }}/>           
                                    </div>

                                    <div class="fv-row mb-5">
                                        <label class="form-label " >From Date<span class="text-danger">*</span></label>
                                        <input class="form-control form-control-solid" name="from_date" id="from_date"  placeholder="From Date"  value="{{ $offer->from_date}}"required/>
                                    </div>
                                    <div class="fv-row mb-5" id="valid_date">
                                        <label class="form-label " >To Date<span class="text-danger">*</span></label>
                                        <input class="form-control form-control-solid" name="to_date" id="to_date"  placeholder="To Date" value="{{ $offer->to_date}}" required/>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Main Category<span class="text-danger">*</span></label>
                                        <select class="form-select" name="category_id" id="category_id" required data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                                @foreach($category as $cat)
                                                    <option  value="{{$cat->id}}" {{ ($offer->category_id ==  $cat->id)?'selected':'' }}>{{$cat->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Sub Category<span class="text-danger">*</span></label>
                                        <select class="form-select" name="sub_category_id" id="sub_category_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                                @foreach($sub_category as $sub_cat)
                                                    <option data-value="{{$sub_cat->categorie_id}}" value="{{$sub_cat->id}}" {{ ($offer->sub_category_id ==  $sub_cat->id)?'selected':'' }}>{{$sub_cat->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>


                                  
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary btn-hover-rise me-5">Save</button>
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
        back = "{{ route('other.offer.index') }}"

        window.onload = function() {
            const selecterdiv = document.getElementById('selecterdiv')
            const firm_id = document.getElementById('firm_id')
            const consultant_id = document.getElementById('consultant_id')
            const category_id = document.getElementById('category_id')
            const sub_category_id = document.getElementById('sub_category_id')
            var RadioButton = document.getElementById('formCreate').elements['firm_consultant'];
            RadioButton.forEach(element => {
                element.addEventListener('click',showhideParent)
            });
            function showhideParent(event){
                if(event.target.value == 0){
                    selecterdiv.removeAttribute('hidden')
                  
                    // remove required for consultants
                    $(category_id).removeAttr('required'); 
                    $(sub_category_id).removeAttr('required');
                    $(consultant_id).removeAttr('required');

                    $(firm_id).prop('required','true');
                }
                else{
                    selecterdiv.setAttribute('hidden',true)
                    $(firm_id).removeAttr('required');
                    console.log($(firm_id));
                     $(firm_id).val('');
                    $(firm_id).prop("selected", false);
                }
               
            }   
        }

        $('#has_validity').change(function(){
            if ($(this).is(':checked')) $('#valid_date').show();
            else $('#valid_date').hide(); $('#to_date').removeAttr('required');
        }).change();
        
        $("#from_date").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),
                locale: {
                        format: '{{ strtoupper($companeySetting->date_format) }}'
                    }
            }, function(start, end, label) {
                let current = new Date($('#from_date').val())
                $("#to_date").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),         
                minDate: formatDate(current),
                locale: {
                        format: '{{ strtoupper($companeySetting->date_format) }}'
                    }
            }, function(start, end, label) { } )
            }
        )

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


        $("#consultant_id").on('select2:select', function (e) {
            var data = e.currentTarget.options[e.currentTarget.options.selectedIndex].dataset.value

            var found = consultantData.find(function (ele) {
                                return ele.id == consultant_id.value;
                            });
            var currencyCode = found.country.currency.currencycode;
            document.getElementById("base_curency").textContent=currencyCode;
            $.ajax({
                url:"{{route('other.offer.getCategory')}}",
                method:"POST",
                data:{id:data,"_token": "{{ csrf_token() }}",},
                success:function(data){
                    var option = null
                    var sub_option = null
                    if(data.category.length != null){
                        data.category.forEach((e)=>{
                            if(e.type == 0){
                                option += '<option value='+e.id+'>'+e.name+'</option>';
                            }
                           
                        })
                    }
                    $('#category_id').html(option).trigger("change");
                    // option = null
                    if(data.category.length != null){
                        data.category.forEach((e)=>{
                            if(e.type == 1){
                                sub_option += '<option value='+e.id+'>'+e.name+'</option>';
                            }
                            
                        })
                    }
                    $('#sub_category_id').html(sub_option).trigger("change");
                                                                
                }
            })
        })
        

    </script>
    @endsection
</x-base-layout>
