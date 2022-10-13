<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Manage Discount</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('other.discount.index') }}" class="text-muted text-hover-primary">Manage Discount</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Edit Discount</li>
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
                        <form action="{{ route('other.discount.update',$discount->id) }}" method="post" id="formCreate">
                            @csrf
                            <div class="py-5">
                                <div class="rounded border p-10">
                                   
                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Choose Consultant<span class="text-danger">*</span></label>
                                        <select class="form-select" name="consultant_id" id="consultant_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($consultants as $consultant)
                                                <option {{ ($discount->consultant_id ==  $consultant->id)?'selected':'' }}  value="{{$consultant->id}}">{{$consultant->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label fs-6 mb-2" >Promo Tittle</label>
                                        <input type="text" name="promo_title" class="form-control" placeholder="Promo Tittle" value="{{$discount->promo_title}}" required/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label fs-6 mb-2" >Promo Code</label>
                                        <input type="text" name="promo_code" class="form-control" placeholder="Promo Code" value="{{$discount->promo_code}}"required/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label fs-6 mb-2" >No of Coupons</label>
                                        <input type="number" name="no_of_coupons" class="form-control" placeholder="No of Coupons" value="{{$discount->no_of_coupons}}"required/>
                                    </div>
                                    <div class="fv-row mb-10">
                                        @include('components.imagecrop',['name'=>'image','imgsrc'=>$discount->image])
                                    </div>
                                    <div class="fv-row mb-10">

                                        <label class="form-label fs-6 mb-2" >Flat or Percentage</label>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" name="flat_percentage" onclick="validateamount()"  {{ ($discount->flat_percentage == 0)?'checked':'' }} type="radio" checked  value="0" id="flat" />
                                            <label class="form-check-label" for="flat">
                                                <div class="fw-bolder text-gray-800">Flat</div>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input me-3" onclick="validateamount()" name="flat_percentage" {{ ($discount->flat_percentage == 1)?'checked':'' }} type="radio" value="1" id="percentage" />
                                            <label class="form-check-label" for="percentage">
                                                <div class="fw-bolder text-gray-800">percentage</div>
                                            </label>
                                        </div>
                            
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label fs-6 mb-2" >Amount</label>
                                        <div class="input-group  mb-5">
                                            <span class="input-group-text base_curency" id="base_curency">{{ $discount->consultant->country->currency->currencycode }}</span>
                                            <input type="number" name="amount" id="amount" onkeyup="validateamount()" class="form-control" placeholder="Amount" value="{{$discount->amount}}"/>
                                            <span id="span-error"></span>
                                        </div>
                                    </div>
                                    <div class="fv-row mb-5">
                                        <label class="form-label " >From Date</label>
                                        <input class="form-control form-control-solid" name="from_date" id="from_date"  placeholder="From Date"  value="{{$discount->from_date}}" required/>
                                    </div>
                                    <div class="fv-row mb-5">
                                        <label class="form-label " >To Date</label>
                                        <input class="form-control form-control-solid" name="to_date" id="to_date"  placeholder="To Date"  value="{{$discount->to_date}}" required/>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Choose Category<span class="text-danger">*</span></label>
                                        <select class="form-select" name="category_id" id="category_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>    
                                            @foreach($category as $data)
                                                <option {{ ($discount->category_id ==  $data->id)?'selected':'' }} value="{{$data->id}}">{{$data->name}}</option>
                                                
                                            @endforeach                                       
                                        </select>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label for="" class="form-label">Choose Specialization <span class="text-danger">*</span></label>
                                        <select class="form-select" name="specialization_id" id="specialization_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($specialization as $data)
                                                <option {{ ($discount->specialization_id ==  $data->id)?'selected':'' }} value="{{$data->id}}">{{$data->title}}</option>
                                            @endforeach  
                                        </select>
                                    </div>

                                    <div class="fv-row mb-10" >
                                        <label class="form-label fs-6 mb-2" >Applicable for</label>
                                       
                                        <div class='form-check form-switch form-check-custom form-check-solid'>
                                            <input class='form-check-input' name="video" type='checkbox' value='1' {{ ($discount->video == 1)?'checked':'' }} />
                                            <label class="custom-control-label" for="customSwitch1">Video [<span id="video">{{ ($discount->consultant->video_amount != null)?$discount->consultant->video_amount:0}}</span>] ({{ $companeySetting->country->currency->currencycode }})</label>
                                            
                                            

                                            <input class='form-check-input' name="voice" type='checkbox' value='1' {{ ($discount->voice == 1)?'checked':'' }} />
                                            <label class="custom-control-label"  for="customSwitch1">Voice [<span id="voice">{{ ($discount->consultant->voice_amount != null)?$discount->consultant->voice_amount:0 }}</span>] ({{ $companeySetting->country->currency->currencycode }})</label>

                                            <input class='form-check-input' name="text" type='checkbox' value='1' {{ ($discount->text == 1)?'checked':'' }} />
                                            <label class="custom-control-label" for="customSwitch1">Text [<span id="text">{{ ($discount->consultant->text_amount != null)? $discount->consultant->text_amount:0 }}</span>] ({{ $companeySetting->country->currency->currencycode }})</label>

                                            <input class='form-check-input' name="direct" type='checkbox' value='1' {{ ($discount->direct == 1)?'checked':'' }} />
                                            <label class="custom-control-label" for="customSwitch1">Direct [<span id="direct">{{ ($discount->consultant->direct_amount !=null)? $discount->consultant->direct_amount:0 }}</span>] ({{ $companeySetting->country->currency->currencycode }})</label>
                                        </div>
                                       
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
        var specialization  = $('#specialization');
        var category_id  = $('#category_id');
        const yesterday = new Date();
        var BasicDetails = null
        yesterday.setDate(yesterday.getDate() - 1);

        var consultantAmount =  @json($consultants);
        
        $('#has_validity').change(function(){
            if ($(this).is(':checked')) $('#to_date').show();
            else $('#to_date').hide();
        }).change();
    
        $("#consultant_id").on('select2:select', function (e) {
                var data = e.params.data;
                var found = consultantAmount.find(function (element) {
                    return element.id == data.id;
                });
                document.getElementById("video"). innerHTML = found.video_amount;
                document.getElementById("voice"). innerHTML = found.voice_amount;
                document.getElementById("text"). innerHTML = found.text_amount;
                document.getElementById("direct"). innerHTML = found.direct_amount;
                
                 var c_data = consultantAmount.find(function (ele) {
                                return ele.id == consultant_id.value;
                            });
                var currencyCode = c_data.country.currency.currencycode;
                document.getElementById("base_curency").textContent=currencyCode;
                
                $.ajax({
                    url:"{{route('other.discount.getConsultant')}}",
                    method:"POST",
                    data:{id:data.id,"_token": "{{ csrf_token() }}",},
                    success:function(data){
                        var option = null
                        if(data.Category.length != null){
                            data.Category.forEach((e)=>{
                                option += '<option value='+e.id+'>'+e.name+'</option>';
                            })
                        }
                        category_id.html(option).trigger("change");
                        option = null
                        if(data.ConsultantCategory.length != null){
                            data.ConsultantCategory.forEach((e)=>{
                                option += '<option value='+e.id+'>'+e.title+'</option>';
                            })
                        }
                        specialization.html(option).trigger("change");                                                
                    }
                })
                console.log();
            })

        $("#from_date").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),
                
            }, function(start, end, label) {
                let current = new Date($('#from_date').val())
                $("#to_date").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),         
                minDate: formatDate(current),
                
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

        function validateamount(){
            const Amount = document.getElementById('amount');
            if($('[name="flat_percentage"]:checked').val() == 1){
                if(Amount.value >100) Amount.value = 100
            }
        }

        back = `{{ route('other.discount.index') }}`
        $(document).ready(function () {
            back = `{{ route('other.discount.index') }}`
        })
        

    </script>
    @endsection
</x-base-layout>